<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;
use Illuminate\Support\Facades\DB;

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
    public function index()
    {
        $member = Auth::user();

        $trainings = App\Training::where('user_id', $member->getAuthIdentifier())->orderBy('start_date_time')->take(2)->get();

        $personal_bests = array();
        //personal best information
        foreach ($trainings as $training)
        {
            foreach ($training->sessions as $session)
            {
                foreach ($session->workouts as $workout)
                {
                    if ($workout->report['workout_id'] != null)
                    {
                        $best_weight = App\WorkoutReport::where('workout_id', $workout['id'])->max('weight');
                        $best_time = App\WorkoutReport::where('workout_id', $workout['id'])->max('duration');
                        $best_calories_burned = App\WorkoutReport::where('workout_id', $workout['id'])->max('calories_burned');
                        $personal_bests[$workout['workout_type']] = array(
                            $session->start_date_time => array(
                                'id' => $workout->id,
                                'weight' => $best_weight,
                                'duration' => $best_time,
                                'calories_burned' => $best_calories_burned
                            )
                        );
                    }
                }
            }
        }

        return view('dashboard', [
            'member' => $member,
            'personal_bests' => $personal_bests,
            'latest_results' => $trainings,
        ]);
    }

    public function showUser($id)
    {
        $member = DB::table('users')->where('id', $id)->first();

        $trainings = App\Training::where('user_id', $id)->orderBy('start_date_time')->take(2)->get();

        $personal_bests = array();
        //personal best information
        foreach ($trainings as $training)
        {
            foreach ($training->sessions as $session)
            {
                foreach ($session->workouts as $workout)
                {
                    if ($workout->report['workout_id'] != null)
                    {
                        $best_weight = App\WorkoutReport::where('workout_id', $workout['id'])->max('weight');
                        $best_time = App\WorkoutReport::where('workout_id', $workout['id'])->max('duration');
                        $best_calories_burned = App\WorkoutReport::where('workout_id', $workout['id'])->max('calories_burned');
                        $personal_bests[$workout['workout_type']] = array(
                            $session->start_date_time => array(
                                'id' => $workout->id,
                                'weight' => $best_weight,
                                'duration' => $best_time,
                                'calories_burned' => $best_calories_burned
                            )
                        );
                    }
                }
            }
        }

        return view('dashboard', [
            'member' => $member,
            'personal_bests' => $personal_bests,
            'latest_results' => $trainings
        ]);
    }
}
