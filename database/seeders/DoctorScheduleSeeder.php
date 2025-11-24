<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\DoctorSchedule;

class DoctorScheduleSeeder extends Seeder {
    public function run() {
        $doctors = Doctor::all();
        foreach ($doctors as $doc) {
            // sample Mon-Fri 9-12 and 14-17
            foreach ([1,2,3,4,5] as $wd) {
                DoctorSchedule::create(['doctor_id'=>$doc->id,'weekday'=>$wd,'start_time'=>'09:00','end_time'=>'12:00','slot_duration'=>30]);
                DoctorSchedule::create(['doctor_id'=>$doc->id,'weekday'=>$wd,'start_time'=>'14:00','end_time'=>'17:00','slot_duration'=>30]);
            }
        }
    }
}
