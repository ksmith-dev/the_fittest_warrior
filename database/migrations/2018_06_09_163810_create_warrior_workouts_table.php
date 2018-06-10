<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarriorWorkoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warrior_workouts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();


            $table->string('workout_name')->nullable();
            $table->double('hardest_hit')->nullable();
            $table->double('total_power')->nullable();
            $table->double('hit_count')->nullable();
            $table->double('power_average')->nullable();
            $table->double('workout_duration')->nullable();
            $table->double('hit_speed')->nullable();


            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('user');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warrior_workouts');
    }
}
