<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{

    public function showContactUsView()
    {
        return view('forms.contact');
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
