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

Route::get('/campaign/{code}/kommun/{slug}', function ($code = '', $slug = '') {
    $campaign = app('App\Campaign')->where('code', $code)->firstOrFail();
    $client = $campaign->clients()->inRandomOrder()->first();
    $price = $campaign->municipalities()->where('slug', $slug)->firstOrFail()->price;
    $dangerFrom = $price - 5000;
    $maxLimit = $price + 5000;

    return view('campaign-landing', compact('campaign', 'client', 'dangerFrom', 'maxLimit', 'price'));
})->name('campaign-landing');

Route::get('/campaign/{code}', function ($code = '') {
    //$campaign = app('App\Campaign')->where('code', $code)->firstOrFail();
    $campaign = app('App\Campaign')->inRandomOrder()->firstOrFail();

    return view('campaign-client-landing')->with(compact('campaign'));
});

Route::get('/backend', function () {

    return redirect('/backend/login');
});

Route::get('backend/login', function () {

    return view('backend.login');
})->name('login');

Route::post('backend/login', function () {
    $credentials = request()->only('email', 'password');
    $remember = request()->has('remember_me') ? true : false;
    if (Auth::attempt($credentials, $remember)) {

        return redirect()->route('backend-dashboard');
    }
})->name('backend-login');

Route::prefix('backend')->middleware('auth')->group(function () {
    Route::get('logout', function () {
        Auth::logout();
    
        return redirect('/backend/login');
    })->name('backend-logout');
    Route::get('dashboard', function () {

        return view('backend.dashboard');
    })->name('backend-dashboard');

    Route::get('municipalities', function () {

        return view('backend.municipalities');
    })->name('backend-municipalities');

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

    Route::get('campaigns/{campaignId}', function ($campaignId) {

        return view('backend.campaign-edit')->with(['campaignId' => $campaignId]);
    })->where('campaignId', '[0-9]+')->name('backend-campaign-edit');

    Route::get('reports', function () {

        return view('backend.reports');
    })->name('backend-reports');
});
