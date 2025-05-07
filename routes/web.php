<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('dashboard',function(){
    return view('admin.dashboard'); 
})->name('dashboard');

Route::middleware('auth:sanctum')->group(function(){
    Route::view('/dashboard/cars',            'admin.cars')            ->name('dashboard.cars');
    Route::view('/dashboard/electrical',      'admin.electrical')      ->name('dashboard.electrical');
    Route::view('/dashboard/home-appliances', 'admin.home-appliances') ->name('dashboard.home_appliances');
    Route::view('/dashboard/real-estates',    'admin.real-estates')    ->name('dashboard.real_estates');
});
Route::view('/dashboard/home','admin.dashboard-home')->name('dashboard.home');

Route::get('/', function () {
    return view('home');
})->name('home');

