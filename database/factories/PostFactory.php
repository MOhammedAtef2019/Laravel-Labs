<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'description' => $this->faker->text(),
<<<<<<< HEAD
            'user_id' => $this->faker->numberBetween(1, 4),
=======
            'user_id' => $this->faker->numberBetween(1, 3),
>>>>>>> dc95090a04d204ec83cfb04c0c473be1807d4cfc

        ];
    }
}
