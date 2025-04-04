<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('appointments')->delete();
        $Appointments = [
             ['name'=>'Saturday'],
             ['name'=>'Sunday'],
             ['name'=>'Monday'],
             ['name'=>'Tuesday'],
             ['name'=>'Wednesday'],
             ['name'=>'Thursday'],
             ['name'=>'Friday'],
        ];
        foreach ($Appointments as $Appointment) {
            Appointment::create($Appointment);
        }
    }
}
