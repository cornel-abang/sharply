<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\InitController;
use Illuminate\Support\Facades\Route;

/*
* The api/init endpoint starts off a user's session on the app
*/
Route::get('init', [InitController::class, 'startSession'])->name('init');

/** Appointments */
Route::prefix('appointments')->name('appointments')->group(
    function () {
        Route::post('/', [AppointmentController::class, 'scheduleAppointment'])
            ->name('.schedule');
    }
);