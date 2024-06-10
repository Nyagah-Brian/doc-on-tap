<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Appointment;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('en_KE');

        $appointments = Appointment::where('status', 'completed')->get();

        foreach ($appointments as $appointment) {
            // Randomly decide whether to create a review (not all appointments will have reviews)
            if ($faker->boolean(70)) { // 70% chance of a review
                Review::create([
                    'appointment_id' => $appointment->id,
                    'rating' => $faker->numberBetween(1, 5),
                    'comment' => $faker->optional(0.8)->paragraph(), // 80% chance of having a comment
                ]);
            }
        }
    }
}
