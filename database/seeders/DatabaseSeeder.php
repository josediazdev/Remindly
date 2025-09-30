<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Task; // <-- ¡Importar el modelo Task!
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Crear el usuario de prueba PRIMERO para garantizar que su ID sea 1
        $testUser = User::factory()->create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@example.com',
        ]);

        // Capturar el ID (que será 1)
        $testUserId = $testUser->id;

        // 2. Crear usuarios de relleno adicionales (empezarán desde el ID 2)
        //User::factory(10)->create();

        // 3. Crear las 20 tareas y asignarlas al $testUserId (ID: 1)

        // 3 Tareas Vencidas
        Task::factory(3)->overdue()->create([
            'user_id' => $testUserId,
        ]);

        // 3 Tareas Completadas
        Task::factory(3)->completed()->create([
            'user_id' => $testUserId,
        ]);

        // 14 Tareas en Proceso (20 - 3 - 3 = 14)
        Task::factory(14)->inProcess()->create([
            'user_id' => $testUserId,
        ]);
    }
}
