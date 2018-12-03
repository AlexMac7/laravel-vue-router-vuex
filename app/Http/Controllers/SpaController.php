<?php

namespace App\Http\Controllers;

use App\HolidayDestination;

class SpaController extends Controller
{
    public function index()
    {
        return view('spa', ['holiday_destinations' => HolidayDestination::all()]);
    }
}
