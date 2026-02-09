<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:40'],
            'email' => ['required', 'email', 'max:255'],
            'service' => ['required', 'string', 'max:120'],
            'comment' => ['nullable', 'string', 'max:2000'],
        ]);

        Mail::to('info@satyaarchitects.com')
            ->send(new ContactFormSubmitted($validated));

        return back()->with('status', 'Thanks! Your request has been sent.');
    }
}
