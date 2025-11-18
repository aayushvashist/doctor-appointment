<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorScheduleController;
use App\Http\Controllers\TimeSlotController;
use App\Http\Controllers\BookingController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

/*
|--------------------------------------------------------------------------
| Default Web Route (Browser)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return response()->json([
        'message' => 'Doctor Appointment API Working',
        'version' => 'Laravel 12'
    ]);
});



Route::prefix('api')
    ->withoutMiddleware([VerifyCsrfToken::class])   // Disable CSRF for APIs
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Doctor CRUD
        |--------------------------------------------------------------------------
        */
        Route::get('/doctors', [DoctorController::class, 'index']);
        Route::post('/doctors', [DoctorController::class, 'store']);
        Route::get('/doctors/{id}', [DoctorController::class, 'show']);
        Route::put('/doctors/{id}', [DoctorController::class, 'update']);
        Route::delete('/doctors/{id}', [DoctorController::class, 'destroy']);


        /*
        |--------------------------------------------------------------------------
        | Doctor Schedule CRUD
        |--------------------------------------------------------------------------
        */
        Route::get('/schedules', [DoctorScheduleController::class, 'index']);
        Route::post('/schedules', [DoctorScheduleController::class, 'store']);
        Route::get('/schedules/{id}', [DoctorScheduleController::class, 'show']);
        Route::put('/schedules/{id}', [DoctorScheduleController::class, 'update']);
        Route::delete('/schedules/{id}', [DoctorScheduleController::class, 'destroy']);


        /*
        |--------------------------------------------------------------------------
        | Time Slot CRUD
        |--------------------------------------------------------------------------
        */
        Route::get('/time-slots', [TimeSlotController::class, 'index']);
        Route::post('/time-slots', [TimeSlotController::class, 'store']);
        Route::get('/time-slots/{id}', [TimeSlotController::class, 'show']);
        Route::put('/time-slots/{id}', [TimeSlotController::class, 'update']);
        Route::delete('/time-slots/{id}', [TimeSlotController::class, 'destroy']);


        /*
        |--------------------------------------------------------------------------
        | Appointment Booking
        |--------------------------------------------------------------------------
        */
        Route::post('/book-appointment', [BookingController::class, 'book']);
        Route::get('/appointments', [BookingController::class, 'index']);
        Route::get('/appointments/{id}', [BookingController::class, 'show']);
        Route::delete('/appointments/{id}', [BookingController::class, 'cancel']);

    });
