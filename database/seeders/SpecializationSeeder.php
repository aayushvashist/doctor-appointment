<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Specialty;


class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run()
    {
        Specialty::create(['name' => 'Cardiologist', 'slug'=> 'cardiologist']);
        Specialty::create(['name' => 'Dermatologist','slug'=> 'dermatologist']);
        Specialty::create(['name' => 'Neurologist','slug'=> 'neurologist']);
    }
}
