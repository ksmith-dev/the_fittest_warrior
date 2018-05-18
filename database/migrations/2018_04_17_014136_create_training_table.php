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
            "aerobic" => array('burpees', 'stair_climb', 'tuck_jump', 'inch_worm', 'mountain_climber', 'run', 'sprint', 'mile_run'),
            "strength" => array('pull_up','neutral_grip_pull_up', 'towel_pull_up', 'cliff_hanger_pull_up', 'under_hand_pull_up',
                                'around_the_worlds_pull_up', 'muscle_ups_rings', 'weighted_pull_up', 'single_arm_assist_pull_up',
                                'seated_rows', 'bent_over_rows', 'upright_rows', 'barbell_curls', 'dumbbell_curls', 'hammer_curls',
                                'reverse_curls', 'isolation_curls', 'push_up', 'bench_press', 'single_arm_push_up', 'flat_bench_press_barbell',
                                'flat_bench_press_dumbbell', 'incline_bench_barbell', 'incline_bench_dumbbell', 'decline_bench_barbell',
                                'decline_bench_dumbbell', 'dumbbells_flys_flat_bench', 'dumbbells_incline', 'military_press',
                                'sit_ups', 'modified_plank', 'crunches', 'jack_knife_on_ball', 'v_ups,', 'bicycle_crunches',
                                'butterfly_sit_ups', 'back_extensions', 'ab_roll_with_wheel', 'superman', 'barbell_wrist_curl',
                                'reverse_wrist_curl', 'plate_pinch_hold', 'wrist_roll', 'kettle_bell_swings', 'one_hand_swing',
                                'two_hand_swing', 'one_arm_clean_and_push_press', 'bottoms_up_clean', 'windmill', 'front_squat',
                                'hand_to_hand_swing', 'one_legged_deadlift', 'turkish_get_up', 'dead_lift', 'squats_with_weight',
                                'walking_lunges', 'dead_lift_narrow_stance', 'dead_lift_wide_stance', 'dead_lift_sumo_stance',
                                'squat_neutral_stance', 'squat_wide_stance', 'barbell_lunge', 'dumbbell_lung', 'seated_leg_press',
                                'hack_squat_press', 'single_leg_press', 'single_hack_squat_press', 'leg_extension', 'single_leg_extension',
                                'seated_leg_curl', 'stiff_legged_dead_lift', 'good_mornings_barbell', 'good_mornings_stiff_legged',
                                'hyper_extension', 'seated_dumbbell_overhead_press', 'standing_over_head_press', 'hand_stand_press',
                                'lateral_delt_side_raise', 'bent_read_delt_raise', 'seated_reverse_flys', 'cable_raise',
                                'front_delt_raise', 'shoulder_shrugs', 'high_pulls', 'tricep_extensions', 'dips', 'tricep_push_downs',
                                'over_head_cable_extensions', 'single_arm_pull_over', 'one_arm_cable_extension',
                                'over_head_dumbbell_extension', 'kick_backs',
                                'plank', 'side_plank', 'bear_crawl', 'lunge', 'squat', 'crunch'),
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
