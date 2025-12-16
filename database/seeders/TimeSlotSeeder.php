<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DoctorSchedule;
use App\Models\TimeSlot;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schedules = DoctorSchedule::all();

        foreach ($schedules as $schedule) {
            $timeSlots = [
                ['09:00', '09:30'],
                ['09:30', '10:00'],
                ['10:00', '10:30'],
                ['10:30', '11:00'],
            ];

            foreach ($timeSlots as $slot) {
                TimeSlot::create([
                    'doctor_id'   => $schedule->doctor_id,
                    'schedule_id' => $schedule->id,
                    'start_time'  => $slot[0],
                    'end_time'    => $slot[1],
                    'is_booked'   => false
                ]);
            }
        }
    }
}
