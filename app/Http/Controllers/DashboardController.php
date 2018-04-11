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
                    if (!empty($workout->report))
                    {
                        if (empty($best_weight)) {
                            $best_weight = $this->addWorkoutToArray($workout['workout_type'], $workout, $array = array());
                        } elseif (empty($best_weight[$workout['workout_type']])) {
                            $best_weight = $this->addWorkoutToArray($workout['workout_type'], $workout, $best_weight);
                        } elseif ($workout->report[$workout['workout_type']]['weight'] > $best_weight[$workout['workout_type']]['weight']) {
                            $best_weight = $this->addWorkoutToArray($workout['workout_type'], $workout, $best_weight);
                        }

                        if (empty($best_time)) {
                            $best_time = $this->addWorkoutToArray($workout['workout_type'], $workout, $array = array());
                        } elseif (empty($best_time[$workout['workout_type']])) {
                            $best_time = $this->addWorkoutToArray($workout['workout_type'], $workout, $best_time);
                        } else {

                            $current_duration = explode(':', $workout->report['duration']);
                            $existing_duration = explode(':', $best_time[$workout['workout_type']]['duration']);

                            $current_duration = array('min' => $current_duration[0], 'sec' => $current_duration[1], 'mil' => $current_duration[2]);
                            $existing_duration = array('min' => $existing_duration[0], 'sec' => $existing_duration[1], 'mil' => $existing_duration[2]);

                            if ($current_duration['min'] < $existing_duration['min']) {
                                $best_time = $this->addWorkoutToArray($workout['workout_type'], $workout, $best_time);
                            } elseif ($current_duration['min'] == $existing_duration['min']) {
                                if ($current_duration['sec'] < $existing_duration['sec']) {
                                    $best_time = $this->addWorkoutToArray($workout['workout_type'], $workout, $best_time);
                                } elseif ($current_duration['sec'] == $existing_duration['sec']) {
                                    if ($current_duration['mil'] < $existing_duration['mil']) {
                                        $best_time = $this->addWorkoutToArray($workout['workout_type'], $workout, $best_time);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return view('dashboard', [ 'member' => $member, 'best_weight' => $best_weight, 'best_time' => $best_time, 'latest_results' => $trainings]);
    }

    /**
     * Show the application dashboard fitness tab.
     *
     * @return \Illuminate\Http\Response
     */
    public function showWorkoutTab() {

        $member = Auth::user();
        $trainings = App\Training::where('user_id', $member->getAuthIdentifier())->orderBy('start_date_time')->get();
        $workouts = array();

        $percentages = array('10', '15', '20', '25', '30', '35', '40', '45', '50', '55', '60', '65', '70', '75', '80', '85', '90', '95', '100');
        $statuses = array('bg-success', 'bg-danger', 'bg-warning');

        foreach ($trainings as $training) {
            foreach ($training->sessions as $session) {
                foreach ($session->workouts as $workout) {
                    $workouts[$workout['workout_type']] = array(
                        'repetitions' => $workout->report['repetitions'],
                        'status' => $statuses[rand(0,2)],
                        'percentage' => $percentages[rand(0,18)]
                    );
                }
            }
        }

        return view('workout', ['workouts' => $workouts]);
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

    /**
     * Populate workout array
     *
     * @param $workout_type
     * @param $workout
     * @param $array
     * @return mixed
     */
    private function addWorkoutToArray($workout_type, $workout, $array) {

        $start_date_time = date('m-d-Y', strtotime($workout->start_date_time));
        $end_date_time = date('m-d-Y', strtotime($workout->end_date_time));

        $array[$workout_type] = array(
            'start_date_time' => $start_date_time,
            'end_date_time' => $end_date_time,
            'weight' => $workout->report['weight'],
            'duration' => $workout->report['duration'],
            'calories_burned' => $workout->report['calories_burned']
        );

        return $array;
    }
}
