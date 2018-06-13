<?php

namespace App\Http\Controllers;

use App\WarriorWorkout;
use App\Workout;
use Illuminate\Support\Facades\DB;
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

        $workouts = Workout::where([['user_id', $params['user']->getAuthIdentifier()], ['status', 'active']])->orderBy('created_at')->get();

        $best_time = null;
        $best_weight = null;

        if ($workouts->count() < 1) {
            $workouts = null;
        } else {
            foreach ($workouts as $workout)
            {
                $training = DB::table('training')->where('workout_type', $workout['type'])->first();

                if (!empty($training)) {
                    $workout['training'] = $training->type;
                }

                if (empty($best_weight)) {
                    $best_weight[$workout['type']] = $workout;
                } elseif (empty($best_weight[$workout['type']])) {
                    $best_weight[$workout['type']] = $workout;
                } elseif ($workout['weight'] > $best_weight[$workout['type']]['weight']) {
                    $best_weight[$workout['type']] = $workout;
                }

                if (empty($best_time)) {
                    $best_time[$workout['type']] = $workout;
                } elseif (empty($best_time[$workout['type']])) {
                    $best_time[$workout['type']] = $workout;
                } else {

                    if ($workout['duration'] != null && $best_time[$workout['type']]['duration'] != null) {

                        $current_duration = $workout['duration'];
                        $existing_duration = null;

                        if ($current_duration < $existing_duration) {
                            $best_time[$workout['type']] = $workout;
                        }
                    }
                }
            }

            $workouts = Workout::where('user_id', $params['user']->getAuthIdentifier())->orderBy('created_at', 'desc')->limit(15)->get();

            foreach ($workouts as $workout) {
                $training = DB::table('training')->where('workout_type', $workout['type'])->first();

                if (!empty($training)) {
                    $workout['training'] = $training->type;
                }
            }
        }

        $user = Auth::user();

        $warriorWorkouts = Auth::user()->warriorWorkouts->sortByDesc('updated_at')->take(10);

        return view('dashboard', [ 'params' => $params, 'best_weight' => $best_weight, 'best_time' => $best_time,
            'workouts' => $workouts, 'user' => $user, 'warriorWorkouts' => $warriorWorkouts]);
    }
}
