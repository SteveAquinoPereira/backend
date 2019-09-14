<?php

use Illuminate\Database\Seeder;
use App\Gender;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gender = new Gender();
        $gender->gender_name = "Hombre";
        $gender->save();

        $gender = new Gender();
        $gender->gender_name = "Mujer";
        $gender->save();
    }
}
