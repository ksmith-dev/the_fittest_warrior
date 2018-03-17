<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkoutReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workout_report', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('workout_id');
            $table->integer('repetitions');
            $table->integer('sets');
            $table->double('weight');
            $table->string('weight_units');
            $table->double('resistance_factor');
            $table->double('calories_burned');
            $table->string('duration');
            $table->string('muscle_groups');
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
        Schema::dropIfExists('workout_report');
    }
}
