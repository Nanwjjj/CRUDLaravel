<?php

use App\Http\Controllers\menteeController;
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
    return view('welcome');
});

Route::resource('mentee', menteeController::class);
Route::get('/mentee/{id}', 'MenteeController@show')->name('mentee.show');
Route::get('mentee/{id}', 'menteeController@show')->name('mentee.show');

