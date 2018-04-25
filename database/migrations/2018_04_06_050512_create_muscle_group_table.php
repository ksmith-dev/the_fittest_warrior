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
                'lunge' => array('lattissimus_dorsi', 'trapezius', 'deltoids', 'pectoral', 'biceps', 'triceps'),
                'squat' => array('quadriceps', 'hamstrings', 'gluts', 'calves'),
                'side_plank' => array('transversus_abdominis', 'rectus_abdominis', 'obliques', 'quadratus_lumborum', 'abductor'),
                'crunch' => array('rectus_abdominis', 'external_oblique', 'internal_oblique'),
                'pull_up' => array('brachialis', 'brachioradialis', 'biceps'),
                'neutral_grip_pull_up' => array('bicep brachii', 'brachialis', 'brachioradialis', 'latissimus dorsi', 'posterior deltoid', 'rectus abdominis', 'rhomboids'),
                'towel_pull_up' => array('back','bicep','forearms'),
                'cliff_hanger_pull_up' => array('latissimus dorsi','teres major'),
                'under_hand_pull_up' => array('back','bicep'),
                'around_the_worlds_pull_up' => array('latissimus dorsi','teres major','brachialis','brachioradialis'),
                'muscle_ups_rings' => array('triceps','forearm'),
                'weighted_pull_up' => array('latissimus dorsi', 'biceps', 'forearms', 'posterior shoulder'),
                'single_arm_assist_pull_up' => array('latissimus dorsi', 'biceps', 'forearms'),
                'seated_rows' => array('trapezius', 'latissimus dorsi', 'erector spinae', 'rear deltoids', 'biceps brachialis', 'forearm flexors'),
                'bent_over_rows' => array('lats', 'rhomboids', 'rear delts', 'traps', 'biceps'),
                'upright_rows' => array('upper trapezius', 'deltoids', 'biceps'),

                'barbell_curls' => array('biceps brachii', 'deltoid muscle', 'wrist extensors', 'flexors'),
                'dumbbell_curls' => array('biceps brachii', 'deltoid muscle', 'wrist extensors', 'flexors'),
                'hammer_curls' => array('brachialis', 'brachioradialis'),
                'reverse_curls' => array('brachialis', 'biceps brachii'),
                'isolation_curls' => array('biceps'),

                'bench_press' => array('pectorals', 'anterioir', 'triceps brachii', 'latissimus dorsi'),
                'single_arm_push_up' => array('pectorals', 'anterior', 'triceps', 'abs'),
                'flat_bench_press_barbell' => array('triceps brachii', 'pectoralis major', 'anterior deltoids', 'traps', 'back'),
                'flat_bench_press_dumbbell' => array('triceps brachii', 'pectoralis major', 'anterior deltoids', 'traps', 'back'),
                'incline_bench_barbell' => array('upper chest', 'shoulders', 'triceps'),
                'incline_bench_dumbbell' => array('upper chest', 'shoulders', 'triceps'),
                'decline_bench_barbell' => array('lower chest', 'shoulders', 'triceps', 'biceps'),
                'decline_bench_dumbbell' => array('lower chest', 'shoulders', 'triceps', 'biceps'),
                'dumbbells_flys_flat_bench' => array('chest', 'shoulders'),
                'dumbbells_flys_incline' => array('upper chest', 'shoulders'),

                'sit_ups' => array('abs'),
                'plank' => array('abs', 'gluteus maximus', 'external obliques', 'internal obliques'),
                'modified_plank' => array('abs', 'back', 'shoulders'),
                'crunches' => array('abs'),
                'jack_knife_on_ball' => array('lower abs', 'hip flexors', 'lower back'),
                'v_ups' => array('abs', 'back', 'quads', 'hamstrings'),
                'bicycle_crunches' => array('abs'),
                'butterfly_sit_ups' => array('core'),
                'back_extensions' => array('erector spinae'),
                'ab_roll_with_wheel' => array('abs','hips', 'shoulders', 'latissimus dorsi'),
                'superman' => array('glutes', 'hamstring', 'back'),

                'barbell_wrist_curl' => array('forearms'),
                'reverse_wrist_curl' => array('forearms'),
                'plate_pinch_hold' => array('forearms'),
                'wrist_roll' => array('forearms'),

                'kettle_bell_swing' => array('hips', 'glutes', 'hamstring', 'lats', 'abs', 'shoulders'),
                'one_hand_swing' => array('hamstring', 'gluteus', 'quadriceps', 'abs', 'oblique', 'rhomboid', 'trapezius', 'deltoid'),
                'two_hand_swing' => array('hamstring', 'gluteus', 'core'),
                'one_arm_clean_and_push_press' => array('calves', 'quadriceps', 'hamstrings', 'glutes', 'upper back'),
                'bottoms-up_clean' => array('core'),
                'windmill' => array('trapezius', 'lower back', 'deltoids', 'hamstrings', 'glutes'),
                'hand-to-hand_swing' => array('hamstring', 'gluteus', 'quadriceps', 'abs', 'oblique', 'rhomboid', 'trapezius', 'deltoid'),
                'one_legged_deadlift' => array('gluteus maximus', 'hamstrings', 'adductor magnus'),
                'turkish_get_up' => array('core'),

                'dead_lift' => array('gluteus maximus', 'hamstrings', 'trapezius', 'rhomboids', 'erector spinae'),
                'squats_with_weight' => array('quadriceps', 'hamstrings', 'glutes', 'calves'),
                'walking_lunges' => array('glutes', 'hamstrings', 'guadriceps'),
                'dead_lift_narrow_stance' => array('gluteus maximus', 'adductor magnus', 'quadriceps', 'calves', 'hamstrings'),
                'dead_lift_wide_stance' => array('gluteus maximus', 'adductor magnus', 'quadriceps', 'calves', 'hamstrings'),
                'dead_lift_sumo_stance' => array('gluteus maximus', 'hamstrings', 'traps', 'lower back', 'lats'),
                'squat_neutral_stance' => array('quadriceps', 'glutes', 'hamstring'),
                'squat_wide_stance' => array('quadriceps', 'glutes', 'hamstring', 'hip', 'adductors', 'spinal erectors',),
                'front_squat' => array('quadriceps', 'gluteus maximus', 'hips', 'soleus', 'hamstring'),
                'barbell_lunge' => array('glutes', 'hamstring', 'quadriceps', 'calves'),
                'dumbbell_lunge' => array('glutes', 'hamstring', 'quadriceps', 'calves'),
                'seated_leg_press' => array('quadriceps', 'hamstring', 'gluteus maximus', 'calves'),
                'hack_squat_press' => array('quadriceps', 'hamstrings', 'glutes'),
                'single_leg_press' => array('quadriceps', 'hamstring', 'gluteus maximus', 'calves'),
                'single_hack_squat_press' => array('quadriceps', 'hamstrings', 'glutes'),
                'leg_extension' => array('quads'),
                'single_leg_extension' => array('quads'),
                'seated_leg_curl' => array('hamstrings'),
                'stiff_legged_dead_lift' => array('hamstring', 'back', 'gluteus maximus', 'abs'),
                'good_mornings_barbell' => array('erector spinae'),
                'good_mornings_stiff_legged' => array('erector spinae'),
                'hyper_extension' => array('erector spinae', 'gluteus maximus', 'hamstrings', 'adductor magnus'),

                'run' => array('quadriceps', 'hamstrings', 'glutes', 'abs', 'calves', 'tibialis anterior', 'hip flexors'),
                'sprint' => array('hamstrings', 'calves', 'quadriceps', 'glutes', 'abs'),
                'mile_run' => array('hamstrings', 'calves', 'quadriceps', 'glutes', 'abs'),

                'military_press' => array('anterior medial', 'posterior deltoids', 'biceps', 'triceps brachii'),
                'seated_dumbbell_overhead_press' => array('deltoid', 'lateral', 'triceps brachii', 'trapezius', 'serratus anterior'),
                'standing_over_head_press' => array('deltoid', 'lateral', 'triceps brachii', 'trapezius', 'serratus anterior'),
                'hand_stand_press' => array('abs', 'hips', 'hamstrings', 'obliques'),
                'lateral_delt_side_raise' => array('anterior deltoid', 'serratus anterior', 'biceps brachii'),
                'bent_read_delt_raise' => array('posterior deltoid'),
                'seated_reverse_flys' => array('posterior deltoid', 'rhomboid', 'trapezius'),
                'cable_raise' => array('anterior deltoid', 'serratus anterior', 'biceps brachii'),
                'front_delt_raise' => array('anterior deltoid', 'serratus anterior', 'biceps brachii'),
                'shoulder_shrugs' => array('trapezius'),
                'high_pulls' => array('rhomboids', 'rear delts', 'mid-back', 'traps'),

                'tricep_extensions' => array('triceps', 'forearms', 'lats'),
                'dips' => array('chest', 'triceps', 'shoulders'),
                'tricep_push_downs' => array('triceps brachii', 'anconeus'),
                'over_head_cable_extensions' => array('triceps'),
                'single_arm_pull_over' => array('teres major', 'teres minor', 'trapezius', 'rhomboids'),
                'one_arm_cable_extension' => array('triceps'),
                'over_head_dumbbell_extension' => array('triceps'),
                'kick_backs' => array('triceps', 'rear deltoids')
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