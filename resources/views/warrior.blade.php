@extends('layouts.app')

@section('head')
    @parent
    <title>{{ config('app.name', 'The Fittest Warrior') }} | Shop</title>
@endsection
@section('navigation')
    @parent
@endsection
@section('content')
    <div class="spacer-50"></div>
    <div id="shop">
        <div class="row">


            {{--@foreach($workouts as $workout)--}}
                {{--<div class="product">--}}
                    {{--<h1>first: {{$workout->user->first_name}}</h1>--}}
                    {{--<h1>last: {{$workout->user->last_name}}</h1>--}}

                    {{--<h1>HARDEST: {{$workout->hardest_hit}}</h1>--}}
                    {{--<h1>TOTAL: {{$workout->total_power}}</h1>--}}
                    {{--<h1>Count: {{$workout->hit_count}}</h1>--}}
                    {{--<h1>AVG: {{$workout->power_average}}</h1>--}}
                    {{--<h1>Time: {{$workout->workout_duration}}</h1>--}}
                    {{--<h1>Speed: {{$workout->hit_speed}}</h1>--}}
                {{--</div>--}}
            {{--@endforeach--}}
        </div>
    </div>
    <div class="spacer-50"></div>
@endsection
@section('footer')
    @parent
@endsection