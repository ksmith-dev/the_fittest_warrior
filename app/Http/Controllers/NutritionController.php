<?php

namespace App\Http\Controllers;

use App\Nutrition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NutritionController extends Controller
{
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

        if (empty($request['nutrition_id'])) { $nutrition = new Nutrition; } else { $nutrition = Nutrition::find($request['nutrition_id']); }

        $nutrition->user_id = Auth::user()->getAuthIdentifier();
        $nutrition->portion_size = $request['portion_size'];
        $nutrition->gram_protein = $request['gram_protein'];
        $nutrition->gram_fat = $request['gram_fat'];
        $nutrition->gram_saturated_fat = $request['gram_saturated_fat'];
        $nutrition->cholesterol = $request['cholesterol'];
        $nutrition->carbohydrates = $request['carbohydrates'];
        $nutrition->sodium = $request['sodium'];
        $nutrition->sugars = $request['sugars'];
        $nutrition->fiber = $request['fiber'];
        $nutrition->calories = $request['calories'];
        $nutrition->start_date_time = $current_start_date_time;
        $nutrition->end_date_time = $current_end_date_time;
        $nutrition->save();

        return redirect('nutrition');
    }

    /**
     * Show the application dashboard nutrition tab.
     *
     * @return \Illuminate\Http\Response
     */
    public function showNutritionTab()
    {
        $params['title'] = 'Nutrition';
        $params['user'] = Auth::user();

        $nutrition_collection = Nutrition::where('user_id', Auth::user()->getAuthIdentifier())->orderBy('created_at', 'desc')->limit(15)->get();

        if ($nutrition_collection->count() < 1) { $nutrition_collection = null; }

        return view('nutrition', ['params' => $params, 'nutrition_collection' => $nutrition_collection]);
    }

    /**
     * Show the application dashboard nutrition form.
     *
     * @param $nutrition_id
     * @return \Illuminate\Http\Response
     */
    public function showNutritionFormView($nutrition_id = null) {

        $params['title'] = 'Nutrition';
        $params['nutrition_id'] = $nutrition_id;

        $nutrition = null;

        if ($nutrition_id) {
            $nutrition = Nutrition::where('id', $nutrition_id)->orderBy('created_at', 'desc')->first();
        }

        return view('forms.nutrition', ['params' => $params, 'nutrition' => $nutrition]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Nutrition::destroy($id);

        return redirect('nutrition');
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
