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
        <form method="POST" action="{{ url('workout/report/save') }}">
            @csrf
            <div class="form-group row">
                <label for="training_type" class="col-md-4 col-form-label text-md-right">{{ __('Training Type') }}</label>
                <div class="col-md-6">
                    <select id="training_type" type="text" class="form-control{{ $errors->has('training_type') ? ' is-invalid' : '' }}" name="training_type"  required autofocus>
                        <option selected disabled>Select Training Type </option>
                        <option value="strength">strength</option>
                        <option value="aerobic">aerobic</option>
                        <option value="intensity">intensity</option>
                        <option value="interval">interval</option>
                        <option value="flexibility">flexibility</option>
                        <option value="circuit">circuit</option>
                        <option value="balance">balance</option>
                        <option value="fartlek">fartlek</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="session_type" class="col-md-4 col-form-label text-md-right">{{ __('Session Type') }}</label>
                <div class="col-md-6">
                    <select id="session_type" type="text" class="form-control{{ $errors->has('session_type') ? ' is-invalid' : '' }}" name="session_type" required>
                        <option selected disabled>Select Session Type</option>
                        <option value="walking">walking</option>
                        <option value="running">running</option>
                        <option value="swimming">swimming</option>
                        <option value="cycling">cycling</option>
                        <option value="rowing">rowing</option>
                        <option value="boxing">boxing</option>
                        <option value="hiking">hiking</option>
                        <option value="lifting">lifting</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="workout_type" class="col-md-4 col-form-label text-md-right">{{ __('Workout Type') }}</label>

                <div class="col-md-6">
                    <input id="workout_type" type="text" class="form-control" name="workout_type" value="{{ preg_replace('/_/', ' ', $type) }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="duration"
                       class="col-md-4 col-form-label text-md-right">{{ __('Time (min:sec)') }}</label>

                <div class="col-md-6">
                    <input id="duration" type="text"
                           class="form-control{{ $errors->has('duration') ? ' is-invalid' : '' }}"
                           name="duration" value="{{ old('duration') }}" placeholder="Enter Time (min:sec)"
                           required autofocus>

                    @if ($errors->has('duration'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('duration') }}</strong>
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
                <label for="muscle_groups" class="col-md-4 col-form-label text-md-right">{{ __('Muscle Group') }}</label>
                <div class="col-md-6">
                    <select id="muscle_groups" type="text" class="form-control{{ $errors->has('muscle_groups') ? ' is-invalid' : '' }}" name="muscle_groups" required>
                        <option selected disabled>Select Muscle Group</option>
                        <option value="neck">neck</option>
                        <option value="traps">traps</option>
                        <option value="shoulders">shoulders</option>
                        <option value="chest">chest</option>
                        <option value="biceps">biceps</option>
                        <option value="forearms">forearms</option>
                        <option value="abs">abs</option>
                        <option value="quadriceps">quadriceps</option>
                        <option value="calves">calves</option>
                        <option value="glutes">glutes</option>
                        <option value="hamstrings">hamstrings</option>
                        <option value="lower back">lower back</option>
                        <option value="triceps">triceps</option>
                        <option value="upper back">upper back</option>
                    </select>
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
