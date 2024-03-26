<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->text(),
            'user_id' => User::all()->random()->id,
        ];
    }

    /**
     * Set the status of the model.
     * 
     * @return $this
     */
    public function status(): static
    {
        return $this->afterCreating(function (Project $project) {
            $project->setStatus(Arr::random(Project::STATES));
        });
    }
}
