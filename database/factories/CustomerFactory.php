<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name'=>fake()->word(),
            'last_name'=>fake()->word(),
            'address'=>fake()->city(),
            'phone'=>fake()->phoneNumber(),
            'email'=>fake()->email(),
            'password'=>fake()->password(),
        ];
    }
}
