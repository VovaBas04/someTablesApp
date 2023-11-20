<?php

namespace Database\Factories\Form10;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->unique()->name,
            'user_id'=>User::factory(),
            'is_all'=>$this->faker->boolean,
            //
        ];
    }
}
