<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'jobTitle' => $this->faker->jobTitle(),
            'email' => $this->faker->unique()->safeEmail(),
            'nationality' => $this->faker->country(),
            'company_id' => rand(1, 10)
        ];
    }
}
