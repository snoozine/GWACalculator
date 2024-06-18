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
        Schema::create('computation', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('year');
            $table->string('term');
            $table->string('subject');
            $table->string('midterm');
            $table->string('units');
            $table->string('finals')->nullable();
            $table->decimal('total', 8, 2);
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
        //
    }
};
