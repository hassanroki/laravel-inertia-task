<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'homePage']);
Route::get('/about', [PageController::class, 'aboutPage']);

// Register & Login
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Reset Password
Route::get('/forgot-password', [PasswordResetController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');

Route::middleware('auth')->group(function () {
    // Email Verification
    Route::get('/verify-email', [EmailVerificationController::class, 'show'])->name('verify.notice');
    Route::post('/verify-email', [EmailVerificationController::class, 'verify'])->name('verify.account');
    Route::post('/verify-email/resend', [EmailVerificationController::class, 'sentOtp'])->name('send.otp');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Tasks
    Route::get('/tasks', [TaskController::class, 'index'])->name('task.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('task.create');
    Route::post('/tasks/store', [TaskController::class, 'store'])->name('task.store');
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/tasks/{task}/delete', [TaskController::class, 'destroy'])->name('task.destroy');
});

// Mail pit
Route::get('/test-mail', function () {
    Mail::raw('Testing Mail pit', function ($message) {
        $message->to('john@example.com')
            ->subject('Mail pit Test');
    });

    return 'Mail sent!';
});
