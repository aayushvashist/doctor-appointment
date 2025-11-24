@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Time Slots</h2>
    <div>
        <a href="{{ route('timeslots.create') }}" class="btn btn-primary">Add Time Slot</a>
    </div>
</div>

@include('partials.alerts')

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Doctor</th>
            <th>Schedule (Weekday)</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Created</th>
            <th width="140">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($slots as $slot)
        <tr>
            <td>{{ $slot->id }}</td>
            <td>{{ $slot->doctor->name ?? '-' }}</td>
            <td>
                @if($slot->schedule)
                    {{ ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'][$slot->schedule->weekday] ?? $slot->schedule->weekday }}
                    ({{ $slot->schedule->start_time }} - {{ $slot->schedule->end_time }})
                @else
                    -
                @endif
            </td>
            <td>{{ $slot->start_time }}</td>
            <td>{{ $slot->end_time }}</td>
            <td>{{ $slot->created_at->format('Y-m-d') }}</td>
            <td>
                <a href="{{ route('timeslots.edit', $slot->id) }}" class="btn btn-sm btn-warning">Edit</a>

                <form action="{{ route('timeslots.destroy', $slot->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Delete this slot?')" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="7" class="text-center">No time slots found.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
