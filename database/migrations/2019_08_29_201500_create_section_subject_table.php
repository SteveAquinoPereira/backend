<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_subject', function (Blueprint $table) {

            $table->unsignedBigInteger('id_section02');
            $table->unsignedBigInteger('id_subject01');
            $table->unsignedBigInteger('id_teacher')->nullable();
            $table->foreign('id_teacher')->references('id_user')->on('users');
            $table->foreign('id_section02')->references('id_section')->on('sections');
            $table->foreign('id_subject01')->references('id_subject')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('section_subject');
    }
}
