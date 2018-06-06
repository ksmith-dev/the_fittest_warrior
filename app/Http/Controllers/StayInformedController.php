<?php

namespace App\Http\Controllers;

use App\StayInformed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $stayInformed->status = 'active';
        $stayInformed->save();

        return redirect()->back()->with('flash_message', 'Thank you for signing up');
    }

    public function showEmailListView()
    {
        $rows = DB::table('stay_informed')->get();

        return view('email_list', ['rows' => $rows]);
    }

    public function changeStatus($id)
    {
        DB::table('stay_informed')
            ->where('id', $id)
            ->update(['status' => 'inactive']);

        return redirect()->back();
    }
}
