<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\SiteController;

Route::get( '/',            [SiteController::class,'home'] )->name('home');
use Illuminate\Http\Request;

Route::match(['get','post'], '/menu', [SiteController::class,'menu'])->name('menu');


Route::match(['get','post'], '/bookatable', [SiteController::class,'bookatable'])
     ->name('bookatable');
Route::get( '/order',       [SiteController::class,'order'] )->name('order');
Route::match(['get','post'], '/login', [SiteController::class,'login'])
     ->name('login');

// If you want to allow GET-based logout:

// (Alternatively, for a POST logout, you could do)
// Route::post('/logout', [SiteController::class,'logout'])->name('logout');

// remove or comment out any GET logout
// Route::get('/logout', [SiteController::class,'logout'])->name('logout');

// instead use POST:
Route::post('/logout', [SiteController::class,'logout'])->name('logout');
