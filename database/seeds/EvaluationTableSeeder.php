<?php

use Illuminate\Database\Seeder;
use App\Evaluation;

class EvaluationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $evaluation = new Evaluation();
        $evaluation->evaluation_type = 'Examen Individual';
        $evaluation->percentage = 15;
        $evaluation->id_subject03 = 1;
        $evaluation->id_cut01 = 1;
        $evaluation->save();

        $evaluation = new Evaluation();
        $evaluation->evaluation_type = 'Taller';
        $evaluation->percentage = 10;
        $evaluation->id_subject03 = 1;
        $evaluation->id_cut01 = 1;
        $evaluation->save();

        $evaluation = new Evaluation();
        $evaluation->evaluation_type = 'Guia';
        $evaluation->percentage = 20;
        $evaluation->id_subject03 = 1;
        $evaluation->id_cut01 = 2;
        $evaluation->save();

        $evaluation = new Evaluation();
        $evaluation->evaluation_type = 'Quiz';
        $evaluation->percentage = 5;
        $evaluation->id_subject03 = 1;
        $evaluation->id_cut01 = 2;
        $evaluation->save();

        $evaluation = new Evaluation();
        $evaluation->evaluation_type = 'Exposicion';
        $evaluation->percentage = 25;
        $evaluation->id_subject03 = 1;
        $evaluation->id_cut01 = 3;
        $evaluation->save();

        $evaluation = new Evaluation();
        $evaluation->evaluation_type = 'Examen en Trio';
        $evaluation->percentage = 10;
        $evaluation->id_subject03 = 1;
        $evaluation->id_cut01 = 4;
        $evaluation->save();

        $evaluation = new Evaluation();
        $evaluation->evaluation_type = 'Guia';
        $evaluation->percentage = 15;
        $evaluation->id_subject03 = 1;
        $evaluation->id_cut01 = 4;
        $evaluation->save();
    }
}
