<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SpecialitySeeder::class);
        $this->call(DoctorSeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(PatientsTableSeeder::class);
        $this->call(AppointmentSeeder::class);
        $this->call(InvoiceSeeder::class);
        $this->call(ReviewSeeder::class);
    }
}
