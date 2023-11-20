<?php

namespace Database\Factories\Form13;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Form13\FormList;
class FormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
//	    'form_list_id'=>$this->faker->numberBetween(1,10),
             'form_list_id'=>FormList::factory(),
            'cod'=>$this->faker->numberBetween(1,10),
	        'title'=>Str::random(10)

        ];
    }
}
