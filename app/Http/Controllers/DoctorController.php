<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
// use App\Http\Requests\StoreDoctorRequest;
// use App\Http\Requests\UpdateDoctorRequest;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
     public function index()
    {
        // Load doctors + specialty + schedules + timeslots
        $doctors = Doctor::with(['specialty', 'schedules', 'timeSlots'])->get();

        return response()->json([
            'status' => 'success',
            'data' => $doctors
        ]);
    }

    public function store(StoreDoctorRequest $request)
    {
        $doctor = Doctor::create($request->validated());
        return response()->json($doctor, 201);
    }

    public function show(Doctor $doctor)
    {
        return response()->json($doctor);
    }

    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        $doctor->update($request->validated());
        return response()->json($doctor);
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return response()->json(['message' => 'Doctor deleted successfully']);
    }
}
