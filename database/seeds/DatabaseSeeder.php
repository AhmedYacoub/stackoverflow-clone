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
        // Create 10 question records, creating a user each record.
        factory(App\Models\Question::class, 10)->create()->each(function ($question) {
            $question->answers()->saveMany(factory(App\Models\Answer::class, rand(1, 5))->make());
        });

        // Call seeder classes.
        $this->call(
            AdminUserSeeder::class,

        );
    }
}
