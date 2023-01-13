<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\InitController;
use App\Http\Controllers\Api\ReferralController;
use App\Http\Controllers\Api\AppointmentController;

/*
* The api/init endpoint starts off a user's session on the app
*/
Route::get('init', [InitController::class, 'startSession'])->name('init');

/*
* FOR TEST PURPOSE ONLY
* Create any number of Help Centres
*/
Route::get('init/generate-centres/{count?}', [InitController::class, 'returnTestHelpCentres'])->name('centres');

/** Auth Routes */
Route::middleware(['api.auth'])
    ->group(
        function () {

            /** Appointments */
            Route::prefix('appointments')
                ->name('appointments')
                ->group(
                    function () {
                        Route::post('/', [AppointmentController::class, 'scheduleAppointment'])
                            ->name('.schedule')
                            ->withoutMiddleware('api.auth');
                        Route::get('/{user_id}', [AppointmentController::class, 'getAppointments'])
                            ->name('.retrieve');
                        Route::put('/{appointment_id}', [AppointmentController::class, 'updateAppointment'])
                            ->name('.update');
                    }
                );

            /** Risk Assessment */
            // Route::prefix('risk')
            //     ->name('risk')
            //     ->group(
            //         function () {
            //             Route::post('/', [RiskController::class, 'scheduleAppointment'])
            //                 ->name('.schedule');
            //         }
            //     );

            /** Risk Assessment */
            Route::prefix('refer')
                ->name('refer')
                ->group(
                    function () {
                        Route::post('/', [ReferralController::class, 'postReferral'])
                            ->name('.post.referral');
                        Route::get('{user_id}/referral/{referral_id}', [ReferralController::class, 'retrieveReferral'])
                            ->name('.get.referral');
                    }
                );
        }
    );