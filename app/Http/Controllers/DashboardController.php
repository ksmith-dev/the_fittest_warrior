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

        foreach ($trainings as $training)
        {
            foreach ($training->sessions as $session)
            {
                foreach ($session->workouts as $workout)
                {
                    if ($workout->report != null)
                    {
                        $start_date_time = date('m-d-Y', strtotime($workout->start_date_time));
                        $end_date_time = date('m-d-Y', strtotime($workout->end_date_time));

                        if (empty($best_weight) || empty($best_weight[$workout['workout_type']])) {
                            $best_weight[$workout['workout_type']] = array(
                                'start_date_time' => $start_date_time,
                                'end_date_time' => $end_date_time,
                                'weight' => $workout->report['weight'],
                                'duration' => $workout->report['duration'],
                                'calories_burned' => $workout->report['calories_burned']
                            );
                        } else {

                            if ($workout->report[$workout['workout_type']]['weight'] > $best_weight[$workout['workout_type']]['weight']) {
                                $best_weight[$workout['workout_type']] = array(
                                    'start_date_time' => $start_date_time,
                                    'end_date_time' => $end_date_time,
                                    'weight' => $workout->report['weight'],
                                    'duration' => $workout->report['duration'],
                                    'calories_burned' => $workout->report['calories_burned']
                                );
                            }
                        }

                        if (empty($best_time) || empty($best_time[$workout['workout_type']])) {
                            $best_time[$workout['workout_type']] = array(
                                'start_date_time' => $start_date_time,
                                'end_date_time' => $end_date_time,
                                'weight' => $workout->report['weight'],
                                'duration' => $workout->report['duration'],
                                'calories_burned' => $workout->report['calories_burned']
                            );
                        } else {

                            if ($workout->report[$workout['workout_type']]['duration'] < $best_weight[$workout['workout_type']]['duration']) {
                                $best_time[$workout['workout_type']] = array(
                                    'start_date_time' => $start_date_time,
                                    'end_date_time' => $end_date_time,
                                    'weight' => $workout->report['weight'],
                                    'duration' => $workout->report['duration'],
                                    'calories_burned' => $workout->report['calories_burned']
                                );
                            }
                        }
                    }
                }
            }
        }

        return view('dashboard', [
            'member' => $member,
            'best_weight' => $best_weight,
            'best_time' => $best_time,
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
