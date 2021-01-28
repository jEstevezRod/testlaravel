<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    /**
     * Returns the login form view
     *
     * @return \Illuminate\View\View
     */
    public function showForm()
    {
        return view('auth.login');

    }

    public function login()
    {

    }

    public function logout()
    {

    }
}
