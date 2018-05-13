@extends('layouts.app')

@section('head')
    @parent
@endsection
@section('navigation')
    @parent
@endsection
@section('content')
    <div id="account">
        <div class="row">
            <div class="col">
                @auth
                    @if($user->role == 'admin')
                        <a class="btn btn-dark" href="{{ url('admin') }}" role="button">Admin Dashboard</a>
                    @endif
                @endauth
                <a class="btn btn-dark" href="{{ url('account/form') }}" role="button">Edit Account Information</a>
                <div class="spacer-20"></div>
                <h1>{{ $user->first_name }} {{ $user->last_name }}</h1>
                <h3><b>Site Role:</b>&nbsp;&nbsp;&nbsp;{{ ucwords($user->role) }}</h3>
                <table class="table">
                    <tbody>
                    <tr>
                        <th scope="row">Email:</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Address:</th>
                        <td>{{ $user->address }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Unit:</th>
                        <td>{{ $user->unit }}</td>
                    </tr>
                    <tr>
                        <td scope="row">City:</td>
                        <td>{{ $user->city }}</td>
                    </tr>
                    <tr>
                        <td scope="row">State:</td>
                        <td>{{ $user->state }}</td>
                    </tr>
                    <tr>
                        <td scope="row">Zip:</td>
                        <td>{{ $user->zip }}</td>
                    </tr>
                    <tr>
                        <td scope="row">Age:</td>
                        <td>{{ $user->age }}</td>
                    </tr>
                    <tr>
                        <td scope="row">Sex:</td>
                        <td>{{ $user->sex }}</td>
                    </tr>
                    <tr>
                        <td scope="row">Weight:</td>
                        <td>{{ $user->weight }}</td>
                    </tr>
                    <tr>
                        <td scope="row">Height:</td>
                        <td>{{ $user->height }}</td>
                    </tr>
                    <tr>
                        <td scope="row">Body Mass Index:</td>
                        <td>{{ $user->b_m_i }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="vertical-banner">
                            <h3 class="text-center" style="margin-top: 300px;">SPECIAL OFFER</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if(empty($badges))
                @else
                    <hr>
                    <h3>Account Badges Earned:</h3>
                    <div class="spacer-20"></div>
                    @foreach($badges as $badge)
                        <div class="col img-container">
                            <img src="{{ asset($badge->img_src) }}" alt="{{ $badge->img_alt }}" width="200px">
                            <div class="img-centered-text">Certified Top Rank</div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="spacer-50"></div>
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