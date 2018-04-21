<?php

namespace App\Http\Controllers;

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

        $workouts = Workout::where('user_id', $params['user']->getAuthIdentifier())->orderBy('created_at')->get();

        $best_time = null;
        $best_weight = null;

        foreach ($workouts as $workout)
        {
            $training = DB::table('training')->where('workout_type', $workout['type'])->first();

            $workout['training'] = $training->type;

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

                    $current_duration = explode(':', $workout['duration']);
                    $existing_duration = explode(':', $best_time[$workout['type']]['duration']);

                    $current_duration = array('min' => $current_duration[0], 'sec' => $current_duration[1], 'mil' => $current_duration[2]);
                    $existing_duration = array('min' => $existing_duration[0], 'sec' => $existing_duration[1], 'mil' => $existing_duration[2]);

                    if ($current_duration['min'] < $existing_duration['min']) {
                        $best_time[$workout['type']] = $workout;
                    } elseif ($current_duration['min'] == $existing_duration['min']) {
                        if ($current_duration['sec'] < $existing_duration['sec']) {
                            $best_time[$workout['type']] = $workout;
                        } elseif ($current_duration['sec'] == $existing_duration['sec']) {
                            if ($current_duration['mil'] < $existing_duration['mil']) {
                                $best_time[$workout['type']] = $workout;
                            }
                        }
                    }
                }
            }
        }

        $workouts = Workout::where('user_id', $params['user']->getAuthIdentifier())->orderBy('created_at', 'desc')->limit(15)->get();

        return view('dashboard', [ 'params' => $params, 'best_weight' => $best_weight, 'best_time' => $best_time, 'workouts' => $workouts]);
    }
}
