<?php

namespace App\Http\Controllers;


class WorkoutController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showWorkoutReportForm()
    {
        return view('forms.workout');
    }

}