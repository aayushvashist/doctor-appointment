@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Book Appointment</h2>

    <form action="{{ route('appointments.store') }}" method="POST">
        @csrf

        <!-- Doctor -->
        <div class="mb-3">
            <label class="form-label">Select Doctor</label>
            <select name="doctor_id" class="form-control" required>
                <option value="">-- Choose Doctor --</option>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Schedule -->
        <div class="mb-3">
            <label class="form-label">Select Schedule</label>
            <select name="schedule_id" class="form-control" required>
                <option value="">-- Choose Schedule --</option>
                @foreach ($schedules as $schedule)
                    <option value="{{ $schedule->id }}">
                        {{ $schedule->doctor->name }} — 
                        {{ $schedule->weekday }} ({{ $schedule->start_time }} - {{ $schedule->end_time }})
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Timeslot -->
        <div class="mb-3">
            <label class="form-label">Select Time Slot</label>
            <select name="time_slot_id" class="form-control" required>
                <option value="">-- Choose Time Slot --</option>
                @foreach ($timeslots as $ts)
                    <option value="{{ $ts->id }}">
                        {{ $ts->start_time }} - {{ $ts->end_time }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Appointment Date -->
        <div class="mb-3">
            <label class="form-label">Appointment Date</label>
            <input type="date" name="appointment_date" class="form-control" required>
        </div>

        <!-- Patient Name -->
        <div class="mb-3">
            <label class="form-label">Patient Name</label>
            <input type="text" name="patient_name" class="form-control" required>
        </div>

        <!-- Patient Email -->
        <div class="mb-3">
            <label class="form-label">Patient Email</label>
            <input type="email" name="patient_email" class="form-control" required>
        </div>

        <!-- Patient Phone -->
        <div class="mb-3">
            <label class="form-label">Patient Phone</label>
            <input type="text" name="patient_phone" class="form-control" required>
        </div>

        <button class="btn btn-primary">Book Appointment</button>
        <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
