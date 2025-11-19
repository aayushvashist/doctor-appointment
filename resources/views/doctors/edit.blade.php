@extends('layouts.app')

@section('content')

<h2 class="mb-4">Edit Doctor</h2>

<form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
    @csrf @method('PUT')

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" value="{{ $doctor->name }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="{{ $doctor->email }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" value="{{ $doctor->phone }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Specialization</label>
        <select class="form-control" name="specialization_id">
            <option value="">Select</option>
            @foreach($specialties as $spec)
            <option value="{{ $spec->id }}" 
                    @selected($doctor->specialization_id == $spec->id)>
                {{ $spec->name }}
            </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Back</a>

</form>

@endsection
