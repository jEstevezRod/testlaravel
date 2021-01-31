<?php

namespace App\Http\Controllers\Auth;

use App\Models\Usuario;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LoginController extends Controller
{
    use RedirectsUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/view1';

    /**
     * Applying `guest` middleware except for routes logout and encryptPassword.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout', 'encryptPassword');
    }

    /**
     * Show the application's login page.
     *
     * @return View
     */
    public function showForm(): View
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param Request $request
     * @return RedirectResponse
     *
     * @throws ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // Attempt has failed, lets check if it is because is an user using a plain password
        // This code is added because in the initial sql script of this exercises are users with plain passwords
        if ($user = $this->checkUserOnDatabase($this->credentials($request))) {
            Auth::login($user);
            return redirect()
                ->intended($this->redirectPath())
                ->with('warning', 'Estas usando una contraseña no encriptada, esto hace que tu seguridad sea mas vulnerable.
                 <button class="no-btn" type="submit" form="encryptPassword" >Clica aqui si quieres que tu contraseña sea encriptada.</button>');

        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Encrypt the user password
     *
     * @param Request $request
     * @param Usuario $user
     *
     * @return RedirectResponse
     */
    public function encryptPassword(Request $request, Usuario $user): RedirectResponse
    {
        // Encrypt the password using Hash::make to change the plain-text password to an encrypted password in the database
        $user->encryptPassword();

        // Redirect back with a session message
        return redirect()->back()->with('success', 'Tu contraseña ha sido correctamente encriptada. Para iniciar sesión
         seguirás utilizando la misma contraseña pero ahora en nuestra base de datos permanece mas segura.');
    }

    /**
     * Validate the user login request.
     *
     * @param Request $request
     * @return void
     *
     * @throws ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param Request $request
     * @return bool
     */
    protected function attemptLogin(Request $request): bool
    {
        // Parameter of "remember" is hardcoded to false since the database structure don't allow it. The `Usuario`
        // table should have a remember token column
        return $this->guard()->attempt($this->credentials($request), false);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param Request $request
     * @return array
     */
    protected function credentials(Request $request): array
    {
        return $request->only($this->username(), 'password');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    protected function sendLoginResponse(Request $request): RedirectResponse
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return redirect()->intended($this->redirectPath());
    }


    /**
     * Get the failed login response instance.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => ['Las credenciales introducidas son incorrectas.'],
        ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username(): string
    {
        // As the database use uppercase for column names we define a method where we can use as identifier for email.
        return 'EMAIL';
    }

    /**
     * Log the user out of the application.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return StatefulGuard
     */
    protected function guard(): StatefulGuard
    {
        return Auth::guard();
    }

    /**
     * Check if the user has entered the correct credentials, checking the database password as plain text.
     *
     * @param array $credentials
     * @return false|Usuario
     */
    protected function checkUserOnDatabase(array $credentials)
    {
        $user = Usuario::where('EMAIL', $credentials['EMAIL'])
            ->where('PASSWORD', $credentials['password'])
            ->first();

        return isset($user) ? $user : false;
    }
}
