<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeSlot;


class TimeSlotController extends Controller
{
    public function index()
    {
        return TimeSlot::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'schedule_id' => 'required|exists:doctor_schedules,id',
            'start_time'  => 'required',
            'end_time'    => 'required',
            'is_booked'   => 'boolean'
        ]);

        return TimeSlot::create($data);
    }

    public function show($id)
    {
        return TimeSlot::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $slot = TimeSlot::findOrFail($id);
        $slot->update($request->all());
        return $slot;
    }

    public function destroy($id)
    {
        return TimeSlot::destroy($id);
    }
}
