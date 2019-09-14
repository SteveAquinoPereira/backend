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
        $this->call(SubjectTableSeeder::class);
        $this->call(CutTableSeeder::class);
        $this->call(EvaluationTableSeeder::class);
        $this->call(SectionTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(UserTypeTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
