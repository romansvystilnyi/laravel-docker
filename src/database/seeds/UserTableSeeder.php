<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'      => 'unknown',
                'email'     => 'unknown@g.g',
                'password'  => bcrypt(Str::random(16)),
            ],
            [
                'name'      => 'Author Name',
                'email'     => 'author1@g.g',
                'password'  => bcrypt('123123'),
            ],
        ];

        DB::table('users')->insert($data);
    }
}
