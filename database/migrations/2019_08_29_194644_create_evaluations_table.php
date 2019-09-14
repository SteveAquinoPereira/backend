<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->bigIncrements('id_evaluation');
            $table->string('evaluation_type',150);
            $table->string('percentage',50);
            $table->unsignedBigInteger('id_subject03');
            $table->unsignedBigInteger('id_cut01');
            $table->foreign('id_cut01')->references('id_cut')->on('cuts');
            $table->foreign('id_subject03')->references('id_subject')->on('subjects');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluations');
    }
}
