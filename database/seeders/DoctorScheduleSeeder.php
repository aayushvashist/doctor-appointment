<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\DoctorSchedule;

class DoctorScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $doctors = Doctor::all();

        foreach ($doctors as $doctor) {
            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

            foreach ($days as $day) {
                DoctorSchedule::create([
                    'doctor_id' => $doctor->id,
                    'day'       => $day,
                    'available' => true
                ]);
            }
        }
    }
}
