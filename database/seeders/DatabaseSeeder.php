<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        $this->call(CategoriesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        Schema::enableForeignKeyConstraints();
        // $this->call(LevelSeeder::class);
        // $this->call(CategorySeeder::class);
        // $this->call(PriceSeeder::class);
        // $this->call(PlatformSeeder::class);
        // $this->call(CourseSeeder::class);

    }
}
