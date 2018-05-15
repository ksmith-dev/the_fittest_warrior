<?php

namespace App\Http\Controllers;

use App\Group;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index() {

        $gyms = Group::where([['type', 'gym'], ['status', 'active']])->get();

        return view('gym', [ 'gyms' => $gyms]);
    }

    public function showFitnessGroup($id) {

        $user = null;
        $group = Group::find($id);

        if (Auth::check()) {
            $auth = Member::where([['group_id', $id], ['user_id', Auth::user()->getAuthIdentifier()]])->first();
            $user = Auth::user();
        } else {
            $auth = Auth::check();
        }

        return view('fitness_group',  ['group' => $group, 'auth' => $auth, 'user' => $user]);
    }

}
