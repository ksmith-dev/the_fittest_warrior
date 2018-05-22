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
            @if(in_array($param['page_type'], array('user', 'member', 'advertisement')))
                <div class="col-6">
                    <div class="spacer-100"></div>
                    <a class="btn btn-dark" href="{{ url('form/user/' . $param['model']->id) }}" role="button">Edit Account Information</a>
                    <div class="spacer-20"></div>
                        <h1>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h1>
                        <h3><b>Site Role:</b>&nbsp;&nbsp;&nbsp;{{ ucwords( Auth::user()->role) }}</h3>
                    @if(!empty($param['model_type']))
                        <h3><b>Data Type:</b>&nbsp;&nbsp;&nbsp;{{ ucwords($param['model_type']) }}</h3>
                    @endif
                    <table class="table">
                        <tbody>
                            @foreach($param['columns'] as $column)
                                @if(empty($param['protected']))
                                    <tr>
                                        <th scope="row"><b>{{ ucwords(str_replace('_', ' ', $column)) }}</b></th>
                                        <td>{{ $param['model']->$column }}</td>
                                    </tr>
                                @else
                                    @if(!in_array($column, $param['protected']))
                                        <tr>
                                            <th scope="row"><b>{{ ucwords(str_replace('_', ' ', $column)) }}</b></th>
                                            <td>{{ $param['model']->$column }}</td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="account-vertical_banner" class="col">

                </div>
            @elseif(in_array($param['page_type'], array('users', 'members', 'advertisements', 'workouts')))
                <div class="col">
                    @auth
                        @if(Auth::user()->role == 'admin')
                            <div class="row">
                                <div class="col">
                                    <a class="btn btn-dark" href="{{ url('view/dashboard') }}" role="button" style="width: 100%">Admin Dashboard</a>
                                    <div class="spacer-20"></div>
                                    <a class="btn btn-dark" href="{{ url('view/user/' . Auth::user()->getAuthIdentifier()) }}" role="button" style="width: 100%">View Personal Account</a>
                                    <div class="spacer-20"></div>
                                    <a class="btn btn-dark" href="{{ url('form/user/' . Auth::user()->getAuthIdentifier()) }}" role="button" style="width: 100%">Edit Personal Account</a>
                                </div>
                            </div>
                        @endif
                    @endauth
                    @if(!empty($param['models']))
                        @if($param['models']->count() < 1)
                            <div class="spacer-50"></div>
                            <h2 style="width: 90%;">Welcome to your {{ $param['model_type'] }} tracker, there are no records to display.</h2>
                            <span class="spacer-50"></span>
                            <h5 style="width: 80%">This is not a reflection on you, this just means that we do not have any stored records. If you want to store some {{ $param['model_type'] }} records please start by clicking below.
                                <br>
                                <br>
                                @if(empty($param['workout_type']))
                                    <a href="{{ url('form/' . $param['model_type']) }}" class="btn btn-secondary" role="button">add a {{ $param['model_type'] }} record</a>
                                @else
                                    <a href="{{ url('form/' . $param['model_type'] . '/0/' . $param['workout_type']) }}" class="btn btn-secondary" role="button">add a {{ $param['model_type'] }} record</a>
                                @endif
                            </h5>
                            <div class="spacer-20"></div>
                        @endif
                    @endif
                    <h3>{{ ucwords($param['page_type']) }} Data</h3>
                    <div class="spacer-20"></div>
                    @if(empty($param['workout_type']))
                        <a class="btn btn-dark" href="{{ url('form/' . $param['model_type']) }}" role="button">Add {{ ucwords($param['model_type']) }}</a>
                    @else
                        <a class="btn btn-dark" href="{{ url('form/' . $param['model_type'] . '/0/' . $param['workout_type']) }}" role="button">Add {{ ucwords($param['model_type']) }}</a>
                    @endif
                    <div class="spacer-20"></div>
                    <table class="table">
                        <thead>
                        <tr class="text-center">
                            @if(!empty($param['columns']))
                                @foreach($param['columns'] as $column)
                                    @if(in_array($column, $param['display']))
                                        @if(empty($param['column_overrides']))
                                            <th scope="col">{{ ucwords(str_replace('_', ' ', $column)) }}</th>
                                        @else
                                            @if(array_key_exists($column, $param['column_overrides']))
                                                <th scope="col">{{ ucwords(str_replace('_', ' ', $param['column_overrides'][$column])) }}</th>
                                            @else
                                                <th scope="col">{{ ucwords(str_replace('_', ' ', $column)) }}</th>
                                            @endif
                                        @endif

                                    @endif
                                @endforeach
                            @endif
                            <th scope="col">View</th>
                            <th scope="col">Edit</th>
                            @if($param['model_type'] === 'workout')
                                <th scope="col">Delete</th>
                            @else
                                <th scope="col">Change Status</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($param['models']))
                            @foreach($param['models'] as $model)
                                <tr class="text-center">
                                    @foreach($param['columns'] as $column)
                                        @if(in_array($column, $param['display']))
                                            @if($column === 'id')
                                                <th scope="row">{{ $model->$column }}</th>
                                            @else
                                                <td>{{ $model->$column }}</td>
                                            @endif
                                        @endif
                                    @endforeach

                                    @if($param['model_type'] === 'workout')
                                        <td><a href="{{ url('workout/detail/' . $model->id) }}">View</a></td>
                                        <td><a href="{{ url('form/' . $param['model_type'] . '/' . $model->id) }}">Edit</a></td>
                                        <td><a href="{{ url('form/' . $param['model_type'] . '/' . $model->id . '/change_status')  }}">Delete</a></td>
                                    @else
                                        <td><a href="{{ url('view/' . $param['model_type'] . '/' . $model->id) }}">View</a></td>
                                        <td><a href="{{ url('form/' . $param['model_type'] . '/' . $model->id) }}">Edit</a></td>
                                        <td><a href="{{ url('form/' . $param['model_type'] . '/' . $model->id . '/change_status')  }}">Change Status</a></td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            @elseif ($param['page_type'] === 'dashboard')
                <h1>Admin Tasks</h1>
                <div class="spacer-20"></div>
                <a class="btn btn-dark" href="{{ url('view/advertisement') }}" role="button" style="width: 100%">Manage Advertisements</a>
                <div class="spacer-20"></div>
                <a class="btn btn-dark" href="{{ url('view/user') }}" role="button" style="width: 100%">Manage Users</a>
                <div class="spacer-20"></div>
                <a class="btn btn-dark" href="{{ url('view/member') }}" role="button" style="width: 100%">Manage Memberships</a>
                <div class="spacer-20"></div>
            @endif
        </div>
        <div class="spacer-50"></div>
    </div>
