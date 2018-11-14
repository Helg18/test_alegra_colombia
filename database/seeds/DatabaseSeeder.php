<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(IngredientsSeeder::class);
        $this->call(RecipesSeeder::class);
        $this->call(StoresSeeder::class);
    }
}
