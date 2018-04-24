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
    public function showHealthTab() {

        $params['title'] = 'Health';
        $params['user'] = Auth::user();

        $health_collection = Health::where('user_id', Auth::user()->getAuthIdentifier())->orderBy('start_date_time', 'desc')->limit(15)->get();

        if ($health_collection->count() < 1) { $health_collection = null; }

        return view('health', ['params' => $params, 'health_collection' => $health_collection]);
    }

    /**
     * Show the application dashboard health form.
     *
     * @param $health_id
     * @return \Illuminate\Http\Response
     */
    public function showHealthFormView($health_id = null) {
        $params['title'] = 'Health';
        $params['health_id'] = $health_id;

        $health = null;

        if ($health_id) {
            $health = Health::find($health_id);
        }

        return view('forms.health', ['params' => $params, 'health' => $health]);
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

        $request = $request->all();

        $current_start_date_time = strtotime($request['start_date_time']);
        $current_start_date_time = date('m/d/Y H:i:s', $current_start_date_time);

        $current_end_date_time = strtotime($request['end_date_time']);
        $current_end_date_time = date('m/d/Y H:i:s', $current_end_date_time);

        if (empty($request['health_id'])) { $health = new Health; } else { $health = Health::find($request['health_id']); }

        $health->user_id = Auth::user()->getAuthIdentifier();
        $health->ldl_cholesterol = $request['ldl_cholesterol'];
        $health->fat_percentage = $request['fat_percentage'];
        $health->systolic_blood_pressure = $request['systolic_blood_pressure'];
        $health->diastolic_blood_pressure = $request['diastolic_blood_pressure'];
        $health->hdl_cholesterol = $request['hdl_cholesterol'];
        $health->start_date_time = $current_start_date_time;
        $health->end_date_time = $current_end_date_time;

        $health->save();

        return redirect('health');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Health::destroy($id);

        return redirect('health');
    }
}
