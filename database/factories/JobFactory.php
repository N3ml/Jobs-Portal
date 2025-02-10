<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'position_id' => \App\Models\Position::factory(),
            'requirements' => $this->faker->text(),
            'type' => $this->faker->randomElement([1, 2]),
            'salary' => $this->faker->numberBetween(1000, 9000),
            'status' => $this->faker->randomElement([1, 0]),
        ];
    }
}
