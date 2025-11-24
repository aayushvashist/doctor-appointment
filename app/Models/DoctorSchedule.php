<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id','weekday','start_time','end_time','slot_duration','is_active'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
