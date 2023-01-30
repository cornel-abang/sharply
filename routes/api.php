<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RiskController;
use App\Http\Controllers\Api\InitController;
use App\Http\Controllers\Api\ReferralController;
use App\Http\Controllers\Api\AppointmentController;

/*
* The api/init endpoint starts off a user's session on the app
*/
Route::get('init', [InitController::class, 'startSession'])->name('init');

/*
* The api/appointments endpoint fetches all the appointmenrts for a given date
*/
Route::get('appointments/{appt_date}', [AppointmentController::class, 'fetchAppointments'])->name('init');

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
                        Route::post('help-centres', [AppointmentController::class, 'searchAndFetchHelpCentres'])
                            ->name('.help_centres');
                    }
                );

            /** Risk Assessment */
            Route::prefix('risk')
                ->name('risk')
                ->group(
                    function () {
                        Route::get('questions', [RiskController::class, 'fetchQuestions'])
                            ->name('.fetch.questions');
                        Route::post('answers', [RiskController::class, 'calculateRisk'])
                            ->name('.calc.answers');
                    }
                );

            /** Referrals */
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