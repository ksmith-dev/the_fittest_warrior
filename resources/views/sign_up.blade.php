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
                <img src="{{ url($param['group']->img_src) }}" style="max-width: 600px; display: block; margin: auto;">
                <h1>{{ $param['group']->name }}</h1>
                <hr>
                <h3>REQUEST TO JOIN - FORM</h3>
                <p style="max-width: 650px"><b>note: submissions will be approved by group administrators, administrators may need to contact you for additional information using the email provided.</b></p>
                <div class="spacer-50"></div>
                <form method="POST" action="{{ url( 'fitness_group/sign-up/' . $param['group']->id ) }}" novalidate>
                    @csrf
                    @if(\Illuminate\Support\Facades\Session::has('flash_message'))
                        <div class="col-md-6 offset-md-4">
                            <div class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('flash_message') }}</div>
                        </div>
                    @endif

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

                    <input type="hidden" name="group_name" value="{{ $param['group']->name }}">

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