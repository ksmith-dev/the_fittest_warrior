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
        $member = Auth::user();

        $trainings = App\Training::where('user_id', $member->getAuthIdentifier())->orderBy('start_date_time')->take(2)->get();

        $personal_bests = array();

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
                        $session_start_date_time = date('m-d-Y', strtotime($session->start_date_time));
                        $session_end_date_time = date('m-d-Y', strtotime($session->end_date_time));

//                        foreach ($best_weight as $best) {
//                            $personal_bests['weight'] = array(
//                                'start_date' => date('d-m-Y', strtotime($best->start_date_time)),
//                                'duration' => date('H:m:i', strtotime($best->durration)),
//                            );
//                        }

                        $personal_bests[$workout['workout_type']] = array(
                            $session_start_date_time => array(
                                'end_date_time' => $session_end_date_time,
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

    /**
     * Show the application dashboard fitness tab.
     *
     * @return \Illuminate\Http\Response
     */
    public function showWorkoutTab() {
        return view('workout');
    }

    /**
     * Show the application dashboard nutrition tab.
     *
     * @return \Illuminate\Http\Response
     */
    public function showNutritionTab() {

        $nutritions = App\Nutrition::where('user_id', Auth::user()->getAuthIdentifier())->orderBy('start_date_time')->get();
        return view('nutrition', ['nutritions' => $nutritions]);
    }

    /**
     * Show the application dashboard health tab.
     *
     * @return \Illuminate\Http\Response
     */
    public function showHealthTab() {
        $healths = App\Health::where('user_id', Auth::user()->getAuthIdentifier())->orderBy('start_date_time')->get();
        return view('health', ['healths' => $healths]);
    }

    /**
     * Show the application dashboard health form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showHealthForm() {
        return view('forms.health');
    }

    /**
     * Show the application dashboard nutrition form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showNutritionForm() {
        return view('forms.nutrition');
    }

    /**
     * Show the application dashboard fitness form.
     *
     * @param $type type of workout
     * @return \Illuminate\Http\Response
     */
    public function showFitnessForm($type) {
        return view('forms.fitness', ['type'=>$type]);
    }
}
