<?php

namespace App\Http\Controllers;

use App\Nutrition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NutritionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $nutrition = new Nutrition;
        $nutrition->user_id = Auth::user()->getAuthIdentifier();
        $nutrition->portion_size = $params['portion_size'];
        $nutrition->gram_protein = $params['gram_protein'];
        $nutrition->gram_fat = $params['gram_fat'];
        $nutrition->gram_saturated_fat = $params['gram_saturated_fat'];
        $nutrition->cholesterol = $params['cholesterol'];
        $nutrition->carbohydrates = $params['carbohydrates'];
        $nutrition->sodium = $params['sodium'];
        $nutrition->sugars = $params['sugars'];
        $nutrition->fiber = $params['fiber'];
        $nutrition->calories = $params['calories'];
        $nutrition->start_date_time = $current_start_date_time;
        $nutrition->end_date_time = $current_end_date_time;
        $nutrition->save();

        return redirect('nutrition');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
            ''
        ]);
    }
}
