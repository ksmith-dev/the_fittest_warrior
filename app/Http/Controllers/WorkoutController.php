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
        $params['title'] = 'Add / Edit';
        $params['workout_type'] = ucwords(str_replace('_', ' ', $workout_type));

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
            $workouts = DB::table('workout')->where('type', $workout_type)->get();

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
    public function store(Request $request)
    {
        $params = $request->all();

        validator($params);

        $workout_type = strtolower(str_replace(' ', '_', $params['workout_type']));

        $training = DB::table('training')->where('workout_type', $workout_type)->first();

        $workout = new Workout;

        if (!empty($params['id'])) { $workout->id = $params['id']; }

        $workout->user_id = Auth::user()->getAuthIdentifier();
        $workout->training_type = $training->type;
        $workout->activity_type = empty($params['activity_type']) ? null : $params['activity_type'];
        $workout->type = strtolower(str_replace(' ', '_', $params['workout_type']));
        $workout->repetitions = empty($params['repetitions']) ? null : $params['repetitions'];
        $workout->sets = empty($params['sets']) ? null : $params['sets'];

        empty($params['duration_min']) ? $duration_min = '00' : $duration_min = $params['duration_min'];
        empty($params['duration_sec']) ? $duration_sec = '00' : $duration_sec = $params['duration_sec'];
        empty($params['duration_mil']) ? $duration_mil = '00' : $duration_mil = $params['duration_mil'];
        $workout->duration = $duration_min . ':' . $duration_sec . ':' . $duration_mil;

        empty($params['rest_min']) ? $rest_min = '00' : $rest_min = $params['rest_min'];
        empty($params['rest_sec']) ? $rest_sec = '00' : $rest_sec = $params['rest_sec'];
        empty($params['rest_mil']) ? $rest_mil = '00' : $rest_mil = $params['rest_mil'];
        $workout->rest = $rest_min . ':' . $rest_sec . ':' . $rest_mil;

        $workout->calories_burned = empty($params['calories_burned']) ? null : $params['calories_burned'];
        $workout->weight = empty($params['weight']) ? null : $params['weight'];
        $workout->weight_unit = "lbs";

        $workout->save();

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