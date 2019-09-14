<?php

use Illuminate\Database\Seeder;
use App\Subject;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subject = new Subject();
        $subject->subject_name = 'Pre-Calculo';
        $subject->save();

        $subject = new Subject();
        $subject->subject_name = 'Gerencias del Aprendizaje';
        $subject->save();

        $subject = new Subject();
        $subject->subject_name = 'Tecnicas de Comunicacion';
        $subject->save();

        $subject = new Subject();
        $subject->subject_name = 'Spot Creativo';
        $subject->save();

        $subject = new Subject();
        $subject->subject_name = 'Proyectos Institucionales';
        $subject->save();

        $subject = new Subject();
        $subject->subject_name = 'FAPI';
        $subject->save();

        $subject = new Subject();
        $subject->subject_name = 'Socratico';
        $subject->save();
    }
}
