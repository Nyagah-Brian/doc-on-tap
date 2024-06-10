<?php

namespace Database\Seeders;

use App\Models\Speciality;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialities = [
            ['name' => 'General Practice', 'description' => 'Provides comprehensive primary care for patients of all ages.'],
            ['name' => 'Internal Medicine', 'description' => 'Specializes in the prevention, diagnosis, and treatment of adult diseases.'],
            ['name' => 'Pediatrics', 'description' => 'Focuses on the medical care of infants, children, and adolescents.'],
            ['name' => 'Obstetrics and Gynecology', 'description' => 'Provides care for women during pregnancy, childbirth, and for female reproductive health.'],
            ['name' => 'Surgery', 'description' => 'Performs operations to treat injuries, diseases, and deformities.'],
            ['name' => 'Cardiology', 'description' => 'Specializes in the diagnosis and treatment of heart diseases.'],
            ['name' => 'Orthopedics', 'description' => 'Deals with the musculoskeletal system, including bones, joints, muscles, ligaments, and tendons.'],
            ['name' => 'Neurology', 'description' => 'Diagnoses and treats disorders of the nervous system.'],
            ['name' => 'Psychiatry', 'description' => 'Specializes in the diagnosis, treatment, and prevention of mental, emotional, and behavioral disorders.'],
            ['name' => 'Dermatology', 'description' => 'Treats skin diseases and disorders.'],
            // Add more Kenyan specialties here as needed...
            ['name' => 'Infectious Diseases', 'description' => 'Diagnoses and manages infections caused by bacteria, viruses, fungi, and parasites.'],
            ['name' => 'Ophthalmology', 'description' => 'Deals with the anatomy, physiology, and diseases of the eye.'],
            ['name' => 'Family Medicine', 'description' => 'Provides continuing and comprehensive healthcare for the individual and family across all ages, genders, diseases, and parts of the body.'],
            
        ];

        foreach ($specialities as $specialityData) {
            Speciality::create($specialityData);
        }
    }
}
