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
     * The name of the corresponding model.
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
        // Possible task statuses (excluding 'overdue' for now)
        $statuses = ['in_process', 'completed'];
        $status = fake()->randomElement($statuses);

        // Due date logic: The due date is random
        $dueDate = fake()->dateTimeBetween('+1 day', '+1 month');

        // Completed_at logic: Only defined if status is 'completed'
        $completedAt = ($status === 'completed')
                       ? fake()->dateTimeBetween('-1 week', $dueDate)
                       : null;

        return [
            // Using fake()->method()
            'title' => fake()->sentence(mt_rand(3, 6)),
            'user_id' => User::factory(), // Assign to an existing user
            'description' => fake()->paragraph(),
            'due_date' => $dueDate,
            'status' => $status,
            'completed_at' => $completedAt,
        ];
    }

    // --- State Definitions ---

    /**
     * Indicates that the task is completed.
     */
    public function completed(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'completed',
            'completed_at' => fake()->dateTimeBetween('-1 week', 'now'),
        ]);
    }

    /**
     * Indicates that the task is in process.
     */
    public function inProcess(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'in_process',
            'completed_at' => null,
        ]);
    }

    /**
     * Indicates that the task is overdue.
     */
    public function overdue(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'overdue',
            'due_date' => fake()->dateTimeBetween('-1 month', '-1 day'), // Due date in the past
            'completed_at' => null,
        ]);
    }
}
