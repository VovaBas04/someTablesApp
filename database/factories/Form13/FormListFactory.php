<?php

namespace Database\Factories\Form13;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FormListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id'=>User::factory(),
            'title'=>Str::random(10),
            'is_all'=>$this->faker->boolean()

        ];
    }
}
