<?php

namespace App\Http\Controllers;

use App\Models\TimeSlot;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;

class TimeSlotController extends Controller
{
    public function index()
    {
        $slots = TimeSlot::with(['doctor', 'schedule'])->get();
        return view('timeslots.index', compact('slots'));
    }

   public function create()
    {
        $doctors = Doctor::all();
        $schedules = DoctorSchedule::all();

        return view('timeslots.create', compact('doctors', 'schedules'));
    }


    public function getSchedules($doctorId)
    {
        return DoctorSchedule::where('doctor_id', $doctorId)->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required',
            'schedule_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        TimeSlot::create($request->all());

        return redirect()->route('timeslots.index')->with('success', 'Time slot added');
    }

    public function edit($id)
    {
        $slot = TimeSlot::findOrFail($id);
        $doctors = Doctor::all();
        $schedules = DoctorSchedule::where('doctor_id', $slot->doctor_id)->get();

        return view('timeslots.edit', compact('slot', 'doctors', 'schedules'));
    }

    public function update(Request $request, $id)
    {
        $slot = TimeSlot::findOrFail($id);

        $slot->update($request->all());

        return redirect()->route('timeslots.index')->with('success', 'Time slot updated');
    }

    public function destroy($id)
    {
        TimeSlot::destroy($id);
        return redirect()->route('timeslots.index')->with('success', 'Time slot deleted');
    }
}
