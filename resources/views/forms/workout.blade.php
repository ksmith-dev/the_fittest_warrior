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
        <h2>{{ ucwords(str_replace('_',' ', $workout_type)) }}</h2>
        <div class="spacer-50"></div>
        <form method="POST" action="{{ url('workout/report/save') }}">
            @csrf
            <div class="form-group row">
                <label for="training_type" class="col-md-4 col-form-label text-md-right">{{ __('Training Type') }}</label>
                <div class="col-md-6">
                    @if (empty($training_type))
                        <select id="training_type" type="text" class="form-control{{ $errors->has('training_type') ? ' is-invalid' : '' }}" name="training_type"  required autofocus>
                            <option selected disabled>Select Training Type </option>
                            @foreach ($training_types as $training_type)
                                <option value="{{ ucwords(str_replace('_', ' ', $training_type)) }}" selected>{{ ucwords(str_replace('_', ' ', $training_type)) }}</option>
                            @endforeach
                        </select>
                    @else
                        <select id="training_type" type="text" class="form-control{{ $errors->has('training_type') ? ' is-invalid' : '' }}" name="training_type"  required disabled>
                            <option value="{{ ucwords(str_replace('_', ' ', $training_type)) }}" selected>{{ ucwords(str_replace('_', ' ', $training_type)) }}</option>
                        </select>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="session_type" class="col-md-4 col-form-label text-md-right">{{ __('Session Type') }}</label>
                <div class="col-md-6">
                    @if (empty($session_type))
                        <select id="session_type" type="text" class="form-control{{ $errors->has('session_type') ? ' is-invalid' : '' }}" name="session_type" required disabled>
                            @foreach ($session_types as $session_type)
                                <option value="{{ ucwords(str_replace('_', ' ', $session_type)) }}" selected>{{ ucwords(str_replace('_', ' ', $session_type)) }}</option>
                            @endforeach
                        </select>
                    @else
                        <select id="session_type" type="text" class="form-control{{ $errors->has('session_type') ? ' is-invalid' : '' }}" name="session_type" required disabled>
                            <option value="{{ ucwords(str_replace('_', ' ', $session_type)) }}" selected>{{ ucwords(str_replace('_', ' ', $session_type)) }}</option>
                        </select>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="workout_type" class="col-md-4 col-form-label text-md-right">{{ __('Workout Type') }}</label>

                <div class="col-md-6">
                    @if (empty($workout_type))
                        <input id="workout_type" type="text" class="form-control" name="workout_type" placeholder="Enter Workout Type">
                    @else
                        <input id="workout_type" type="text" class="form-control" name="workout_type" value="{{ ucwords(str_replace('_', ' ', $workout_type)) }}" disabled>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="duration_min"
                       class="col-md-4 col-form-label text-md-right">{{ __('Time (min:sec)') }}</label>

                <div class="col-md-6">
                    <div class="form-inline">
                        <input class="col form-control {{ $errors->has('duration_min') ? ' is-invalid' : '' }}" type="number" min="0" max="60" name="duration_min" value="{{ old('duration_min') }}" placeholder="min" value="0" required>
                        <input class="col form-control {{ $errors->has('duration_sec') ? ' is-invalid' : '' }}" type="number" min="0" max="60" name="duration_sec" value="{{ old('duration_sec') }}" placeholder="sec" value="0" required>
                        {{--<input class="col form-control {{ $errors->has('duration_msc') ? ' is-invalid' : '' }}" type="number" min="0" max="60" name="rest_sec" value="{{ old('rest_msc') }}" placeholder="millisecond" value="0" required>--}}
                    </div>
                    @if ($errors->has('duration_min'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('duration_min') }}</strong>
                        </span>
                    @endif
                    @if ($errors->has('rest_sec'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('duration_sec') }}</strong>
                        </span>
                    @endif
                    {{--@if ($errors->has('rest_msc'))--}}
                    {{--<span class="invalid-feedback">--}}
                    {{--<strong>{{ $errors->first('duration_msc') }}</strong>--}}
                    {{--</span>--}}
                    {{--@endif--}}
                </div>
            </div>
            <div class="form-group row">
                <label for="weight"
                       class="col-md-4 col-form-label text-md-right">{{ __('Weight (lbs)') }}</label>

                <div class="col-md-6">
                    <input id="weight" type="text"
                           class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}"
                           name="weight" value="{{ old('weight') }}" placeholder="Enter Weight (lbs)"
                           required autofocus>

                    @if ($errors->has('weight'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('weight') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="rest_min" class="col-md-4 col-form-label text-md-right">{{ __('Rest (min:sec)') }}</label>

                <div class="col-md-6">
                    <div class="form-inline">
                        <input class="col form-control {{ $errors->has('rest_min') ? ' is-invalid' : '' }}" type="number" min="0" max="60" name="rest_min" value="{{ old('rest_min') }}" placeholder="min" value="0" required>
                        <input class="col form-control {{ $errors->has('rest_sec') ? ' is-invalid' : '' }}" type="number" min="0" max="60" name="rest_sec" value="{{ old('rest_sec') }}" placeholder="sec" value="0" required>
                        {{--<input class="col form-control {{ $errors->has('rest_msc') ? ' is-invalid' : '' }}" type="number" min="0" max="60" name="rest_sec" value="{{ old('rest_msc') }}" placeholder="millisecond" value="0" required>--}}
                    </div>
                    @if ($errors->has('rest_min'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('rest_min') }}</strong>
                        </span>
                    @endif
                    @if ($errors->has('rest_sec'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('rest_sec') }}</strong>
                        </span>
                    @endif
                    {{--@if ($errors->has('rest_msc'))--}}
                    {{--<span class="invalid-feedback">--}}
                    {{--<strong>{{ $errors->first('rest_msc') }}</strong>--}}
                    {{--</span>--}}
                    {{--@endif--}}
                </div>
            </div>
            <div class="form-group row">
                <label for="repetitions"
                       class="col-md-4 col-form-label text-md-right">{{ __('Reps') }}</label>

                <div class="col-md-6">
                    <input id="repetitions" type="text"
                           class="form-control{{ $errors->has('repetitions') ? ' is-invalid' : '' }}"
                           name="repetitions" placeholder="Enter number of Reps" required>

                    @if ($errors->has('repetitions'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('repetitions') }}</strong>
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
                <label for="sets" class="col-md-4 col-form-label text-md-right">{{ __('Sets') }}</label>

                <div class="col-md-6">
                    <input id="sets" type="text"
                           class="form-control{{ $errors->has('sets') ? ' is-invalid' : '' }}"
                           name="sets" placeholder="Enter number of Sets" required>

                    @if ($errors->has('sets'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('sets') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="start_date_time" class="col-md-4 col-form-label text-md-right">{{ __('Start Date') }}</label>

                <div class="col-md-6">
                    <input id="start_date_time" type="date"
                           class="form-control{{ $errors->has('start_date_time') ? ' is-invalid' : '' }}" name="start_date_time"
                           placeholder="Enter Start Date">

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
                    <input id="end_date_time" type="date"
                           class="form-control{{ $errors->has('end_date_time') ? ' is-invalid' : '' }}" name="end_date_time"
                           placeholder="Enter End Date">

                    @if ($errors->has('end_date_time'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('end_date_time') }}</strong>
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
                <label for="muscle_groups" class="col-md-4 col-form-label text-md-right">{{ __('Muscle Groups') }}</label>
                <div class="col-md-6">
                    <div class="form-inline">
                        @foreach($muscle_groups as $muscle_group)
                            <label for="{{ $muscle_group->muscle_group }}">{{ ucwords(str_replace('_', ' ', $muscle_group->muscle_group)) }}</label><span class="checked"></span>
                            <input id="{{ $muscle_group->muscle_group }}" class="col form-control" type="checkbox" name="{{ $muscle_group->muscle_group }}" value="{{ ucwords(str_replace('_', ' ', $muscle_group->muscle_group)) }}" checked disabled>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                </div>
            </div>

            <input type="hidden" name="workout_type" value={{ ucwords(str_replace('_',' ', $workout_type)) }}>
        </form>
        <div class="spacer-50"></div>
    </div>
    <div class="spacer-100"></div>
@endsection

@section('footer')
    @parent
@endsection