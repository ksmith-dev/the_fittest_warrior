<?php

namespace App\Http\Controllers;

use App\Training;
use App\Activity;
use App\Workout;
use App\WorkoutReport;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WorkoutController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Show the application dashboard fitness tab.
     *
     * @return \Illuminate\Http\Response
     */
    public function showWorkoutTab() {

        $params['user'] = Auth::user();
        $params['title'] = 'Workouts';

        $database_workouts = Workout::where('user_id', $params['user']->getAuthIdentifier())->orderBy('created_at')->get();
        $workouts = array();

        $percentages = array('10', '15', '20', '25', '30', '35', '40', '45', '50', '55', '60', '65', '70', '75', '80', '85', '90', '95', '100');

        $status = array('bg-success', 'bg-danger', 'bg-warning');

        foreach ($database_workouts as $workout) {
            $workouts[$workout->workout_type] = array(
                'repetitions' => $workout->repetitions,
                'status' => $status[rand(0,2)],
                'percentage' => $percentages[rand(0,18)]
            );
        }

        return view('workout', ['params' => $params, 'workouts' => $workouts]);
    }

    /**
     *
     * @param $workout_type
     * @param $workout_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showWorkoutFormView($workout_type, $workout_id = null)
    {
        $params['title'] = ucwords(str_replace('_', ' ', $workout_type));
        $params['workout_type'] = $workout_type;

        $workout = null;

        if (!empty($workout_id)) {
            $workout = DB::table('workout')->where('id', $workout_id)->first();

            $duration = explode(':', $workout->duration);
            $rest = explode(':', $workout->rest);

            $workout->duration = array('min' => $duration[0], 'sec' => $duration[1], 'mil' => $duration[2]);
            $workout->rest = array('min' => $rest[0], 'sec' => $rest[1], 'mil' => $rest[2]);
        }

        return view('forms.workout', ['params' => $params, 'workout' => $workout]);
    }

    /**
     *
     * @param $workout_type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showWorkoutEditView($workout_type)
    {
        $params['user'] = Auth::user();
        $params['workout_type'] = $workout_type;

        if (!empty($workout_type)) {
            $workouts = DB::table('workout')->where('workout_type', $workout_type)->get();

            if ($workouts->count() < 1) {
                $workouts = null;
            }
        }

        return view('edit.workouts', ['params' => $params, 'workouts' => $workouts]);
    }

    /**
     * Handle a save to database request for the application.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $workout_type)
    {
        validator($request->all())->validate();

        $params = $request->all();

        foreach ($params as $param) {
            if (is_array($param)) {
                foreach ($param as $value) {
                    $value = strtolower(str_replace(' ', '_', $value));
                }
            } else {
                $param = strtolower(str_replace(' ', '_', $param));
            }
        }

        $current_start_date_time = strtotime($params['start_date_time']);
        $current_start_date_time = date('m/d/Y', $current_start_date_time);

        $current_end_date_time = strtotime($params['end_date_time']);
        $current_end_date_time = date('m/d/Y', $current_end_date_time);

        $db_training = DB::table('training')->where([ ['user_id', '=', Auth::user()->getAuthIdentifier()], ['training_type', '=', $params['training_type']], ])->get()->first();

        if (!empty($db_training)) {
            $db_session = DB::table('session')->where([ ['session_type', '=', $params['session_type']], ['training_id', '=', $db_training->id], ])->get()->first();
        }

        // create training object
        if (!empty($db_training)) {
            $existing_training = Training::find($db_training->id);

            $existing_start_date_time = strtotime($existing_training->start_date_time);
            $existing_start_date_time = date('m/d/Y', $existing_start_date_time);

            $existing_end_date_time = strtotime($existing_training->end_date_time);
            $existing_end_date_time = date('m/d/Y', $existing_end_date_time);

            if ($existing_start_date_time > $current_start_date_time) {
                // do nothing
            } else {
                $existing_training->start_date_time = $current_start_date_time;
            }
            if ($existing_end_date_time < $current_end_date_time) {
                // do nothing
            } else {
                $existing_training->end_date_time = $current_end_date_time;
            }
            $existing_training->save();
        } else {
            $training = new Training;
            $training->user_id = Auth::user()->getAuthIdentifier();
            $training->training_type = $params['training_type'];
            $training->start_date_time = $current_start_date_time;
            $training->end_date_time = $current_end_date_time;
            $training->active_status = 1;
            $training->save();
        }

        // create session object
        if (!empty($db_session)) {
            $existing_session = Activity::find($db_session->id);

            $existing_start_date_time = strtotime($existing_session->start_date_time);
            $existing_start_date_time = date('m/d/Y', $existing_start_date_time);

            $existing_end_date_time = strtotime($existing_session->end_date_time);
            $existing_end_date_time = date('m/d/Y', $existing_end_date_time);

            if ($existing_start_date_time < $current_start_date_time) {
                // do nothing
            } else {
                $existing_session->start_date_time = $current_start_date_time;
            }
            if ($existing_end_date_time < $current_end_date_time) {
                // do nothing
            } else {
                $existing_session->end_date_time = $current_end_date_time;
            }
            $existing_session->save();
        } else {
            $session = new Activity;
            if (!empty($existing_training)) {
                $session->training_id = $existing_training->id;
            } else {
                $session->training_id = $training->id;
            }
            $session->session_type = $params['session_type'];
            $session->start_date_time = $current_start_date_time;
            $session->end_date_time = $current_end_date_time;
            $session->save();
        }

        $nextId = DB::table('workout')->max('id') + 1;

        $workout = new Workout;
        $workout->id = $nextId;
        if (!empty($existing_session)) {
            $workout->session_id = $existing_session->id;
        } else {
            $workout->session_id = $session->id;
        }
        $workout->workout_type = $params['workout_type'];
        $workout->start_date_time = $current_start_date_time;
        $workout->end_date_time = $current_end_date_time;
        $workout->save();

        $workout_report = new WorkoutReport;
        $workout_report->workout_id = $workout->id;
        $workout_report->repetitions = $params['repetitions'];
        $workout_report->resistance_factor = $params['resistance_factor'];
        $workout_report->duration = $params['duration_min'] . ':' . $params['duration_sec'] . ':' . $params['duration_mil'];
        $workout_report->sets = $params['sets'];
        $workout_report->rest = $params['rest_min'] . ':' . $params['rest_sec'] . ':' . $params['rest_mil'];
        $workout_report->calories_burned = $params['calories'];
        $workout_report->weight = $params['weight'];

        $muscle_groups = null;

        $index = 0;

        foreach ($params['muscle_groups'] as $muscle_group)
        {
            if (++$index == sizeof($params['muscle_groups'])) {
                $muscle_groups .= strtoupper(str_replace(' ', '_', $muscle_group));
            } else {
                $muscle_groups .= strtoupper(str_replace(' ', '_', $muscle_group)) . ', ';
            }
        }

        $workout_report->muscle_groups = $muscle_groups;
        //TODO if units is passed inside of input split and add here
        $workout_report->weight_units = 'lbs';
        $workout_report->save();

        return redirect('dashboard');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //TODO edit validation
        return Validator::make($data, [
            'training_type' => 'required|string|max:255',
            'session_type' => 'required|string|max:255',
            'workout_type' => 'required|string|max:255',
            'duration_min' => 'string|min:2',
            'duration_sec' => 'string|min:2',
            'duration_mil' => 'string|min:2',
            'rest_min' => 'string|min:2|max:2',
            'rest_sec' => 'string|min:2|max:2',
            'rest_mil' => 'string|min:2|max:2',
            'weight' => 'string|max:100',
            'repetitions' => 'string|max:50',
            'sets' => 'string|max:50',
            'rest' => 'string|max:50',
            'start_date_time' => 'string|max:255',
            'end_date_time' => 'string|max:255',
            'calories' => 'string|max:255'
        ]);
    }
}