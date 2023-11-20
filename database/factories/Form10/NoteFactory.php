<?php

namespace Database\Factories\Form10;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Form10\Page;

class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories_all=collect([]);
        $categories_stock=collect([]);
        for ($i=0;$i<5;$i++){
            $categories_all[]=$this->faker->numberBetween(1,100);
            $categories_stock[]=$this->faker->numberBetween(1,100);
        }
        return [
           'page_id'=>$this->faker->numberBetween(1,50),
//             'page_id'=>Page::factory(),
            'date_of_note'=>$this->faker->date,
            'name_document'=>Str::random(10),
            'number_document'=>$this->faker->numberBetween(1,100000),
            'provider'=>$this->faker->name,
            'arrived'=>$this->faker->numberBetween(1,100),
            'subsided'=>$this->faker->numberBetween(1,100),
            'categories_all'=>$categories_all->toJson(),
            'categories_stock'=>$categories_stock->toJson(),
        ];
    }
}
