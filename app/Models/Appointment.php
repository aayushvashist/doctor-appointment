<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'doctor_id',
        'schedule_id',
        'time_slot_id',
        'patient_name',
        'patient_email',
        'patient_phone',
        'appointment_date',
        // 'status',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function schedule()
    {
        return $this->belongsTo(DoctorSchedule::class, 'schedule_id');
    }

    public function timeslot()
    {
        return $this->belongsTo(TimeSlot::class, 'time_slot_id');
    }
}
