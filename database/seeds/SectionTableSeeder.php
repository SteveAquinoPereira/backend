<?php

use Illuminate\Database\Seeder;
use App\Section;
use App\Subject;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $section = new Section();
        $section->section_name = 'Seccion A';
        $section->save();

        $subjects = Subject::all();

        foreach($subjects as $subject){
        $section->subjects()->attach($subject);
        }

    }
}
