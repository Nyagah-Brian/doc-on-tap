<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Schedule;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('en_KE');

        $doctors = Doctor::all();

        foreach ($doctors as $doctor) {
            $startDate = Carbon::now();
            $endDate = $startDate->copy()->addWeeks(4);

            while ($startDate->lte($endDate)) {
                if ($faker->boolean(80)) {
                    for ($i = 0; $i < rand(2, 4); $i++) {
                        $startTime = $faker->time('H:i', '17:00');
                        $endTime = Carbon::createFromFormat('H:i', $startTime)->addHour()->format('H:i');

                        Schedule::create([
                            'doctor_id' => $doctor->id,
                            'date' => $startDate->format('Y-m-d'),
                            'start_time' => $startTime,
                            'end_time' => $endTime,
                        ]);
                    }
                }

                $startDate->addDay();
            }
        }
    }
}
