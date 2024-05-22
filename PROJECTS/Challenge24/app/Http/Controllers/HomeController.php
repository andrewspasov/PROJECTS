<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Mail\CompanyContactMail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function home()
    {
        $projects = Project::all();
        return view('home', compact('projects'));
    }


    public function sendContactEmail(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'company' => 'required'
        ]);

        // Send the email
        Mail::to('recipient@example.com')->send(new CompanyContactMail($data));

        // Redirect or return a response
        return back()->with('success', 'Email sent successfully.');
    }
}
