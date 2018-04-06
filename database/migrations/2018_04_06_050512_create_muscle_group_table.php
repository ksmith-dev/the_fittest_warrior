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

        DB::table('muscle_group')->insert(['workout_type' => 'inch_worm', 'muscle_group' => 'abdominal', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'inch_worm', 'muscle_group' => 'biceps', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'inch_worm', 'muscle_group' => 'forearms', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'inch_worm', 'muscle_group' => 'shoulders', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'inch_worm', 'muscle_group' => 'pectorals', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'inch_worm', 'muscle_group' => 'chest', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'inch_worm', 'muscle_group' => 'core', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'tuck_jump', 'muscle_group' => 'quadriceps', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'tuck_jump', 'muscle_group' => 'gluts', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'tuck_jump', 'muscle_group' => 'hamstrings', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'tuck_jump', 'muscle_group' => 'calves', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'tuck_jump', 'muscle_group' => 'hip_flexors', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'tuck_jump', 'muscle_group' => 'abdominal', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'tuck_jump', 'muscle_group' => 'obliques', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'tuck_jump', 'muscle_group' => 'biceps', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'tuck_jump', 'muscle_group' => 'anterior', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'tuck_jump', 'muscle_group' => 'shoulders', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'bear_crawl', 'muscle_group' => 'shoulder', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'bear_crawl', 'muscle_group' => 'abdominal', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'bear_crawl', 'muscle_group' => 'biceps', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'bear_crawl', 'muscle_group' => 'forearms', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'bear_crawl', 'muscle_group' => 'core', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'mountain_climber', 'muscle_group' => 'quadriceps', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'mountain_climber', 'muscle_group' => 'gluts', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'mountain_climber', 'muscle_group' => 'hamstrings', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'mountain_climber', 'muscle_group' => 'calves', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'mountain_climber', 'muscle_group' => 'hip_flexors', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'mountain_climber', 'muscle_group' => 'abdominal', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'mountain_climber', 'muscle_group' => 'obliques', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'mountain_climber', 'muscle_group' => 'biceps', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'mountain_climber', 'muscle_group' => 'anterior', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'mountain_climber', 'muscle_group' => 'shoulders', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'push_up', 'muscle_group' => 'pectoral', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'push_up', 'muscle_group' => 'triceps', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'push_up', 'muscle_group' => 'biceps', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'push_up', 'muscle_group' => 'deltoids', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'push_up', 'muscle_group' => 'rhomboids', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'push_up', 'muscle_group' => 'trapezius', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'push_up', 'muscle_group' => 'latissimus_dorsi', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'stair_climb', 'muscle_group' => 'gluts', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'push_up', 'muscle_group' => 'hamstrings', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'push_up', 'muscle_group' => 'quadriceps', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'push_up', 'muscle_group' => 'abs', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'push_up', 'muscle_group' => 'calves', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'burpees', 'muscle_group' => 'arms', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'burpees', 'muscle_group' => 'chest', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'burpees', 'muscle_group' => 'quads', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'burpees', 'muscle_group' => 'gluts', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'burpees', 'muscle_group' => 'hamstrings', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'burpees', 'muscle_group' => 'abdominal', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'plank', 'muscle_group' => 'transverse_abdominus', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'plank', 'muscle_group' => 'rectus_abdominus', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'plank', 'muscle_group' => 'external_oblique', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'plank', 'muscle_group' => 'gluts', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'lunge', 'muscle_group' => 'lattissimus_dorsi', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'lunge', 'muscle_group' => 'trapezius', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'lunge', 'muscle_group' => 'deltoids', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'lunge', 'muscle_group' => 'pectoral', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'lunge', 'muscle_group' => 'biceps', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'lunge', 'muscle_group' => 'triceps', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'squat', 'muscle_group' => 'quadriceps', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'squat', 'muscle_group' => 'hamstrings', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'squat', 'muscle_group' => 'gluts', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'squat', 'muscle_group' => 'calves', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'dead_lift', 'muscle_group' => 'back', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'dead_lift', 'muscle_group' => 'gluts', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'dead_lift', 'muscle_group' => 'legs', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'side_plank', 'muscle_group' => 'transversus_abdominis', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'side_plank', 'muscle_group' => 'rectus_abdominis', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'side_plank', 'muscle_group' => 'obliques', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'side_plank', 'muscle_group' => 'quadratus_lumborum', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'side_plank', 'muscle_group' => 'abductor', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'crunch', 'muscle_group' => 'rectus_abdominis', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'crunch', 'muscle_group' => 'external_oblique', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'crunch', 'muscle_group' => 'internal_oblique', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'pull_up', 'muscle_group' => 'brachialis', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'pull_up', 'muscle_group' => 'brachioradialis', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        DB::table('muscle_group')->insert(['workout_type' => 'pull_up', 'muscle_group' => 'biceps', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
//        DB::table('muscle_group')->insert(['workout_type' => 'pull_up', 'muscle_group' => '', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
//        DB::table('muscle_group')->insert(['workout_type' => 'pull_up', 'muscle_group' => '', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
//        DB::table('muscle_group')->insert(['workout_type' => 'pull_up', 'muscle_group' => '', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
//        DB::table('muscle_group')->insert(['workout_type' => 'pull_up', 'muscle_group' => '', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
//        DB::table('muscle_group')->insert(['workout_type' => 'pull_up', 'muscle_group' => '', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
//        DB::table('muscle_group')->insert(['workout_type' => 'pull_up', 'muscle_group' => '', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
//        DB::table('muscle_group')->insert(['workout_type' => 'pull_up', 'muscle_group' => '', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
//        DB::table('muscle_group')->insert(['workout_type' => 'pull_up', 'muscle_group' => '', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
//        DB::table('muscle_group')->insert(['workout_type' => 'pull_up', 'muscle_group' => '', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
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