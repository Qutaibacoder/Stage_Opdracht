<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('home_page');
});

Route::get('/events', [EventController::class, 'index']);

Route::get('/events/create', [EventController::class, 'create']);

Route::post('/events/store', [EventController::class, 'store']);

Route::get('/events/{event}/edit', [EventController::class, 'edit']);
Route::put('/events/{event}', [EventController::class, 'update']);

Route::get('/events/{event}/delete', [EventController::class, 'destroy']);

Route::get('registrations', [RegistrationController::class, 'index'])->name('registrations.index');

Route::get('registration/create', [RegistrationController::class, 'create']);

Route::post('registration/store', [RegistrationController::class, 'store']);



