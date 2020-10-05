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
        $this->call(UserTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        factory(\App\Models\Book::class, 100)->create();
        $this->call(LaratrustSeeder::class);
    }
}
