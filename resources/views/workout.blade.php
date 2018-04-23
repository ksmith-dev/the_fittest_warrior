@extends('layouts.app')

@section('head')
    @parent
    <title>{{ config('app.name', 'The Fittest Warrior') }} | {{ $params['title'] }}</title>
@endsection
@section('navigation')
    @parent
@endsection
@section('content')
    <div id="workout">
        <div class="row">
            <div class="col">
                <h1>WORKOUT</h1>
                <div class="spacer-20"></div>
                @if(empty($params['training']))
                    <h3>TRAINING</h3>
                @else
                    <h3>TRAINING TYPE - {{ strtoupper($params['training']) }}</h3>
                @endif
                <ul>
                    @if(!empty($workout->type))
                        <li class="workout-list-item"><b>TYPE:</b> {{ strtoupper(str_replace('_', ' ', $workout->type)) }}</li>
                    @endif
                    @if(!empty($workout->activity_type))
                        <li class="workout-list-item"><b>ACTIVITY:</b> {{ $workout->activity_type }}</li>
                    @endif
                    @if(!empty($workout->sets))
                        <li class="workout-list-item"><b>SETS:</b> {{ $workout->sets }}</li>
                    @endif
                    @if(!empty($workout->repetitions))
                        <li class="workout-list-item"><b>REPETITIONS:</b> {{ $workout->repetitions }}</li>
                    @endif
                    @if(!empty($workout->weight))
                        <li class="workout-list-item"><b>WEIGHT:</b> {{ $workout->weight }} {{ $workout->weight_unit }}</li>
                    @endif
                    @if(!empty($workout->calories_burned))
                        <li class="workout-list-item"><b>CALORIES:</b> {{ $workout->calories_burned }}</li>
                    @endif
                    @if(!empty($workout->duration))
                        <li class="workout-list-item"><b>DURATION:</b> {{ $workout->duration }}</li>
                    @endif
                    @if(!empty($workout->rest))
                        <li  class="workout-list-item"><b>REST:</b> {{ $workout->rest }}</li>
                    @endif
                    @if(!empty($muscle_groups))
                            <li class="workout-list-item"><b>Muscle Groups:</b>
                            <ul>
                                @foreach($muscle_groups as $muscle_group)
                                    <li>{{ $muscle_group->muscle_group }}</li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                </ul>
                <div class="spacer-50"></div>
                @if(empty($params['training']))
                    <h4>Badges</h4>
                    <hr>
                @else
                    <h4>{{ ucwords($params['training']) }} Badges</h4>
                    <hr>
                @endif
                <div class="row">
                    <div class="col img-container">
                        <img src="{{ asset('images/icons/blue_badge.png') }}" width="100%" >
                        <div class="img-centered-text">Certified Top Rank</div>
                    </div>
                    <div class="col img-container">
                        <img src="{{ asset('images/icons/orange_badge.png') }}" width="100%">
                        <div class="img-centered-text">Certified Consistent</div>
                    </div>
                    <div class="col img-container">
                        <img src="{{ asset('images/icons/purple_badge.png') }}" width="100%">
                        <div class="img-centered-text">Certified Participation</div>
                    </div>
                </div>
                <hr>
            </div>
            <div id="workout-video" class="col text-center">
                <div class="col">
                    <h3>Video of Workout</h3>
                    <iframe width="100%" src="https://www.youtube.com/embed/qWy_aOlB45Y" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe >
                </div>
                <div class="spacer-50"></div>
                <div class="col">
                    @if(empty($params['training']))
                        <h3>Standings</h3>
                    @else
                        <h3>{{ ucwords($params['training']) }} Standings</h3>
                    @endif
                    @if (empty($leader_board))
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Workout</th>
                                    <th scope="col">Weight</th>
                                    <th scope="col">Repetitions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="5">no data available</td>
                                    </tr>
                                </tbody>
                            </table>
                    @else
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Workout</th>
                                <th scope="col">Weight</th>
                                <th scope="col">Repetitions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($leader_board as $leader)
                                <tr>
                                    <td>{{ $leader['first_name'] }}</td>
                                    <td>{{ $leader['last_name'] }}</td>
                                    <td>{{ $leader['type'] }}</td>
                                    <td>{{ $leader['weight'] }}</td>
                                    <td>{{ $leader['repetitions'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
        <div class="spacer-100"></div>
        <h4>Advertisement...</h4>
        <div id="banner-advertisement"></div>
    </div>
@endsection
@section('footer')
    @parent
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">workout</li>
                <li class="breadcrumb-item"><a href="{{ url('workout') }}">add workout</a></li>
            </ol>
        </nav>
@endsection