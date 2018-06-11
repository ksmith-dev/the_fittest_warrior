<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\User;
use App\Training;
use App\Activity;
use App\Workout;
use App\WorkoutReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;

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
    public function showFitnessTab() {

        $params['title'] = 'Workouts';

        return view('workouts', ['params' => $params]);
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
        $params['workout_type'] = $workout_type;

        $workout = null;

        if (!empty($workout_id)) {

            $params['workout_id'] = $workout_id;

            $workout = Workout::find($workout_id);

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

        $workouts = null;

        if (!empty($workout_type)) {
            $workouts = Workout::where([['type', $workout_type], ['active', 1]])->get();
        }

        if ($workouts->count() < 1) {
            $workouts = null;
        } else {
            foreach ($workouts as $workout) {
                $training = DB::table('training')->where('workout_type', $workout->type)->first();

                if (!empty($training)) {
                    $workout->training = $training->type;
                } else {
                    $workout->training = 'unknown';
                }
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
        $request = $request->all();

        validator($request);

        if (empty($request['workout_id'])) { $workout = new Workout; } else { $workout = Workout::find($request['workout_id']); }

        $workout->user_id = Auth::user()->getAuthIdentifier();
        $workout->activity = empty($request['activity_type']) ? null : $request['activity_type'];
        $workout->type = strtolower(str_replace(' ', '_', $request['workout_type']));
        $workout->repetitions = empty($request['repetitions']) ? null : $request['repetitions'];
        $workout->sets = empty($request['sets']) ? null : $request['sets'];

        empty($request['duration_min']) ? $duration_min = '00' : $duration_min = $request['duration_min'];
        empty($request['duration_sec']) ? $duration_sec = '00' : $duration_sec = $request['duration_sec'];
        empty($request['duration_mil']) ? $duration_mil = '00' : $duration_mil = $request['duration_mil'];
        $workout->duration = $duration_min . ':' . $duration_sec . ':' . $duration_mil;

        empty($request['rest_min']) ? $rest_min = '00' : $rest_min = $request['rest_min'];
        empty($request['rest_sec']) ? $rest_sec = '00' : $rest_sec = $request['rest_sec'];
        empty($request['rest_mil']) ? $rest_mil = '00' : $rest_mil = $request['rest_mil'];
        $workout->rest = $rest_min . ':' . $rest_sec . ':' . $rest_mil;

        $workout->calories_burned = empty($request['calories_burned']) ? null : $request['calories_burned'];
        $workout->weight = empty($request['weight']) ? null : $request['weight'];
        $workout->weight_unit = "lbs";

        $workout->save();

        return redirect('dashboard');
    }

    /**
     * Show individual workout
     *
     * @param $workout_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showWorkoutView($workout_id) {

        $params['title'] = 'Workout';

        $workout = Workout::find($workout_id);

        $training = DB::table('training')->where('workout_type', $workout->type)->first();
        $muscle_groups = DB::table('muscle_group')->where('workout_type', $workout->type)->get();
        if ($muscle_groups->count() < 1)
        {
            $muscle_groups = null;
        } else {

            foreach ($muscle_groups as $key => $muscle_group)
            {
                if (!file_exists( 'images/fitness_groups/muscle_images/'  . $muscle_group->muscle_group . '.png'))
                {
                    $muscle_groups->forget($key);
                }
            }
        }

        /** leader board code */
        $leader_board = null;
        $max_workout = null;

        if (!empty($training)) {

            $params['training'] = $training->type;

            if ($training->type == 'strength') {

                $strength_trainings = DB::table('training')->where('type', $training->type)->get();

                $array = array();

                foreach ($strength_trainings as $strength_training) {
                    array_push($array, $strength_training->workout_type);
                }

                $strength_workouts = DB::table('workout')->whereIn('type', $array)->orderBy('weight', 'desc')->get();

                foreach ($strength_workouts as $strength_workout) {

                    $user = User::find($strength_workout->user_id);

                    if (!empty($strength_workout)) {

                        if (empty($leader_board[$strength_workout->type])) {
                            $leader_board[$strength_workout->type] = array(
                                'first_name' => $user->first_name,
                                'last_name' => $user->last_name,
                                'type' => $strength_workout->type,
                                'sets' => $strength_workout->sets,
                                'repetitions' => $strength_workout->repetitions,
                                'weight' => $strength_workout->weight,
                                'duration' => $strength_workout->duration,
                                'rest' => $strength_workout->rest
                            );
                        } else if ($strength_workout->weight > $leader_board[$strength_workout->type]['weight']) {
                            $leader_board[$strength_workout->type] = array(
                                'first_name' => $user->first_name,
                                'last_name' => $user->last_name,
                                'type' => $strength_workout->type,
                                'sets' => $strength_workout->sets,
                                'repetitions' => $strength_workout->repetitions,
                                'weight' => $strength_workout->weight,
                                'duration' => $strength_workout->duration,
                                'rest' => $strength_workout->rest
                            );
                        }
                    }
                }

            } else if ($training->type == 'aerobic') {

                $aerobic_trainings = DB::table('training')->where('type', $training->type)->get();

                $array = array();

                foreach ($aerobic_trainings as $aerobic_training) {
                    array_push($array, $aerobic_training->workout_type);
                }

                $aerobic_workouts = DB::table('workout')->whereIn('type', $array)->orderBy('repetitions', 'desc')->get();

                foreach ($aerobic_workouts as $aerobic_workout) {

                    $user = User::find($aerobic_workout->user_id);

                    if (!empty($aerobic_workout)) {

                        if (empty($leader_board[$aerobic_workout->type])) {
                            $leader_board[$aerobic_workout->type] = array(
                                'first_name' => $user->first_name,
                                'last_name' => $user->last_name,
                                'type' => $aerobic_workout->type,
                                'sets' => $aerobic_workout->sets,
                                'repetitions' => $aerobic_workout->repetitions,
                                'weight' => $aerobic_workout->weight,
                                'duration' => $aerobic_workout->duration,
                                'rest' => $aerobic_workout->rest
                            );
                        } else if ($aerobic_workout->repetitions > $leader_board[$aerobic_workout->type]['repetitions']) {
                            $leader_board[$aerobic_workout->type] = array(
                                'first_name' => $user->first_name,
                                'last_name' => $user->last_name,
                                'type' => $aerobic_workout->type,
                                'sets' => $aerobic_workout->sets,
                                'repetitions' => $aerobic_workout->repetitions,
                                'weight' => $aerobic_workout->weight,
                                'duration' => $aerobic_workout->duration,
                                'rest' => $aerobic_workout->rest
                            );
                        }
                    }
                }
            }
        } else {

            $workouts = Workout::all();

            $unknown_workouts = array();

            foreach ($workouts as $workout) {

                $unknown_training = DB::table('training')->where('workout_type', $workout->type)->first();

                if (empty($unknown_training)) {
                    array_push($unknown_workouts, $workout);
                }
            }

            foreach ($unknown_workouts as $unknown_workout) {

                $user = User::find($unknown_workout->user_id);

                if (!empty($unknown_workout)) {

                    if (empty($leader_board[$unknown_workout->type])) {
                        $leader_board[$unknown_workout->type] = array(
                            'first_name' => $user->first_name,
                            'last_name' => $user->last_name,
                            'type' => $unknown_workout->type,
                            'sets' => $unknown_workout->sets,
                            'repetitions' => $unknown_workout->repetitions,
                            'weight' => $unknown_workout->weight,
                            'duration' => $unknown_workout->duration,
                            'rest' => $unknown_workout->rest
                        );
                    } else if ($unknown_workout->weight > $leader_board[$unknown_workout->type]['weight']) {
                        $leader_board[$unknown_workout->type] = array(
                            'first_name' => $user->first_name,
                            'last_name' => $user->last_name,
                            'type' => $unknown_workout->type,
                            'sets' => $unknown_workout->sets,
                            'repetitions' => $unknown_workout->repetitions,
                            'weight' => $unknown_workout->weight,
                            'duration' => $unknown_workout->duration,
                            'rest' => $unknown_workout->rest
                        );
                    }
                }
            }
        }
        $advertisements = Advertisement::where('ad_type', 'vertical')->get();
        $ids = array();
        foreach ($advertisements as $advertisement)
        {
            array_push($ids, $advertisement->id);
        }

        if (!empty($params['advertisement']) && $params['advertisement']->count() > 0)
        {
            $params['advertisement'] = Advertisement::where([['ad_type', '=', 'vertical'],[ 'id', '=', mt_rand(1, $ids[mt_rand(0, sizeof($ids) -1)])]])->first();
        }

        return view('workout', ['params' => $params, 'workout' => $workout, 'leader_board' => $leader_board, 'muscle_groups' => $muscle_groups]);
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