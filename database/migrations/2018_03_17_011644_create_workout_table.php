<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workout', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('training_type')->nullable();
            $table->string('activity_type')->nullable();
            $table->string('workout_type')->nullable();
            $table->integer('repetitions')->nullable();
            $table->integer('sets')->nullable();
            $table->double('weight')->nullable();
            $table->string('weight_units')->nullable();
            $table->double('resistance_factor')->nullable();
            $table->double('calories_burned')->nullable();
            $table->string('duration')->nullable();
            $table->string('rest')->nullable();
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
        Schema::dropIfExists('workout');
    }
}