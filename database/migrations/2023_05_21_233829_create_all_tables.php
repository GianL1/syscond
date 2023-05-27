<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blocos', function (Blueprint $table) {
            $table->id();
            $table->string('name_bloco', 50);
        });

        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('name_apartment', 50);
            $table->integer('bloco_id')->unsigned();
            $table->integer('user_id')->unsigned()->nullable();
        });


        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('password', 200);
            $table->string('avatar')->default('default.jpg');
            $table->string('token',200)->nullable();
            $table->integer('apartment_id')->unsigned()->nullable();
        });

        Schema::table('apartments', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('bloco_id')->references('id')->on('blocos');
        });

        Schema::table('users', function($table) {
            $table->foreign('apartment_id')->references('id')->on('apartments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('all_tables');
    }
};
