<?php

namespace App\Http\Controllers;

use App\Models\DoctorSchedule;
use App\Models\Doctor;
use App\Http\Requests\StoreScheduleRequest;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    public function index()
    {
        $schedules = DoctorSchedule::with('doctor')->orderBy('doctor_id')->get();
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $doctors = Doctor::all();
        return view('schedules.create', compact('doctors'));
    }

    public function store(StoreScheduleRequest $request)
    {
        DoctorSchedule::create($request->validated());
        return redirect()->route('schedules.index')->with('success','Schedule created');
    }

    public function edit($id)
    {
        $schedule = DoctorSchedule::findOrFail($id);
        $doctors = Doctor::all();
        return view('schedules.edit', compact('schedule','doctors'));
    }

    public function update(Request $request, $id)
    {
        $schedule = DoctorSchedule::findOrFail($id);

        // Check duplicate for same doctor, weekday, time range
        $exists = DoctorSchedule::where('doctor_id', $schedule->doctor_id)
            ->where('weekday', $request->weekday)
            ->where('start_time', $request->start_time)
            ->where('end_time', $request->end_time)
            ->where('id', '!=', $schedule->id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'A schedule for this doctor with the same day and time already exists.');
        }

        $schedule->update([
            'weekday' => $request->weekday,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()->route('schedules.index')
            ->with('success', 'Schedule updated successfully!');
    }



    public function destroy($id)
    {
        DoctorSchedule::destroy($id);
        return redirect()->route('schedules.index')->with('success','Schedule deleted');
    }
}
