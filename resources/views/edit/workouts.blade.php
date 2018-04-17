@extends('layouts.app')

@section('head')
@parent
@endsection
@section('navigation')
@parent
@endsection
@section('content')
@include('layouts.dashboard_nav')
<div id="workouts">
    <div class="spacer-50"></div>
    <div class="row">
        <div class="col">
            @if($workouts != null)
                <div class="table-responsive d-none d-sm-block">
                    <h4>Workouts</h4>
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
                            @if($workout->user_id == $member->id)
                                <tr class='clickable-row' data-href='/workout/form/{{ $workout->workout_type }}/{{ $workout->id }}'>
                                    <th scope="row">{{ str_replace('_', ' ', $workout->training_type) }}</th>
                                    <th>{{ str_replace('_', ' ', $workout->workout_type) }}</th>
                                    <td>{{ date('d-m-Y', strtotime($workout->created_at)) }}</td>
                                    <td>{{ $workout->duration }}</td>
                                    <td>{{ $workout->weight }} {{ $workout->weight_units }}</td>
                                    <td>{{ number_format($workout->calories_burned, 2, '.', ',') }}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h1 style="width: 90%;">Sorry {{ $member->first_name }}, we did not find any {{ str_replace('_', ' ', $params['workout_type']) }}'s  to display!</h1>
                <span class="spacer-50"></span>
                <p style="width: 80%">This is not a reflection on you, this just means that we do not have any stored records. If you want to store some {{ str_replace('_', ' ', $params['workout_type']) }} records please start by clicking below.
                    <br>
                    <br>
                    <a href="{{ url('workout/form/' . $params['workout_type']) }}" class="btn btn-secondary" role="button">add {{ str_replace('_', ' ', $params['workout_type']) }}</a>
                    <span style="display: inline-block; width: 20px;"></span>or<span style="display: inline-block; width: 20px;"></span>
                    <button type="button" class="btn btn-secondary back">go back</button>
                </p>
                <div class="spacer-50"></div>
                <a title="By Matthew Inman [CC BY 3.0 (https://creativecommons.org/licenses/by/3.0)], via Wikimedia Commons" href="https://commons.wikimedia.org/wiki/File:Tumbeasts_sign1.png"><img width="256" alt="Tumbeasts sign1" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0d/Tumbeasts_sign1.png/256px-Tumbeasts_sign1.png"></a>
            @endif
        </div>
    </div>
</div>
@endsection
@section('footer')
@parent
@endsection