<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InformationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get("/get-live-satus/{dt}/{tno}", [InformationController::class, 'showLiveStatus']);

// Route::post("/seat-availability", [InformationController::class, 'showSeatAvailability']);

// Route::post("/seat-train-fare", [InformationController::class, 'showTrainFare']);

Route::get("/train-schedule/{tno}", [InformationController::class, 'showTrainSchedule']);

Route::get("/available-trains/{station_code}", [InformationController::class, 'showAvailableTrains']);
