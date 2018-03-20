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
                    <a class="nav-link" href="{{ url('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('fitness') }}">Fitness</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('nutrition') }}">Nutrition</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  active" href="{{ url('health') }}">Health</a>
                </li>
            </ul>
        </div>
    </div>
    <div id="health">
        <a href="{{ url('health/form') }}" class="btn btn-secondary" role="button">add health info</a>
    </div>
@endsection
@section('footer')
    @parent
    <script src="{{ asset('js/dashboard_charts.js') }}"></script>
@endsection