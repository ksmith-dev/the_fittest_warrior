@extends('layouts.app')

@section('head')
    @parent
    <title>{{ config('app.name', 'The Fittest Warrior') }} | About</title>
@endsection
@section('navigation')
    @parent
@endsection
@section('content')
    <div class="spacer-50"></div>
    <div id="about">
        <div class="col">
            <div class="row">

            </div>
        </div>
    </div>
    <div class="spacer-50"></div>
@endsection
@section('footer')
    @parent
@endsection