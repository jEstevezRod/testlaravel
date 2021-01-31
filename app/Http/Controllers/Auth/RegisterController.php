<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Centro;
use App\Models\Usuario;
use App\Traits\SanitizeFields;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisterController extends Controller
{
    use SanitizeFields;

    /**
     * Applying `guest` middleware.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Where to redirect users after registration.
     *
     * @return string
     * @var string
     */
    protected function redirectAfterRegister(): string
    {
        return '/view1';
    }

    /**
     * Returns the register form page
     *
     * @return View
     */
    public function showForm(): View
    {
        // Retrieve all centers
        $centers = Centro::all();

        return view('auth.register', ['centers' => $centers]);
    }

    /**
     *  Handle the register process
     *
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function register(RegisterRequest $request): RedirectResponse
    {
        // If code reach here means that the request has been validated correctly

        // Merge the input data with the default system values to obtain all data we need
        // method `insertDefaultValues` comes from Trait `SanitizeFields`ed
        $userData = $this->insertDefaultValues($request->validated());

        // Create the user in the database
        $user = Usuario::create($userData);

        // Create a session for the new user created
        Auth::login($user);

        return redirect($this->redirectAfterRegister());
    }


}
