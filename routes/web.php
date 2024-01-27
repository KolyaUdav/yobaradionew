<?php

use App\Http\Controllers\TracksController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return 'Введите в url /get-track или /update-data';
});

Route::get('/get-track', [TracksController::class, 'getTrack']);
Route::get('/update-data', [TracksController::class, 'updateData']);
