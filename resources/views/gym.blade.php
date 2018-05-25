@extends('layouts.app')

@section('head')
    @parent
@endsection
@section('navigation')
    @parent
@endsection
@section('content')
    <div id="gym">
        <div class="row">
            @foreach($gyms as $gym)
                <div class="col">
                    <div class="gym-group" href="{{ $gym->link }}">
                        <h3 class="group-name">{{ ucwords(str_replace('_', ' ', $gym->name)) }}</h3>
                        @if(!empty($gym->img_src))
                            <img src="{{ asset($gym->img_src) }}" alt="{{ $gym->img_alt }}">
                        @endif
                        <hr>
                        <p>{{ $gym->description }}</p>
                        <a class="btn btn-dark" href="{{ url('fitness_group') }}/{{ $gym->id }}" role="button" name="visitGymButton">Visit Gym Board</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('footer')
    @parent
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @auth
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">dashboard</a></li>
            @endauth
            <li class="breadcrumb-item active" aria-current="page">gyms</li>
            <li class="breadcrumb-item"><a href="{{ url('about') }}">about</a></li>
            <li class="breadcrumb-item"><a href="{{ url('contact') }}">contact</a></li>
        </ol>
    </nav>
@endsection