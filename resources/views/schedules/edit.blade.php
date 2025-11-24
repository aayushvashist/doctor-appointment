@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Schedule</h2>

    <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Weekday</label>
            <select name="weekday" class="form-control">
                <option value="1" {{ $schedule->weekday == 1 ? 'selected' : '' }}>Monday</option>
                <option value="2" {{ $schedule->weekday == 2 ? 'selected' : '' }}>Tuesday</option>
                <option value="3" {{ $schedule->weekday == 3 ? 'selected' : '' }}>Wednesday</option>
                <option value="4" {{ $schedule->weekday == 4 ? 'selected' : '' }}>Thursday</option>
                <option value="5" {{ $schedule->weekday == 5 ? 'selected' : '' }}>Friday</option>
                <option value="6" {{ $schedule->weekday == 6 ? 'selected' : '' }}>Saturday</option>
                <option value="7" {{ $schedule->weekday == 7 ? 'selected' : '' }}>Sunday</option>
            </select>

        </div>

        <div class="mb-3">
            <label>Start Time</label>
            <input type="time" name="start_time" class="form-control" 
                   value="{{ $schedule->start_time }}">
        </div>

        <div class="mb-3">
            <label>End Time</label>
            <input type="time" name="end_time" class="form-control" 
                   value="{{ $schedule->end_time }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Schedule</button>
    </form>
</div>
@endsection
