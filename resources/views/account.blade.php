@extends('layouts.app')

@section('head')
    @parent
@endsection
@section('navigation')
    @parent
@endsection
@section('content')
    <div id="admin">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @if(Auth::user()->role === 'admin')
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
                    @if(Request::url() == 'http://fittestwarrior.local/view/fitness_group')
                        <li class="breadcrumb-item active" aria-current="page">fitness groups</li>
                    @else
                        <li class="breadcrumb-item"><a href="{{ url('view/fitness_group') }}">fitness groups</a></li>
                    @endif
                    @if(Request::url() == 'http://fittestwarrior.local/view/advertisement')
                        <li class="breadcrumb-item active" aria-current="page">advertisements</li>
                    @else
                        <li class="breadcrumb-item"><a href="{{ url('view/advertisement') }}">advertisements</a></li>
                    @endif
                @else
                    @if($param['model_type'] === 'workout')
                        @if(Request::url() == 'http://fittestwarrior.local/view/' . $param['model_type'] . '/0/' . $param['modifier'])
                            <li class="breadcrumb-item active" aria-current="page">{{ $param['model_type'] }}</li>
                        @else
                            <li class="breadcrumb-item"><a href="{{ url('view/' . $param['model_type'] . '/0/' . $param['modifier']) }}">{{ $param['model_type'] }}</a></li>
                        @endif
                    @else
                        @if(Request::url() == 'http://fittestwarrior.local/view/' . $param['model_type'])
                            <li class="breadcrumb-item active" aria-current="page">{{ $param['model_type'] }}</li>
                        @else
                            <li class="breadcrumb-item"><a href="{{ url('view/' . $param['model_type']) }}">{{ $param['model_type'] }}</a></li>
                        @endif
                    @endif
                @endif
            </ol>
        </nav>
        <div class="row">
            <div id="account-vertical_banner" class="col">

            </div>
        </div>
        @if(!empty(Session::has('alert')))
            @switch(Session::get('alert'))
                @case('success')
                <div class="row">
                    <div class="col">
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    </div>
                </div>
                @break

                @case('warning')
                <div class="row">
                    <div class="col">
                        <div class="alert alert-warning" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    </div>
                </div>
                @break

                @default
                <div class="row">
                    <div class="col">
                        <div class="alert alert-secondary" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    </div>
                </div>
            @endswitch
        @endif
        <div class="row">
            @if(Auth::user()->role === 'admin')
                <h1>Admin Tasks</h1>
                <div class="spacer-20"></div>
                <a class="btn btn-warning" href="{{ url('view/user') }}" name="manageUsersButton" role="button" style="width: 100%">MANAGE USERS</a>
                <div class="spacer-20"></div>
                <a class="btn btn-warning" href="{{ url('view/member') }}" name="manageMembershipsButton" role="button" style="width: 100%">MANAGE MEMBERSHIPS</a>
                <div class="spacer-20"></div>
                <a class="btn btn-warning" href="{{ url('view/fitness_group') }}" name="manageGroupsButton" role="button" style="width: 100%">MANAGE GROUPS</a>
                <div class="spacer-20"></div>
                <a class="btn btn-warning" href="{{ url('view/advertisement') }}" name="manageAdvertisementsButton" role="button" style="width: 100%">MANAGE ADVERTISEMENTS</a>
                <div class="spacer-20"></div>
                <a class="btn btn-warning" href="{{ url('email_list') }}" role="button" style="width: 100%">MANAGE STAY INFORMED LIST</a>
                <div class="spacer-20"></div>
            @endif
            @if(in_array($param['page_type'], array('user', 'member', 'advertisement')))
                <div class="col-8">
                    @if(!empty($param['model']))
                        <a class="btn btn-warning" href="{{ url('form/user/' . $param['model']->id) }}" role="button" name="editAccountInfoButton" style="float: right;">Edit Account Information</a>
                    @endif
                    @if(Auth::user()->role === 'admin')
                        <div class="spacer-100"></div>
                    @else
                        <div class="spacer-20"></div>
                    @endif
                    <div class="spacer-20"></div>
                        <h1>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h1>
                        <h3><b>{{ ucwords($param['model_type']) }} Role:</b>&nbsp;&nbsp;&nbsp;{{ ucwords( Auth::user()->role) }}</h3>
                        @if(!empty($param['model_type']))
                            <h2></h2>
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
                <div class="col">
                    @if($param['page_type'] === 'user')
                        <img id="user-avatar" src="{{ url(Auth::user()->avatar_path) }}" style="width: 200px; display: block; margin: auto; margin-top: 40px;">
                        <div class="spacer-50"></div>
                        @if(!empty($param['badges']))
                            @foreach($param['badges'] as $badge)
                                <div class="row">
                                    <div class="col">
                                        <span class="img-centered-text" style="color: white;"><b>{{ $badge['name'] }}</b></span>
                                        <img src="{{ url($badge['img_src']) }}" style="border-radius: 50px; display: block; width: 150px; margin: 20px auto auto;">
                                        <h3 class="text-center">{{ $badge['img_alt'] }}</h3>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endif
                </div>
            @elseif(in_array($param['page_type'], array('users', 'members', 'advertisements', 'workouts', 'fitness_groups')))
                <div class="col">
                    @if(!empty($param['models']))
                        @if($param['models']->count() < 1)
                            <div class="spacer-50"></div>
                            <h2 style="width: 90%;">Welcome to your {{ $param['model_type'] }} tracker, there are no records to display.</h2>
                            <span class="spacer-50"></span>
                            <h5 style="width: 80%">This is not a reflection on you, this just means that we do not have any stored records. If you want to store some {{ $param['model_type'] }} records please start by clicking below.</h5>
                            <div class="spacer-20"></div>
                        @endif
                    @endif
                    <div class="spacer-20"></div>
                    @if(!empty($param['page_type']))
                        @if(!$param['page_type'] === 'user')
                                <a class="btn btn-warning" href="{{ url('fitness') }}" role="button" style="float: right;">Add {{ ucwords($param['model_type']) }}</a>
                        @endif
                    @endif
                        @if($param['page_type'] !== 'users')
                            @if($param['model_type'] === 'workout')
                                <a class="btn btn-warning" href="{{ url('form/' . $param['model_type']) . '/0/' . $param['modifier'] }}" role="button" style="float: right;">Add {{ ucwords(str_replace('_', ' ', $param['model_type'])) }}</a>
                            @else
                                <a class="btn btn-warning" href="{{ url('form/' . $param['model_type']) }}" role="button" style="float: right;">Add {{ ucwords(str_replace('_', ' ', $param['model_type'])) }}</a>
                            @endif
                        @endif
                    <h3>{{ ucwords(str_replace('_', ' ', $param['page_type'])) }} Data</h3>
                    <div class="spacer-20"></div>
                    @if(!empty($param['model_type']))
                        @if($param['model_type'] === 'workout')
                            <h5>Type: {{ ucwords(str_replace('_', ' ',  $param['modifier'])) }}</h5>
                            <div class="spacer-20"></div>
                        @endif
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
                                                <td>{{ str_limit($model->$column, 45) }}</td>
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
            @endif
        </div>
        <div class="spacer-50"></div>
    </div>
@endsection
@section('footer')
    @parent
@endsection