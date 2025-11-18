<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doctor;


class DoctorSeeder extends Seeder
{
   public function run()
    {
        Doctor::create([
            'id' => 1,
            'name' => 'Dr. Thakur',
            'email' => 'thakur@example.com',
            'phone' => '9876543210',
            'specialization_id' => 2,
        ]);

        Doctor::create([
            'id' => 2,
            'name' => 'Dr. Samta',
            'email' => 'samta@example.com',
            'phone' => '9123456789',
            'specialization_id' => 3,
        ]);
    }
}
