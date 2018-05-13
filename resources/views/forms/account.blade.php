@extends('layouts.app')

@section('head')
    @parent
@endsection

@section('navigation')
    @parent
@endsection

@section('content')
    <div class="spacer-50"></div>
    <div id="form-account">
        <h2>Account Information</h2>
        <div class="spacer-20"></div>
        <form method="POST" action="{{ url('account/store') }}">
            @csrf
            <input type="text" name="id" value="{{ $user->id }}" hidden>
            <div class="form-group row">
                <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                <div class="col-md-6">
                    @if(empty($user->first_name))
                        <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" placeholder="Enter First Name" required autofocus>
                    @else
                        <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ $user->first_name }}" required autofocus>
                    @endif

                    @if ($errors->has('first_name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                <div class="col-md-6">
                    @if(empty($user->last_name))
                        <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" placeholder="Enter Last Name" required autofocus>
                    @else
                        <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ $user->last_name }}" required autofocus>
                    @endif

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
                    @if(empty($user->email))
                        <input id="systolic_blood_pressure" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter Email" required>
                    @else
                        <input id="systolic_blood_pressure" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>
                    @endif

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                <div class="col-md-6">
                    @if(empty($user->address))
                        <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" placeholder="Enter Address" required>
                    @else
                        <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $user->address }}" required>
                    @endif

                    @if ($errors->has('address'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="unit" class="col-md-4 col-form-label text-md-right">{{ __('Unit') }}</label>

                <div class="col-md-6">
                    @if(empty($user->zip))
                        <input id="unit" type="text" class="form-control{{ $errors->has('unit') ? ' is-invalid' : '' }}" name="unit" value="{{ old('unit') }}" placeholder="Enter Unit Number">
                    @else
                        <input id="unit" type="text" class="form-control{{ $errors->has('unit') ? ' is-invalid' : '' }}" name="unit" value="{{ $user->zip }}">
                    @endif

                    @if ($errors->has('unit'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('unit') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                <div class="col-md-6">
                    @if(empty($user->city))
                        <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" placeholder="Enter Your City" required>
                    @else
                        <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ $user->city }}" required>
                    @endif

                    @if ($errors->has('city'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right" for="state">{{ _('State') }}</label>

                <div class="col-md-6">
                    @if(empty($user->state))
                        <select class="form-control" id="state" name="state">
                            <option selected>Choose...</option>
                            @foreach($states as $abbr => $state)
                                <option value="{{ $abbr }}">{{ $state }}</option>
                            @endforeach
                        </select>
                    @else
                        <select class="form-control" id="state" name="state">
                            <option value="{{ $user->state }}" selected>{{ $states[$user->state] }}</option>
                            @foreach($states as $abbr => $state)
                                @if($abbr != $user->$state)
                                    <option value="{{ $abbr }}">{{ $state }}</option>
                                @endif
                            @endforeach
                        </select>
                    @endif

                    @if ($errors->has('state'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('state') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="zip" class="col-md-4 col-form-label text-md-right">{{ __('Zip') }}</label>

                <div class="col-md-6">
                    @if(empty($user->zip))
                        <input id="zip" type="text" class="form-control{{ $errors->has('zip') ? ' is-invalid' : '' }}" name="zip" value="{{ old('zip') }}" placeholder="Enter Your Zip Code" required>
                    @else
                        <input id="zip" type="text" class="form-control{{ $errors->has('zip') ? ' is-invalid' : '' }}" name="zip" value="{{ $user->zip }}" required>
                    @endif

                    @if ($errors->has('zip'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('zip') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

                <div class="col-md-6">
                    @if(empty($user->age))
                        <input id="age" type="text" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ old('age') }}" placeholder="Enter Your Age">
                    @else
                        <input id="age" type="text" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ $user->age }}">
                    @endif

                    @if ($errors->has('age'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('age') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right" for="sex">{{ _('Sex') }}</label>

                <div class="col-md-6">
                    @if(empty($user->sex))
                        <select class="form-control" id="sex" name="sex">
                            <option selected>Choose...</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    @else
                        <select class="form-control" id="sex" name="sex">
                            <option value="{{ $user->sex }}" selected>{{ ucwords($user->sex) }}</option>
                            @if($user->sex == 'female')
                                <option value="male">Male</option>
                            @else
                                <option value="female">Female</option>
                            @endif
                        </select>
                    @endif

                    @if ($errors->has('state'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('state') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="weight" class="col-md-4 col-form-label text-md-right">{{ __('Weight') }}</label>

                <div class="col-md-6">
                    @if(empty($user->weight))
                        <input id="weight" type="text" class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight" value="{{ old('weight') }}" placeholder="Enter Your Weight">
                    @else
                        <input id="weight" type="text" class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight" value="{{ $user->weight }}">
                    @endif


                    @if ($errors->has('weight'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('weight') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="height" class="col-md-4 col-form-label text-md-right">{{ __('Height') }}</label>

                <div class="col-md-6">
                    @if(empty($user->height))
                        <input id="height" type="text" class="form-control{{ $errors->has('height') ? ' is-invalid' : '' }}" name="height" value="{{ old('height') }}" placeholder="Enter Your Height">
                    @else
                        <input id="height" type="text" class="form-control{{ $errors->has('height') ? ' is-invalid' : '' }}" name="height" value="{{ $user->height }}">
                    @endif

                    @if ($errors->has('height'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('height') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="b_m_i" class="col-md-4 col-form-label text-md-right">{{ __('Body Mass Index') }}</label>

                <div class="col-md-6">
                    @if(empty($user->b_m_i))
                        <input id="b_m_i" type="text" class="form-control{{ $errors->has('b_m_i') ? ' is-invalid' : '' }}" name="b_m_i" value="{{ old('b_m_i') }}" placeholder="Enter Your Body Mass Index">
                    @else
                        <input id="b_m_i" type="text" class="form-control{{ $errors->has('b_m_i') ? ' is-invalid' : '' }}" name="b_m_i" value="{{ $user->b_m_i }}">
                    @endif

                    @if ($errors->has('b_m_i'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('b_m_i') }}</strong>
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
