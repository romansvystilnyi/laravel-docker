<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cName0 = 'no categories';
        $cName1 = 'Children\'s Books';
        $cName2 = 'Education & Teaching';
        $cName3 = 'History';
        $cName4 = 'Literature & Fiction';
        $cName5 = 'Mystery, Thriller & Suspense';
        $cName6 = 'Romance';
        $cName7 = 'Science & Math';
        $cName8 = 'Science Fiction & Fantasy';
        $cName9 = 'Travel';

        $categories = [];

        $categories[] = [
            'genre'     =>  $cName0,
            'slug'      => Str::of($cName0)->slug(),
            'parent_id' => 0,
        ];
        $categories[] = [
            'genre'     =>  $cName1,
            'slug'      => Str::of($cName1)->slug(),
            'parent_id' => 1,
        ];
        $categories[] = [
            'genre'     =>  $cName2,
            'slug'      => Str::of($cName2)->slug(),
            'parent_id' => 2,
        ];
        $categories[] = [
            'genre'     =>  $cName3,
            'slug'      => Str::of($cName3)->slug(),
            'parent_id' => 3,
        ];
        $categories[] = [
            'genre'     =>  $cName4,
            'slug'      => Str::of($cName4)->slug(),
            'parent_id' => 4,
        ];
        $categories[] = [
            'genre'     =>  $cName5,
            'slug'      => Str::of($cName5)->slug(),
            'parent_id' => 5,
        ];
        $categories[] = [
            'genre'     =>  $cName6,
            'slug'      => Str::of($cName6)->slug(),
            'parent_id' => 6,
        ];
        $categories[] = [
            'genre'     =>  $cName7,
            'slug'      => Str::of($cName7)->slug(),
            'parent_id' => 7,
        ];
        $categories[] = [
            'genre'     =>  $cName8,
            'slug'      => Str::of($cName8)->slug(),
            'parent_id' => 8,
        ];
        $categories[] = [
            'genre'     =>  $cName9,
            'slug'      => Str::of($cName9)->slug(),
            'parent_id' => 9,
        ];

        DB::table('categories')->insert($categories);
    }
}
