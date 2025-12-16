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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('schedule_id');
            $table->unsignedBigInteger('time_slot_id');
            $table->string('patient_name');
            $table->string('patient_email');
            $table->string('patient_phone');
            $table->date('appointment_date');
            $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending');
            $table->timestamps();

            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->foreign('schedule_id')->references('id')->on('doctor_schedules')->onDelete('cascade');
            $table->foreign('time_slot_id')->references('id')->on('time_slots')->onDelete('cascade');

            // Performance Indexes
            $table->index('doctor_id');
            $table->index('schedule_id');
            $table->index('time_slot_id');
            $table->index('appointment_date');
            $table->index('status');

            // Composite index
            $table->index(['doctor_id', 'appointment_date']);
            
            // Data integrity
            $table->unique(
                ['doctor_id', 'appointment_date', 'time_slot_id'],
                'unique_doctor_slot_booking'
            );

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
