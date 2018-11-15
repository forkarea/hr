<?php

use Illuminate\Database\Seeder;

class RecommendationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recommendations')->insert([
            [
                'user_id' => 1,
                'worker_id' => 1,
                'recommendation' => 'Pierwsza rekomendacja Mateusz',
                'author' => 'Jan Kowalski',
                'work_author' => 'IT',
                'profile_author' => 'https://www.linkedin.com/in/michalglowacki/'
            ],
            [
                'user_id' => 1,
                'worker_id' => 1,
                'recommendation' => 'Druga rekomendacja Mateusz',
                'author' => 'Jan Woźniak',
                'work_author' => 'IT mobile',
                'profile_author' => 'https://www.linkedin.com/in/michalglowacki/'
            ],
            [
                'user_id' => 1,
                'worker_id' => 2,
                'recommendation' => 'Trzecia rekomendacja Mateusz',
                'author' => 'Tomasz Woźniak',
                'work_author' => 'Java Developer',
                'profile_author' => 'https://www.linkedin.com/in/michalglowacki/'
            ],
            [
                'user_id' => 1,
                'worker_id' => 2,
                'recommendation' => 'Czwarta rekomendacja Mateusz',
                'author' => 'Adam Tomasz',
                'work_author' => 'JavaScript Programmer',
                'profile_author' => 'https://www.linkedin.com/in/michalglowacki/'
            ]
        ]);
    }
}
