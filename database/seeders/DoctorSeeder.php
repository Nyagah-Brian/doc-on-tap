<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Speciality;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('en_KE'); 

        // Ensure you have Speciality records in your database
        $specialities = Speciality::all(); 

        // Define a list of common Kenyan medical licenses formats
        $licenseFormats = [
            'A\d{3,5}',       // Example: A123, A4321
            'KMD/\d{4}/\d{2}', // Example: KMD/1234/23
            'KMP/\d{5}',     // Example: KMP/12345
            'KMTC/\d{4}/\d{2}', // Example: KMTC/2023/01
        ];

        for ($i = 0; $i < 11; $i++) { 
            // Create User (assuming you have a User model and table)
            $user = User::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => Hash::make('Brayo@2030.'), // password
                'phone_number' => $faker->unique()->phoneNumber,
                'country_code' => '254',  
                'address' => $faker->address,
                'birth_date' => $faker->dateTimeBetween('-60 years', '-30 years'), 
                'gender' => $faker->randomElement(['male', 'female']), 
                'status' => 'active', 
            ]);

            // Get the "Administrator" role
            $doctorRole = Role::where('name', 'Doctor')->first();

            // Assign the role to the user
            $user->assignRole($doctorRole);

            // Create Doctor (Linked to User and Speciality)
            Doctor::create([
                'user_id' => $user->id,
                'speciality_id' => $faker->randomElement($specialities)->id,
                'license_number' => $faker->unique()->regexify($faker->randomElement($licenseFormats)),
                'years_of_experience' => $faker->numberBetween(1, 30),
            ]);
        }
    }
}
