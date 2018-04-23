@extends('layouts.app')

@section('head')
    @parent
@endsection

@section('navigation')
    @parent
@endsection

@section('content')
    <div class="spacer-100"></div>
    <div id="form-nutrition">
        <h2>Health Infomation</h2>
        <div class="spacer-50"></div>
        <form method="POST" action="{{ url('health/store') }}">
            @csrf
            @if(!empty($params['health_id']))
                <input type="hidden" name="health_id" value="{{ $params['health_id'] }}">
            @endif
            <div class="form-group row">
                <label for="ldl_cholesterol"
                       class="col-md-4 col-form-label text-md-right">{{ __('LDL Cholesterol') }}</label>

                <div class="col-md-6">
                    @if(empty($health['ldl_cholesterol']))
                        <input id="ldl_cholesterol" type="text" class="form-control{{ $errors->has('ldl_cholesterol') ? ' is-invalid' : '' }}" name="ldl_cholesterol" value="{{ old('ldl_cholesterol') }}" placeholder="Enter LDL Cholesterol Intake" required autofocus>
                    @else
                        <input id="ldl_cholesterol" type="text" class="form-control{{ $errors->has('ldl_cholesterol') ? ' is-invalid' : '' }}" name="ldl_cholesterol" value="{{ $health['ldl_cholesterol'] }}" required autofocus>
                    @endif

                    @if ($errors->has('ldl_cholesterol'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('ldl_cholesterol') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="fat_percentage" class="col-md-4 col-form-label text-md-right">{{ __('Fat Percentage') }}</label>

                <div class="col-md-6">
                    @if(empty($health['fat_percentage']))
                        <input id="fat_percentage" type="text" class="form-control{{ $errors->has('fat_percentage') ? ' is-invalid' : '' }}" name="fat_percentage" value="{{ old('fat_percentage') }}" placeholder="Enter Fat Percentage" required autofocus>
                    @else
                        <input id="fat_percentage" type="text" class="form-control{{ $errors->has('fat_percentage') ? ' is-invalid' : '' }}" name="fat_percentage" value="{{ $health['fat_percentage'] }}" required autofocus>
                    @endif

                    @if ($errors->has('fat_percentage'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('fat_percentage') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="systolic_blood_pressure" class="col-md-4 col-form-label text-md-right">{{ __('Systolic Blood Pressure') }}</label>

                <div class="col-md-6">
                    @if(empty($health['systolic_blood_pressure']))
                        <input id="systolic_blood_pressure" type="text" class="form-control{{ $errors->has('systolic_blood_pressure') ? ' is-invalid' : '' }}" name="systolic_blood_pressure" value="{{ old('systolic_blood_pressure') }}" placeholder="Enter Systolic Blood Pressure" required>
                    @else
                        <input id="systolic_blood_pressure" type="text" class="form-control{{ $errors->has('systolic_blood_pressure') ? ' is-invalid' : '' }}" name="systolic_blood_pressure" value="{{ $health['systolic_blood_pressure'] }}" required>
                    @endif

                    @if ($errors->has('systolic_blood_pressure'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('systolic_blood_pressure') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="diastolic_blood_pressure" class="col-md-4 col-form-label text-md-right">{{ __('Diastolic Blood Pressure') }}</label>

                <div class="col-md-6">
                    @if(empty($health['diastolic_blood_pressure']))
                        <input id="diastolic_blood_pressure" type="text" class="form-control{{ $errors->has('diastolic_blood_pressure') ? ' is-invalid' : '' }}" name="diastolic_blood_pressure"  value="{{ old('diastolic_blood_pressure') }}" placeholder="Enter Diastolic Blood Pressure" required>
                    @else
                        <input id="diastolic_blood_pressure" type="text" class="form-control{{ $errors->has('diastolic_blood_pressure') ? ' is-invalid' : '' }}" name="diastolic_blood_pressure"  value="{{ $health['diastolic_blood_pressure'] }}" required>
                    @endif

                    @if ($errors->has('diastolic_blood_pressure'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('diastolic_blood_pressure') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="hdl_cholesterol" class="col-md-4 col-form-label text-md-right">{{ __('HDL Cholesterol') }}</label>

                <div class="col-md-6">
                    @if(empty($health['hdl_cholesterol']))
                        <input id="hdl_cholesterol" type="text" class="form-control{{ $errors->has('hdl_cholesterol') ? ' is-invalid' : '' }}" name="hdl_cholesterol" value="{{ old('hdl_cholesterol') }}" placeholder="Enter HDL Cholesterol Intake" required>
                    @else
                        <input id="hdl_cholesterol" type="text" class="form-control{{ $errors->has('hdl_cholesterol') ? ' is-invalid' : '' }}" name="hdl_cholesterol" value="{{ $health['hdl_cholesterol'] }}" required>
                    @endif

                    @if ($errors->has('hdl_cholesterol'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('hdl_cholesterol') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="start_date_time" class="col-md-4 col-form-label text-md-right">{{ __('Start Date') }}</label>

                <div class="col-md-6">
                    @if(empty($health['start_date_time']))
                        <input id="start_date_time" type="date" class="form-control{{ $errors->has('start_date_time') ? ' is-invalid' : '' }}" name="start_date_time" value="{{ old('start_date_time') }}">
                    @else
                        <input id="start_date_time" type="date" class="form-control{{ $errors->has('start_date_time') ? ' is-invalid' : '' }}" name="start_date_time" value="{{ date('m/d/Y', strtotime($health['start_date_time'])) }}">
                    @endif

                    @if ($errors->has('start_date_time'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('start_date_time') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="end_date_time" class="col-md-4 col-form-label text-md-right">{{ __('End Date') }}</label>

                <div class="col-md-6">
                    @if(empty($health['end_date_time']))
                        <input id="end_date_time" type="date" class="form-control{{ $errors->has('end_date_time') ? ' is-invalid' : '' }}" name="end_date_time">
                    @else
                        <input id="end_date_time" type="date" class="form-control{{ $errors->has('end_date_time') ? ' is-invalid' : '' }}" name="end_date_time" value="{{ date('m/d/Y', strtotime($health['end_date_time'])) }}">
                    @endif

                    @if ($errors->has('end_date_time'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('end_date_time') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                </div>
            </div>
        </form>
        <div class="spacer-50"></div>
    </div>
    <div class="spacer-100"></div>
@endsection

@section('footer')
    @parent
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('health') }}">health</a></li>
                <li class="breadcrumb-item active" aria-current="page">add health</li>
            </ol>
        </nav>
@endsection
