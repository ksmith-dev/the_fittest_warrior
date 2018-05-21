<?php

namespace App\Http\Controllers;

use App\Health;
use App\User;
use App\Group;
use App\Member;
use App\Workout;
use App\Nutrition;
use App\FormFactory;
use App\Advertisement;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class FormController extends Controller
{
    private $_states = array(
        'AL' => 'Alabama',
        'AK' => 'Alaska',
        'AZ' => 'Arizona',
        'AR' => 'Arkansas',
        'CA' => 'California',
        'CO' => 'Colorado',
        'CT' => 'Connecticut',
        'DE' => 'Delaware',
        'DC' => 'District Of Columbia',
        'FL' => 'Florida',
        'GA' => 'Georgia',
        'HI' => 'Hawaii',
        'ID' => 'Idaho',
        'IL' => 'Illinois',
        'IN' => 'Indiana',
        'IA' => 'Iowa',
        'KS' => 'Kansas',
        'KY' => 'Kentucky',
        'LA' => 'Louisiana',
        'ME' => 'Maine',
        'MD' => 'Maryland',
        'MA' => 'Massachusetts',
        'MI' => 'Michigan',
        'MN' => 'Minnesota',
        'MS' => 'Mississippi',
        'MO' => 'Missouri',
        'MT' => 'Montana',
        'NE' => 'Nebraska',
        'NV' => 'Nevada',
        'NH' => 'New Hampshire',
        'NJ' => 'New Jersey',
        'NM' => 'New Mexico',
        'NY' => 'New York',
        'NC' => 'North Carolina',
        'ND' => 'North Dakota',
        'OH' => 'Ohio',
        'OK' => 'Oklahoma',
        'OR' => 'Oregon',
        'PA' => 'Pennsylvania',
        'RI' => 'Rhode Island',
        'SC' => 'South Carolina',
        'SD' => 'South Dakota',
        'TN' => 'Tennessee',
        'TX' => 'Texas',
        'UT' => 'Utah',
        'VT' => 'Vermont',
        'VA' => 'Virginia',
        'WA' => 'Washington',
        'WV' => 'West Virginia',
        'WI' => 'Wisconsin',
        'WY' => 'Wyoming',
    );
    private $_sex = array('male' => 'male', 'female' => 'female');
    private $_status = array('active' => 'active', 'deactivated' => 'deactivated');
    private $_site_roles = array('admin' => 'admin', 'member' => 'member', 'guest' => 'guest');
    private $_group_roles = array('admin' => 'admin', 'member' => 'member', 'guest' => 'guest', 'coach' => 'coach');
    private $_global_protected_columns = array('id', 'password', 'remember_token', 'created_at', 'updated_at');

    private $_user_input_data = null;
    private $_health_input_data = null;
    private $_member_input_data = null;
    private $_workout_input_data = null;
    private $_nutrition_input_data = null;
    private $_advertisement_input_data = null;

    private function setFormFactoryStructure(string $table)
    {
        $users = User::all();
        $user_id_and_full_name = null;

        foreach ($users as $user)
        {
            $user_id_and_full_name[$user->id] = ucwords($user->first_name . ' ' . $user->last_name);
        }

        $groups = Group::all();
        $group_names = null;

        foreach ($groups as $group)
        {
            $group_names[$group->id] = ucwords(str_replace('_', ' ', $group->name));
        }

        switch ($table)
        {
            case 'user' :
                $this->_user_input_data = new FormFactory('user');
                $this->_user_input_data->setProtectedColumns($this->_global_protected_columns);
                $this->_user_input_data->addProtectedColumn('role');
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
                $this->_member_input_data->setProtectedColumns($this->_global_protected_columns);
                $this->_member_input_data->setOptions('status', $this->_status);
                $this->_member_input_data->setOptions('group_role', $this->_group_roles);
                $this->_member_input_data->addLabelOverride('user_id','user_name');
                $this->_member_input_data->setOptions('user_id', $user_id_and_full_name);
                $this->_member_input_data->addLabelOverride('group_id','group_name');
                $this->_member_input_data->setOptions('group_id', $group_names);
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
        }
    }

    /**
     * @param string $model_type
     * @param string|null $model_id
     * @param string|null $model_modifier
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function form(string $model_type, string $model_id = null, string $model_modifier = null) {

        $model = null;
        $inputs = null;
        $pre_processing_data = null;

        if (!empty($model_modifier))
        {
            switch ($model_modifier)
            {
                case 'change_status' :
                    return $this->changeStatus( $model_type, $model_id);
                    break;
                default :
                    empty($model_modifier) ? $pre_processing_data = null :  $pre_processing_data['default_input_value']['workout_type'] = $model_modifier;
                    break;
            }
        }

        if (Auth::check())
        {
            // available only to site admin
            if (Auth::user()->role == 'admin')
            {
                switch ($model_type)
                {
                    case 'user' :
                        empty($model_id) ? $model = Auth::user() : $model = User::find($model_id);
                        // this method populates global $_table_input_data
                        $this->setFormFactoryStructure('user');
                        // general variable name assignment to be processed
                        $inputs = $this->_user_input_data;
                        break;
                    case 'advertisement' :
                        empty($model_id) ? $model = new Advertisement() : $model = Advertisement::find($model_id);
                        // this method populates global $_table_input_data
                        $this->setFormFactoryStructure('advertisement');
                        // general variable name assignment to be processed
                        $inputs = $this->_advertisement_input_data;
                        break;
                    case 'member' :
                        empty($model_id) ? $model = new Member() : $model = Member::find($model_id);
                        // this method populates global $_table_input_data
                        $this->setFormFactoryStructure('member');
                        // general variable name assignment to be processed
                        $inputs = $this->_member_input_data;
                }
            }
            // available to all users except site admin
            if (Auth::user()->role != 'admin')
            {
                switch ($model_type)
                {
                    case 'user' :
                        $model = Auth::user();
                        // this method populates global $_table_input_data
                        $this->setFormFactoryStructure('user');
                        // this method populates global $_table_input_data
                        $inputs = $this->_user_input_data;
                        break;
                }
            }

            // available to all users
            switch ($model_type)
            {
                case 'workout' :
                    empty($model_id) ? $model = new Workout() : $model = Workout::find($model_id);
                    // this method populates global $_table_input_data
                    $this->setFormFactoryStructure('workout');
                    if(empty($model_id)) { $this->_workout_input_data->setDefaultInputValue('type', $pre_processing_data['default_input_value']['workout_type']); }
                    // general variable name assignment to be processed
                    $inputs = $this->_workout_input_data;
                    break;
                case 'health' :
                    empty($model_id) ? $model = new Health() : $model = Health::find($model_id);
                    // this method populates global $_table_input_data
                    $this->setFormFactoryStructure('health');
                    // general variable name assignment to be processed
                    $inputs = $this->_health_input_data;
                    break;
                case 'nutrition' :
                    empty($model_id) ? $model = new Nutrition() : $model = Nutrition::find($model_id);
                    // this method populates global $_table_input_data
                    $this->setFormFactoryStructure('nutrition');
                    // general variable name assignment to be processed
                    $inputs = $this->_nutrition_input_data;
                    break;
            }

            $inputs->createFormInputs();
            $inputs = $inputs->getInputs();

            empty($params['form_type'] = $model_type) ? $params['table'] = null : $params['table'] = $model_type;
            empty($params['form_id'] = $model_id) ? $params['model_id'] = null : $params['model_id'] = $model_id;

            if (empty($model->id)) { $model = null; }

            return view('forms.form', ['params' => $params, 'model' => $model, 'inputs' => $inputs]);
        }
        else
        {
            return view('/login');
        }
    }

    /**
     * @param Request $request
     * @param string $model_type
     * @param string $model_id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, string $model_type, string $model_id = null) {

        $url = null;
        $model = null;
        $columns = null;
        $form_data = null;

        $post_data = $request->all();

        validator($post_data);

        empty($post_data['type']) ? $post_data['type'] = null : $post_data['type'] = str_replace(' ', '_', $post_data['type']);

        if (Auth::check())
        {
            if (Auth::user()->role == 'admin')
            {
                switch ($model_type)
                {
                    case 'user' :
                        $model = new User();
                        empty($model_id) ? $model->user_id = Auth::user()->getAuthIdentifier()  : $model = User::find($model_id);
                        $columns = Schema::getColumnListing('user');
                        // this method populates global $_table_input_data
                        $this->setFormFactoryStructure('user');
                        // general variable name assignment to be processed
                        $form_data = $this->_user_input_data;
                        $url = 'account/user/';
                        break;
                    case 'member' :
                        $model = new Member();
                        empty($model_id) ? $model->user_id = Auth::user()->getAuthIdentifier() : $model = Member::find($model_id);
                        $columns = Schema::getColumnListing('member');
                        // this method populates global $_table_input_data
                        $this->setFormFactoryStructure('member');
                        // general variable name assignment to be processed
                        $form_data = $this->_member_input_data;
                        $url = 'account/member';
                        break;
                    case 'advertisement' :
                        $model = new Advertisement();
                        empty($model_id) ? $model->user_id = Auth::user()->getAuthIdentifier() : $model = Advertisement::find(intval($model_id));
                        $columns = Schema::getColumnListing('advertisement');
                        // this method populates global $_table_input_data
                        $this->setFormFactoryStructure('advertisement');
                        // general variable name assignment to be processed
                        $form_data = $this->_advertisement_input_data;
                        $url = 'account/advertisement';
                        break;
                }
            }
            else if (Auth::user()->role != 'admin')
            {
                switch ($model_type)
                {
                    case 'user' :
                        $model = Auth::user();
                        $columns = Schema::getColumnListing('user');
                        // this method populates global $_table_input_data
                        $this->setFormFactoryStructure('user');
                        // general variable name assignment to be processed
                        $form_data = $this->_user_input_data;
                        $url = 'account';
                        break;
                }
            }
            switch ($model_type)
            {
                case 'workout' :
                    $model = new Workout();
                    empty($model_id) ? $model->user_id = Auth::user()->getAuthIdentifier() : $model = Workout::where([['user_id', '=', Auth::user()->getAuthIdentifier()], ['id', '=', $model_id]])->first();
                    $training = DB::table('training')->where('workout_type', '=', $post_data['type'])->first();
                    $model->activity = $training->type;
                    $columns = Schema::getColumnListing('workout');
                    // this method populates global $_table_input_data
                    $this->setFormFactoryStructure('workout');
                    // general variable name assignment to be processed
                    $form_data = $this->_workout_input_data;
                    $url = 'view/workout/0/' . $post_data['type'];
                    break;
                case 'health' :
                    $model = new Health();
                    empty($model_id) ? $model->user_id = Auth::user()->getAuthIdentifier() : $model = Health::where([['user_id', '=', Auth::user()->getAuthIdentifier()], ['id', '=', $model_id]])->first();
                    $columns = Schema::getColumnListing('health');
                    // this method populates global $_table_input_data
                    $this->setFormFactoryStructure('health');
                    // general variable name assignment to be processed
                    $form_data = $this->_health_input_data;
                    $url = 'health';
                    break;
                case 'nutrition' :
                    $model = new Nutrition();
                    empty($model_id) ? $model->user_id = Auth::user()->getAuthIdentifier() : $model = Nutrition::where([['user_id', '=', Auth::user()->getAuthIdentifier()], ['id', '=', $model_id]])->first();
                    $columns = Schema::getColumnListing('nutrition');
                    // this method populates global $_table_input_data
                    $this->setFormFactoryStructure('nutrition');
                    // general variable name assignment to be processed
                    $form_data = $this->_nutrition_input_data;
                    $url = 'nutrition';
                    break;
            }
            if (!empty($model) && !empty($columns))
            {
                foreach ($columns as $column)
                {
                    if (!$form_data->isProtected($column))
                    {
                        empty($post_data[$column]) ? $model->$column = null : $model->$column = $post_data[$column];
                    }
                }
                $model->save();
                return redirect($url);
            }
        }
        else
        {
            return redirect('/login');
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminDashboard()
    {
        return view('admin');
    }

    /**
     * @param string $model_type
     * @param string $model_id
     * @param string $status
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    private function changeStatus(string $model_type, string $model_id, string $status = null)
    {
        $result = DB::table($model_type)->where('id', $model_id)->first();

        if (empty($status))
        {
            if (!empty($result))
            {
                if ($result->status === 'active')
                {
                    DB::table($model_type)->where('id', $model_id)->update(['status' => 'deactivated']);
                } else {
                    DB::table($model_type)->where('id', $model_id)->update(['status' => 'active']);
                }
            }
        } else {
            DB::table($model_type)->where('id', $model_id)->update(['status' => $status]);
        }

        return redirect('view/' . $model_type);
    }
}
