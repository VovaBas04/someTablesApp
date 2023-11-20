<?php

namespace Database\Seeders;

use App\Models\Form13\FormNote;
use Illuminate\Database\Seeder;
use App\Models\Form13\Form;
use App\Models\Form10\MilitaryUnit;
use App\Models\Form10\Page;
use App\Models\Form10\Note;
//use http\Client\Curl\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//       MilitaryUnit::factory(10)->create();
        Page::factory(40)->create();
         Note::factory(240)->create();
         MilitaryUnit::factory(990)->create();
//        Note::factory(500)->create();
//        FormNote::factory(10)->create();
//        FormList::factory(10)->create();
//       Form::factory(40)->create();
//        FormNote::factory(240)->create();
    }
}
