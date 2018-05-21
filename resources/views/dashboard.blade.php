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
        @if(empty($best_weight) && empty($best_time) && empty($workouts))
            <hr>
            <h2 style="width: 90%;">Welcome to your dashboard, there are no records to display.</h2>
            <span class="spacer-50"></span>
            <h5 style="width: 80%">This is not a reflection on you, this just means that we do not have any stored records. If you want to store some workout records please start by clicking below.
                <br>
                <br>
                <a href="{{ url('workout') }}" class="btn btn-secondary" role="button">add a workout</a>
            </h5>
            <div class="spacer-50"></div>
        @else
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

            <div class="row">
                <div class="col">
                    <div class="table-responsive d-none d-md-block">
                        <div class="row spacer-100"></div>
                        <h4>Best Weight</h4>
                        <table class="table table-sm table-hover">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">TRAINING</th>
                                <th scope="col" class="text-center">WORKOUT</th>
                                <th scope="col" class="text-center">DATE CREATED</th>
                                <th scope="col" class="text-center">DURATION</th>
                                <th scope="col" class="text-center">REST</th>
                                <th scope="col" class="text-center">WEIGHT</th>
                                <th scope="col" class="text-center">REPETITIONS</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($best_weight as $workout)
                                <tr class="clickable-row" data-href="/workout/detail/{{ $workout['id'] }}" data-toggle="tooltip" data-placement="top" title="click to view">
                                    <th class="text-center">{{ $workout['training'] }}</th>
                                    <th class="text-center">{{ str_replace('_', ' ', $workout['type']) }}</th>
                                    <td class="text-center">{{ date('d/m/Y', strtotime($workout['created_at'])) }}</td>
                                    <td class="text-center">{{ $workout['duration'] }}</td>
                                    <td class="text-center">{{ $workout['rest'] }}</td>
                                    <td class="text-center">{{ $workout['weight'] }} {{ $workout['weight_unit'] }}</td>
                                    <td class="text-center">{{ $workout['repetitions'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive d-sm-none">
                        <div class="row spacer-50"></div>
                        <h4>Best Weight</h4>
                        <table class="table table-sm table-hover">
                            <thead>
                            <tr>
                                <th scope="col">WORKOUT</th>
                                <th scope="col" class="text-center">WEIGHT</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($best_weight as $workout)
                                <tr class="clickable-row" data-href="/workout/detail/{{ $workout['id'] }}" data-toggle="tooltip" data-placement="top" title="click to view">
                                    <th scope="row">{{ str_replace('_', ' ', $workout['type']) }}</th>
                                    <td class="text-center">{{ $workout['weight'] }} {{ $workout['weight_unit'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive d-none d-md-block">
                        <div class="spacer-20"></div>
                        <h4>Best Time</h4>
                        <table class="table table-sm table-hover">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">TRAINING</th>
                                <th scope="col" class="text-center">WORKOUT</th>
                                <th scope="col" class="text-center">DATE CREATED</th>
                                <th scope="col" class="text-center">DURATION</th>
                                <th scope="col" class="text-center">REST</th>
                                <th scope="col" class="text-center">WEIGHT</th>
                                <th scope="col" class="text-center">REPETITIONS</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($best_time as $workout)
                                <tr class="clickable-row" data-href="/workout/detail/{{ $workout['id'] }}" data-toggle="tooltip" data-placement="top" title="click to view">
                                    <th scope="row" class="text-center">{{ $workout['training'] }}</th>
                                    <th class="text-center">{{ str_replace('_', ' ', $workout['type']) }}</th>
                                    <td class="text-center">{{ date('d/m/Y', strtotime($workout['created_at'])) }}</td>
                                    <td class="text-center">{{ $workout['duration'] }}</td>
                                    <td class="text-center">{{ $workout['rest'] }}</td>
                                    <td class="text-center">{{ $workout['weight'] }} {{ $workout['weight_unit'] }}</td>
                                    <td class="text-center">{{ $workout['repetitions'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive d-sm-none">
                        <div class="spacer-20"></div>
                        <h4>Best Time</h4>
                        <table class="table table-sm table-hover">
                            <thead>
                            <tr>
                                <th scope="col">WORKOUT</th>
                                <th scope="col" class="text-center">DURATION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($best_time as $workout)
                                <tr class="clickable-row" data-href="/workout/detail/{{ $workout['id'] }}" data-toggle="tooltip" data-placement="top" title="click to view">
                                    <th scope="row">{{ str_replace('_', ' ', $workout['type']) }}</th>
                                    <td class="text-center">{{ $workout['duration'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="table-responsive d-none d-sm-block">
                        <div class="row spacer-100"></div>
                        <h4>Latest Results</h4>
                        <table class="table table-sm table-hover">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">TRAINING</th>
                                <th scope="col" class="text-center">WORKOUT</th>
                                <th scope="col" class="text-center">DATE CREATED</th>
                                <th scope="col" class="text-center">DURATION</th>
                                <th scope="col" class="text-center">REST</th>
                                <th scope="col" class="text-center">WEIGHT</th>
                                <th scope="col" class="text-center">REPETITIONS</th>
                            </tr>
                            <thead>
                            <tbody>
                            @foreach($workouts as $workout)
                                @if($workout['user_id'] == $params['user']->id)
                                    <tr class="clickable-row" data-href="/workout/detail/{{ $workout['id'] }}" data-toggle="tooltip" data-placement="top" title="click to view">
                                        <th scope="row" class="text-center">{{ str_replace('_', ' ', $workout['training']) }}</th>
                                        <th class="text-center">{{ str_replace('_', ' ', $workout['type']) }}</th>
                                        <td class="text-center">{{ date('d/m/Y', strtotime($workout['created_at'])) }}</td>
                                        <td class="text-center">{{ $workout['duration'] }}</td>
                                        <td class="text-center">{{ $workout['rest'] }}</td>
                                        <td class="text-center">{{ $workout['weight'] }} {{ $workout['weight_unit'] }}</td>
                                        <td class="text-center">{{ $workout['repetitions'] }}</td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive d-md-none">
                        <div class="row spacer-50"></div>
                        <h4>Latest Results</h4>
                        <table class="table table-sm table-hover">
                            <thead>
                            <tr>
                                <th scope="col">WORKOUT</th>
                                <th scope="col" class="text-center">WEIGHT</th>
                                <th scope="col" class="text-center">REPETITIONS</th>
                            </tr>
                            <thead>
                            <tbody>
                            @foreach($workouts as $workout)
                                @if($workout['user_id'] == $params['user']->id)
                                    <tr class="clickable-row" data-href="/workout/detail/{{ $workout['id'] }}" data-toggle="tooltip" data-placement="top" title="click to view">
                                        <th scope="row">{{ str_replace('_', ' ', $workout['type']) }}</th>
                                        <td class="text-center">{{ $workout['weight'] }} {{ $workout['weight_unit'] }}</td>
                                        <td class="text-center">{{ $workout['repetitions'] }}</td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col d-none d-md-block">
                <div class="row">
                    <div class="spacer-100"></div>
                    <h3 class="text-center">PROGRESS</h3>
                    <canvas id="progress"></canvas>
                </div>
            </div>
        @endif
        <div class="spacer-100"></div>
    </div>
@endsection
@section('footer')
    @parent
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">dashboard</li>
                <li class="breadcrumb-item"><a href="{{ url('workout') }}">workout</a></li>
                <li class="breadcrumb-item"><a href="{{ url('nutrition/form') }}">nutrition</a></li>
                <li class="breadcrumb-item"><a href="{{ url('health/form') }}">health</a></li>
            </ol>
        </nav>
        <script src="{{ asset('js/dashboard_charts.js') }}"></script>
@endsection