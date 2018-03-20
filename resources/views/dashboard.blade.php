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
    <div class="col">
        <div class="row">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link  active" href="{{ url('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('fitness') }}">Fitness</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('nutrition') }}">Nutrition</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('health') }}">Health</a>
                </li>
            </ul>
        </div>
    </div>
    <div id="dashboard">
        <a href="{{ url('workout/report/form') }}" class="btn btn-secondary" role="button">add workout</a>
        <div class="col">
            <div class="row">
                <div class="spacer-50"></div>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <h1>{{ strtoupper($member->first_name) }} {{ strtoupper($member->last_name) }}</h1>
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
                <div class="table-responsive d-block d-sm-none">
                    <h4>Personal Best</h4>
                    <table class="table table-sm table-dark table-hover">
                        <thead>
                        <tbody>
                        @foreach($personal_bests as $workout_type => $workout_array)
                            @foreach($workout_array as $start_date_time => $workout_data)
                                <tr class='clickable-row' data-href='/dashboard/workout/'>
                                    <th scope="row">{{ $workout_type }}</th>
                                    <td>{{ substr($start_date_time, 0, strrpos($start_date_time,' ')) }}</td>
                                    <td>{{ substr($start_date_time, -8, strrpos($start_date_time,' ')) }}</td>
                                    <td>{{ $workout_data['duration'] }}</td>
                                    <td>{{ $workout_data['weight'] }} LBS</td>
                                    <td>{{ number_format($workout_data['calories_burned'], 2, '.', ',') }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive d-none d-sm-block">
                    <h4>Personal Best</h4>
                    <table class="table table-sm table-hover">
                        <thead>
                        <tr>
                            <th scope="col">WORKOUT</th>
                            <th scope="col">DATE</th>
                            <th scope="col">TIME</th>
                            <th scope="col">DURATION</th>
                            <th scope="col">WEIGHT</th>
                            <th scope="col">CALORIES</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($personal_bests as $workout_type => $workout_array)
                            @foreach($workout_array as $start_date_time => $workout_data)
                                <tr class='clickable-row' data-href='/dashboard/workout/'>
                                    <th scope="row">{{ $workout_type }}</th>
                                    <td>{{ substr($start_date_time, 0, strrpos($start_date_time,' ')) }}</td>
                                    <td>{{ substr($start_date_time, -8, strrpos($start_date_time,' ')) }}</td>
                                    <td>{{ $workout_data['duration'] }}</td>
                                    <td>{{ $workout_data['weight'] }} LBS</td>
                                    <td>{{ number_format($workout_data['calories_burned'], 2, '.', ',') }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row spacer-100"></div>
        <div class="row">
            <div class="col">
                <div class="table-responsive d-block d-sm-none">
                    <h4>Latest Results</h4>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">TRAINING</th>
                            <th scope="col">DURATION</th>
                            <th scope="col">DATA</th>
                            <th scope="col">CALORIES</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($latest_results as $training)
                            @if($training->user_id == $member->id)
                                @foreach($training->sessions as $session)
                                    @foreach($session->workouts as $workout)
                                        @if ($workout->report)
                                            <tr class='clickable-row' data-href='/dashboard/workout/{{ $workout->report['id'] }}'>
                                                <th scope="row">{{ $workout->workout_type }}</th>
                                                <td>{{ substr($session->start_date_time, 0, strrpos($session->start_date_time,' ')) }}</td>
                                                <td>{{ substr($session->start_date_time, -8, strrpos($session->start_date_time,' ')) }}</td>
                                                <td>{{ $workout->report['duration'] }}</td>
                                                <td>{{ $workout->report['weight'] }} LBS</td>
                                                <td>{{ number_format($workout->report['calories_burned'], 2, '.', ',') }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive d-none d-sm-block">
                    <h4>Latest Results</h4>
                    <table class="table table-sm table-hover">
                        <thead>
                        <tr>
                            <th scope="col">TRAINING</th>
                            <th scope="col">DATE</th>
                            <th scope="col">TIME</th>
                            <th scope="col">DURATION</th>
                            <th scope="col">WEIGHT</th>
                            <th scope="col">CALORIES</th>
                        </tr>
                        <thead>
                        <tbody>
                        @foreach($latest_results as $training)
                            @if($training->user_id == $member->id)
                                @foreach($training->sessions as $session)
                                    @foreach($session->workouts as $workout)
                                        @if ($workout->report)
                                            <tr class='clickable-row' data-href='/dashboard/workout/{{ $workout->report['id'] }}'>
                                                <th scope="row">{{ $workout->workout_type }}</th>
                                                <td>{{ substr($session->start_date_time, 0, strrpos($session->start_date_time,' ')) }}</td>
                                                <td>{{ substr($session->start_date_time, -8, strrpos($session->start_date_time,' ')) }}</td>
                                                <td>{{ $workout->report['duration'] }}</td>
                                                <td>{{ $workout->report['weight'] }} LBS</td>
                                                <td>{{ number_format($workout->report['calories_burned'], 2, '.', ',') }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
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