<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['doctor', 'schedule', 'timeslot'])->get();
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        return view('appointments.create', [
            'doctors'   => Doctor::all(),
            'schedules' => DoctorSchedule::with('doctor')->get(),
            'timeslots' => TimeSlot::all()
        ]);
    }

    public function show($id)
    {
        $appointment = Appointment::with(['doctor', 'schedule', 'timeslot'])->findOrFail($id);

        return view('appointments.show', compact('appointment'));
    }


    // AJAX: get schedules based on doctor
    public function getSchedules($doctorId)
    {
        return DoctorSchedule::where('doctor_id', $doctorId)->get();
    }

    // AJAX: get time slots based on schedule
    public function getSlots($scheduleId)
    {
        return TimeSlot::where('schedule_id', $scheduleId)->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id'         => 'required|exists:doctors,id',
            'schedule_id'       => 'required|exists:doctor_schedules,id',
            'time_slot_id'      => 'required|exists:time_slots,id',
            'patient_name'      => 'required',
            'patient_email'     => 'required|email',
            'patient_phone'     => 'required',
        ]);

        Appointment::create($request->all());

        return redirect()->route('appointments.index')
                         ->with('success', 'Appointment booked!');
    }

    public function destroy($id)
    {
        Appointment::destroy($id);

        return redirect()->route('appointments.index')
                         ->with('success', 'Appointment cancelled');
    }
}
