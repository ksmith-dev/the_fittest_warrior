@extends('layouts.app')

@section('head')
    @parent
@endsection
@section('navigation')
    @parent
@endsection
@section('content')
    <div id="group">
        @if(empty($param['group']))

        @else
            <div class="row">
                <div class="col">
                    <h1>{{ $param['group']->name }}</h1>
                    <hr>
                    <img src="{{ $param['group']->img_src }}">
                    <div class="spacer-20"></div>
                    <p>{{ $param['group']->description }}</p>
                </div>
            </div>
            <hr style="height:2px;border:none;color:#333;background-color:#333;">
            <div class="row">
                <div class="col">
                    @if(!empty($param['user_is_member']) && $param['user_is_member'])
                        <h3>Group Standings</h3>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th>Training</th>
                                <th>Type</th>
                                <th>Weight</th>
                                <td>Duration</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($param['workouts'] as $workout)
                                <tr>
                                    <th scope="row">{{ $param['members'][$workout->user_id]->first_name }} {{ $param['members'][$workout->user_id]->last_name }}</th>
                                    <td>{{ ucwords(str_replace('_', ' ', $workout->activity)) }}</td>
                                    <td>{{ ucwords(str_replace('_', ' ', $workout->type)) }}</td>
                                    <td>{{ $workout->weight }}</td>
                                    <td>{{ $workout->duration }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
                <div class="col">
                    @if(!empty($param['user_is_member']) && $param['user_is_member'])
                        <h3>Members</h3>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Role</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($param['members'] as $member)
                                <tr>
                                    <th scope="row">{{ $member->first_name }} {{ $member->last_name }}</th>
                                    <td>{{ $member->group_role }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        @endif
    </div>
@endsection
@section('footer')
    @parent

@endsection