@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Appointments</h2>
    <a href="{{ route('appointments.create') }}" class="btn btn-primary">Book Appointment</a>
</div>

@include('partials.alerts')

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Patient</th>
            <th>Doctor</th>
            <th>Date</th>
            <th>Slot</th>
            <th>Status</th>
            <th width="150">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($appointments as $a)
        <tr>
            <td>{{ $a->id }}</td>
            <td>{{ $a->patient_name }}<br><small>{{ $a->patient_phone }}</small></td>
            <td>{{ $a->doctor->name ?? '-' }}</td>
            <td>{{ $a->appointment_date }}</td>
            <td>
                @if($a->slot)
                    {{ $a->slot->start_time }} - {{ $a->slot->end_time }}
                @else
                    -
                @endif
            </td>
            <td>{{ ucfirst($a->status) }}</td>
            <td>
                <a href="{{ route('appointments.show', $a->id) }}" class="btn btn-sm btn-info">View</a>

                <form action="{{ route('appointments.destroy', $a->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Cancel appointment?')" class="btn btn-sm btn-danger">Cancel</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="7" class="text-center">No appointments yet.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
