<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMuscleGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muscle_group', function (Blueprint $table) {
            $table->increments('id');
            $table->string('workout_type');
            $table->string('muscle_group');
            $table->timestamps();
        });

        $array = array(
                'inch_worm' => array('abdominal', 'biceps', 'forearms', 'shoulders', 'pectorals', 'chest', 'core'),
                'tuck_jump' => array('quadriceps', 'gluts', 'hamstrings', 'calves', 'hip_flexors', 'abdominal', 'obliques', 'biceps', 'anterior', 'shoulders'),
                'bear_crawl' => array('shoulder', 'abdominal', 'biceps', 'forearms', 'core'),
                'mountain_climber' => array('quadriceps', 'gluts', 'hamstrings', 'calves', 'hip_flexors', 'abdominal', 'obliques', 'biceps', 'anterior', 'shoulders'),
                'push_up' => array('pectoral', 'triceps', 'biceps', 'deltoids', 'rhomboids', 'trapezius', 'latissimus_dorsi'),
                'star_climb'=> array('hip flexors', 'gluts', 'sartorius', 'rectus femoris', 'tensor_fasciae_latae', 'pectineus', 'gluteus medius', 'gluteus maximus', 'quadriceps', 'hamstring', 'calves'),
                'burpees' => array('arms', 'chest', 'quads', 'gluts', 'hamstrings', 'abdominal'),
                'plank' => array('transverse_abdominus', 'rectus_abdominus', 'external_oblique', 'gluts'),
                'lunge' => array('lattissimus_dorsi', 'trapezius', 'deltoids', 'pectoral', 'biceps', 'triceps'),
                'squat' => array('quadriceps', 'hamstrings', 'gluts', 'calves'),
                'dead_lift' => array('back', 'gluts', 'legs'),
                'side_plank' => array('transversus_abdominis', 'rectus_abdominis', 'obliques', 'quadratus_lumborum', 'abductor'),
                'crunch' => array('rectus_abdominis', 'external_oblique', 'internal_oblique'),
                'pull_up' => array('brachialis', 'brachioradialis', 'biceps')
            );

        foreach ($array as $workout_type => $muscle_groups) {
            foreach ($muscle_groups as $muscle_group) {
                DB::table('muscle_group')->insert(['workout_type' => $workout_type, 'muscle_group' => $muscle_group, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
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
        Schema::dropIfExists('muscle_group');
    }
}