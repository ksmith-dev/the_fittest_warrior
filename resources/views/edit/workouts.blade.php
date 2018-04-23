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
            @if(!empty($workouts))
                <div class="table-responsive d-none d-sm-block">
                    <h4>Workouts</h4>
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">TRAINING</th>
                            <th scope="col" class="text-center">WORKOUT</th>
                            <th scope="col" class="text-center">DATE CREATED</th>
                            <th scope="col" class="text-center">DURATION</th>
                            <th scope="col" class="text-center">WEIGHT</th>
                            <th scope="col" class="text-center">REPETITIONS</th>
                            <th scope="col" class="text-center">VIEW</th>
                            <th scope="col" class="text-center">EDIT</th>
                            <th scope="col" class="text-center">DELETE</th>
                        </tr>
                        <thead>
                        <tbody>
                        @foreach($workouts as $workout)
                            @if($workout->user_id == $params['user']->id)
                                <tr>
                                    <th scope="row" class="text-center">{{ str_replace('_', ' ', $workout->training) }}</th>
                                    <th class="text-center">{{ str_replace('_', ' ', $workout->type) }}</th>
                                    <td class="text-center">{{ date('d-m-Y', strtotime($workout->created_at)) }}</td>
                                    <td class="text-center">{{ $workout->duration }}</td>
                                    <td class="text-center">{{ $workout->weight }} {{ $workout->weight_unit }}</td>
                                    <td class="text-center">{{ $workout->repetitions }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('workout/view') }}/{{ $workout->id }}">view</a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('workout/form') }}/{{ $workout->type }}/{{ $workout->id }}">edit</a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('workout/delete') }}/{{ $workout->id }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">{{ __('delete') }}</a>

                                        <form id="delete-form" action="{{ url('workout/delete') }}/{{ $workout->type }}/{{ $workout->id }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                <tr>

                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h1 style="width: 90%;">Sorry {{ $params['user']->first_name }}, we did not find any {{ str_replace('_', ' ', $params['workout_type']) }}'s  to display!</h1>
                <span class="spacer-50"></span>
                <p style="width: 80%">This is not a reflection on you, this just means that we do not have any stored records. If you want to store some {{ str_replace('_', ' ', $params['workout_type']) }} records please start by clicking below.
                    <br>
                    <br>
                    <a href="{{ url('workout/form/' . $params['workout_type']) }}" class="btn btn-secondary" role="button">add {{ str_replace('_', ' ', $params['workout_type']) }}</a>
                    <span style="display: inline-block; width: 20px;"></span>or<span style="display: inline-block; width: 20px;"></span>
                    <button type="button" class="btn btn-secondary back">go back</button>
                </p>
                <div class="spacer-50"></div>
                <a title="By Matthew Inman [CC BY 3.0 (https://creativecommons.org/licenses/by/3.0)], via Wikimedia Commons" href="https://commons.wikimedia.org/wiki/File:Tumbeasts_sign1.png">
                    <img id="omg-404" width="256" alt="Tumbeasts sign1" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0d/Tumbeasts_sign1.png/256px-Tumbeasts_sign1.png">
                </a>
            @endif
        </div>
    </div>
</div>
@endsection
@section('footer')
@parent
@endsection