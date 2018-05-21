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
                                            <td><a href="{{ url('form/workout/0/pull_up') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/pull_up') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Neutral Grip Pull Up</td>
                                            <td><a href="{{ url('form/workout/0/neutral_grip_pull_up') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/neutral_grip_pull_up') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Towel Pull Up</td>
                                            <td><a href="{{ url('form/workout/0/towel_pull_up') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/towel_pull_up') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Cliff Hanger Pull Up</td>
                                            <td><a href="{{ url('form/workout/0/cliff_hanger_pull_up') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/cliff_hanger_pull_up') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Under Hand Pull Up</td>
                                            <td><a href="{{ url('form/workout/0/under_hand_pull_up') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/under_hand_pull_up') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Around The Worlds Pull Up</td>
                                            <td><a href="{{ url('form/workout/0/around_the_world_pull_up') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/around_the_world_pull_up') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Muscle Ups (Rings)</td>
                                            <td><a href="{{ url('form/workout/0/muscle_ups') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/muscle_ups') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Weighted Pull Up</td>
                                            <td><a href="{{ url('form/workout/0/weighted_pull_up') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/weighted_pull_up') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Single Arm Assist Pull Up</td>
                                            <td><a href="{{ url('form/workout/0/single_arm_assist_pull_up') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/single_arm_assist_pull_up') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Seated Rows</td>
                                            <td><a href="{{ url('form/workout/0/seated_rows') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/seated_rows') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Bent Over Rows</td>
                                            <td><a href="{{ url('form/workout/0/bent_over_rows') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/bent_over_rows') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Upright Rows</td>
                                            <td><a href="{{ url('form/workout/0/upright_rows') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/upright_rows') }}">View</a></td>
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
                                            <td><a href="{{ url('form/workout/0/barbell_curls') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/barbell_curls') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Dumbbell Curls</td>
                                            <td><a href="{{ url('form/workout/0/dumbbell_curls') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/dumbbell_curls') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Hammer Curls</td>
                                            <td><a href="{{ url('form/workout/0/hammer_curls') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/hammer_curls') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Reverse Curls</td>
                                            <td><a href="{{ url('form/workout/0/reverse_curls') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/reverse_curls') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Isolation Curls</td>
                                            <td><a href="{{ url('form/workout/0/isolation_curls') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/isolation_curls') }}">View</a></td>
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
                                            <td><a href="{{ url('form/workout/0/bench_press') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/bench_press') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Single Arm Push Up</td>
                                            <td><a href="{{ url('form/workout/0/single_arm_push_up') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/single_arm_push_up') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Flat Bench Press Barbell</td>
                                            <td><a href="{{ url('form/workout/0/flat_bench_press_barbell') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/flat_bench_press_barbell') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Flat Bench Press Dumbbell</td>
                                            <td><a href="{{ url('form/workout/0/flat_bench_press_dumbbell') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/flat_bench_press_dumbbell') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Incline Bench Barbell</td>
                                            <td><a href="{{ url('form/workout/0/incline_bench_barbell') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/incline_bench_barbell') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Incline Bench Dumbbell</td>
                                            <td><a href="{{ url('form/workout/0/incline_bench_dumbbell') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/incline_bench_dumbbell') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Decline Bench Barbell</td>
                                            <td><a href="{{ url('form/workout/0/decline_bench_barbell') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/decline_bench_barbell') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Decline Bench Dumbbell</td>
                                            <td><a href="{{ url('form/workout/0/decline_bench_dumbbell') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/decline_bench_dumbbell') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Dumbbells Flys Flat Bench</td>
                                            <td><a href="{{ url('form/workout/0/dumbbells_flys_flat_bench') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/dumbbells_flys_flat_bench') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Dumbbells Flys Incline</td>
                                            <td><a href="{{ url('form/workout/0/dumbbells_flys_incline') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/dumbbells_flys_incline') }}">View</a></td>
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
                                            <td><a href="{{ url('form/workout/0/sit_ups') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/sit_ups') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Plank</td>
                                            <td><a href="{{ url('form/workout/0/plank') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/plank') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Modified Plank</td>
                                            <td><a href="{{ url('form/workout/0/modified_plank') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/modified_plank') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Crunches</td>
                                            <td><a href="{{ url('form/workout/0/crunches') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/crunches') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Jack Knife on Ball</td>
                                            <td><a href="{{ url('form/workout/0/jack_knife_on_ball') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/jack_knife_on_ball') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>V Ups</td>
                                            <td><a href="{{ url('form/workout/0/v_ups') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/v_ups') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Bicycle Crunches</td>
                                            <td><a href="{{ url('form/workout/0/bicycle_crunches') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/bicycle_crunches') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Butterfly Sit Ups</td>
                                            <td><a href="{{ url('form/workout/0/butterfly_sit_ups') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/butterfly_sit_ups') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Back Extensions</td>
                                            <td><a href="{{ url('form/workout/0/back_extensions') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/back_extensions') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Ab Roll With Wheel</td>
                                            <td><a href="{{ url('form/workout/0/ab_roll_with_wheel') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/ab_roll_with_wheel') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Superman</td>
                                            <td><a href="{{ url('form/workout/0/superman') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/superman') }}">View</a></td>
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
                                            <td><a href="{{ url('form/workout/0/barbell_wrist_curl') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/barbell_wrist_curl') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Reverse Wrist Curl</td>
                                            <td><a href="{{ url('form/workout/0/reverse_wrist_curl') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/reverse_wrist_curl') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Plate Pinch Hold</td>
                                            <td><a href="{{ url('form/workout/0/plate_pinch_hold') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/plate_pinch_hold') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Wrist Roll</td>
                                            <td><a href="{{ url('form/workout/0/wrist_roll') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/wrist_roll') }}">View</a></td>
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
                                            <td><a href="{{ url('form/workout/0/kettle_bell_swings') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/kettle_bell_swings') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>One Hand Swing</td>
                                            <td><a href="{{ url('form/workout/0/one_hand_swing') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/one_hand_swing') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Two Hand Swing</td>
                                            <td><a href="{{ url('form/workout/0/two_hand_swing') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/two_hand_swing') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>One Arm Clean and Push Press</td>
                                            <td><a href="{{ url('form/workout/0/one_arm_clean_and_push_press') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/one_arm_clean_and_push_press') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Bottoms-Up Clean</td>
                                            <td><a href="{{ url('form/workout/0/bottoms_up_clean') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/bottoms_up_clean') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Windmill</td>
                                            <td><a href="{{ url('form/workout/0/windmill') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/windmill') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Front Squat</td>
                                            <td><a href="{{ url('form/workout/0/front_squat') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/front_squat') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Hand-To-Hand Swing</td>
                                            <td><a href="{{ url('form/workout/0/hand_to_hand_swing') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/hand_to_hand_swing') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>One Legged Deadlift</td>
                                            <td><a href="{{ url('form/workout/0/one_legged_deadlift') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/one_legged_deadlift') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Turkish Get Up</td>
                                            <td><a href="{{ url('form/workout/0/turkish_get_up') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/turkish_get_up') }}">View</a></td>
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
                                            <td><a href="{{ url('form/workout/0/dead_lift') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/dead_lift') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Squats With Weight</td>
                                            <td><a href="{{ url('form/workout/0/squats_with_weight') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/squats_with_weight') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Walking Lunges</td>
                                            <td><a href="{{ url('form/workout/0/walking_lunges') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/walking_lunges') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Dead Lift Narrow Stance</td>
                                            <td><a href="{{ url('form/workout/0/dead_lift_narrow_stance') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/dead_lift_narrow_stance') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Dead Lift Wide Stance</td>
                                            <td><a href="{{ url('form/workout/0/dead_lift_wide_stance') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/dead_lift_wide_stance') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Dead Lift Sumo Stance</td>
                                            <td><a href="{{ url('form/workout/0/dead_lift_sumo_stance') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/dead_lift_sumo_stance') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Squat Neutral Stance</td>
                                            <td><a href="{{ url('form/workout/0/squat_neutral_stance') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/squat_neutral_stance') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Squat Wide Stance</td>
                                            <td><a href="{{ url('form/workout/0/squat_wide_stance') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/squat_wide_stance') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Front Squat</td>
                                            <td><a href="{{ url('form/workout/0/front_squat') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/front_squat') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Barbell Lunge</td>
                                            <td><a href="{{ url('form/workout/0/barbell_lunge') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/barbell_lunge') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Dumbbell Lunge</td>
                                            <td><a href="{{ url('form/workout/0/dumbbell_lunge') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/dumbbell_lunge') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Seated Leg Press</td>
                                            <td><a href="{{ url('form/workout/0/seated_leg_press') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/seated_leg_press') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Hack Squat Press</td>
                                            <td><a href="{{ url('form/workout/0/hack_squat_press') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/hack_squat_press') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Single Leg Press</td>
                                            <td><a href="{{ url('form/workout/0/single_leg_press') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/single_leg_press') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Single Hack Squat Press</td>
                                            <td><a href="{{ url('form/workout/0/single_hack_squat_press') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/single_hack_squat_press') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Leg Extension</td>
                                            <td><a href="{{ url('form/workout/0/leg_extension') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/leg_extension') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Single Leg Extension</td>
                                            <td><a href="{{ url('form/workout/0/single_leg_extension') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/single_leg_extension') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Seated Leg Curl</td>
                                            <td><a href="{{ url('form/workout/0/seated_leg_curl') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/seated_leg_curl') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Stiff Legged Dead Lift</td>
                                            <td><a href="{{ url('form/workout/0/stiff_legged_dead_lift') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/stiff_legged_dead_lift') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Good Mornings Barbell</td>
                                            <td><a href="{{ url('form/workout/0/good_mornings_barbel') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/good_mornings_barbel') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Good Mornings Stiff Legged</td>
                                            <td><a href="{{ url('form/workout/0/good_mornings_stiff_legged') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/good_mornings_stiff_legged') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Hyper Extension</td>
                                            <td><a href="{{ url('form/workout/0/hyper_extension') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/hyper_extension') }}">View</a></td>
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
                                            <td><a href="{{ url('form/workout/0/run') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/run') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Sprint</td>
                                            <td><a href="{{ url('form/workout/0/sprint') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/sprint') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Mile Run</td>
                                            <td><a href="{{ url('form/workout/0/mile_run') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/mile_run') }}">View</a></td>
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
                                            <td><a href="{{ url('form/workout/0/military_press') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/military_press') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Seated Dumbbell Overhead Press</td>
                                            <td><a href="{{ url('form/workout/0/seated_dumbbell_overhead_press') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/seated_dumbbell_overhead_press') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Standing Over Head Press</td>
                                            <td><a href="{{ url('form/workout/0/standing_over_head_press') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/standing_over_head_press') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Hand Stand Press</td>
                                            <td><a href="{{ url('form/workout/0/hand_stand_press') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/hand_stand_press') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Lateral Delt Side Raise</td>
                                            <td><a href="{{ url('form/workout/0/lateral_delt_side_raise') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/lateral_delt_side_raise') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Bent Read Delt Raise</td>
                                            <td><a href="{{ url('form/workout/0/bent_read_delt_raise') }}">Add</a></td>
                                            <td><a href="{{ url('form/workout/0/bent_read_delt_raise') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Seated Reverse Flys</td>
                                            <td><a href="{{ url('form/workout/0/seated_reverse_flys') }}">Add</a></td>
                                            <td><a href="{{ url('form/workout/0/seated_reverse_flys') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Cable Raise</td>
                                            <td><a href="{{ url('form/workout/0/cable_raise') }}">Add</a></td>
                                            <td><a href="{{ url('form/workout/0/cable_raise') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Front Delt Raise</td>
                                            <td><a href="{{ url('form/workout/0/front_delt_raise') }}">Add</a></td>
                                            <td><a href="{{ url('form/workout/0/front_delt_raise') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Shoulder Shrugs</td>
                                            <td><a href="{{ url('form/workout/0/shoulder_shrugs') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/shoulder_shrugs') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>High Pulls</td>
                                            <td><a href="{{ url('form/workout/0/high_pulls') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/high_pulls') }}">View</a></td>
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
                                            <td><a href="{{ url('form/workout/0/tricep_extensions') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/tricep_extensions') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Dips</td>
                                            <td><a href="{{ url('form/workout/0/dips') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/dips') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Tricep Push Downs</td>
                                            <td><a href="{{ url('form/workout/0/tricep_push_downs') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/tricep_push_downs') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Over Head Cable Extensions</td>
                                            <td><a href="{{ url('form/workout/0/over_head_cable_extensions') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/over_head_cable_extensions') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Single Arm Pull Over</td>
                                            <td><a href="{{ url('form/workout/0/single_arm_pull_over') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/single_arm_pull_over') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>One Arm Cable Extension</td>
                                            <td><a href="{{ url('form/workout/0/one_arm_cable_extension') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/one_arm_cable_extension') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Over Head Dumbbell Extension</td>
                                            <td><a href="{{ url('form/workout/0/over_head_dumbbell_extensions') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/over_head_dumbbell_extensions') }}">View</a></td>
                                        </tr>

                                        <tr>
                                            <td>Kick Backs</td>
                                            <td><a href="{{ url('form/workout/0/kick_backs') }}">Add</a></td>
                                            <td><a href="{{ url('view/workout/0/kick_backs') }}">View</a></td>
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