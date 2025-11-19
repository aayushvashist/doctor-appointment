@extends('layouts.app')

@section('content')

<h2>Doctor Details</h2>

<div class="card p-3 shadow mt-3">

    <h4>{{ $doctor->name }}</h4>
    <p><strong>Email:</strong> {{ $doctor->email }}</p>
    <p><strong>Phone:</strong> {{ $doctor->phone }}</p>
    <p><strong>Specialization:</strong> {{ $doctor->specialty->name ?? '-' }}</p>

</div>

<a href="{{ route('doctors.index') }}" class="btn btn-secondary mt-3">Back</a>

@endsection
