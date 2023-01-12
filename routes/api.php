<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\InitController;
use Illuminate\Support\Facades\Route;

/*
* The api/init endpoint starts off a user's session on the app
*/
Route::get('init', [InitController::class, 'startSession'])->name('init');

/*
* FOR TEST PURPOSE ONLY
* Create any number of Help Centres
*/
Route::get('init/generate-centres/{count?}', [InitController::class, 'returnTestHelpCentres'])->name('centres');

/** Appointments */
Route::middleware(['api.auth'])
    ->group(
        function () {
            Route::prefix('appointments')
                ->name('appointments')
                ->group(
                    function () {
                        Route::post('/', [AppointmentController::class, 'scheduleAppointment'])
                            ->name('.schedule')
                            ->withoutMiddleware('api.auth');
                        Route::get('/{cookie_id}', [AppointmentController::class, 'getAppointments'])
                            ->name('.retrieve');
                        Route::put('/{appointment_id}', [AppointmentController::class, 'updateAppointment'])
                            ->name('.update');
                    }
                );
        }
    );