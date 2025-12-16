<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctor_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->constrained('doctors')->cascadeOnDelete();
            $table->unsignedTinyInteger('weekday'); // 0 = Sunday .. 6 = Saturday
            $table->time('start_time');
            $table->time('end_time');
            $table->unsignedSmallInteger('slot_duration')->default(30); // minutes
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            // Data integrity
            $table->unique(
                ['doctor_id', 'weekday', 'start_time', 'end_time'],
                'doctor_schedule_unique'
            );

            // Performance indexes
            $table->index('doctor_id');
            $table->index('weekday');
            $table->index('is_active');

            // Composite performance index
            $table->index(['doctor_id', 'weekday', 'is_active']);

            // $table->unique(['doctor_id','weekday','start_time','end_time'], 'doctor_schedule_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_schedules');
    }
};
