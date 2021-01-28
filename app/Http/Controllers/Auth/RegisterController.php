<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectAfterRegister = '/view1';

    /**
     * Returns the register form view
     *
     * @return \Illuminate\View\View
     */
    public function showForm()
    {
        return view('auth.register');
    }

    /**
     *  Handle the register process
     *
     * @param RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegisterRequest $request)
    {
        // If code reach here means that the request has been validated correctly

        // Retrieve validated data
        $user = Usuario::create($request->validated());

        Auth::login($user);

        return redirect($this->$redirectAfterRegister);



    }
}
