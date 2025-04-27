<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Appointment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Créer un psychologue
        $psychologist = User::create([
            'name' => 'Dr. Smith',
            'email' => 'smith@example.com',
            'password' => bcrypt('password'),
            'role' => 'psychologue'
        ]);

        // Créer un patient
        $patient = User::create([
            'name' => 'John Doe',
            'email' => 'patient@example.com',
            'password' => bcrypt('password'),
            'role' => 'patient'
        ]);

        // Créer un rendez-vous
        Appointment::create([
            'patient_id' => $patient->id,
            'doctor_id' => $psychologist->id,
            'appointment_date' => now()->addDays(7),
            'notes' => 'Première consultation',
            'status' => 'pending'
        ]);
    }
}
