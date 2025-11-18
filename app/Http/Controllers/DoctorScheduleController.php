<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorSchedule;


class DoctorScheduleController extends Controller
{
    public function index()
    {
        return DoctorSchedule::with('timeSlots','doctor')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'day'       => 'required|string',
            'available' => 'required|boolean',
        ]);

        return DoctorSchedule::create($data);
    }

    public function show($id)
    {
        return DoctorSchedule::with('timeSlots')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $schedule = DoctorSchedule::findOrFail($id);

        $schedule->update($request->all());

        return $schedule;
    }

    public function destroy($id)
    {
        return DoctorSchedule::destroy($id);
    }
}
