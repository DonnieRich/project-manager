<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'title' => fake()->sentence,
            'description' => fake()->paragraph
        ];
    }

    public function updated(Carbon $date = null): self
    {
        return $this->state(
            fn ($attributes) => ['updated_at' => $date ?? Carbon::now()]
        );
    }

    public function public(Bool $public = true): self
    {
        return $this->state(
            fn ($attributes) => ['public' => $public]
        );
    }
}
