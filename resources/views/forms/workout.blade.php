@extends('layouts.app')

@section('head')
@parent
@endsection

@section('navigation')
@parent
@endsection

@section('content')
    <div class="spacer-100"></div>
    <div id="form-workout">
        <h2>Workout Report</h2>
        <div class="spacer-50"></div>
        <form method="POST" action="{{ url('workout/report/save') }}">
            @csrf
            <div class="form-group row">
                <label for="training_type" class="col-md-4 col-form-label text-md-right">{{ __('Training Type') }}</label>

                <div class="col-md-6">
                    <input id="training_type" type="text" class="form-control{{ $errors->has('training_type') ? ' is-invalid' : '' }}" name="training_type" value="{{ old('training_type') }}" placeholder="Enter Training Type" required autofocus>

                    @if ($errors->has('training_type'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('training_type') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="session_type" class="col-md-4 col-form-label text-md-right">{{ __('Session Type') }}</label>

                <div class="col-md-6">
                    <input id="session_type" type="text" class="form-control{{ $errors->has('session_type') ? ' is-invalid' : '' }}" name="session_type" value="{{ old('session_type') }}" placeholder="Enter Session Type" required autofocus>

                    @if ($errors->has('session_type'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('session_type') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="workout_type" class="col-md-4 col-form-label text-md-right">{{ __('Workout Type') }}</label>

                <div class="col-md-6">
                    <input id="workout_type" type="text" class="form-control{{ $errors->has('workout_type') ? ' is-invalid' : '' }}" name="workout_type" value="{{ old('workout_type') }}" placeholder="Enter Workout Type" required>

                    @if ($errors->has('workout_type'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('workout_type') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="start_date_time" class="col-md-4 col-form-label text-md-right">{{ __('Start Date') }}</label>

                <div class="col-md-6">
                    <input id="start_date_time" type="text" class="form-control{{ $errors->has('start_date_time') ? ' is-invalid' : '' }}" name="start_date_time" placeholder="Enter Start Time" required>

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
                    <input id="end_date_time" type="text" class="form-control{{ $errors->has('end_date_time') ? ' is-invalid' : '' }}" name="end_date_time" placeholder="Enter End Time" required>

                    @if ($errors->has('end_date_time'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('end_date_time') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="repetitions" class="col-md-4 col-form-label text-md-right">{{ __('Repetitions') }}</label>

                <div class="col-md-6">
                    <input id="repetitions" type="text" class="form-control{{ $errors->has('repetitions') ? ' is-invalid' : '' }}" name="repetitions" placeholder="Enter Your Repetitions" required>

                    @if ($errors->has('repetitions'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('repetitions') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="sets" class="col-md-4 col-form-label text-md-right">{{ __('Sets') }}</label>

                <div class="col-md-6">
                    <input id="sets" type="text" class="form-control{{ $errors->has('sets') ? ' is-invalid' : '' }}" name="sets" placeholder="Enter Your Sets" required>

                    @if ($errors->has('sets'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('sets') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="duration" class="col-md-4 col-form-label text-md-right">{{ __('Workout Duration') }}</label>

                <div class="col-md-6">
                    <input id="duration" type="text" class="form-control{{ $errors->has('duration') ? ' is-invalid' : '' }}" name="duration" placeholder="Enter The Duration of the Workout">

                    @if ($errors->has('duration'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('duration') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="weight" class="col-md-4 col-form-label text-md-right">{{ __('Weight') }}</label>

                <div class="col-md-6">
                    <input id="weight" type="text" class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight" placeholder="Enter The Weight Used">

                    @if ($errors->has('weight'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('weight') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="calories" class="col-md-4 col-form-label text-md-right">{{ __('Calories Burned') }}</label>

                <div class="col-md-6">
                    <input id="calories" type="text" class="form-control{{ $errors->has('calories') ? ' is-invalid' : '' }}" name="calories" placeholder="Enter The Calories Burned">

                    @if ($errors->has('calories'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('calories') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="resistance_factor" class="col-md-4 col-form-label text-md-right">{{ __('Resistance Factor') }}</label>

                <div class="col-md-6">
                    <input id="resistance_factor" type="text" class="form-control{{ $errors->has('resistance_factor') ? ' is-invalid' : '' }}" name="resistance_factor" placeholder="Enter The Resistance Factor">

                    @if ($errors->has('resistance_factor'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('resistance_factor') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="muscle_groups" class="col-md-4 col-form-label text-md-right">{{ __('Muscle Groups') }}<br>{{ __('(comma separated list)') }}</label>

                <div class="col-md-6">
                    <input id="muscle_groups" type="text" class="form-control{{ $errors->has('muscle_groups') ? ' is-invalid' : '' }}" name="muscle_groups" placeholder="Enter Muscle Groups Engaged">

                    @if ($errors->has('muscle_groups'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('muscle_groups') }}</strong>
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
@endsection
