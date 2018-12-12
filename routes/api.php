<?php

use App\HolidayDestination;
use App\Lead;
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

Route::middleware('api')->get('/holiday-destinations/{holidayDestination}', function (Request $request, $slug) {
    $destination = HolidayDestination::where('slug', $slug)->first();

    return response()->json(['data' => $destination]);
});

Route::middleware('api')->post('/holiday-destinations', function (Request $request) {
    $validatedData = $request->validate([
        'name' => ['required', 'string', 'min:2', 'max:255'],
        'location' => ['required', 'string', 'min:2', 'max:255'],
        'description' => ['required', 'string', 'min:2'],
        'price' => ['required', 'numeric', 'min:0'],
    ]);

    $destination = HolidayDestination::create([
        'name' => $validatedData['name'],
        'slug' => str_replace(' ', '-', $validatedData['name']),
        'location' => $validatedData['location'],
        'description' => $validatedData['description'],
        'price' => $validatedData['price'],
    ]);

    return response()->json(['data' => $destination], 201);
});

Route::middleware('api')->post('/leads', function (Request $request) {
    $validatedData = $request->validate([
        'product' => ['required', 'string', 'min:2', 'max:255'],
        'strain' => ['required', 'string', 'min:2', 'max:255'],
        'name' => ['required', 'string', 'min:2', 'max:255'],
        'email' => ['required', 'email', 'unique:users'],
    ]);

    $lead = Lead::create([
        'product' => $validatedData['product'],
        'strain' => $validatedData['strain'],
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
    ]);

    return response()->json(['data' => $lead], 201);
});

