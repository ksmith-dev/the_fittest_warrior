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
                @if(empty($workout['training_type']))
                    <h3>TRAINING TYPE - UNKNOWN }}</h3>
                @else
                    <h3>TRAINING TYPE - {{ strtoupper($workout['training_type']) }}</h3>
                @endif
                <ul>
                    @if(!empty($workout['type']))
                        <li class="workout-list-item"><b>TYPE:</b> {{ strtoupper(str_replace('_', ' ', $workout['type'])) }}</li>
                    @endif
                    @if(!empty($workout['activity_type']))
                        <li class="workout-list-item"><b>ACTIVITY:</b> {{ $workout['activity_type'] }}</li>
                    @endif
                    @if(!empty($workout['sets']))
                        <li class="workout-list-item"><b>SETS:</b> {{ $workout['sets'] }}</li>
                    @endif
                    @if(!empty($workout['repetitions']))
                        <li class="workout-list-item"><b>REPETITIONS:</b> {{ $workout['repetitions'] }}</li>
                    @endif
                    @if(!empty($workout['weight']))
                        <li class="workout-list-item"><b>WEIGHT:</b> {{ $workout['weight'] }} {{ $workout['weight_unit'] }}</li>
                    @endif
                    @if(!empty($workout['calories_burned']))
                        <li class="workout-list-item"><b>CALORIES:</b> {{ $workout['calories_burned'] }}</li>
                    @endif
                    @if(!empty($workout['duration']))
                        <li class="workout-list-item"><b>DURATION:</b> {{ $workout['duration'] }}</li>
                    @endif
                    @if(!empty($workout['rest']))
                        <li class="workout-list-item"><b>REST:</b> {{ $workout['rest'] }}</li>
                    @endif
                </ul>
            </div>
            <div id="workout-video" class="col text-center">
                <h3>Workout Video</h3>
                <iframe src="https://www.youtube.com/embed/qWy_aOlB45Y" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe >
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @parent
@endsection