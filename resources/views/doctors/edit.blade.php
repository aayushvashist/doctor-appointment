@extends('layouts.app')

@section('content')
<h2 class="mb-4">Edit Doctor</h2>

<form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name', $doctor->name) }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email', $doctor->email) }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" value="{{ old('phone', $doctor->phone) }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Specialization</label>
        <select name="specialization_ids[]" class="form-control" multiple required>
            @foreach($specialities as $spec)
                <option value="{{ $spec->id }}"
                    {{ in_array($spec->id, $doctor->specializations->pluck('id')->toArray()) ? 'selected' : '' }}>
                    {{ $spec->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
