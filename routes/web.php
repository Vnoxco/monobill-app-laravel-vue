<?php

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

Route::get('/install', '\App\Http\Controllers\InstallController@index');
Route::get('/install/complete', '\App\Http\Controllers\InstallController@complete');

Route::get('/{any}', function () {
    $store = request()->query('store');
    return view('app', compact('store'));
})->where('any', '.*')
    ->name('application')
    ->middleware(['verify-monobill-request']);
