<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
                DB::table('users')->insert([
            'username' => '山田太郎',
            'mail'=>'example@gmail.com',
            'password' => bcrypt('123456'),
            'bio' => 'こんにちは、山田太郎です',
        ]);
    }
}
