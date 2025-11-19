@extends('layouts.app')

@section('content')

<h2 class="mb-4">Add Doctor</h2>

<form action="{{ route('doctors.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Specialization</label>
        <select class="form-control" name="specialization_id">
            <option value="">Select</option>
            @foreach($specialties as $spec)
            <option value="{{ $spec->id }}">{{ $spec->name }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Save</button>
    <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Back</a>

</form>

@endsection
