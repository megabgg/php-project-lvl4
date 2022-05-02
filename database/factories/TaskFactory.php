<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = \App\Models\User::pluck('id')->toArray();
        $statuses = \App\Models\TaskStatus::pluck('id')->toArray();
        return [
            'name' => $this->faker->text(30),
            'description' => $this->faker->text(150),
            'status_id' => $this->faker->randomElement($statuses),
            'created_by_id' => $this->faker->randomElement($users),
            'assigned_to_id' => $this->faker->randomElement($users),
        ];
    }
}
