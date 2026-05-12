<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'homePage']);
Route::get('/about', [PageController::class, 'aboutPage']);


// Tasks
Route::get('/tasks', [TaskController::class, 'index'])->name('task.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('task.create');
Route::post('/tasks/store', [TaskController::class, 'store'])->name('task.store');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('task.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('task.update');
Route::delete('/tasks/{task}/delete', [TaskController::class, 'destroy'])->name('task.destroy');

// Mail pit
Route::get('/test-mail', function () {
    Mail::raw('Testing Mail pit', function ($message) {
        $message->to('john@example.com')
            ->subject('Mail pit Test');
    });

    return 'Mail sent!';
});
