<?php

namespace App\Http\Controllers;

use App\Mail\OtpVerificationMail;
use App\Models\EmailOtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class EmailVerificationController extends Controller
{
    // show
    public function show()
    {
        return Inertia::render('Auth/VerifyEmail');
    }

    // Send Otp
    public function sentOtp(Request $request)
    {
        $user = $request->user();

        // if already verified
        if ($user->email_verified_at) {
            return redirect()->route('task.index');
        }

        // delete any old otp for this user
        EmailOtp::where('user_id', $user->id)->delete();

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

        return back()->with('message', 'Verification code sent your email');
    }

    // verify
    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required|string|size:6',
        ]);

        $user = $request->user();
        // find the latest otp for that user
        $otpRecord = EmailOtp::where('user_id', $user->id)
            ->latest()
            ->first();

        // check if otp exists
        if (!$otpRecord) {
            return back()->withErrors([
                'otp' => 'No verification code found, please try again.',
            ]);
        }

        // check otp expire
        if ($otpRecord->isExpired()) {
            $otpRecord->delete();
            return back()->withErrors([
                'otp' => 'The verification code has expired, please try again.',
            ]);
        }

        // check if otp match
        if ($otpRecord->otp !== $request->otp) {
            return back()->withErrors([
                'otp' => 'The verification code is not correct, please try again.',
            ]);
        }

        // Mark as verified
        $user->email_verified_at = now();
        $user->save();

        // clean up uses otp
        $otpRecord->delete();
        return redirect()->route('task.index')->with('message', 'Your account has been verified!');
    }
}
