<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Specialization;

use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function index()
    {
        $doctors = Doctor::with('specializations')->get();
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        $specialties = Specialization::all();
        return view('doctors.create', compact('specialties'));
    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        $specialties = Specialization::all();

        return view('doctors.edit', compact('doctor', 'specialties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'specializations' => 'required|array',
        ]);

        // 1️⃣ Create doctor WITHOUT specialization
        $doctor = Doctor::create([
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        // 2️⃣ Attach specializations (PIVOT)
        $doctor->specializations()->sync($request->specializations);

        return redirect('/doctors')->with('success', 'Doctor Added');
    }

    
    public function destroy($id)
    {
        Doctor::findOrFail($id)->delete();
        return redirect('/doctors')->with('success', 'Doctor Deleted');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'specializations' => 'required|array',
            'specializations.*' => 'exists:specializations,id',
        ]);

        $doctor = Doctor::findOrFail($id);
        // 1️⃣ Update doctor basic data
        $doctor->update([
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        // 2️⃣ Sync pivot data
        $doctor->specializations()->sync($request->specializations);


        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }



}




//  public function index()
    // {
    //     // Load doctors + specialty + schedules + timeslots
    //     $doctors = Doctor::with(['specialty', 'schedules', 'timeSlots'])->get();

    //     return response()->json([
    //         'status' => 'success',
    //         'data' => $doctors
    //     ]);
    // }

    // public function store(StoreDoctorRequest $request)
    // {
    //     $doctor = Doctor::create($request->validated());
    //     return response()->json($doctor, 201);
    // }

    // public function show(Doctor $id)
    // {
    //     return response()->json($id);
    // }

    // public function update(UpdateDoctorRequest $request, Doctor $id)
    // {
    //     $id->update($request->validated());
    //     return response()->json($id);
    // }

    // public function destroy(Doctor $id)
    // {
    //     $id->delete();
    //     return response()->json(['message' => 'Doctor deleted successfully']);
    // }