@endsection
@section('footer')
    @parent
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @if(Auth::user()->role === 'admin')
                @if(Request::url() == 'http://fittestwarrior.local/view/dashboard')
                    <li class="breadcrumb-item active" aria-current="page">account</li>
                @else
                    <li class="breadcrumb-item"><a href="{{ url('view/dashboard') }}">admin</a></li>
                @endif
                @if(Request::url() == 'http://fittestwarrior.local/view/advertisement')
                    <li class="breadcrumb-item active" aria-current="page">advertisements</li>
                @else
                    <li class="breadcrumb-item"><a href="{{ url('view/advertisement') }}">advertisements</a></li>
                @endif
                @if(Request::url() == 'http://fittestwarrior.local/view/user')
                    <li class="breadcrumb-item active" aria-current="page">users</li>
                @else
                    <li class="breadcrumb-item"><a href="{{ url('view/user') }}">users</a></li>
                @endif
                @if(Request::url() == 'http://fittestwarrior.local/view/member')
                    <li class="breadcrumb-item active" aria-current="page">memberships</li>
                @else
                    <li class="breadcrumb-item"><a href="{{ url('view/member') }}">memberships</a></li>
                @endif
            @else
                @if(Request::url() == 'http://fittestwarrior.local/view/user')
                    <li class="breadcrumb-item active" aria-current="page">users</li>
                @else
                    <li class="breadcrumb-item"><a href="{{ url('view/user') }}">users</a></li>
                @endif
            @endif
        </ol>
    </nav>
@endsection