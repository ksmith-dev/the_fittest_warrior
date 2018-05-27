<?php

namespace App\Http\Controllers;

use App\User;
use App\Group;
use App\Member;
use App\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    private function setFormFactoryStructure(string $table)
    {
        $users = User::all();

        if ($users->count() > 0)
        {
            foreach ($users as $user)
            {
                $user_id_and_full_name[$user->id] = ucwords($user->first_name . ' ' . $user->last_name);
            }
        } else {
            $user_id_and_full_name = null;
        }

        $groups = Group::all();

        if ($groups->count() > 0)
        {
            foreach ($groups as $group)
            {
                $group_names[$group->id] = ucwords(str_replace('_', ' ', $group->name));
            }
        } else {
            $group_names = null;
        }

        switch ($table)
        {
            case 'user' :
                $this->_user_input_data = new FormFactory('user');
                $this->_user_input_data->setProtectedColumns($this->_global_protected_columns);
                $this->_user_input_data->addProtectedColumn('role');
                $this->_user_input_data->addProtectedColumn('status');
                $this->_user_input_data->setOptions('sex', $this->_sex);
                $this->_user_input_data->setOptions('state', $this->_states);
                $this->_user_input_data->setOptions('status', $this->_status);
                $this->_user_input_data->setOptions('role', $this->_site_roles);
                $this->_user_input_data->addLabelOverride('b_m_i','body_mass_index');
                $this->_user_input_data->setInputOverrides(array('state' => 'select', 'sex' => 'select', 'status' => 'select', 'role' => 'select'));
                $this->_user_input_data->setClass('label', 'col-md-4 col-form-label text-md-right');
                $this->_user_input_data->setClass('input', 'form-control');
                $this->_user_input_data->setClass('select', 'form-control');
                break;
            case 'member' :
                $this->_member_input_data = new FormFactory('member');
                empty($this->_global_protected_columns) ? : $this->_member_input_data->setProtectedColumns($this->_global_protected_columns);
                empty($this->_status) ? : $this->_member_input_data->setOptions('status', $this->_status);
                empty($this->_group_roles) ? : $this->_member_input_data->setOptions('group_role', $this->_group_roles);
                empty($user_id_and_full_name) ? : $this->_member_input_data->setOptions('user_id', $user_id_and_full_name);
                empty($group_names) ? :$this->_member_input_data->setOptions('group_id', $group_names);
                $this->_member_input_data->addLabelOverride('user_id','user_name');
                $this->_member_input_data->addLabelOverride('group_id','group_name');
                $this->_member_input_data->setInputOverrides(array('group_role' => 'select', 'status' => 'select', 'user_id' => 'select', 'group_id' => 'select'));
                $this->_member_input_data->setClass('label', 'col-md-4 col-form-label text-md-right');
                $this->_member_input_data->setClass('input', 'form-control');
                $this->_member_input_data->setClass('select', 'form-control');
                break;
            case 'advertisement' :
                $this->_advertisement_input_data = new FormFactory('advertisement');
                $this->_advertisement_input_data->setProtectedColumns($this->_global_protected_columns);
                $this->_advertisement_input_data->setOptions('user_id', $user_id_and_full_name);
                $this->_advertisement_input_data->addLabelOverride('user_id','user_name');
                $this->_advertisement_input_data->setOptions('status', $this->_status);
                $this->_advertisement_input_data->setInputOverrides(array('status' => 'select', 'user_id' => 'select'));
                $this->_advertisement_input_data->setClass('label', 'col-md-4 col-form-label text-md-right');
                $this->_advertisement_input_data->setClass('input', 'form-control');
                $this->_advertisement_input_data->setClass('select', 'form-control');
                break;
            case 'workout' :
                $this->_workout_input_data = new FormFactory('workout');
                $this->_workout_input_data->setProtectedColumns($this->_global_protected_columns);
                $this->_workout_input_data->addProtectedColumn('group_id');
                $this->_workout_input_data->addProtectedColumn('weight_unit');
                $this->_workout_input_data->addProtectedColumn('status');
                $this->_workout_input_data->addProtectedColumn('user_id');
                $this->_workout_input_data->addProtectedColumn('activity');
                $this->_workout_input_data->addProtectedColumn('resistance_factor');
                $this->_workout_input_data->addProtectedColumn('calories_burned');
                $this->_workout_input_data->setInputAttribute('type', 'readonly');
                $this->_workout_input_data->setInputAttribute('duration', 'step=2');
                $this->_workout_input_data->setInputAttribute('rest', 'step=2');
                $this->_workout_input_data->setInputOverrides(array('repetitions' => 'number', 'sets' => 'number', 'weight' => 'number', 'resistance_factor' => 'number', 'calories_burned' => 'number', 'duration' => 'time', 'rest' => 'time'));
                $this->_workout_input_data->setClassOverride('duration', 'input', 'form-control without_am_pm');
                $this->_workout_input_data->setClassOverride('rest', 'input', 'form-control without_am_pm');
                $this->_workout_input_data->setClass('label', 'col-md-4 col-form-label text-md-right');
                $this->_workout_input_data->setClass('input', 'form-control');
                $this->_workout_input_data->setClass('select', 'form-control');
                break;
            case 'health' :
                $this->_health_input_data = new FormFactory('health');
                $this->_health_input_data->setProtectedColumns($this->_global_protected_columns);
                $this->_health_input_data->addProtectedColumn('status');
                $this->_health_input_data->addProtectedColumn('user_id');
                $this->_health_input_data->setInputOverrides(array('ldl_cholesterol' => 'number', 'fat_percentage' => 'number', 'systolic_blood_pressure' => 'number', 'diastolic_blood_pressure' => 'number', 'hdl_cholesterol' => 'number', 'start_date_time' => 'date', 'end_date_time' => 'date'));
                $this->_health_input_data->setClass('label', 'col-md-4 col-form-label text-md-right');
                $this->_health_input_data->setClass('input', 'form-control');
                $this->_health_input_data->setClass('select', 'form-control');
                break;
            case 'nutrition' :
                $this->_nutrition_input_data = new FormFactory('nutrition');
                $this->_nutrition_input_data->setProtectedColumns($this->_global_protected_columns);
                $this->_nutrition_input_data->addProtectedColumn('status');
                $this->_nutrition_input_data->addProtectedColumn('user_id');
                $this->_nutrition_input_data->setInputOverrides(array('portion_size' => 'number', 'gram_protein' => 'number', 'gram_fat' => 'number', 'gram_saturated_fat' => 'number', 'cholesterol' => 'number', 'sodium' => 'number', 'carbohydrates' => 'number', 'sugars' => 'number', 'fiber' => 'number', 'calories' => 'number', 'start_date_time' => 'date', 'end_date_time' => 'date'));
                $this->_nutrition_input_data->setClass('label', 'col-md-4 col-form-label text-md-right');
                $this->_nutrition_input_data->setClass('input', 'form-control');
                $this->_nutrition_input_data->setClass('select', 'form-control');
                break;
            case 'fitness_group' :
                $this->_fitness_group_input_data = new FormFactory('fitness_group');
                $this->_fitness_group_input_data->setProtectedColumns($this->_global_protected_columns);
                $this->_fitness_group_input_data->setOptions('status', $this->_status);
                $this->_fitness_group_input_data->setOptions('user_id', $user_id_and_full_name);
                $this->_fitness_group_input_data->setInputOverrides(array('status' => 'select', 'user_id' => 'select'));
                $this->_fitness_group_input_data->setClass('label', 'col-md-4 col-form-label text-md-right');
                $this->_fitness_group_input_data->setClass('input', 'form-control');
                $this->_fitness_group_input_data->setClass('select', 'form-control');
                break;
        }
    }

    /**
     * @param Request $request
     * @param $group_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, $group_id)
    {
        $param = null;
        $param['user_is_member'] = false;

        $group = Group::find($group_id);

        $membership = Member::where('user_id', Auth::user()->getAuthIdentifier())->first();

        if (intval($membership->group_id) === intval($group_id))
        {
            $param['user_is_member'] = true;
        }

        empty($group) ? $param['group'] = null : $param['group'] = $group;

        $memberships = Member::where('group_id', $group_id)->get();

        if ($memberships->count() > 0)
        {
            foreach ($memberships as $membership)
            {
                $user = User::where('id', $membership->user_id)->first();
                $user->group_role = $membership->group_role;
                $param['members'][$user->id] = $user;

                $workouts = DB::table('workout')
                    ->join('member', 'workout.user_id', '=', 'member.user_id')
                    ->join('fitness_group', 'fitness_group.id', '=', 'member.group_id')
                    ->select('workout.*', 'member.group_id')
                    ->orderby('weight', 'desc')
                    ->get();

                $param['workouts'] = $workouts;
            }
        }

        return view('group', ['param' => $param]);
    }

    public function gym() {

        $gyms = Group::where([['type', 'gym'], ['status', 'active']])->get();

        return view('gym', [ 'gyms' => $gyms]);
    }
}
