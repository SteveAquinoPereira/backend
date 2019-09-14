<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id_user');
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('cedula',50)->unique();
            $table->string('avatar',100)->default('user.png');
            $table->string('address',200);
            $table->string('phone_number',50);
            $table->string('password',100);
            $table->string('email',100);
            $table->unsignedBigInteger('id_section01')->nullable();
            $table->unsignedBigInteger('id_user_type01')->default(4);
            $table->unsignedBigInteger('id_gender01');
            $table->foreign('id_section01')->references('id_section')->on('sections');
            $table->foreign('id_user_type01')->references('id_user_type')->on('user_types');
            $table->foreign('id_gender01')->references('id_gender')->on('genders');
            $table->boolean('accepted')->default(0);
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
        Schema::dropIfExists('users');
    }
}
