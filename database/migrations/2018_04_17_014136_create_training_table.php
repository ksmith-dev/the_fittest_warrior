<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('workout_type')->unique();
            $table->timestamps();
        });

        $types = array(
            "aerobic" => array('burpees', 'stair_climb', 'tuck_jump', 'inch_worm', 'mountain_climber'),
            "strength" => array('pull_up', 'push_up', 'bench_press', 'military_press', 'plank', 'side_plank', 'bear_crawl', 'lunge', 'squat', 'dead_lift', 'crunch'),
            "intensity" => array('high', 'medium', 'low'),
            "interval" => array('low_high', 'high_low', 'low_medium', 'medium_low'),
            "flexibility" => array('yoga', 'stretch', 'stretching'),
            "circuit" => array('boxing', 'swimming'),
            "balance" => array('foundations')
        );

        foreach ($types as $type => $workout_types) {
            foreach ($workout_types as $workout_type) {
                DB::table('training')->insert(['type' => $type, 'workout_type' => $workout_type, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
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
        Schema::dropIfExists('training');
    }
}
