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
        <h2>{{ucwords(str_replace("_"," ",$type))}}</h2>
        <div class="spacer-50"></div>
        <form method="POST" action="{{ url('fitness/save') }}">
            @csrf
            <div class="form-group row">
                <label for="work_out_time"
                       class="col-md-4 col-form-label text-md-right">{{ __('Time (min:sec)') }}</label>

                <div class="col-md-6">
                    <input id="work_out_time" type="text"
                           class="form-control{{ $errors->has('work_out_time') ? ' is-invalid' : '' }}"
                           name="work_out_time" value="{{ old('work_out_time') }}" placeholder="Enter Time (min:sec)"
                           required autofocus>

                    @if ($errors->has('work_out_time'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('work_out_time') }}</strong>
                        </span>
                    @endif
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
                <label for="rest" class="col-md-4 col-form-label text-md-right">{{ __('Rest (min:sec)') }}</label>

                <div class="col-md-6">
                    <input id="rest" type="text"
                           class="form-control{{ $errors->has('rest') ? ' is-invalid' : '' }}" name="rest"
                           value="{{ old('rest') }}" placeholder="Rest (min:sec)" required>

                    @if ($errors->has('rest'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('rest') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="reps"
                       class="col-md-4 col-form-label text-md-right">{{ __('Reps') }}</label>

                <div class="col-md-6">
                    <input id="reps" type="text"
                           class="form-control{{ $errors->has('reps') ? ' is-invalid' : '' }}"
                           name="reps" placeholder="Enter number of Reps" required>

                    @if ($errors->has('reps'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('reps') }}</strong>
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

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                </div>
            </div>

            <input type="hidden" name="workout_type" value={{str_replace("_"," ",$type)}}>
        </form>
        <div class="spacer-50"></div>
    </div>
    <div class="spacer-100"></div>
@endsection

@section('footer')
    @parent
@endsection
