<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index(): View
    {
        return view('home');
    }

    /**
     * Redirect to home page
     *
     * @return RedirectResponse
     */
    public function redirectHome(): RedirectResponse
    {
        return redirect('/');
    }
}
