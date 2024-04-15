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
            'justification' => fake()->paragraph(5),
            'duration' => rand(50, 500),
            'global_objective' => fake()->paragraph(5),
            'objectives' => json_encode([fake()->sentence(5), fake()->sentence(5), fake()->sentence(5)]),
            'outcomes' => json_encode([
                ['title' => fake()->sentence(), 'activities' => [fake()->sentence(5), fake()->sentence(5), fake()->sentence(5)]],
                ['title' => fake()->sentence(), 'activities' => [fake()->sentence(5), fake()->sentence(5), fake()->sentence(5)]],
                ['title' => fake()->sentence(), 'activities' => [fake()->sentence(5), fake()->sentence(5), fake()->sentence(5)]],
            ]),
            'activities' => json_encode([fake()->sentence(5), fake()->sentence(5), fake()->sentence(5)]),
            'logical_context' => json_encode([
                'budget' => rand(1000, 100000000),
                'objectives' => [fake()->sentence(5), fake()->sentence(5), fake()->sentence(5)],
                'outcomes' => [
                    ['title' => fake()->sentence(), 'activities' => [
                        'title' => fake()->sentence(),
                        'intermediate_outcomes' => [fake()->sentence(5), fake()->sentence(5), fake()->sentence(5)],
                        'effects' => [fake()->sentence(5), fake()->sentence(5), fake()->sentence(5)],
                        'impacts' => [fake()->sentence(5), fake()->sentence(5), fake()->sentence(5)],
                    ]],
                ],
            ]),
            'intervention_strategy' => fake()->sentence(5),
            'patners' => json_encode([
                ['name' => fake()->name(), 'abilities' => [fake()->sentence(5), fake()->sentence(5), fake()->sentence(5)]],
                ['name' => fake()->name(), 'abilities' => [fake()->sentence(5), fake()->sentence(5), fake()->sentence(5)]],
            ]),
            'quality_monitoring' => json_encode([
                fake()->sentence(5),
                fake()->sentence(5)
            ]),
            'performance_matrix' => json_encode([
                [
                    'effect' => fake()->sentence(5),
                    'verification_sources' => [fake()->sentence(5), fake()->sentence(5), fake()->sentence(5)],
                    'collect_tools' => [fake()->sentence(5), fake()->sentence(5), fake()->sentence(5)],
                    'frequency' => fake()->sentence(5),
                    'analyse' => fake()->sentence(5),
                ],
                [
                    'effect' => fake()->sentence(5),
                    'verification_sources' => [fake()->sentence(5), fake()->sentence(5), fake()->sentence(5)],
                    'collect_tools' => [fake()->sentence(5), fake()->sentence(5), fake()->sentence(5)],
                    'frequency' => fake()->sentence(5),
                    'analyse' => fake()->sentence(5),
                ]
            ]),

            'budget_plan' => json_encode([
                [
                    'section' => fake()->sentence(5),
                    'activities' => ['title' => fake()->sentence(), 'budget' => rand(1000, 100000000)],
                ],
                [
                    'section' => fake()->sentence(5),
                    'activities' => ['title' => fake()->sentence(), 'budget' => rand(1000, 100000000)],
                ],
            ]),

            'budget_currency' => 'XOF',
            'calendar' => json_encode([
              [
                'outcome' => fake()->sentence(5),
                'activities' => ['title' => fake()->sentence(), 'start_date' => now()->subDays(rand(2, 100)), 'end_date' => now()->addDays(rand(2, 100))],
              ]  
            ]),
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
