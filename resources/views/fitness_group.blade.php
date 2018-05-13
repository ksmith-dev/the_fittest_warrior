@extends('layouts.app')

@section('head')
    @parent
@endsection
@section('navigation')
    @parent
@endsection
@section('content')
    <div id="fitness-group">
        <div class="row">
            @if($auth)
                <div class="col">
                    <h2>{{ $user->first_name }} {{ $user->last_name }} - {{ ucwords($auth->group_role) }}</h2>
                    <hr>
                    <h3>{{ ucwords(str_replace('_', ' ', $group->name)) }}</h3>
                    <p>You have are a member of this group and have permission to view this groups information. Your role still needs implementation.</p>
                </div>
            @else
                <div class="col">
                    <h1>{{  ucwords(str_replace('_', ' ', $group->name)) }}</h1>
                    <img src="{{ asset($group->img_src) }}" alt="{{ $group->img_alt }}">
                    <p>{{ $group->description }}</p>
                    <hr>
                    <h4>Register or Login to see more...</h4>
                </div>
            @endif
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