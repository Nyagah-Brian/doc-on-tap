<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Brian',
            'last_name' => 'Nyagah',
            'phone_number' => '07000000000',
            'username' => 'bnyagah',
            'email' => 'brian.nyagah@strathmore.edu',
            'password' => Hash::make('Brayo@2030.'),
            'status' => 'active',
        ]);

        // Get the "Administrator" role
        $adminRole = Role::where('name', 'Administrator')->first();

        // Assign the role to the user
        $user = User::where('email', 'brian.nyagah@strathmore.edu')->first();
        $user->assignRole($adminRole);
    }
}
