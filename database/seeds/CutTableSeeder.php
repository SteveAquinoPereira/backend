<?php

use Illuminate\Database\Seeder;
use App\Cut;

class CutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cut = new Cut();
        $cut->cut_name = 'Corte I';
        $cut->save();

        $cut = new Cut();
        $cut->cut_name = 'Corte II';
        $cut->save();

        $cut = new Cut();
        $cut->cut_name = 'Corte III';
        $cut->save();

        $cut = new Cut();
        $cut->cut_name = 'Corte IV';
        $cut->save();
    }
}
