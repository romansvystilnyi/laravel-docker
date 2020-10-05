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
                'name'      => 'admin',
                'email'     => 'admin@g.g',
                'password'  => bcrypt('111111'),
            ],
            [
                'name'      => 'user',
                'email'     => 'user@g.g',
                'password'  => bcrypt('222222'),
            ],
            [
                'name'      => 'guest',
                'email'     => 'guest@g.g',
                'password'  => bcrypt('333333'),
            ],
        ];

        DB::table('users')->insert($data);
    }
}
