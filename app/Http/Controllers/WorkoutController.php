<?php

namespace App\Http\Controllers;

use App\Training;
use App\Session;
use App\Workout;
use App\WorkoutReport;
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showWorkoutReportForm()
    {
        return view('forms.workout');
    }

    /**
     * Handle a save to database request for the application.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        validator($request->all())->validate();

        $params = $request->all();

        $current_start_date_time = strtotime($params['start_date_time']);
        $current_start_date_time = date('m/d/Y H:i:s', $current_start_date_time);

        $current_end_date_time = strtotime($params['end_date_time']);
        $current_end_date_time = date('m/d/Y H:i:s', $current_end_date_time);

        $db_training = DB::table('training')->where([ ['user_id', '=', Auth::user()->getAuthIdentifier()], ['training_type', '=', $params['training_type']], ])->get()->first();
        if (!empty($db_training)) {
            $db_session = DB::table('session')->where([ ['session_type', '=', $params['session_type']], ['training_id', '=', $db_training->id], ])->get()->first();
        }

        // create training object
        if (!empty($db_training)) {
            $existing_training = Training::find($db_training->id);

            $existing_start_date_time = strtotime($existing_training->start_date_time);
            $existing_start_date_time = date('m/d/Y H:i:s', $existing_start_date_time);

            $existing_end_date_time = strtotime($existing_training->end_date_time);
            $existing_end_date_time = date('m/d/Y H:i:s', $existing_end_date_time);

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
            $existing_session = Session::find($db_session->id);

            $existing_start_date_time = strtotime($existing_session->start_date_time);
            $existing_start_date_time = date('m/d/Y H:i:s', $existing_start_date_time);

            $existing_end_date_time = strtotime($existing_session->end_date_time);
            $existing_end_date_time = date('m/d/Y H:i:s', $existing_end_date_time);

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
            $session = new Session;
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
        $workout_report->duration = $params['duration'];
        $workout_report->sets = $params['sets'];
        $workout_report->calories_burned = $params['calories'];
        $workout_report->weight = $params['weight'];
        $workout_report->muscle_groups = $params['muscle_groups'];
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            ''
        ]);
    }
}