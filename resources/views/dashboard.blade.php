@extends('layouts.app')

@section('head')
    @parent
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
@endsection
@section('navigation')
    @parent
@endsection
@section('content')
    @include('layouts.dashboard_nav')
    <div id="dashboard">
        <div class="col">
            <div class="row">
                <div class="spacer-50"></div>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <h1>{{ strtoupper($params['user']->first_name) }} {{ strtoupper($params['user']->last_name) }}</h1>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="spacer-50"></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3 class="text-center">POWER</h3>
                <canvas id="overall-power" class="dial"></canvas>
            </div>
            <div class="col">
                <h3 class="text-center">ENDURANCE</h3>
                <canvas id="overall-endurance" class="dial"></canvas>
            </div>
            <div class="col">
                <h3 class="text-center">SPEED</h3>
                <canvas id="overall-speed" class="dial"></canvas>
            </div>
        </div>
        <div class="row spacer-100"></div>
        <div class="row">
            <div class="col">
                <div class="table-responsive d-none d-sm-block">
                    <h4>Best Weight</h4>
                    <table class="table table-sm table-hover">
                        <thead>
                        <tr>
                            <th scope="col">WORKOUT</th>
                            <th scope="col">DATE CREATED</th>
                            <th scope="col">DURATION</th>
                            <th scope="col">WEIGHT</th>
                            <th scope="col">CALORIES</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($best_weight as $type => $workout)
                            <tr class="clickable-row" data-href="/workout/form/{{ $type }}/{{ $workout['id'] }}" data-toggle="tooltip" data-placement="top" title="click to edit">
                                <th scope="row">{{ $type }}</th>
                                <td>{{ $workout['created_at'] }}</td>
                                <td>{{ $workout['duration'] }}</td>
                                <td>{{ $workout['weight'] }}</td>
                                <td>{{ number_format($workout['calories_burned'], 2, '.', ',') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="spacer-20"></div>
                <div class="table-responsive d-none d-sm-block">
                    <h4>Best Time</h4>
                    <table class="table table-sm table-hover">
                        <thead>
                        <tr>
                            <th scope="col">WORKOUT</th>
                            <th scope="col">DATE CREATED</th>
                            <th scope="col">DURATION</th>
                            <th scope="col">WEIGHT</th>
                            <th scope="col">CALORIES</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($best_time as $type => $workout)
                            <tr class="clickable-row" data-href="/workout/form/{{ $type }}/{{ $workout['id'] }}" data-toggle="tooltip" data-placement="top" title="click to edit">
                                <th scope="row">{{ $type }}</th>
                                <td>{{ $workout['created_at'] }}</td>
                                <td>{{ $workout['duration'] }}</td>
                                <td>{{ $workout['weight'] }}</td>
                                <td>{{ number_format($workout['calories_burned'], 2, '.', ',') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row spacer-100"></div>
        <div class="row">
            <div class="col">
                <div class="table-responsive d-none d-sm-block">
                    <h4>Latest Results</h4>
                    <table class="table table-sm table-hover">
                        <thead>
                        <tr>
                            <th scope="col">TRAINING</th>
                            <th scope="col">WORKOUT</th>
                            <th scope="col">DATE CREATED</th>
                            <th scope="col">DURATION</th>
                            <th scope="col">WEIGHT</th>
                            <th scope="col">CALORIES</th>
                        </tr>
                        <thead>
                        <tbody>
                        @foreach($workouts as $workout)
                            @if($workout['user_id'] == $params['user']->id)
                                <tr class="clickable-row" data-href="/workout/form/{{ $workout['workout_type'] }}/{{ $workout['id'] }}" data-toggle="tooltip" data-placement="top" title="click to edit">
                                    <th scope="row">{{ str_replace('_', ' ', $workout['training_type']) }}</th>
                                    <th>{{ str_replace('_', ' ', $workout['workout_type']) }}</th>
                                    <td>{{ date('d-m-Y', strtotime($workout['created_at'])) }}</td>
                                    <td>{{ $workout['duration'] }}</td>
                                    <td>{{ $workout['weight'] }} LBS</td>
                                    <td>{{ number_format($workout['calories_burned'], 2, '.', ',') }}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="spacer-100"></div>
        <div class="row">
            <div class="col" style="padding-right: 50px;">
                <h3 class="text-center">PROGRESS</h3>
                <canvas id="progress"></canvas>
            </div>
        </div>
        <div class="spacer-100"></div>
    </div>
@endsection
@section('footer')
    @parent
        <script src="{{ asset('js/dashboard_charts.js') }}"></script>
@endsection