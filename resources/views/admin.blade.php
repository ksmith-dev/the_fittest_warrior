@extends('layouts.app')

@section('head')
    @parent
@endsection
@section('navigation')
    @parent
@endsection
@section('content')
    <div id="admin">
        <div class="row">
            <div class="col">
                @if(!empty($advertisements))
                    <div class="spacer-50"></div>
                    <h3>Advertisement Data</h3>
                    <a class="btn btn-dark" href="{{ url('advertisement/add') }}" role="button">Add Advertisement</a>
                    <div class="spacer-50"></div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Subscription</th>
                            <th scope="col">Frequency</th>
                            <th scope="col">Status</th>
                            <th scope="col">view</th>
                            <th scope="col">edit</th>
                            <th scope="col">deactivate</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($advertisements as $advertisement)
                            <tr>
                                <th scope="row">{{ $advertisement->id }}</th>
                                <td>{{ $advertisement->user_id }}</td>
                                <td>{{ $advertisement->subscription }}</td>
                                <td>{{ $advertisement->frequencty }}</td>
                                <td>{{ $advertisement->status }}</td>
                                <td><a href="">view</a></td>
                                <td><a href="">edit</a></td>
                                <td><a href="">deactivate</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @elseif(!empty($users))
                    <div class="spacer-50"></div>
                    <h3>User Data</h3>
                    <div class="spacer-20"></div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">view</th>
                            <th scope="col">edit</th>
                            <th scope="col">deactivate</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->status }}</td>
                                <td><a href="">view</a></td>
                                <td><a href="">edit</a></td>
                                <td><a href="">deactivate</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @elseif(!empty($members))
                    <div class="spacer-50"></div>
                    <h3>Membership Data</h3>
                    <a class="btn btn-dark" href="{{ url('membership/add') }}" role="button">Add Membership</a>
                    <div class="spacer-20"></div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Group Name</th>
                            <th scope="col">Group Role</th>
                            <th scope="col">view</th>
                            <th scope="col">edit</th>
                            <th scope="col">deactivate</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($members as $member)
                            <tr>
                                <th scope="row">{{ $member->id }}</th>
                                <td>{{ $member->user_name }}</td>
                                <td>{{ $member->group_name }}</td>
                                <td>{{ $member->group_role }}</td>
                                <td><a href="">view</a></td>
                                <td><a href="">edit</a></td>
                                <td><a href="">deactivate</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h1>Admin Tasks</h1>
                    <div class="spacer-20"></div>
                    <a class="btn btn-dark" href="{{ url('admin/advertisements') }}" role="button" style="width: 100%">Manage Advertisements</a>
                    <div class="spacer-20"></div>
                    <a class="btn btn-dark" href="{{ url('admin/users') }}" role="button" style="width: 100%">Manage Users</a>
                    <div class="spacer-20"></div>
                    <a class="btn btn-dark" href="{{ url('admin/members') }}" role="button" style="width: 100%">Manage Memberships</a>
                    <div class="spacer-20"></div>
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
            @if(Request::url() == 'http://fittestwarrior.local/admin')
                <li class="breadcrumb-item active" aria-current="page">admin</li>
            @else
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">admin</a></li>
            @endif
            @if(Request::url() == 'http://fittestwarrior.local/admin/advertisements')
                <li class="breadcrumb-item active" aria-current="page">advertisements</li>
            @else
                <li class="breadcrumb-item"><a href="{{ url('admin/advertisements') }}">advertisements</a></li>
            @endif
            @if(Request::url() == 'http://fittestwarrior.local/admin/users')
                <li class="breadcrumb-item active" aria-current="page">users</li>
            @else
                <li class="breadcrumb-item"><a href="{{ url('admin/users') }}">users</a></li>
            @endif
            @if(Request::url() == 'http://fittestwarrior.local/admin/members')
                <li class="breadcrumb-item active" aria-current="page">memberships</li>
            @else
                <li class="breadcrumb-item"><a href="{{ url('admin/members') }}">memberships</a></li>
            @endif
        </ol>
    </nav>
@endsection