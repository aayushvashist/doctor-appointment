<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        Doctor::create([
            'name' => 'Dr. Thakur',
            'email' => 'thakur@example.com',
            'phone' => '9876543210',
        ]);

        Doctor::create([
            'name' => 'Dr. Dhaulta',
            'email' => 'dhaulta@example.com',
            'phone' => '9123456789',
        ]);
        $doctor->specializations()->attach([2, 3]);

    }
}
