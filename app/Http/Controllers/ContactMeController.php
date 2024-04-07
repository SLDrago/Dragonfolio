<?php

namespace App\Http\Controllers;

use App\Models\contactme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\contactme as MailContactme;
use App\Mail\OrderShipped;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class ContactMeController extends Controller
{
    protected $contact;

    public function __construct()
    {
        $this->contact = new contactme();
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required|max:500',
        ]);
        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $content = $request->input('content');

        Mail::to('hello@example.com')->send(new MailContactme($name, $email, $subject, $content));

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
