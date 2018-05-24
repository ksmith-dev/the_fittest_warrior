<?php

namespace App\Http\Controllers;

use App\StayInformed;
use Illuminate\Http\Request;

class StayInformedController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|email|unique:stay_informed,email',
            ]);

        $stayInformed = new StayInformed;
        $stayInformed->email = $request->email;
        $stayInformed->save();

        return redirect()->back()->with('flash_message', 'Thank you for signing up');
    }
}
