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
        DB::table('users')->insert([
            [
            'name' => 'michal',
            'email' => 'm.glowacki92@gmail.com',
            'password' => bcrypt('michal#123')
            ],
            [
            'name' => 'mateusz',
            'email' => 'mateusz@collectivehr.com',
            'password' => bcrypt('mateusz#123')
            ]
        ]);
    }
}
