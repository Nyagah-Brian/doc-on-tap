<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('en_KE'); // Kenyan locale

        // Define common Kenyan medical record number formats
        $mrnFormats = [
            'HOSP/####/YY', 
            '#####/YY',
            'ABC####',
        ];

        for ($i = 0; $i < 11; $i++) {
            // Create User
            $user = User::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'phone_number' => $faker->unique()->phoneNumber,
                'country_code' => '254',  
                'address' => $faker->address,
                'birth_date' => $faker->dateTimeBetween('-60 years', '-18 years'), 
                'gender' => $faker->randomElement(['male', 'female']), 
                'status' => 'active', 
            ]);
           

            // Create Patient (Linked to User)
            $mrnFormat = $faker->randomElement($mrnFormats); 
            Patient::create([
                'user_id' => $user->id,
                'medical_record_number' => $faker->unique()->numerify($mrnFormat), 
                'emergency_contact' => json_encode([
                    'name' => $faker->name,
                    'relationship' => $faker->randomElement(['Spouse', 'Parent', 'Sibling', 'Friend']),
                    'phone_number' => $faker->phoneNumber,
                ]),
                'medical_history' => json_encode([
                    'allergies' => $faker->words(3, true),
                    'conditions' => $faker->words(2, true),
                    'medications' => $faker->words(2, true),
                ]),
            ]);
        }
    }
}
