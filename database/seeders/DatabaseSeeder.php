<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Call application seeders in correct order
        $this->call([
            SpecializationSeeder::class,
            DoctorSeeder::class,
            DoctorScheduleSeeder::class,
            TimeSlotSeeder::class,
        ]);
    }
}
