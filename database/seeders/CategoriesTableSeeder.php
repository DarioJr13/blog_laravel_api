<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $num_articles = 0;
        $password = '123123';

        {
            // Vaciamos la tabla categories
            Category::truncate();
            $faker = \Faker\Factory::create();
            for ($i = 0; $i < 3; $i++) {
                Category::create([
                    'name' => $faker->word
                ]);
            }
        }

    }
}
