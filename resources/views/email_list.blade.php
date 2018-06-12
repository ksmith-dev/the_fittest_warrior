@extends('layouts.app')

@section('head')
    @parent
@endsection

@section('navigation')
    @parent
@endsection

@section('content')
    <div id="gym">
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
        <div class="row">
            <div class="fitness-group">
                <table class="table table-hover">
                    <h1>Stay Informed Email List</h1>
                    <thead>
                    <tr>
                        <th scope="col">Email</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rows as $row)
                        @if($row->status == 'active')
                            <tr>
                                <td>{{ $row->email }}</td>
                                <td>
                                    <a href="{{ url()->current() }}/{{ $row->id }}/inactive" role="button">
                                    Remove
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
@endsection