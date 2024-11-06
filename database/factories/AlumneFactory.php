<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumne>
 */
class AlumneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nom" => $this->faker->firstName,
            "cognoms" => $this->faker->lastName . " " . $this->faker->lastName,
            "data_naixement" => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            "centre_id" =>\App\Models\Centre::all()->random()->id
        ];
    }
}
