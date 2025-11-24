@extends('layouts.app')

@section('content')
<h2 class="mb-4">Edit Time Slot</h2>

@include('partials.alerts')

<form action="{{ route('timeslots.update', $slot->id) }}" method="POST" id="timeslotEditForm">
    @csrf
    @method('PUT')

    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Doctor</label>
            <select name="doctor_id" id="doctorEditSelect" class="form-select" required>
                <option value="">Select doctor</option>
                @foreach($doctors as $d)
                    <option value="{{ $d->id }}" @selected($d->id == $slot->doctor_id)>{{ $d->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label">Schedule</label>
            <select name="schedule_id" id="scheduleEditSelect" class="form-select" required>
                <option value="">Loading schedules...</option>
            </select>
        </div>

        <div class="col-md-4">
            <label class="form-label">Start Time</label>
            <input type="time" name="start_time" class="form-control" value="{{ $slot->start_time }}" required>
        </div>

        <div class="col-md-4">
            <label class="form-label">End Time</label>
            <input type="time" name="end_time" class="form-control" value="{{ $slot->end_time }}" required>
        </div>

        <div class="col-md-4 d-flex align-items-end">
            <button class="btn btn-primary w-100">Update Slot</button>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const doctorSel = document.getElementById('doctorEditSelect');
    const scheduleSel = document.getElementById('scheduleEditSelect');
    const slot = @json($slot);

    async function loadSchedulesForDoctor(docId, preselectScheduleId = null) {
        scheduleSel.innerHTML = '<option>Loading...</option>';
        if (!docId) { scheduleSel.innerHTML = '<option value="">Select doctor first</option>'; return; }
        try {
            const res = await fetch(`/doctor/${docId}/schedules`);
            const schedules = await res.json();
            scheduleSel.innerHTML = '<option value="">Select schedule</option>';
            schedules.forEach(s => {
                const opt = document.createElement('option');
                opt.value = s.id;
                const wd = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'][s.weekday] ?? s.weekday;
                opt.text = wd + ' — ' + s.start_time + ' - ' + s.end_time;
                if (preselectScheduleId && preselectScheduleId == s.id) opt.selected = true;
                scheduleSel.appendChild(opt);
            });
        } catch (err) {
            scheduleSel.innerHTML = '<option value="">Failed to load</option>';
            console.error(err);
        }
    }

    // initial load
    if (doctorSel.value) {
        loadSchedulesForDoctor(doctorSel.value, slot.schedule_id);
    }

    doctorSel.addEventListener('change', function() {
        loadSchedulesForDoctor(this.value, null);
    });
});
</script>
@endpush
