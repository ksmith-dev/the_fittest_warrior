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
            <div class="col-8">
                <a class="btn btn-warning" href="{{ url('form/workout/' .$workout->id) }}" style="float: right;">Edit Workout</a>
                <h1>WORKOUT</h1>
                <hr>
                <div id="workout-video">
                    <h3>Workout Video</h3>
                    <iframe width="100%" src="https://www.youtube.com/embed/qWy_aOlB45Y" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe >
                </div>
                <div class="spacer-20"></div>
                <hr>
                <div class="spacer-20"></div>
                @if(empty($params['training']))
                    <h3>TRAINING</h3>
                @else
                    <h3>TRAINING TYPE - {{ strtoupper($params['training']) }}</h3>
                @endif
                    <table class="table">
                        <tbody>
                        <tr>
                            <th scope="row">TYPE:</th>
                            @if(!empty($workout->type))
                                <td class="workout-list-item">{{ strtoupper(str_replace('_', ' ', $workout->type)) }}</td>
                            @else
                                <td class="workout-list-item"></td>
                            @endif
                        </tr>
                        <tr>
                            <th scope="row">ACTIVITY:</th>
                            @if(!empty($workout->activity_type))
                                <td class="workout-list-item">{{ $workout->activity_type }}</td>
                            @else
                                <td class="workout-list-item"></td>
                            @endif
                        </tr>
                        <tr>
                            <th scope="row">SETS:</th>
                            @if(!empty($workout->sets))
                                <td class="workout-list-item">{{ $workout->sets }}</td>
                            @else
                                <td class="workout-list-item"></td>
                            @endif
                        </tr>
                        <tr>
                            <th scope="row">REPETITIONS:</th>
                            @if(!empty($workout->repetitions))
                                <td class="workout-list-item">{{ $workout->repetitions }}</td>
                            @else
                                <td class="workout-list-item"></td>
                            @endif
                        </tr>
                        <tr>
                            <th scope="row">WEIGHT:</th>
                            @if(!empty($workout->weight))
                                <td class="workout-list-item">{{ $workout->weight }} {{ $workout->weight_unit }}</td>
                            @else
                                <td class="workout-list-item"></td>
                            @endif
                        </tr>
                        <tr>
                            <th scope="row">CALORIES:</th>
                            @if(!empty($workout->calories_burned))
                                <td class="workout-list-item">{{ $workout->calories_burned }}</td>
                            @else
                                <td class="workout-list-item"></td>
                            @endif
                        </tr>
                        <tr>
                            <th scope="row">DURATION:</th>
                            @if(!empty($workout->duration))
                                <td class="workout-list-item">{{ $workout->duration }}</td>
                            @else
                                <td class="workout-list-item"></td>
                            @endif
                        </tr>
                        <tr>
                            <th scope="row">REST:</th>
                            @if(!empty($workout->rest))
                                <td  class="workout-list-item">{{ $workout->rest }}</td>
                            @else
                                <td class="workout-list-item"></td>
                            @endif
                        </tr>
                        <tr>
                            <th scope="row">MUSCLE GROUPS:</th>
                            @if(!empty($muscle_groups))
                                <td class="workout-list-item" style="position: relative;">
                                    <img src="{{ asset('images/fitness_groups/muscle_images/400x200_transparent_body_cutout.png') }}">
                                    @foreach($muscle_groups as $muscle_group)
                                        <img class="muscle-overlay" src="{{ asset('images/fitness_groups/muscle_images/' . $muscle_group->muscle_group . '.png') }}">
                                    @endforeach
                                </td>
                            @else
                                <td class="workout-list-item"></td>
                            @endif
                        </tr>
                        </tbody>
                    </table>
                <div class="spacer-50"></div>
                @if(empty($params['training']))
                    <h4>Badges</h4>
                    <hr>
                @else
                    <h4>Earned {{ ucwords($params['training']) }} Badges</h4>
                    <hr>
                @endif
                <div class="row">
                    <div class="col img-container">
                        <img src="{{ asset('images/icons/blue_badge.png') }}" width="150px" >
                        <div class="img-centered-text">Certified Top Rank</div>
                    </div>
                    <div class="col img-container">
                        <img src="{{ asset('images/icons/orange_badge.png') }}" width="150px">
                        <div class="img-centered-text">Certified Consistent</div>
                    </div>
                    <div class="col img-container">
                        <img src="{{ asset('images/icons/purple_badge.png') }}" width="150px">
                        <div class="img-centered-text">Certified Participation</div>
                    </div>
                </div>
                <hr>
                <div class="spacer-50"></div>
            </div>
            <div class="col text-center">
                <h3>Advertisement</h3>
                @if(empty($params['advertisement']))
                    <a id="banner-advertisement-vertical" style="background-image: url('http://via.placeholder.com/250x950');"></a>
                @else
                    @if(empty($params['advertisement']->message))
                        <a id="banner-advertisement-vertical" style="background-image: url({{ url($params['advertisement']->banner_src) }});"></a>
                    @else
                        <a id="banner-advertisement-vertical" style="background-image: url({{ url($params['advertisement']->banner_src) }});"><span class="ad-message">{{ $param['advertisement']->message }}</span></a>
                    @endif
                @endif
            </div>
        </div>
        <div class="col text-center">
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
        <div class="spacer-100"></div>
    </div>
@endsection
@section('footer')
    @parent
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">workout</li>
                <li class="breadcrumb-item"><a href="{{ url('workout') }}">add</a></li>
            </ol>
        </nav>
@endsection