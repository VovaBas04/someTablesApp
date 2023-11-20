<?php

namespace Database\Factories\Form13;

use Database\Factories\Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Form13\Form;
class FormNoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $form_id = $this->faker->numberBetween(1,50);
//        $form_id = Form::factory();
        return [
            'form_id'=>$form_id,
            //
//             'form_id'=>Form::factory(),
            'date_of_note'=>$this->faker->date,
            'name_document'=>Str::random(10),
            'number'=>collect([1,2,3])->toJson(),
            'factory'=>Str::random(10),
            'date_of_create'=>$this->faker->date,
            'passport'=>$this->faker->numberBetween(1,1000000),
            'arrived_name'=>$this->faker->name,
            'subsided_name'=>$this->faker->name,
            'arrived_number'=>$this->faker->numberBetween(1,100),
            'subsided_number'=>$this->faker->numberBetween(1,100),
            'about'=>$this->faker->text,
            'group'=>$this->faker->numberBetween(1,100)
        ];
    }
}
