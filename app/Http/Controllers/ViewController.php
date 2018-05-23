<?php

namespace App\Http\Controllers;

use App\User;
use App\Group;
use App\Member;
use App\Workout;
use App\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ViewController extends Controller
{
    /**
     * @param Request $request
     * @param string $model_type
     * @param string|null $model_id
     * @param string|null $modifier
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, string $model_type = null, string $model_id = null, string $modifier = null) {

        $protected_columns = array('id', 'password', 'remember_token', 'created_at', 'updated_at');

        $param = null;

        if (Auth::check()) {

            if (Auth::user()->role === 'admin')
            {
                switch ($model_type)
                {
                    case 'user' :
                        empty($model_id) ? $param['models'] = User::all() : $param['model'] = User::find($model_id);
                        empty($model_id) ? $param['page_type'] = 'users' : $param['page_type'] = 'user';
                        $param['badges'] = DB::table('badge')->where('user_id', $model_id)->first();
                        $param['display'] = array('first_name', 'last_name', 'email', 'status');
                        $param['protected'] = array('id', 'password', 'remember_token', 'created_at', 'updated_at');
                        $param['model_type'] = 'user';
                        $param['columns'] = Schema::getColumnListing('user');
                        $view = 'account';
                        break;
                    case 'member' :
                        empty($model_id) ? $param['models'] = Member::all() : $param['model'] = Member::find($model_id);
                        empty($model_id) ? $param['page_type'] = 'members' : $param['page_type'] = 'member';
                        if (!empty($param['model']))
                        {
                            $user = User::find($param['model']->user_id);
                            empty($user) ? $param['model']->user_id = 'n/a' : $param['model']->user_id = $user->first_name . ' ' . $user->last_name;
                            $group = Group::find($param['model']->group_id);
                            empty($group) ? $param['model']->group_id = 'n/a' : $param['model']->group_id = ucwords(str_replace('_', ' ', $group->name));
                        } elseif (!empty($param['models'])) {
                            foreach ($param['models'] as $model)
                            {
                                $user = User::find($model->user_id);
                                empty($user) ? $model->user_id = 'n/a' : $model->user_id = $user->first_name . ' ' . $user->last_name;
                                $group = Group::find($model->group_id);
                                empty($group) ? $model->group_id = 'n/a' : $model->group_id = ucwords(str_replace('_', ' ', $group->name));
                            }
                        }
                        $param['model_type'] = 'member';
                        $param['display'] = array('user_id', 'group_id', 'status');
                        $param['column_overrides'] = array('user_id' => 'user_name', 'group_id' => 'group_name');
                        $param['columns'] = Schema::getColumnListing('member');
                        $view = 'account';
                        break;
                    case 'advertisement' :
                        empty($model_id) ? $param['models'] = Advertisement::all() : $param['model'] = Advertisement::find($model_id);
                        empty($model_id) ? $param['page_type'] = 'advertisements' : $param['page_type'] = 'advertisement';
                        if (!empty($param['model']))
                        {
                            $user = User::find($param['model']->user_id);
                            empty($user) ? $param['model']->user_id = 'n/a' : $param['model']->user_id = $user->first_name . ' ' . $user->last_name;
                        } elseif (!empty($param['models'])) {
                            foreach ($param['models'] as $model)
                            {
                                $user = User::find($model->user_id);
                                empty($user) ? $model->user_id = 'n/a' : $model->user_id = $user->first_name . ' ' . $user->last_name;
                            }
                        }
                        $param['display'] = array('user_id', 'company_name', 'subscription', 'status');
                        $param['protected'] = array('id', 'password', 'remember_token', 'created_at', 'updated_at');
                        $param['model_type'] = 'advertisement';
                        $param['column_overrides'] = array('user_id' => 'user_name');
                        $param['columns'] = Schema::getColumnListing('advertisement');
                        $view = 'account';
                        break;
                    case 'fitness_group' :
                        empty($model_id) ? $param['models'] = Group::all() : $param['model'] = Group::find($model_id);
                        empty($model_id) ? $param['page_type'] = 'fitness_groups' :  $param['page_type'] = 'fitness_group';
                        $param['model_type'] = 'fitness_group';
                        $param['display'] = array('name', 'type', 'description', 'status', 'visibility');
                        $param['columns'] = Schema::getColumnListing('fitness_group');
                        $view = 'account';
                        break;
                    case 'dashboard' :
                        $param['page_type'] = 'dashboard';
                        $view = 'account';
                        break;
                    case null :
                        $param['model'] = Auth::user();
                        $param['page_type'] = 'user';
                        $param['badges'] = DB::table('badge')->where('user_id', $model_id)->get();
                        $param['protected'] = array('id', 'password', 'remember_token', 'created_at', 'updated_at');
                        $param['model_type'] = 'user';
                        $param['columns'] = Schema::getColumnListing('user');
                        break;
                }
            } elseif (Auth::user()->role != 'admin') {

                switch ($model_type)
                {
                    case 'user' :
                        $param['model'] = Auth::user();
                        $param['model_type'] = 'user';
                        $param['badges'] = DB::table('badge')->where('user_id', $model_id)->get();
                        $param['protected'] = $protected_columns;
                        $param['page_type'] = 'user';
                        $param['columns'] = Schema::getColumnListing('user');
                        $view = 'account';
                        break;
                }
            }

            switch ($model_type)
            {
                case 'workout' :
                    empty($modifier) ? $param['model'] = Workout::find($model_id) : $param['models'] = Workout::where([['type', $modifier], ['status', 'active'], ['user_id', Auth::user()->getAuthIdentifier()]])->get();
                    empty($modifier) ? $param['model_type'] = $param['model']->type : $param['model_type'] = $modifier;
                    empty($modifier) ? $param['modifier'] = null : $param['modifier'] = $modifier;
                    empty($model_id) ? $param['page_type'] = 'workouts' : $param['page_type'] = 'workout';
                    $param['model_type'] = 'workout';
                    $param['columns'] = Schema::getColumnListing('workout');
                    $param['display'] = array('workout', 'created_at', 'duration', 'weight', 'repetitions', 'status');
                    if (!empty($param['models']))
                    {
                        if ($param['models']->count() > 0)
                        {
                            foreach ($param['models'] as $model) {
                                $training = DB::table('training')->where('workout_type', $model->type)->first();
                                empty($training) ? $model->training = 'unknown' : $model->training = $training->type;
                            }
                        }
                    }
                    $view = 'account';
                    break;
            }

            return view( $view, ['param' => $param]);

        } else {
            return redirect('/login');
        }

    }

    public function gyms()
    {
        $param['model'] = Group::all()->where('visibility', 'gym');

        return view('gym', ['param' => $param]);
    }
}
