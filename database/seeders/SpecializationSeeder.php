<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Specialization;


class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run()
    {
        Specialization::create(['name' => 'Cardiologist', 'slug'=> 'cardiologist']);
        Specialization::create(['name' => 'Dermatologist','slug'=> 'dermatologist']);
        Specialization::create(['name' => 'Neurologist','slug'=> 'neurologist']);
    }
}
