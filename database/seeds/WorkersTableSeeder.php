<?php

use Illuminate\Database\Seeder;

class WorkersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workers')->insert([
            [
                'user_id' => 1,
                'name' => 'Mateusz Chomiczewski',
                'photo' => 'mateuszchomiczewski.jpg',
                'description' => 'Web & mobile apps | ML & DL | Software | Stermedia | People | HR',
                'profile_worker' => 'https://www.linkedin.com/in/mattchomiczewski/',
            ],
            [
                'user_id' => 1,
                'name' => 'Michał Głowacki',
                'photo' => 'michalglowacki.jpg',
                'description' => 'php, css, html, js blockchain',
                'profile_worker' => 'https://www.linkedin.com/in/michalglowacki/',
            ]
        ]);
    }
}
