<?php

namespace Database\Factories\Form10;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Form10\Note;
class MilitaryUnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories_all=collect([]);
        for ($i=0;$i<5;$i++){
            $categories_all[]=$this->faker->numberBetween(1,100);
        }
        return [
           'note_id'=>$this->faker->numberBetween(1,250),
//             'note_id'=>Note::factory(),
            'categories_military'=>$categories_all->toJson(),
            'title'=>$this->faker->name
            //
        ];
    }
}
