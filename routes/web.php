<?php

use App\Client;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::prefix('backend')->group(function () {
    Route::get('login', function () {
        return view('backend.login');
    })->name('backend-login');
    Route::post('login', function () {
        $credentials = request()->only('email', 'password');
        if (Auth::attempt($credentials)) {
    
            return redirect()->intended('/backend/dashboard');
        }
    })->name('backend-login');
    Route::get('logout', function () {
        Auth::logout();
    
        return redirect('/backend/login');
    })->name('backend-logout');
    Route::get('dashboard', function () {

        return view('backend.dashboard');
    })->name('backend-dashboard');

    Route::get('cities', function () {

        return view('backend.cities');
    })->name('backend-cities');

    Route::get('clients', function () {

        return view('backend.clients');
    })->name('backend-clients');

    Route::get('clients/create', function () {

        return view('backend.client-create');
    })->name('backend-client-create');

    Route::get('clients/{id}', function ($clientId) {

        return view('backend.client-edit')->with(['clientId' => $clientId]);
    })->where('clientId', '[0-9]+')->name('backend-client-edit');

    Route::get('campaigns', function () {

        return view('backend.campaigns');
    })->name('backend-campaigns');

    Route::get('campaigns/create', function () {

        return view('backend.campaign-create');
    })->name('backend-campaign-create');

    Route::get('reports', function () {

        return view('backend.reports');
    })->name('backend-reports');
});
