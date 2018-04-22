@extends('layouts.app')

@section('head')
    @parent
@endsection
@section('navigation')
    @parent
@endsection
@section('content')
    @include('layouts.dashboard_nav')
    <div id="fitness">
        <div id="accordion">
            <div class="card">
                <div class="card-header" id="back">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Back
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="back" data-parent="#accordion">
                    <div class="card-body">
                        <div class="col">
                            <div class="row">
                                <div class="table-responsive d-block">
                                    <table class="table table-sm">
                                        <thead>
                                            <th>Exercise</th>
                                            <th>Add</th>
                                            <th>View</th>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td>Pull ups</td>
                                            <td><a href="{{ url('workout/form/pull_up') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/pull_up') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Neutral Grip Pull Up</td>
                                            <td><a href="{{ url('workout/form/neutral_grip_pull_up') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/neutral_grip_pull_up') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Towel Pull Up</td>
                                            <td><a href="{{ url('workout/form/towel_pull_up') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/towel_pull_up') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Cliff Hanger Pull Up</td>
                                            <td><a href="{{ url('workout/form/cliff_hanger_pull_up') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/cliff_hanger_pull_up') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Under Hand Pull Up</td>
                                            <td><a href="{{ url('workout/form/under_hand_pull_up') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/under_hand_pull_up') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Around The Worlds Pull Up</td>
                                            <td><a href="{{ url('workout/form/around_the_world_pull_up') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/around_the_world_pull_up') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Muscle Ups (Rings)</td>
                                            <td><a href="{{ url('workout/form/muscle_ups') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/muscle_ups') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Weighted Pull Up</td>
                                            <td><a href="{{ url('workout/form/weighted_pull_up') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/weighted_pull_up') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Single Arm Assist Pull Up</td>
                                            <td><a href="{{ url('workout/form/single_arm_assist_pull_up') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/single_arm_assist_pull_up') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Seated Rows</td>
                                            <td><a href="{{ url('workout/form/seated_rows') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/seated_rows') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Bent Over Rows</td>
                                            <td><a href="{{ url('workout/form/bent_over_rows') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/bent_over_rows') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Upright Rows</td>
                                            <td><a href="{{ url('workout/form/upright_rows') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/upright_rows') }}">View</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="biceps">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Biceps</button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="biceps" data-parent="#accordion">
                    <div class="card-body">
                        <div class="col">
                            <div class="row">
                                <div class="table-responsive d-block">
                                    <table class="table table-sm">
                                        <thead>
                                            <th>Exercise</th>
                                            <th>Add</th>
                                            <th>View</th>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td>Barbell Curls</td>
                                            <td><a href="{{ url('workout/form/barbell_curls') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/barbell_curls') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Dumbbell Curls</td>
                                            <td><a href="{{ url('workout/form/dumbbell_curls') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/dumbbell_curls') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Hammer Curls</td>
                                            <td><a href="{{ url('workout/form/hammer_curls') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/hammer_curls') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Reverse Curls</td>
                                            <td><a href="{{ url('workout/form/reverse_curls') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/reverse_curls') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Isolation Curls</td>
                                            <td><a href="{{ url('workout/form/isolation_curls') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/isolation_curls') }}">View</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="chest">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Chest
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="chest" data-parent="#accordion">
                    <div class="card-body">
                        <div class="col">
                            <div class="row">
                                <div class="table-responsive d-block">
                                    <table class="table table-sm">
                                        <thead>
                                            <th>Exercise</th>
                                            <th>Add</th>
                                            <th>View</th>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td>Bench Press</td>
                                            <td><a href="{{ url('workout/form/bench_press') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/bench_press') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Single Arm Push Up</td>
                                            <td><a href="{{ url('workout/form/single_arm_push_up') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/single_arm_push_up') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Flat Bench Press Barbell</td>
                                            <td><a href="{{ url('workout/form/flat_bench_press_barbell') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/flat_bench_press_barbell') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Flat Bench Press Dumbbell</td>
                                            <td><a href="{{ url('workout/form/flat_bench_press_dumbbell') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/flat_bench_press_dumbbell') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Incline Bench Barbell</td>
                                            <td><a href="{{ url('workout/form/incline_bench_barbell') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/incline_bench_barbell') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Incline Bench Dumbbell</td>
                                            <td><a href="{{ url('workout/form/incline_bench_dumbbell') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/incline_bench_dumbbell') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Decline Bench Barbell</td>
                                            <td><a href="{{ url('workout/form/decline_bench_barbell') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/decline_bench_barbell') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Decline Bench Dumbbell</td>
                                            <td><a href="{{ url('workout/form/decline_bench_dumbbell') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/decline_bench_dumbbell') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Dumbbells Flys Flat Bench</td>
                                            <td><a href="{{ url('workout/form/dumbbells_flys_flat_bench') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/dumbbells_flys_flat_bench') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Dumbbells Flys Incline</td>
                                            <td><a href="{{ url('workout/form/dumbbells_flys_incline') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/dumbbells_flys_incline') }}">View</a></td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="core">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Core
                        </button>
                    </h5>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="core" data-parent="#accordion">
                    <div class="card-body">
                        <div class="col">
                            <div class="row">
                                <div class="table-responsive d-block">
                                    <table class="table table-sm">
                                        <thead>
                                            <th>Exercise</th>
                                            <th>Add</th>
                                            <th>View</th>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td>Sit Ups</td>
                                            <td><a href="{{ url('workout/form/sit_ups') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/sit_ups') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Plank</td>
                                            <td><a href="{{ url('workout/form/plank') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/plank') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Modified Plank</td>
                                            <td><a href="{{ url('workout/form/modified_plank') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/modified_plank') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Crunches</td>
                                            <td><a href="{{ url('workout/form/crunches') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/crunches') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Jack Knife on Ball</td>
                                            <td><a href="{{ url('workout/form/jack_knife_on_ball') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/jack_knife_on_ball') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>V Ups</td>
                                            <td><a href="{{ url('workout/form/v_ups') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/v_ups') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Bicycle Crunches</td>
                                            <td><a href="{{ url('workout/form/bicycle_crunches') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/bicycle_crunches') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Butterfly Sit Ups</td>
                                            <td><a href="{{ url('workout/form/butterfly_sit_ups') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/butterfly_sit_ups') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Back Extensions</td>
                                            <td><a href="{{ url('workout/form/back_extensions') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/back_extensions') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Ab Roll With Wheel</td>
                                            <td><a href="{{ url('workout/form/ab_roll_with_wheel') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/ab_roll_with_wheel') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Superman</td>
                                            <td><a href="{{ url('workout/form/superman') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/superman') }}">View</a></td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="forearms">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Forearms
                        </button>
                    </h5>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="forearms" data-parent="#accordion">
                    <div class="card-body">
                        <div class="col">
                            <div class="row">
                                <div class="table-responsive d-block">
                                    <table class="table table-sm">
                                        <thead>
                                            <th>Exercise</th>
                                            <th>Add</th>
                                            <th>View</th>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td>Barbell Wrist Curl</td>
                                            <td><a href="{{ url('workout/form/barbell_wrist_curl') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/barbell_wrist_curl') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Reverse Wrist Curl</td>
                                            <td><a href="{{ url('workout/form/reverse_wrist_curl') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/reverse_wrist_curl') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Plate Pinch Hold</td>
                                            <td><a href="{{ url('workout/form/plate_pinch_hold') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/plate_pinch_hold') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Wrist Roll</td>
                                            <td><a href="{{ url('workout/form/wrist_roll') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/wrist_roll') }}">View</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="kettle_bell">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            Kettle Bell
                        </button>
                    </h5>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="kettle_bell" data-parent="#accordion">
                    <div class="card-body">
                        <div class="col">
                            <div class="row">
                                <div class="table-responsive d-block">
                                    <table class="table table-sm">
                                        <thead>
                                            <th>Exercise</th>
                                            <th>Add</th>
                                            <th>View</th>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td>Kettle Bell Swings</td>
                                            <td><a href="{{ url('workout/form/kettle_bell_swings') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/kettle_bell_swings') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>One Hand Swing</td>
                                            <td><a href="{{ url('workout/form/one_hand_swing') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/one_hand_swing') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Two Hand Swing</td>
                                            <td><a href="{{ url('workout/form/two_hand_swing') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/two_hand_swing') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>One Arm Clean and Push Press</td>
                                            <td><a href="{{ url('workout/form/one_arm_clean_and_push_press') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/one_arm_clean_and_push_press') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Bottoms-Up Clean</td>
                                            <td><a href="{{ url('workout/form/bottoms_up_clean') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/bottoms_up_clean') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Windmill</td>
                                            <td><a href="{{ url('workout/form/windmill') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/windmill') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Front Squat</td>
                                            <td><a href="{{ url('workout/form/front_squat') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/front_squat') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Hand-To-Hand Swing</td>
                                            <td><a href="{{ url('workout/form/hand_to_hand_swing') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/hand_to_hand_swing') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>One Legged Deadlift</td>
                                            <td><a href="{{ url('workout/form/one_legged_deadlift') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/one_legged_deadlift') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Turkish Get Up</td>
                                            <td><a href="{{ url('workout/form/turkish_get_up') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/turkish_get_up') }}">View</a></td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="leg">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">Leg</button>
                    </h5>
                </div>
                <div id="collapseSeven" class="collapse" aria-labelledby="leg" data-parent="#accordion">
                    <div class="card-body">
                        <div class="col">
                            <div class="row">
                                <div class="table-responsive d-block">
                                    <table class="table table-sm">
                                        <thead>
                                            <th>Exercise</th>
                                            <th>Add</th>
                                            <th>View</th>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td>Dead Lift</td>
                                            <td><a href="{{ url('workout/form/dead_lift') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/dead_lift') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Squats With Weight</td>
                                            <td><a href="{{ url('workout/form/squats_with_weight') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/squats_with_weight') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Walking Lunges</td>
                                            <td><a href="{{ url('workout/form/walking_lunges') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/walking_lunges') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Dead Lift Narrow Stance</td>
                                            <td><a href="{{ url('workout/form/dead_lift_narrow_stance') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/dead_lift_narrow_stance') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Dead Lift Wide Stance</td>
                                            <td><a href="{{ url('workout/form/dead_lift_wide_stance') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/dead_lift_wide_stance') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Dead Lift Sumo Stance</td>
                                            <td><a href="{{ url('workout/form/dead_lift_sumo_stance') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/dead_lift_sumo_stance') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Squat Neutral Stance</td>
                                            <td><a href="{{ url('workout/form/squat_neutral_stance') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/squat_neutral_stance') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Squat Wide Stance</td>
                                            <td><a href="{{ url('workout/form/squat_wide_stance') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/squat_wide_stance') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Front Squat</td>
                                            <td><a href="{{ url('workout/form/front_squat') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/front_squat') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Barbell Lunge</td>
                                            <td><a href="{{ url('workout/form/barbell_lunge') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/barbell_lunge') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Dumbbell Lunge</td>
                                            <td><a href="{{ url('workout/form/dumbbell_lunge') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/dumbbell_lunge') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Seated Leg Press</td>
                                            <td><a href="{{ url('workout/form/seated_leg_press') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/seated_leg_press') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Hack Squat Press</td>
                                            <td><a href="{{ url('workout/form/hack_squat_press') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/hack_squat_press') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Single Leg Press</td>
                                            <td><a href="{{ url('workout/form/single_leg_press') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/single_leg_press') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Single Hack Squat Press</td>
                                            <td><a href="{{ url('workout/form/single_hack_squat_press') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/single_hack_squat_press') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Leg Extension</td>
                                            <td><a href="{{ url('workout/form/leg_extension') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/leg_extension') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Single Leg Extension</td>
                                            <td><a href="{{ url('workout/form/single_leg_extension') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/single_leg_extension') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Seated Leg Curl</td>
                                            <td><a href="{{ url('workout/form/seated_leg_curl') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/seated_leg_curl') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Stiff Legged Dead Lift</td>
                                            <td><a href="{{ url('workout/form/stiff_legged_dead_lift') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/stiff_legged_dead_lift') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Good Mornings Barbell</td>
                                            <td><a href="{{ url('workout/form/good_mornings_barbel') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/good_mornings_barbel') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Good Mornings Stiff Legged</td>
                                            <td><a href="{{ url('workout/form/good_mornings_stiff_legged') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/good_mornings_stiff_legged') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Hyper Extension</td>
                                            <td><a href="{{ url('workout/form/hyper_extension') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/hyper_extension') }}">View</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="running">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">Running</button>
                    </h5>
                </div>
                <div id="collapseEight" class="collapse" aria-labelledby="running" data-parent="#accordion">
                    <div class="card-body">
                        <div class="col">
                            <div class="row">
                                <div class="table-responsive d-block">
                                    <table class="table table-sm">
                                        <thead>
                                            <th>Exercise</th>
                                            <th>Add</th>
                                            <th>View</th>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td>Run</td>
                                            <td><a href="{{ url('workout/form/run') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/run') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Sprint</td>
                                            <td><a href="{{ url('workout/form/sprint') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/sprint') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Mile Run</td>
                                            <td><a href="{{ url('workout/form/mile_run') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/mile_run') }}">View</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="shoulder">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                            Shoulder
                        </button>
                    </h5>
                </div>
                <div id="collapseNine" class="collapse" aria-labelledby="shoulder" data-parent="#accordion">
                    <div class="card-body">
                        <div class="col">
                            <div class="row">
                                <div class="table-responsive d-block">
                                    <table class="table table-sm">
                                        <thead>
                                            <th>Exercise</th>
                                            <th>Add</th>
                                            <th>View</th>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td>Military Press</td>
                                            <td><a href="{{ url('workout/form/military_press') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/military_press') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Seated Dumbbell Overhead Press</td>
                                            <td><a href="{{ url('workout/form/seated_dumbbell_overhead_press') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/seated_dumbbell_overhead_press') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Standing Over Head Press</td>
                                            <td><a href="{{ url('workout/form/standing_over_head_press') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/standing_over_head_press') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Hand Stand Press</td>
                                            <td><a href="{{ url('workout/form/hand_stand_press') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/hand_stand_press') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Lateral Delt Side Raise</td>
                                            <td><a href="{{ url('workout/form/lateral_delt_side_raise') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/lateral_delt_side_raise') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Bent Read Delt Raise</td>
                                            <td><a href="{{ url('workout/form/bent_read_delt_raise') }}">Add</a></td>
                                            <td><a href="{{ url('workout/form/bent_read_delt_raise') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Seated Reverse Flys</td>
                                            <td><a href="{{ url('workout/form/seated_reverse_flys') }}">Add</a></td>
                                            <td><a href="{{ url('workout/form/seated_reverse_flys') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Cable Raise</td>
                                            <td><a href="{{ url('workout/form/cable_raise') }}">Add</a></td>
                                            <td><a href="{{ url('workout/form/cable_raise') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Front Delt Raise</td>
                                            <td><a href="{{ url('workout/form/front_delt_raise') }}">Add</a></td>
                                            <td><a href="{{ url('workout/form/front_delt_raise') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Shoulder Shrugs</td>
                                            <td><a href="{{ url('workout/form/shoulder_shrugs') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/shoulder_shrugs') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>High Pulls</td>
                                            <td><a href="{{ url('workout/form/high_pulls') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/high_pulls') }}">View</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="triceps">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">Triceps</button>
                    </h5>
                </div>
                <div id="collapseTen" class="collapse" aria-labelledby="triceps" data-parent="#accordion">
                    <div class="card-body">
                        <div class="col">
                            <div class="row">
                                <div class="table-responsive d-block">
                                    <table class="table table-sm">
                                        <thead>
                                            <th>Exercise</th>
                                            <th>Add</th>
                                            <th>View</th>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td>Tricep Extensions</td>
                                            <td><a href="{{ url('workout/form/tricep_extensions') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/tricep_extensions') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Dips</td>
                                            <td><a href="{{ url('workout/form/dips') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/dips') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Tricep Push Downs</td>
                                            <td><a href="{{ url('workout/form/tricep_push_downs') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/tricep_push_downs') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Over Head Cable Extensions</td>
                                            <td><a href="{{ url('workout/form/over_head_cable_extensions') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/over_head_cable_extensions') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Single Arm Pull Over</td>
                                            <td><a href="{{ url('workout/form/single_arm_pull_over') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/single_arm_pull_over') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>One Arm Cable Extension</td>
                                            <td><a href="{{ url('workout/form/one_arm_cable_extension') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/one_arm_cable_extension') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Over Head Dumbbell Extension</td>
                                            <td><a href="{{ url('workout/form/over_head_dumbbell_extensions') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/over_head_dumbbell_extensions') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Kick Backs</td>
                                            <td><a href="{{ url('workout/form/kick_backs') }}">Add</a></td>
                                            <td><a href="{{ url('workout/edit/kick_backs') }}">View</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('footer')
    @parent
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">workouts</li>
        </ol>
    </nav>
@endsection