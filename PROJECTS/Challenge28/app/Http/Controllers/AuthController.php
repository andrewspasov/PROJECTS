<?php

namespace App\Http\Controllers;

use App\Events\UserCreated;
use App\Mail\ActivationEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'The provided credentials are incorrect.'], 401);
        }
        
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json(['token' => $token]);
    }
    public function activateUser(Request $request, $token)
    {
        $email = $request->query('email');
        $user = User::where('email', $email)->where('token', $token)->first();


        if (!$user) {
            return redirect('/login')->with('info', 'Your account is deactivated. Contact support for more information.');
        }

        if ($user->is_active) {
            return redirect('/login')->with('info', 'Your account is already activated. You can login.');
        }

        if (!Cache::has('user_activation_' . $user->id)) {
            return redirect('/expired-link?email=' . urlencode($email));
        }

        $user->is_active = true;
        $user->token = null;
        $user->save();

        return redirect('/login')->with('info', 'Your account has been activated. You can now login.');
    }




    public function resendActivationLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        // Validate that the user exists and is not already active
        if (!$user || $user->is_active) {
            return back()->with('info', 'The account is already active or does not exist.');
        }

        // Ensure the email in the form matches the query parameter to prevent resending to a different email
        // if ($request->email !== $request->query('email')) {
        //     return back()->with('error', 'Invalid request.');
        // }

        // Generate a new activation token and save
        $user->token = Str::random(40);
        $user->save();

        // Update cache with new expiration
        Cache::put('user_activation_' . $user->id, now()->addMinutes(2), 120);

        // Construct the activation URL with the token and email as a query parameter
        $activationUrl = url("/validation/{$user->token}?email=" . urlencode($user->email));

        // Resend the activation email with the updated URL
        Mail::to($user->email)->send(new ActivationEmail($user, $activationUrl));

        return back()->with('info', 'A new activation email has been sent.');
    }

}
