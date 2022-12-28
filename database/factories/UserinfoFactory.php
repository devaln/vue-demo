<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Userinfo>
 */
class UserinfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => fake()->firstname(),
            'middle_name' => fake()->firstName,
            'last_name' => fake()->lastName(),
            'contact' => fake()->numerify('##########'),
            'gender' => fake()->randomElement(['Male', 'Female']),
            'user_id' => fake()->unique()->numberBetween(1, User::count()),
        ];
    }
}
