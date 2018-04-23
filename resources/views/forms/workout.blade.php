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
        <h2>{{ ucwords(str_replace('_',' ', $params['workout_type'])) }}</h2>
        <div class="spacer-50"></div>
        <form method="POST" action="{{ url('workout/report/store/' . $params['workout_type']) }}">
            @csrf
            @if(!empty($params['workout_id']))
                <input type="hidden" name="workout_id" value="{{ $params['workout_id'] }}">
            @endif
            <div class="form-group row">
                <label for="workout_type" class="col-md-4 col-form-label text-md-right">{{ __('Workout Type') }}</label>

                <div class="col-md-6">
                    @if (empty($params['workout_type']))
                        <input id="workout_type" type="text" class="form-control" name="workout_type" placeholder="Enter Workout Type">
                    @else
                        <input id="workout_type" type="text" class="form-control" name="workout_type" value="{{ $params['workout_type'] }}" readonly required>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="duration_min" class="col-md-4 col-form-label text-md-right">{{ __('Time') }}</label>

                <div class="col-md-6">
                    <div class="form-inline">
                        @if(empty($workout->duration))
                            <input class="col form-control {{ $errors->has('duration_min') ? ' is-invalid' : '' }} duration" type="number" min="0" max="60" name="duration_min" value="{{ old('duration_min')  || '0' }}" placeholder="min" required>
                            <div class="col-1" style="padding: 4px;">min</div>
                            <input id="duration_sec" class="col form-control {{ $errors->has('duration_sec') ? ' is-invalid' : '' }} duration" type="number" min="0" max="60" name="duration_sec" value="{{ old('duration_sec')  || '0' }}" placeholder="sec" required>
                            <div class="col-1" style="padding: 4px;">sec</div>
                            <input id="duration_mil" class="col form-control {{ $errors->has('duration_mil') ? ' is-invalid' : '' }} duration" type="number" min="0" max="60" name="duration_mil" value="{{ old('duration_mil') || '0' }}" placeholder="millisecond" required>
                            <div class="col-1" style="padding: 4px;">mil</div>
                            <div class="invalid-feedback">please provide a valid time input</div>
                            <div id="duration-valid" class="valid-feedback">looks good!</div>
                        @else
                            <input id="duration_min" class="col form-control {{ $errors->has('duration_min') ? ' is-invalid' : '' }} duration" type="number" min="0" max="60" name="duration_min" value="{{ $workout->duration['min'] }}" placeholder="min" required>
                            <div class="col-1" style="padding: 4px;">min</div>
                            <input id="duration_sec" class="col form-control {{ $errors->has('duration_sec') ? ' is-invalid' : '' }} duration" type="number" min="0" max="60" name="duration_sec" value="{{ $workout->duration['sec'] }}" placeholder="sec" required>
                            <div class="col-1" style="padding: 4px;">sec</div>
                            <input id="duration_mil" class="col form-control {{ $errors->has('duration_mil') ? ' is-invalid' : '' }} duration" type="number" min="0" max="60" name="duration_mil" value="{{ $workout->duration['mil'] }}" placeholder="millisecond" required>
                            <div class="col-1" style="padding: 4px;">mil</div>
                            <div class="invalid-feedback">please provide a valid time input</div>
                            <div id="duration-valid" class="valid-feedback">looks good!</div>
                        @endif
                    </div>
                    @if ($errors->has('duration_min'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('duration_min') }}</strong>
                        </span>
                    @endif
                    @if ($errors->has('duration_sec'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('duration_sec') }}</strong>
                        </span>
                    @endif
                    @if ($errors->has('duration_mil'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('duration_mil') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="rest_min" class="col-md-4 col-form-label text-md-right">{{ __('Rest') }}</label>

                <div class="col-md-6">
                    <div class="form-inline">
                        @if(empty($workout->rest))
                            <input class="col form-control {{ $errors->has('rest_min') ? ' is-invalid' : '' }} rest" type="number" min="0" max="60" name="rest_min" value="{{ old('rest_min') }}" placeholder="min" required>
                            <div class="col-1" style="padding: 4px;">min</div>
                            <input class="col form-control {{ $errors->has('rest_sec') ? ' is-invalid' : '' }} rest" type="number" min="0" max="60" name="rest_sec" value="{{ old('rest_sec') }}" placeholder="sec" required>
                            <div class="col-1" style="padding: 4px;">sec</div>
                            <input class="col form-control {{ $errors->has('rest_mil') ? ' is-invalid' : '' }} rest" type="number" min="0" max="60" name="rest_mil" value="{{ old('rest_mil') }}" placeholder="millisecond" required>
                            <div class="col-1" style="padding: 4px;">mil</div>
                            <div class="invalid-feedback">please provide a valid time input</div>
                            <div id="duration-valid" class="valid-feedback">looks good!</div>
                        @else
                            <input class="col form-control {{ $errors->has('rest_min') ? ' is-invalid' : '' }} rest" type="number" min="0" max="60" name="rest_min" value="{{ $workout->rest['min'] }}" placeholder="min" required>
                            <div class="col-1" style="padding: 4px;">min</div>
                            <input class="col form-control {{ $errors->has('rest_sec') ? ' is-invalid' : '' }} rest" type="number" min="0" max="60" name="rest_sec" value="{{ $workout->rest['sec'] }}" placeholder="sec" required>
                            <div class="col-1" style="padding: 4px;">sec</div>
                            <input class="col form-control {{ $errors->has('rest_mil') ? ' is-invalid' : '' }} rest" type="number" min="0" max="60" name="rest_mil" value="{{ $workout->rest['mil'] }}" placeholder="millisecond" required>
                            <div class="col-1" style="padding: 4px;">mil</div>
                            <div class="invalid-feedback">please provide a valid time input</div>
                            <div id="rest-valid" class="valid-feedback">looks good!</div>
                        @endif
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
                    @if ($errors->has('rest_mil'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('rest_mil') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="weight"
                       class="col-md-4 col-form-label text-md-right">{{ __('Weight (lbs)') }}</label>

                <div class="col-md-6">

                    @if(empty($workout->weight))
                        <input id="weight" type="number" min="1.0" max="1000.00" class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight" value="{{ old('weight') }}" placeholder="Enter Weight (lbs)" required autofocus>
                        <div class="invalid-feedback">please provide a valid weight</div>
                        <div class="valid-feedback">looks good!</div>
                    @else
                        <input id="weight" type="number" min="1.0" max="1000.00" class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight" value="{{ $workout->weight }}" placeholder="Enter Weight (lbs)" required autofocus>
                        <div class="invalid-feedback">please provide a valid weight</div>
                        <div class="valid-feedback">looks good!</div>
                    @endif

                    @if ($errors->has('weight'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('weight') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="repetitions"
                       class="col-md-4 col-form-label text-md-right">{{ __('Reps') }}</label>

                <div class="col-md-6">
                    @if(empty($workout->repetitions))
                        <input id="repetitions" type="number" min="1" max="100" class="form-control{{ $errors->has('repetitions') ? ' is-invalid' : '' }}" name="repetitions" placeholder="Enter number of Reps" required>
                        <div class="invalid-feedback">please provide a valid full repetition number</div>
                        <div class="valid-feedback">looks good!</div>
                    @else
                        <input id="repetitions" type="number" min="1" max="100" class="form-control{{ $errors->has('repetitions') ? ' is-invalid' : '' }}" name="repetitions" value="{{ $workout->repetitions }}" required>
                        <div class="invalid-feedback">please provide a valid full repetition number</div>
                        <div class="valid-feedback">looks good!</div>
                    @endif

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
                    @if(empty($workout->sets))
                        <input id="sets" type="number" min="1" max="1000" class="form-control{{ $errors->has('sets') ? ' is-invalid' : '' }}" name="sets" placeholder="Enter number of Sets" required>
                        <div class="invalid-feedback">please provide a valid full set number</div>
                        <div class="valid-feedback">looks good!</div>
                    @else
                        <input id="sets" type="number" min="1" max="1000" class="form-control{{ $errors->has('sets') ? ' is-invalid' : '' }}" name="sets" value="{{ $workout->sets }}" required>
                        <div class="invalid-feedback">please provide a valid full set number</div>
                        <div class="valid-feedback">looks good!</div>
                    @endif

                    @if ($errors->has('sets'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('sets') }}</strong>
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
                <li class="breadcrumb-item active" aria-current="page">add workout</li>
            </ol>
        </nav>
@endsection