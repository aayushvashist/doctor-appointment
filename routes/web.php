<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorScheduleController;
use App\Http\Controllers\TimeSlotController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AppointmentController;
use App\Models\Setting;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
Route::get('/doctors/create', [DoctorController::class, 'create'])->name('doctors.create');
Route::post('/doctors', [DoctorController::class, 'store'])->name('doctors.store');
Route::get('/doctors/{id}', [DoctorController::class, 'show'])->name('doctors.show');
Route::get('/doctors/{id}/edit', [DoctorController::class, 'edit'])->name('doctors.edit');
Route::put('/doctors/{id}', [DoctorController::class, 'update'])->name('doctors.update');
Route::delete('/doctors/{id}', [DoctorController::class, 'destroy'])->name('doctors.destroy');


// Schedule routesa
Route::get('/schedules', [DoctorScheduleController::class, 'index'])->name('schedules.index');
Route::get('/schedules/create', [DoctorScheduleController::class, 'create'])->name('schedules.create');
Route::post('/schedules', [DoctorScheduleController::class, 'store'])->name('schedules.store'); 
Route::get('/schedules/{id}/edit', [DoctorScheduleController::class, 'edit'])->name('schedules.edit');
Route::put('/schedules/{id}', [DoctorScheduleController::class, 'update'])->name('schedules.update');
Route::delete('/schedules/{id}', [DoctorScheduleController::class, 'destroy'])->name('schedules.destroy');


// Time Slots
Route::get('/timeslots', [TimeSlotController::class, 'index'])->name('timeslots.index');
Route::get('/timeslots/create', [TimeSlotController::class, 'create'])->name('timeslots.create');
Route::post('/timeslots', [TimeSlotController::class, 'store'])->name('timeslots.store');
Route::get('/timeslots/{id}/edit', [TimeSlotController::class, 'edit'])->name('timeslots.edit');
Route::put('/timeslots/{id}', [TimeSlotController::class, 'update'])->name('timeslots.update');
Route::delete('/timeslots/{id}', [TimeSlotController::class, 'destroy'])->name('timeslots.destroy');

// AJAX routes
Route::get('/appointments/doctor/{id}/schedules', [AppointmentController::class, 'getSchedules']);
Route::get('/appointments/schedule/{id}/slots', [AppointmentController::class, 'getSlots']);


// Appointment Routes
Route::resource('appointments', AppointmentController::class);

Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
Route::post('/appointments/store', [AppointmentController::class, 'store'])->name('appointments.store');
Route::get('/appointments/{id}', [AppointmentController::class, 'show'])->name('appointments.show');
Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');






/*
|--------------------------------------------------------------------------
| Default Web Route (Browser)
|--------------------------------------------------------------------------
*/
// Route::get('/', function () {
//     return response()->json([
//         'message' => 'Doctor Appointment API Working',
//         'version' => 'Laravel 12'
//     ]);
// });



// Route::prefix('api')
//     ->withoutMiddleware([VerifyCsrfToken::class])   // Disable CSRF for APIs
//     ->group(function () {

//         /*
//         |--------------------------------------------------------------------------
//         | Doctor CRUD
//         |--------------------------------------------------------------------------
//         */
//         Route::get('/doctors', [DoctorController::class, 'index']);
//         Route::post('/doctors', [DoctorController::class, 'store']);
//         Route::get('/doctors/{id}', [DoctorController::class, 'show']);
//         Route::put('/doctors/{id}', [DoctorController::class, 'update']);
//         Route::delete('/doctors/{id}', [DoctorController::class, 'destroy']);


//         /*
//         |--------------------------------------------------------------------------
//         | Doctor Schedule CRUD
//         |--------------------------------------------------------------------------
//         */
//         Route::get('/schedules', [DoctorScheduleController::class, 'index']);
//         Route::post('/schedules', [DoctorScheduleController::class, 'store']);
//         Route::get('/schedules/{id}', [DoctorScheduleController::class, 'show']);
//         Route::put('/schedules/{id}', [DoctorScheduleController::class, 'update']);
//         Route::delete('/schedules/{id}', [DoctorScheduleController::class, 'destroy']);


//         /*
//         |--------------------------------------------------------------------------
//         | Time Slot CRUD
//         |--------------------------------------------------------------------------
//         */
//         Route::get('/time-slots', [TimeSlotController::class, 'index']);
//         Route::post('/time-slots', [TimeSlotController::class, 'store']);
//         Route::get('/time-slots/{id}', [TimeSlotController::class, 'show']);
//         Route::put('/time-slots/{id}', [TimeSlotController::class, 'update']);
//         Route::delete('/time-slots/{id}', [TimeSlotController::class, 'destroy']);


//         /*
//         |--------------------------------------------------------------------------
//         | Appointment Booking
//         |--------------------------------------------------------------------------
//         */
//         Route::post('/book-appointment', [BookingController::class, 'book']);
//         Route::get('/appointments', [BookingController::class, 'index']);
//         Route::get('/appointments/{id}', [BookingController::class, 'show']);
//         Route::delete('/appointments/{id}', [BookingController::class, 'cancel']);

//     });

// require __DIR__.'/auth.php';
