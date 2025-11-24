@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Schedules</h2>
    <a href="{{ route('schedules.create') }}" class="btn btn-primary">Add Schedule</a>
</div>

@include('partials.alerts')

<table class="table table-striped">
    <thead><tr><th>ID</th><th>Doctor</th><th>Weekday</th><th>Start</th><th>End</th><th>Duration</th><th>Active</th><th>Actions</th></tr></thead>
    <tbody>
    @foreach($schedules as $s)
        <tr>
            <td>{{ $s->id }}</td>
            <td>{{ $s->doctor->name }}</td>
            <td>{{ ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'][$s->weekday] }}</td>
            <td>{{ $s->start_time }}</td>
            <td>{{ $s->end_time }}</td>
            <td>{{ $s->slot_duration }} min</td>
            <td>{{ $s->is_active ? 'Yes':'No' }}</td>
            <td>
                <a href="{{ route('schedules.edit',$s->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('schedules.destroy',$s->id) }}" method="POST" class="d-inline">@csrf @method('DELETE')
                    <button onclick="return confirm('Delete?')" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
