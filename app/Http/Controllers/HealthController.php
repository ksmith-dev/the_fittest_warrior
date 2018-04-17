<?php

namespace App\Http\Controllers;

use App\Health;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;

class HealthController extends Controller
{

    /**
     * Show the application dashboard health tab.
     *
     * @return \Illuminate\Http\Response
     */
    public function showHeathTab() {

        $params['title'] = 'Health';

        $health_collection = Health::where('user_id', Auth::user()->getAuthIdentifier())->orderBy('start_date_time')->get();

        return view('health', ['params' => $params, 'health_collection' => $health_collection]);
    }

    /**
     * Show the application dashboard health form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showHeathFormView($id = null) {

        return view('forms.health');

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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            '' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        validator($request->all())->validate();

        $params = $request->all();

        $current_start_date_time = strtotime($params['start_date_time']);
        $current_start_date_time = date('m/d/Y H:i:s', $current_start_date_time);

        $current_end_date_time = strtotime($params['end_date_time']);
        $current_end_date_time = date('m/d/Y H:i:s', $current_end_date_time);

        $health = new Health;
        $health->user_id = Auth::user()->getAuthIdentifier();
        $health->ldl_cholesterol = $params['ldl_cholesterol'];
        $health->fat_percentage = $params['fat_percentage'];
        $health->systolic_blood_pressure = $params['systolic_blood_pressure'];
        $health->diastolic_blood_pressure = $params['diastolic_blood_pressure'];
        $health->hdl_cholesterol = $params['hdl_cholesterol'];
        $health->start_date_time = $current_start_date_time;
        $health->end_date_time = $current_end_date_time;
        $health->save();

        return redirect('health');
    }
}
