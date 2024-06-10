<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Schedule;
use App\Models\Appointment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('en_KE');

        $patients = Patient::all();
        $doctors = Doctor::all();
        $schedules = Schedule::all();

        foreach ($patients as $patient) {
            // Randomly book 1 to 3 appointments per patient
            for ($i = 0; $i < rand(1, 3); $i++) {
                // Find a random doctor with available schedules
                $doctor = $faker->randomElement($doctors);
                $availableSchedules = $schedules->where('doctor_id', $doctor->id)
                                               ->where('status', 'available');

                if ($availableSchedules->isEmpty()) {
                    // If no available schedules, skip to next patient
                    continue; 
                }

                $schedule = $faker->randomElement($availableSchedules);

                // Create the appointment
                Appointment::create([
                    'patient_id' => $patient->id,
                    'doctor_id' => $doctor->id,
                    'appointment_time' => $schedule->date->setTimeFromTimeString($schedule->start_time),
                    'status' => $faker->randomElement(['scheduled', 'completed']), // Some appointments might be completed
                ]);

                // Mark the schedule as booked
                $schedule->status = 'booked';
                $schedule->save();
            }
        }
    }
}
