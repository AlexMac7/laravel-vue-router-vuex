<?php

use App\HolidayDestination;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('api')->get('holiday-destinations/{holidayDestination}', function (Request $request, $slug) {
    $destination = HolidayDestination::where('slug', $slug)->first();

    return response()->json(['data' => $destination]);
});

