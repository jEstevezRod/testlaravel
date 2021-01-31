<?php

namespace App\Http\Controllers\Views;

use App\Models\Centro;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DisplayController extends Controller
{
    /**
     *  Applying `auth:usuarios` middleware
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:usuarios');
    }

    /**
     * Renders the view 1 that correspond with the exercise 1
     * @param Request $request
     * @return View
     */
    public function renderFirstView(Request $request): View
    {
        // This variable contains the centers ID of the centers requested on the exercise
        $centersExercise = [1, 2];

        // If the parameter doesn't exist or has a value of 2, show the requested centers
        if (!$request->has('filterCenters') || $request->filterCenters === "2") {
            $centers = Centro::whereIn('ID', $centersExercise)->get();
        } else {
            // Else lets show all the centers
            $centers = Centro::all();
        }
        return view('view1', ['centers' => $centers]);
    }

    /**
     * Renders the view 2 that correspond with the exercise 2
     * @return View
     */
    public function renderSecondView(): View
    {
        // This variable contains the zone ID of the centers requested on the exercise
        $zoneIdExercise = 1;

        // Get all centers with zone ID requested on exercise
        $centers = Centro::where('IDZONA', $zoneIdExercise)->get();

        return view('view2', ['centers' => $centers]);
    }
}
