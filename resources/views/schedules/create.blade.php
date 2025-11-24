@extends('layouts.app')

@section('content')
<h3>Add Schedule</h3>
<form action="{{ route('schedules.store') }}" method="POST">@csrf
    <div class="mb-3">
        <label>Doctor</label>
        <select name="doctor_id" class="form-select" required>
            @foreach($doctors as $d)<option value="{{ $d->id }}">{{ $d->name }}</option>@endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Weekday (0 Sun .. 6 Sat)</label>
        <input type="number" name="weekday" class="form-control" min="0" max="6" required>
    </div>
    <div class="mb-3"><label>Start Time</label><input type="time" name="start_time" class="form-control" required></div>
    <div class="mb-3"><label>End Time</label><input type="time" name="end_time" class="form-control" required></div>
    <div class="mb-3"><label>Slot Duration (minutes)</label><input type="number" name="slot_duration" class="form-control" value="30"></div>
    <button class="btn btn-success">Save</button>
</form>
@endsection
