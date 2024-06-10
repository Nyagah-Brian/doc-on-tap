<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('en_KE');

        $patients = Patient::all();
        $appointments = Appointment::all();

        foreach ($patients as $patient) {
            $patientAppointments = $appointments->where('patient_id', $patient->id);

            foreach ($patientAppointments as $appointment) {
                // Only generate invoices for completed appointments
                if ($appointment->status === 'completed') {
                    Invoice::create([
                        'patient_id' => $patient->id,
                        'appointment_id' => $appointment->id,
                        'total_amount' => $faker->randomFloat(2, 500, 5000), // Random amount between 500 and 5000 KES
                        'status' => $faker->randomElement(['unpaid', 'paid']),
                    ]);
                }
            }
        }
    }
}
