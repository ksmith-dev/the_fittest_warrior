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
        <h2>{{ ucwords($data_type) }} Information</h2>
        <div class="spacer-20"></div>
        <form method="POST" action="{{ url('admin/store/' . $data_type . '/' . $data_id) }}">
            @csrf
            @if(!empty($forms))
                <input type="text" name="id" value="{{ $data_id }}" hidden>
                <input type="text" name="data_type" value="{{ $data_type }}" hidden>
                @foreach($forms as $name => $form)
                    @if($name == 'state' || $name == 'sex')
                        <div class="form-group row">
                            <label class="{{ $form['label']->getClass() }}" for="{{ $form['label']->getFor() }}">{{ _(ucwords(str_replace('_', ' ', $form['label']->getValue()))) }}</label>

                            @if(!empty($form['select']))
                                <div class="col-md-6">
                                    <select id="{{ $form['select']->getName() }}"
                                            class="{{ $form['select']->getClass() }}"
                                            name="{{ $form['select']->getName() }}">
                                        @if(!in_array($model->$name, $form['select']->getOptions()))
                                            <option selected disabled>Chosse...</option>
                                        @endif
                                        @foreach($form['select']->getOptions() as $option_value => $option_label)
                                            @if($model->$name == $option_value)
                                                <option value="{{ $option_value }}" selected>{{ $option_label }}</option>
                                            @else
                                                <option value="{{ $option_value }}">{{ $option_label }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if ($errors->has($form['select']->getName()))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first($form['select']->getName()) }}</strong>
                                        </span>
                                    @endif
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="form-group row">
                            <label for="{{ $form['label']->getFor() }}"
                                   class="{{ $form['label']->getClass() }}">{{ __(ucwords(str_replace('_', ' ', $form['label']->getValue()))) }}</label>

                            <div class="col-md-6">
                                @if(empty($form['input']->getValue()))
                                    <input id="{{ $form['input']->getName() }}"
                                           type="{{ $form['input']->getType() }}"
                                           class="{{ $form['input']->getClass() }}{{ $errors->has($form['input']->getName()) ? ' is-invalid' : '' }}"
                                           name="{{ $form['input']->getName() }}"
                                           value="{{ old($form['input']->getName()) }}"
                                           placeholder="{{ $form['input']->getPlaceholder() }}"
                                           {{ $form['input']->getInputAttribute() }}>
                                @else
                                    <input id="{{ $form['input']->getName() }}"
                                           type="{{ $form['input']->getType() }}"
                                           class="{{ $form['input']->getClass() }}"
                                           name="{{ $form['input']->getName() }}"
                                           value="{{ str_replace('_', ' ', $form['input']->getValue()) }}"
                                           {{ $form['input']->getInputAttribute() }}>
                                @endif

                                @if ($errors->has($form['input']->getName()))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first($form['input']->getName()) }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
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
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @if(Request::url() == 'http://fittestwarrior.local/admin')
                <li class="breadcrumb-item active" aria-current="page">admin</li>
            @else
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">admin</a></li>
            @endif
            @if(Request::url() == 'http://fittestwarrior.local/admin/' . $data_type . 's')
                <li class="breadcrumb-item active" aria-current="page">{{ $data_type }}s</li>
            @else
                <li class="breadcrumb-item"><a href="{{ url('admin/' . $data_type . 's') }}">{{ $data_type }}s</a></li>
            @endif
        </ol>
    </nav>
@endsection
