<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * El nombre del modelo correspondiente.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Posibles estados de tarea (excluyendo 'overdue' por ahora)
        $statuses = ['in_process', 'completed'];
        $status = fake()->randomElement($statuses);

        // Lógica de due_date: La fecha de vencimiento es aleatoria
        $dueDate = fake()->dateTimeBetween('+1 day', '+1 month');

        // Lógica de completed_at: Solo se define si el estado es 'completed'
        $completedAt = ($status === 'completed')
                       ? fake()->dateTimeBetween('-1 week', $dueDate)
                       : null;

        return [
            // Utilizando fake()->método()
            'title' => fake()->sentence(mt_rand(3, 6)),
            'user_id' => User::factory(), // Asigna a un usuario existente
            'description' => fake()->paragraph(),
            'due_date' => $dueDate,
            'status' => $status,
            'completed_at' => $completedAt,
        ];
    }

    // --- Definiciones de States ---

    /**
     * Indica que la tarea está completada.
     */
    public function completed(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'completed',
            'completed_at' => fake()->dateTimeBetween('-1 week', 'now'),
        ]);
    }

    /**
     * Indica que la tarea está en proceso.
     */
    public function inProcess(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'in_process',
            'completed_at' => null,
        ]);
    }

    /**
     * Indica que la tarea está vencida ('overdue').
     */
    public function overdue(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'overdue',
            'due_date' => fake()->dateTimeBetween('-1 month', '-1 day'), // Fecha de vencimiento en el pasado
            'completed_at' => null,
        ]);
    }
}
