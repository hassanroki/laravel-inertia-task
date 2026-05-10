<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{
    // Home Page
    public function homePage()
    {
        return Inertia::render('Home', [
            'version' => '1.0.0',
            'greet' => 'Hello World!'
        ]);
    }

    // About Page
    public function aboutPage()
    {
        return Inertia::render('About');
    }
}
