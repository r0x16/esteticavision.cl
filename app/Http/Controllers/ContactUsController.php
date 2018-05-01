<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactUs;
use Mail;

class ContactUsController extends Controller
{
    public function index() {
        return view('contactus');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'contact_name' => 'required|max:255',
            'contact_email' => 'required|email',
            'contact_subject' => 'required|max:255',
            'contact_body' => 'required|max:3000',
            'g-recaptcha-response'=>'required|recaptcha'
        ]);

        $mail = new ContactUs(
            $request->contact_name,
            $request->contact_email,
            $request->contact_subject,
            $request->contact_body
        );

        Mail::to(config('shop.contact_email'))
                ->send($mail);

        return redirect('/contact')->with('status', 'done');
    }
}
