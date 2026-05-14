<?php

namespace App\Http\Controllers;

use App\Mail\OtpVerificationMail;
use App\Models\EmailOtp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class AuthController extends Controller
{
    // Register show the registration form
    public function showRegister()
    {
        return Inertia::render('Auth/Register');
    }

    // Register Handle the form submission
    public function register(Request $request)
    {
        // Validation the input
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // When Register Success go to dashboard just one line code
        Auth::login($user);

        // Otp start
        // Generate 6 digit random code
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        // save otp to database
        EmailOtp::create([
            'user_id' => $user->id,
            'otp' => $otp,
            'expires_at' => now()->addMinutes(10), // 10 minutes
        ]);

        // sent the email
        Mail::to($user->email)->send(
            new OtpVerificationMail($otp, $user->name)
        );
        // Otp End

        return redirect()->route('verify.notice')->with('success', 'Account created! Please check your email for the verification code.');
    }

    // Login Show
    public function showLogin()
    {
        return Inertia::render('Auth/Login');
    }

    // Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('task.index')->with('success', 'Login Successfully.');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout successfully.');
    }
}
