@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Create Time Slot</h2>

    <form action="{{ route('timeslots.store') }}" method="POST">
        @csrf

        <!-- Doctor -->
        <div class="mb-3">
            <label class="form-label">Select Doctor</label>
            <select name="doctor_id" class="form-control" required>
                <option value="">-- Select Doctor --</option>
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Schedule -->
        <div class="mb-3">
            <label class="form-label">Select Doctor Schedule</label>
            <select name="schedule_id" class="form-control" required>
                <option value="">-- Select Schedule --</option>
                @foreach($schedules as $schedule)
                    <option value="{{ $schedule->id }}">
                        {{ $schedule->doctor->name }} — 
                        {{ $schedule->weekday }} 
                        ({{ $schedule->start_time }} - {{ $schedule->end_time }})
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Start Time -->
        <div class="mb-3">
            <label class="form-label">Start Time</label>
            <input type="time" name="start_time" class="form-control" required>
        </div>

        <!-- End Time -->
        <div class="mb-3">
            <label class="form-label">End Time</label>
            <input type="time" name="end_time" class="form-control" required>
        </div>

        <button class="btn btn-success">Create Time Slot</button>
        <a href="{{ route('timeslots.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
