<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_user', function (Blueprint $table) {

            $table->unsignedBigInteger('id_user02');
            $table->unsignedBigInteger('id_evaluation01');
            $table->string('grade',2)->default('-');
            $table->foreign('id_user02')->references('id_user')->on('users');
            $table->foreign('id_evaluation01')->references('id_evaluation')->on('evaluations');
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
        Schema::drop('evaluation_user');
    }
}