@extends('layouts.app')

@section('head')
    @parent
@endsection
@section('navigation')
    @parent
@endsection
@section('content')
    <div id="group">
        @if(!empty($param['group']))
            <div class="row">
                <div class="col">
                    @if($param['group']->visibility === 'public' && !$param['user_is_member'])
                        <a class="btn btn-warning" href="{{ url('fitness_group/public/sign_up/' . $param['group']->id) }}" style="float: right;">Join Group</a>
                    @elseif ($param['group']->visibility === 'public' && $param['user_is_member'])
                        <a class="btn btn-warning" href="{{ url('fitness_group/public/leave_group/' . $param['group']->id) }}" style="float: right;">Leave Group</a>
                    @endif
                    <h1>{{ $param['group']->name }}</h1>
                    <hr>
                    @if($param['group']->visibility === 'public')
                        <h4 class="text-center" style="color: #fdd000; text-shadow: -1px 0 #66717d, 0 1px #66717d, 1px 0 #66717d, 0 -1px #66717d;">- THIS GROUP IS PUBLIC - MEMBERSHIP IS OPEN TO ALL SITE MEMBERS -</h4>
                    @endif
                    <img src="{{ url($param['group']->img_src) }}" style="max-width: 300px;">
                    <div class="spacer-20"></div>
                    <p>{{ $param['group']->description }}</p>
                </div>
            </div>
            <hr style="height:2px;border:none;color:#333;background-color:#333;">
            <div class="row">
                <div class="col-8">
                    @if(!empty($param['workouts']))
                        @if(!empty($param['workouts']))
                            <h3>Group Standings</h3>
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th>Training</th>
                                    <th>Type</th>
                                    <th>Weight</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($param['workouts'] as $workout)
                                    <tr>
                                        <th scope="row">{{ $param['members'][$workout->user_id]->first_name }} {{ $param['members'][$workout->user_id]->last_name }}</th>
                                        <td>{{ ucwords(str_replace('_', ' ', $workout->activity)) }}</td>
                                        <td>{{ ucwords(str_replace('_', ' ', $workout->type)) }}</td>
                                        <td>{{ $workout->weight }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else

                        @endif
                    @endif
                </div>
                <div class="col">
                    @if(!empty($param['members']))
                        @if(!empty($param['members']))
                            <h3>Members</h3>
                            <table class="table">
                                <thead class="thead-dark">
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
                    @endif
                </div>
            </div>
        @endif
        <div class="spacer-100"></div>
    </div>
@endsection
@section('footer')
    @parent

@endsection