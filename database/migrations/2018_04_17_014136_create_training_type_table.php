<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('training_type');
            $table->string('workout_type')->unique();
            $table->timestamps();
        });

        $training_types = array(
            "aerobic" => array('burpees', 'stair_climb', 'tuck_jump', 'inch_worm', 'mountain_climber'),
            "strength" => array('pull_up', 'push_up', 'bench_press', 'military_press', 'plank', 'side_plank', 'bear_crawl', 'lunge', 'squat', 'dead_lift', 'crunch'),
            "intensity" => array('high', 'medium', 'low'),
            "interval" => array('low_high', 'high_low', 'low_medium', 'medium_low'),
            "flexibility" => array('yoga', 'stretch', 'stretching'),
            "circuit" => array('boxing', 'swimming'),
            "balance" => array('foundations')
        );

        foreach ($training_types as $training_type => $workout_types) {
            foreach ($workout_types as $workout_type) {
                DB::table('training_type')->insert(['training_type' => $training_type, 'workout_type' => $workout_type, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training_type');
    }
}
