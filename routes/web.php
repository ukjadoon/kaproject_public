<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/campaign/{code}', function ($code) {
    $campaign = app('App\Campaign')->where('code', $code)->firstOrFail();

    return $campaign;
})->name('campaign-landing');

Route::get('/backend', function () {

    return redirect('/backend/login');
});

Route::get('/backend/login', function () {
    return view('backend.login');
})->name('backend-login');

Route::get('/backend/dashboard', function () {
    return view('backend.dashboard');
})->name('backend-dashboard');
