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
                'inch_worm' => array('lower-abdominal', 'biceps', 'forearms', 'shoulders', 'pectorals', 'chest', 'upper-abdominals'),
                'tuck_jump' => array('quadriceps', 'glutes', 'hamstrings', 'calves', 'upper-abdominals', 'lower-abdominal', 'obliques', 'biceps', 'deltoids'),
                'bear_crawl' => array('deltoids', 'lower-abdominal', 'biceps', 'forearms', 'upper-abdominals'),
                'mountain_climber' => array('quadriceps', 'glutes', 'hamstrings', 'calves', 'lower-abdominal', 'obliques', 'biceps', 'upper-abdominals', 'deltoids'),
                'push_up' => array('pectoral', 'triceps', 'biceps', 'deltoids', 'trapezius', 'latissimus_dorsi'),
                'star_climb'=> array('glutes', 'adductors', 'gluteus', 'quadriceps', 'hamstring', 'calves'),
                'burpees' => array('triceps', 'biceps', 'forarms', 'pectorals', 'quadriceps', 'glutes', 'hamstrings', 'lower-abdominal', 'upper-abdominals'),
                'lunge' => array('lattissimus_dorsi', 'trapezius', 'deltoids', 'pectoral', 'biceps', 'triceps'),
                'squat' => array('quadriceps', 'hamstrings', 'glutes', 'calves'),
                'side_plank' => array('lower-abdominals', 'upper-abdominals', 'obliques'),
                'crunch' => array('glutes', 'obliques'),
                'pull_up' => array('biceps', 'forearms'),
                'neutral_grip_pull_up' => array('biceps', 'forearms', 'latissimus-dorsi', 'deltoids', 'trapezius'),
                'towel_pull_up' => array('trapezius','biceps','forearms'),
                'cliff_hanger_pull_up' => array('latissimus-dorsi'),
                'under_hand_pull_up' => array('trapezius','biceps'),
                'around_the_worlds_pull_up' => array('latissimus-dorci','biceps','forearms'),
                'muscle_ups_rings' => array('triceps','forearm'),
                'weighted_pull_up' => array('latissimus-dorci', 'biceps', 'forearms', 'deltoids'),
                'single_arm_assist_pull_up' => array('latissimus-dorci', 'biceps', 'forearms'),
                'seated_rows' => array('trapezius', 'latissimus-dorci', 'deltoids', 'biceps', 'forearm'),
                'bent_over_rows' => array('latissimus-dorci', 'deltoids', 'trapezius', 'biceps'),
                'upright_rows' => array('trapezius', 'deltoids', 'biceps'),

                'barbell_curls' => array('biceps', 'deltoids'),
                'dumbbell_curls' => array('biceps', 'deltoids'),
                'hammer_curls' => array('biceps'),
                'reverse_curls' => array('biceps'),
                'isolation_curls' => array('biceps'),

                'bench_press' => array('pectorals', 'forearms', 'triceps', 'latissimus-dorsi'),
                'single_arm_push_up' => array('pectorals', 'triceps', 'lower-abdominals', 'upper-abdominals'),
                'flat_bench_press_barbell' => array('triceps', 'pectorals', 'deltoids', 'trapezius'),
                'flat_bench_press_dumbbell' => array('triceps', 'pectorals', 'deltoids', 'trapezius'),
                'incline_bench_barbell' => array('pectorals', 'deltoids', 'triceps'),
                'incline_bench_dumbbell' => array('pectorals', 'deltoids', 'triceps'),
                'decline_bench_barbell' => array('pectorals', 'deltoids', 'triceps', 'biceps'),
                'decline_bench_dumbbell' => array('pectorals', 'deltoids', 'triceps', 'biceps'),
                'dumbbells_flys_flat_bench' => array('pectorals', 'deltoids'),
                'dumbbells_flys_incline' => array('pectorals', 'deltoids'),

                'sit_ups' => array('lower-abdominals', 'upper-abdominals'),
                'plank' => array('lower-abdominals', 'upper-adbominals', 'glutes', 'obliques'),
                'modified_plank' => array('lower-abdominals', 'upper-adbominals', 'trapezius', 'deltoids'),
                'crunches' => array('lower-abdominals', 'upper-adbominals',),
                'jack_knife_on_ball' => array('lower-abdominals', 'latissimus-dorci'),
                'v_ups' => array('lower-abdominals', 'upper-abdominals', 'latissimus-dorci', 'quadriceps', 'hamstrings'),
                'bicycle_crunches' => array('lower-abdominals', 'upper-abdominals'),
                'butterfly_sit_ups' => array('lower-abdominals', 'upper-abdominals', 'latissimus-dorci'),
                'back_extensions' => array('latissimus-dorci', 'trapezius'),
                'ab_roll_with_wheel' => array('lower-abdominals', 'upper-abdominals', 'hips', 'deltoids', 'latissimus-dorsi'),
                'superman' => array('glutes', 'hamstring', 'latissimus-dorsi', 'trapezius'),

                'barbell_wrist_curl' => array('forearms'),
                'reverse_wrist_curl' => array('forearms'),
                'plate_pinch_hold' => array('forearms'),
                'wrist_roll' => array('forearms'),

                'kettle_bell_swing' => array('glutes', 'hamstring', 'latissimus-dorci', 'lower-abdominals', 'upper-abdominals', 'shoulders'),
                'one_hand_swing' => array('hamstrings', 'glutes', 'quadriceps', 'lower-abdominals', 'upper-abdominals', 'obliques', 'trapezius', 'deltoid'),
                'two_hand_swing' => array('hamstrings', 'glutes', 'latissimus-dorci', 'lower-abdominals', 'upper-abdominals'),
                'one_arm_clean_and_push_press' => array('calves', 'quadriceps', 'hamstrings', 'glutes', 'trapezius'),
                'bottoms-up_clean' => array('core'),
                'windmill' => array('trapezius', 'deltoids', 'hamstrings', 'glutes'),
                'hand-to-hand_swing' => array('hamstring', 'glutes', 'quadriceps', 'lower-abdominals', 'upper-abdominals', 'obliques', 'trapezius', 'deltoids'),
                'one_legged_deadlift' => array('glutes', 'hamstrings', 'adductor'),
                'turkish_get_up' => array('latissimus-dorci', 'lower-abdominals', 'upper-abdominals'),

                'dead_lift' => array('glutes', 'hamstrings', 'trapezius'),
                'squats_with_weight' => array('quadriceps', 'hamstrings', 'glutes', 'calves'),
                'walking_lunges' => array('glutes', 'hamstrings', 'guadriceps'),
                'dead_lift_narrow_stance' => array('glutes', 'adductor', 'quadriceps', 'calves', 'hamstrings'),
                'dead_lift_wide_stance' => array('glutes', 'adductor', 'quadriceps', 'calves', 'hamstrings'),
                'dead_lift_sumo_stance' => array('glutes', 'hamstrings', 'trapezius', 'latissimus-dorci'),
                'squat_neutral_stance' => array('quadriceps', 'glutes', 'hamstring'),
                'squat_wide_stance' => array('quadriceps', 'glutes', 'hamstring', 'adductors'),
                'front_squat' => array('quadriceps', 'glutes', 'calves', 'hamstrings'),
                'barbell_lunge' => array('glutes', 'hamstrings', 'quadriceps', 'calves'),
                'dumbbell_lunge' => array('glutes', 'hamstrings', 'quadriceps', 'calves'),
                'seated_leg_press' => array('quadriceps', 'hamstrings', 'glutes', 'calves'),
                'hack_squat_press' => array('quadriceps', 'hamstringss', 'glutes'),
                'single_leg_press' => array('quadriceps', 'hamstrings', 'glutes', 'calves'),
                'single_hack_squat_press' => array('quadriceps', 'hamstrings', 'glutes'),
                'leg_extension' => array('quadriceps'),
                'single_leg_extension' => array('quadriceps'),
                'seated_leg_curl' => array('hamstrings'),
                'stiff_legged_dead_lift' => array('hamstrings', 'latissimus-dorci', 'glutes', 'lower-abdominals', 'upper-abdominals'),
                'good_mornings_barbell' => array(''),
                'good_mornings_stiff_legged' => array(''),
                'hyper_extension' => array('glutes', 'hamstrings', 'adductor'),

                'run' => array('quadriceps', 'hamstrings', 'glutes', 'lower-abdominals', 'upper-abdominals', 'calves'),
                'sprint' => array('hamstrings', 'calves', 'quadriceps', 'glutes', 'lower-abdominals', 'upper-abdominals'),
                'mile_run' => array('hamstrings', 'calves', 'quadriceps', 'glutes', 'lower-abdominals', 'upper-abdominals'),

                'military_press' => array('adductors', 'biceps', 'triceps'),
                'seated_dumbbell_overhead_press' => array('deltoids', 'latissimus-dorci', 'triceps', 'trapezius'),
                'standing_over_head_press' => array('deltoids', 'latissimus-dorci', 'triceps', 'trapezius'),
                'hand_stand_press' => array('lower-abdominals', 'upper-abdominals', 'hamstrings', 'obliques'),
                'lateral_delt_side_raise' => array('deltoids', 'biceps'),
                'bent_read_delt_raise' => array('deltoids'),
                'seated_reverse_flys' => array('deltoids', 'trapezius'),
                'cable_raise' => array('deltoids', 'biceps'),
                'front_delt_raise' => array('deltoids', 'biceps'),
                'shoulder_shrugs' => array('trapezius'),
                'high_pulls' => array('deltoids', 'latissimus-dorci', 'trapezius'),

                'tricep_extensions' => array('triceps', 'forearms', 'latissimus-dorci'),
                'dips' => array('pectorals', 'triceps', 'deltoids'),
                'tricep_push_downs' => array('triceps'),
                'over_head_cable_extensions' => array('triceps'),
                'single_arm_pull_over' => array('trapezius'),
                'one_arm_cable_extension' => array('triceps'),
                'over_head_dumbbell_extension' => array('triceps'),
                'kick_backs' => array('triceps', 'deltoids')
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