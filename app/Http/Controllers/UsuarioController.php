<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Usuario;
use App\Traits\SanitizeFields;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    use SanitizeFields;

    /**
     * Insert new user in database
     *
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        // If code reach here means that the request has been validated correctly

        // Merge the input data with the default system values to obtain all data we need
        // method `insertDefaultValues` comes from Trait `SanitizeFields`
        $userData = $this->insertDefaultValues($request->validated());

        // Create the user
        Usuario::create($userData);

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param Usuario $user
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request, Usuario $user)
    {
        // Check if the user that is deleting is the own user
        $samePerson = false;
        if ($user->ID === $request->user()->ID) {
            $samePerson = true;
        }

        // Delete the user
        $user->delete();

        // If is the same user, we logout the user, invalidate the session and redirect to home
        if ($samePerson) {
            Auth::logout();
            $request->session()->invalidate();
            return redirect('/');
        }

        // Check if the user had some filter applied
        $filters = [];
        if ($request->filterCenters != null) {
            $filters = ['filterCenters' => $request->filterCenters];
        }
        $redirectRoute = route('view1', $filters);

        return redirect($redirectRoute);
    }


}
