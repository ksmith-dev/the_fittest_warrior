@extends('layouts.app')

@section('head')
    @parent
@endsection

@section('navigation')
    @parent
@endsection

@section('content')
    <div class="spacer-50"></div>
    <div id="form-nutrition">
        <h2>Contact Us</h2>
        <div class="spacer-20"></div>
        <form method="POST" action="{{ url('contact/submit') }}">
            @csrf
            <div class="form-group row">
                <label for="ldl_cholesterol"
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
                       class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>

                <div class="col-md-6">
                    <textarea rows="4" cols="50" id="comment"
                           class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}"
                              name="comment" placeholder="Enter Comment" required></textarea>

                    @if ($errors->has('comment'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('comment') }}</strong>
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
        <h2>Checkout one of our partners...</h2>
        <div id="banner-advertisement"></div>
    </div>
    <div class="spacer-50"></div>
@endsection

@section('footer')
    @parent
@endsection
