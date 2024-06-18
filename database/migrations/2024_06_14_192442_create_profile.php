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
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('age');
            $table->string('program');
            $table->string('year');
            $table->string('email');
            $table->string('bday');
            $table->string('nationality');
            $table->string('status');
            $table->string('gender');
            $table->string('address');
            $table->string('image');
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
        Schema::dropIfExists('profile');
    }
};
