<?php

namespace Database\Factories\Form10;
use App\Models\Form10\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'book_id'=>$this->faker->numberBetween(1,10),
//             'book_id'=>Book::factory(),
            'responsible_person'=>$this->faker->name,
            'cod'=>$this->faker->numberBetween(1,100)
            //
        ];
    }
}
