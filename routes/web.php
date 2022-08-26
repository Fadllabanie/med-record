<?php

use Illuminate\Support\Facades\Route;

Route::get('/', App\Http\Controllers\HomeController::class);

Route::get('login', App\Http\Livewire\Auth\Login::class)
    ->middleware('guest')
    ->name('login');

Route::get('logout', App\Http\Livewire\Auth\Logout::class)
    ->middleware('auth')
    ->name('logout');