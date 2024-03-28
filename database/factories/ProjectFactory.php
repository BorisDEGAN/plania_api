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
            'description' => fake()->paragraph(50),
            'context' => fake()->paragraph(5),
            'outcomes' => fake()->paragraph(3),
            'steps' => fake()->paragraph(3),
            'steps_planning' => fake()->paragraph(3),
            'budget' => fake()->paragraph(3),
            'budget_planning' => fake()->paragraph(3),
            'budget_notes' => fake()->paragraph(3),
            'activities' => fake()->paragraph(3),
            'partners' => json_encode(fake()->paragraph(3)),
            'user_id' => User::all()->random()->id,
        ];
    }

    /**
     * Set the status of the model.
     * 
     * @return $this
     */
    public function configure(): static
    {
        return $this->afterCreating(function (Project $project) {
            $project->setStatus(Arr::random(Project::STATES));
        });
    }
}
