@extends('layouts.app')

@section('head')
@parent
@endsection
@section('navigation')
@parent
@endsection
@section('content')
@include('layouts.dashboard_nav')
<div id="workouts">
    <div class="spacer-50"></div>
    <div class="row">
        <div class="col">
            @if(empty($param['models']))
                <h2 style="width: 90%;">Welcome to your workout tracker, there are no records to display.</h2>
                <span class="spacer-50"></span>
                <h5 style="width: 80%">This is not a reflection on you, this just means that we do not have any stored records. If you want to store some workout records please start by clicking below.
                    <br>
                    <br>
                    <a href="{{ url('workout') }}" class="btn btn-secondary" role="button">add a workout record</a>
                </h5>
                <div class="spacer-50"></div>
            @else
                <div class="table-responsive d-none d-sm-block">
                    <h4>Workouts</h4>
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">TRAINING</th>
                            <th scope="col" class="text-center">WORKOUT</th>
                            <th scope="col" class="text-center">DATE CREATED</th>
                            <th scope="col" class="text-center">DURATION</th>
                            <th scope="col" class="text-center">WEIGHT</th>
                            <th scope="col" class="text-center">REPETITIONS</th>
                            <th scope="col" class="text-center">VIEW</th>
                            <th scope="col" class="text-center">EDIT</th>
                            <th scope="col" class="text-center">DELETE</th>
                        </tr>
                        <thead>
                        <tbody>
                        @foreach($param['models'] as $model)
                            @if($model->user_id == Auth::user()->getAuthIdentifier())
                                <tr>
                                    <th scope="row" class="text-center">{{ str_replace('_', ' ', $model->training) }}</th>
                                    <th class="text-center">{{ str_replace('_', ' ', $model->type) }}</th>
                                    <td class="text-center">{{ date('d-m-Y', strtotime($model->created_at)) }}</td>
                                    <td class="text-center">{{ $model->duration }}</td>
                                    <td class="text-center">{{ $model->weight }} {{ $model->weight_unit }}</td>
                                    <td class="text-center">{{ $model->repetitions }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('view/workout') }}/{{ $model->id }}">view</a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('form/workout') }}/{{ $model->id }}">edit</a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('form/workout') }}/{{ $model->id }}/change_status" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">{{ __('delete') }}</a>

                                        <form id="delete-form" action="{{ url('workout/delete') }}/{{ $model->type }}/{{ $model->id }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
@section('footer')
    @parent
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('workout') }}">add workout</a></li>
                @if(empty($param['models']))
                    <li class="breadcrumb-item active" aria-current="page">edit</li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">{{ str_replace('_', ' ', $param['models']->first()->type) }}</li>
                @endif
            </ol>
        </nav>
@endsection