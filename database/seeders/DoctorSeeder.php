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
            'name' => 'Dr. Verma',
            'email' => 'verma@example.com',
            'phone' => '9876543210',
            'specialization_id' => 2,
        ]);

        Doctor::create([
            'name' => 'Dr. Mehta',
            'email' => 'mehta@example.com',
            'phone' => '9123456789',
            'specialization_id' => 3,
        ]);
    }
}
