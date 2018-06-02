@extends('layouts.app')

@section('head')
    @parent
    <title>{{ config('app.name', 'The Fittest Warrior') }} | Sign-up</title>
@endsection
@section('navigation')
    @parent
@endsection
@section('content')
    <div class="spacer-20"></div>
    <div id="sign-up">
        <div class="row">
            <div class="col">
                <img src="{{ url($param['group']->img_src) }}" style="max-width: 200px; display: block; margin: auto;">
                <h1>{{ $param['group']->name }}</h1>
                <hr>
                <h3>REQUEST TO JOIN - FORM</h3>
                <p style="max-width: 650px"><b>note: submissions will be approved by group administrators, administrators may need to contact you for additional information using the email provided.</b></p>
                <div class="spacer-50"></div>
                <form method="POST" action="{{ url( 'fitness_group/sign_up/' . $param['group']->id ) }}" novalidate>
                    @csrf
                    <div class="form-group row">
                        <label for="first_name"
                               class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                        <div class="col-md-6">
                            <input id="first_name" type="text"
                                   class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                   name="first_name" value="{{ old('first_name') }}" placeholder="Enter First Name"
                                   required autofocus>

                            @if ($errors->has('first_name'))
                                <span class="invalid-feedback">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="last_name"
                               class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                        <div class="col-md-6">
                            <input id="last_name" type="text"
                                   class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                   name="last_name" value="{{ old('last_name') }}" placeholder="Enter Last Name"
                                   required autofocus>

                            @if ($errors->has('last_name'))
                                <span class="invalid-feedback">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                        <div class="col-md-6">
                            <input id="systolic_blood_pressure" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                   value="{{ old('email') }}" placeholder="Enter Email" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="comment"
                               class="col-md-4 col-form-label text-md-right">{{ __('Request') }}</label>

                        <div class="col-md-6">
                    <textarea rows="4" cols="50" id="comment"
                              class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}"
                              name="comment" placeholder="Enter Reason For Request" required></textarea>

                            @if ($errors->has('comment'))
                                <span class="invalid-feedback">
                            <strong>{{ $errors->first('comment') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary" name="submitButton">{{ __('Submit') }}</button>
                        </div>
                    </div>
                </form>
                <div class="spacer-20"></div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @parent
@endsection