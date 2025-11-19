<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Specialty;

use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function index()
    {
        $doctors = Doctor::with('specialty')->get();
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        $specialties = Specialty::all();
        return view('doctors.create', compact('specialties'));
    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        $specialties = Specialty::all();

        return view('doctors.edit', compact('doctor', 'specialties'));
    }

    public function store(Request $request)
    {
        Doctor::create($request->all());
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
            'specialization_id' => 'nullable|exists:specialties,id'
        ]);

        $doctor = Doctor::findOrFail($id);
        $doctor->update($request->all());

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
