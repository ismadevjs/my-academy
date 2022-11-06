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
        Schema::create('estimaras', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('facebook');
            $table->string('birth');
            $table->string('avatar');
            $table->string('addr');
            $table->string('email');
            $table->string('phone');
            $table->string('gender');
            $table->string('ateliers');
            $table->string('hearing')->nullable();
            $table->string('why')->nullable();
            $table->string('enrolledBefore')->nullable();
            $table->string('yourGoal')->nullable();
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
        Schema::drop('estimaras');
    }
};
