<?php

namespace App\Http\Controllers;

use App\User;
use App\WarriorWorkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarriorWorkoutController extends Controller
{
    public function save(Request $request){

        $workout = new WarriorWorkout();

        $userID = DB::table('user')->where('warrior_id', $request->userId)->value('id');

        $workout->user_id = $userID;
        $workout->hardest_hit = $request->largestHit;
        $workout->total_power = $request->totalPower;
        $workout->hit_count = $request->numberOfHits;
        $workout->power_average = $request->avgPowerPerHit;
        $workout->workout_duration = $request->time;
        $workout->hit_speed = $request->hitSpeed;
        $workout->workout_name= $request->workout_name;

        $workout->save();



//        return view('warrior', ['request' => $request, 'workout' => $workout]);
    }

    public function all(){
        $workouts = WarriorWorkout::all();
        return view('warrior', ['workouts' => $workouts]);
    }


    public function test(){

        $user = User::find(1);

        $wo = DB::table('warrior_workouts')->where('user_id', $user->warrior_id)->first();

        return view('warrior', ['user' => $user, 'workouts' => $wo]);
    }

}
