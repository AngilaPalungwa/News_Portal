<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users=User::all();
        return [
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'image' => $this->faker->image(),
            'user_id' => $this->faker->unique()->numberBetween(1, $users->count())
        ];
    }
}
