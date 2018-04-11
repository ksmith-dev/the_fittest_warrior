@extends('layouts.app')

@section('head')
    @parent
        <title>{{ config('app.name', 'The Fittest Warrior') }} | Home</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
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
                                    <table class="table table-sm table-hover">
                                        <thead>
                                        <th>Exercise</th>
                                        <th>Add</th>
                                        <th>Status</th>
                                        </thead>

                                        <tbody>
                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Pull ups</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/pull_up') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    @if(!empty($workouts['pull_up']['repetitions']))
                                                        <div class="progress-bar {{ $workouts['pull_up']['status'] }}" role="progressbar" style="width: {{ $workouts['pull_up']['percentage'] }}%" aria-valuenow="{{ $workouts['pull_up']['repetitions'] }}" aria-valuemin="0" aria-valuemax="10">{{ $workouts['pull_up']['repetitions'] }}</div>
                                                    @else
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60% mid</div>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Neutral Grip Pull Up</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/neutral_grip_pull_up') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Towel Pull Up</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/towel_pull_up') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80% high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Cliff Hanger Pull Up</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/cliff_hanger_pull_up') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Under Hand Pull Up</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/under_hand_pull_up') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Around The Worlds Pull Up</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/around_the_world_pull_up') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50% mid</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Muscle Ups (Rings)</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/muscle_ups') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Weighted Pull Up</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/weighted_pull_up') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Single Arm Assist Pull Up</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/single_arm_assist_pull_up') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Seated Rows</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/seated_rows') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Bent Over Rows</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/bent_over_rows') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Upright Rows</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/upright_rows') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
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
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Biceps
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="biceps" data-parent="#accordion">
                    <div class="card-body">
                        <div class="col">
                            <div class="row">
                                <div class="table-responsive d-block">
                                    <table class="table table-sm table-hover">
                                        <thead>
                                        <th>Exercise</th>
                                        <th>Add</th>
                                        <th>Status</th>
                                        </thead>

                                        <tbody>
                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Barbell Curls</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/barbell_curls') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60% mid</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Dumbbell Curls</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/dumbbell_curls') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Hammer Curls</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/hammer_curls') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80% high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Reverse Curls</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/reverse_curls') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Isolation Curls</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/isolation_curls') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
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
                                    <table class="table table-sm table-hover">
                                        <thead>
                                        <th>Exercise</th>
                                        <th>Add</th>
                                        <th>Status</th>
                                        </thead>

                                        <tbody>
                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Bench Press</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/bench_press') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60% mid</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Single Arm Push Up</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/single_arm_push_up') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Flat Bench Press Barbell</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/flat_bench_press_barbell') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80% high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Flat Bench Press Dumbbell</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/flat_bench_press_dumbbell') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Incline Bench Barbell</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/incline_bench_barbell') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Incline Bench Dumbbell</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/incline_bench_dumbbell') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Decline Bench Barbell</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/decline_bench_barbell') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Decline Bench Dumbbell</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/decline_bench_dumbbell') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Dumbbells Flys Flat Bench</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/dumbbells_flys_flat_bench') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Dumbbells Flys Incline</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/dumbbells_flys_incline') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
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
                                    <table class="table table-sm table-hover">
                                        <thead>
                                        <th>Exercise</th>
                                        <th>Add</th>
                                        <th>Status</th>
                                        </thead>

                                        <tbody>
                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Sit Ups</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/sit_ups') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60% mid</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Plank</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/plank') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Modified Plank</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/modified_plank') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80% high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Crunches</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/crunches') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Jack Knife on Ball</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/jack_knife_on_ball') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>V Ups</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/v_ups') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Bicycle Crunches</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/bicycle_crunches') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Butterfly Sit Ups</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/butterfly_sit_ups') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Back Extensions</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/back_extensions') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Ab Roll With Wheel</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/ab_roll_with_wheel') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Superman</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/superman') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
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
                                    <table class="table table-sm table-hover">
                                        <thead>
                                        <th>Exercise</th>
                                        <th>Add</th>
                                        <th>Status</th>
                                        </thead>

                                        <tbody>
                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Barbell Wrist Curl</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/barbell_wrist_curl') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60% mid</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Reverse Wrist Curl</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/reverse_wrist_curl') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Plate Pinch Hold</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/plate_pinch_hold') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80% high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Wrist Roll</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/wrist_roll') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
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
                                    <table class="table table-sm table-hover">
                                        <thead>
                                        <th>Exercise</th>
                                        <th>Add</th>
                                        <th>Status</th>
                                        </thead>

                                        <tbody>
                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Kettle Bell Swings</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/kettle_bell_swings') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60% mid</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>One Hand Swing</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/one_hand_swing') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Two Hand Swing</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/two_hand_swing') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80% high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>One Arm Clean and Push Press</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/one_arm_clean_and_push_press') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Bottoms-Up Clean</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/bottoms-up_clean') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Windmill</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/windmill') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Front Squat</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/front_squat') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Hand-To-Hand Swing</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/hand_to_hand_swing') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>One Legged Deadlift</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/one_legged_deadlift') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Turkish Get Up</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/turkish_get_up') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
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
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            Leg
                        </button>
                    </h5>
                </div>
                <div id="collapseSeven" class="collapse" aria-labelledby="leg" data-parent="#accordion">
                    <div class="card-body">
                        <div class="col">
                            <div class="row">
                                <div class="table-responsive d-block">
                                    <table class="table table-sm table-hover">
                                        <thead>
                                        <th>Exercise</th>
                                        <th>Add</th>
                                        <th>Status</th>
                                        </thead>

                                        <tbody>
                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Dead Lift</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/dead_lift') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60% mid</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Squats With Weight</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/squats_with_weight') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Walking Lunges</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/walking_lunges') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80% high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Dead Lift Narrow Stance</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/dead_lift_narrow_stance') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Dead Lift Wide Stance</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/dead_lift_wide_stance') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Dead Lift Sumo Stance</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/dead_lift_sumo_stance') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Squat Neutral Stance</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/squat_neutral_stance') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Squat Wide Stance</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/squat_wide_stance') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Front Squat</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/front_squat') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Barbell Lunge</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/barbell_lunge') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Dumbbell Lunge</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/dumbbell_lunge') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Seated Leg Press</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/seated_leg_press') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Hack Squat Press</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/hack_squat_press') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Single Leg Press</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/single_leg_press') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Single Hack Squat Press</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/single_hack_squat_press') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Leg Extension</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/leg_extension') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Single Leg Extension</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/single_leg_extension') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Seated Leg Curl</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/seated_leg_curl') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Stiff Legged Dead Lift</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/stiff_legged_dead_lift') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Good Mornings Barbell</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/good_mornings_barbel') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Good Mornings Stiff Legged</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/good_mornings_stiff_legged') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Hyper Extension</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/hyper_extension') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                                </div>
                                            </td>
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
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                            Running
                        </button>
                    </h5>
                </div>
                <div id="collapseEight" class="collapse" aria-labelledby="running" data-parent="#accordion">
                    <div class="card-body">
                        <div class="col">
                            <div class="row">
                                <div class="table-responsive d-block">
                                    <table class="table table-sm table-hover">
                                        <thead>
                                        <th>Exercise</th>
                                        <th>Add</th>
                                        <th>Status</th>
                                        </thead>

                                        <tbody>
                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Run</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/run') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60% mid</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Sprint</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/sprint') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Mile Run</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/mile_run') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80% high</div>
                                                </div>
                                            </td>
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
                                    <table class="table table-sm table-hover">
                                        <thead>
                                        <th>Exercise</th>
                                        <th>Add</th>
                                        <th>Status</th>
                                        </thead>

                                        <tbody>
                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Military Press</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/military_press') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60% mid</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Seated Dumbbell Overhead Press</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/seated_dumbbell_overhead_press') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Standing Over Head Press</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/standing_over_head_press') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80% high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Hand Stand Press</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/hand_stand_press') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Lateral Delt Side Raise</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/lateral_delt_side_raise') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Bent Read Delt Raise</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/bent_read_delt_raise') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Seated Reverse Flys</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/seated_reverse_flys') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Cable Raise</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/cable_raise') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Front Delt Raise</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/front_delt_raise') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Shoulder Shrugs</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/shoulder_shrugs') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>High Pulls</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/high_pulls') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
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
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                            Triceps
                        </button>
                    </h5>
                </div>
                <div id="collapseTen" class="collapse" aria-labelledby="triceps" data-parent="#accordion">
                    <div class="card-body">
                        <div class="col">
                            <div class="row">
                                <div class="table-responsive d-block">
                                    <table class="table table-sm table-hover">
                                        <thead>
                                        <th>Exercise</th>
                                        <th>Add</th>
                                        <th>Status</th>
                                        </thead>

                                        <tbody>
                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Tricep Extensions</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/tricep_extensions') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60% mid</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Dips</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/dips') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Tricep Push Downs</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/tricep_push_downs') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80% high</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Over Head Cable Extensions</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/over_head_cable_extensions') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Single Arm Pull Over</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/single_arm_pull_over') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>One Arm Cable Extension</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/one_arm_cable_extension') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Over Head Dumbbell Extension</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/over_head_dumbbell_extensions') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class='clickable-row' data-href='/dashboard/fitness/'>
                                            <td>Kick Backs</td>
                                            <td><a href="{{ url('workout/form/strength/lifting/kick_backs') }}">Add</a></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                                </div>
                                            </td>
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
    <script src="{{ asset('js/dashboard_charts.js') }}"></script>
@endsection