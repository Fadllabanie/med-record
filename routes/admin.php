<?php

use Illuminate\Support\Facades\Route;

Route::get('dashboard', App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');
Route::get('users', App\Http\Livewire\Dashboard\Users\Datatable::class)->name('users.index');
Route::get('users/{user}', App\Http\Livewire\Dashboard\Users\Show::class)->name('users.show');
Route::get('specializations', App\Http\Livewire\Dashboard\Specializations\Datatable::class)->name('specializations.index');
Route::get('specializations/create', App\Http\Livewire\Dashboard\Specializations\Create::class)->name('specializations.create');
Route::get('specializations/{specialization}/edit', App\Http\Livewire\Dashboard\Specializations\Update::class)->name('specializations.edit');