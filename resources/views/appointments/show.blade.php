@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Appointment Details</h2>

    <div class="card p-4">

        <p><strong>Doctor:</strong> {{ $appointment->doctor->name }}</p>
        
        <p><strong>Schedule:</strong> 
            {{ $appointment->schedule->weekday }}
            ({{ $appointment->schedule->start_time }} - {{ $appointment->schedule->end_time }})
        </p>

        <p><strong>Time Slot:</strong> 
            {{ $appointment->timeslot->start_time }} - {{ $appointment->timeslot->end_time }}
        </p>

        <p><strong>Appointment Date:</strong> {{ $appointment->appointment_date }}</p>

        <p><strong>Patient Name:</strong> {{ $appointment->patient_name }}</p>
        <p><strong>Patient Email:</strong> {{ $appointment->patient_email }}</p>
        <p><strong>Patient Phone:</strong> {{ $appointment->patient_phone }}</p>

        <a href="{{ route('appointments.index') }}" class="btn btn-secondary mt-3">Back</a>
    </div>
</div>
@endsection
