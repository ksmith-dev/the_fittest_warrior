<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $params['user'] = Auth::user();
        $params['title'] = 'Dashboard';

        $workouts = App\Workout::where('user_id', $params['user']->getAuthIdentifier())->orderBy('created_at')->get();

        $best_time = null;
        $best_weight = null;

        foreach ($workouts as $workout)
        {
            if (empty($best_weight)) {
                $best_weight = $this->addWorkoutToArray($workout, $array = array());
            } elseif (empty($best_weight[$workout['workout_type']])) {
                $best_weight = $this->addWorkoutToArray($workout, $best_weight);
            } elseif ($workout['weight'] > $best_weight[$workout['workout_type']]['weight']) {
                $best_weight = $this->addWorkoutToArray($workout, $best_weight);
            }

            if (empty($best_time)) {
                $best_time = $this->addWorkoutToArray($workout, $array = array());
            } elseif (empty($best_time[$workout['workout_type']])) {
                $best_time = $this->addWorkoutToArray($workout, $best_time);
            } else {

                if ($workout['duration'] != null && $best_time[$workout['workout_type']]['duration'] != null) {

                    $current_duration = explode(':', $workout['duration']);
                    $existing_duration = explode(':', $best_time[$workout['workout_type']]['duration']);

                    $current_duration = array('min' => $current_duration[0], 'sec' => $current_duration[1], 'mil' => $current_duration[2]);
                    $existing_duration = array('min' => $existing_duration[0], 'sec' => $existing_duration[1], 'mil' => $existing_duration[2]);

                    if ($current_duration['min'] < $existing_duration['min']) {
                        $best_time = $this->addWorkoutToArray($workout, $best_time);
                    } elseif ($current_duration['min'] == $existing_duration['min']) {
                        if ($current_duration['sec'] < $existing_duration['sec']) {
                            $best_time = $this->addWorkoutToArray($workout, $best_time);
                        } elseif ($current_duration['sec'] == $existing_duration['sec']) {
                            if ($current_duration['mil'] < $existing_duration['mil']) {
                                $best_time = $this->addWorkoutToArray($workout, $best_time);
                            }
                        }
                    }

                }
            }
        }

        $workouts = App\Workout::where('user_id', $params['user']->getAuthIdentifier())->orderBy('created_at')->limit(15)->get();

        return view('dashboard', [ 'params' => $params, 'best_weight' => $best_weight, 'best_time' => $best_time, 'workouts' => $workouts]);
    }

    /**
     * Populate workout array
     *
     * @param $workout
     * @param $array
     * @return mixed
     */
    private function addWorkoutToArray($workout, $array) {
        $array[$workout['workout_type']] = array(
            'id' => $workout['id'],
            'created_at' => $workout['created_at'],
            'weight' => $workout['weight'],
            'duration' => $workout['duration'],
            'calories_burned' => $workout['calories_burned']
        );
        return $array;
    }
}
