<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{

    public function showContactUsView()
    {
        $advertisements = Advertisement::where('ad_type', 'horizontal')->get();
        $ids = array();
        foreach ($advertisements as $advertisement)
        {
            array_push($ids, $advertisement->id);
        }

        if (sizeof($ids) > 0)
        {
            $param['advertisement'] = Advertisement::where([['ad_type', '=', 'horizontal'],[ 'id', '=', mt_rand(1, $ids[mt_rand(0, sizeof($ids) - 1)])]])->first();
        } else {
            $param['advertisement'] = null;
        }

        return view('forms.contact', ['param' => $param]);
    }

    public function store(Request $request)
    {
        $this->validate($request,
        [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'comment' => 'required'
        ]);

        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $email = $request->input('email');
        $comment = $request->input('comment');

        Mail::to('notifications@thefittestwarrior.greenriverdev.com')
            ->send(new ContactUs($firstName, $lastName, $email, $comment));

        return redirect()->back()->with('flash_message', 'Thank you for your message');
    }

}
