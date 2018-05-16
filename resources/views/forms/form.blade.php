@extends('layouts.app')

@section('head')
    @parent
@endsection

@section('navigation')
    @parent
@endsection

@section('content')
    <div class="spacer-50"></div>
    <div id="form">
        <h2>{{ ucwords($params['form_type']) }} Information</h2>
        <div class="spacer-20"></div>
        <form method="POST" action="{{ url('store/' . $params['form_type'] . '/' . $params['form_id']) }}">
            @csrf
            @if(!empty($inputs))
                <input type="text" name="id" value="{{ $params['form_id'] }}" hidden>
                <input type="text" name="data_type" value="{{ $params['form_type'] }}" hidden>
                @foreach($inputs as $type => $element)
                    @if(!empty($element['select']))
                        <div class="form-group row">
                            <label class="{{ $element['label']->getClass() }}" for="{{ $element['label']->getFor() }}">{{ _(ucwords(str_replace('_', ' ', $element['label']->getValue()))) }}</label>

                            @if(!empty($element['select']))
                                <div class="col-md-6">
                                    <select id="{{ $element['select']->getName() }}"
                                            class="{{ $element['select']->getClass() }}"
                                            name="{{ $element['select']->getName() }}">
                                        @if(!empty($model))
                                            @if(!in_array($model->$type, $element['select']->getOptions()))
                                                <option selected disabled>Choose...</option>
                                            @endif
                                        @else
                                            <option selected disabled>Choose...</option>
                                        @endif
                                        @foreach($element['select']->getOptions() as $option_value => $option_label)
                                            @if(!empty($model))
                                                @if($model->$type == $option_value)
                                                    <option value="{{ $option_value }}" selected>{{ $option_label }}</option>
                                                @else
                                                    <option value="{{ $option_value }}">{{ $option_label }}</option>
                                                @endif
                                            @else
                                                <option value="{{ $option_value }}">{{ $option_label }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if ($errors->has($element['select']->getName()))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first($element['select']->getName()) }}</strong>
                                        </span>
                                    @endif
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="form-group row">
                            <label for="{{ $element['label']->getFor() }}"
                                   class="{{ $element['label']->getClass() }}">{{ __(ucwords(str_replace('_', ' ', $element['label']->getValue()))) }}</label>

                            <div class="col-md-6">
                                @if(empty($model->$type))
                                    <input id="{{ $element['input']->getName() }}"
                                           type="{{ $element['input']->getType() }}"
                                           class="{{ $element['input']->getClass() }}{{ $errors->has($element['input']->getName()) ? ' is-invalid' : '' }}"
                                           name="{{ $element['input']->getName() }}"
                                           value="{{ old($element['input']->getName()) }}"
                                           placeholder="{{ $element['input']->getPlaceholder() }}"
                                           {{ $element['input']->getInputAttribute() }}>
                                @else
                                    <input id="{{ $element['input']->getName() }}"
                                           type="{{ $element['input']->getType() }}"
                                           class="{{ $element['input']->getClass() }}"
                                           name="{{ $element['input']->getName() }}"
                                           value="{{ str_replace('_', ' ', $model->$type) }}"
                                            {{ $element['input']->getInputAttribute() }}>
                                @endif

                                @if ($errors->has($element['input']->getName()))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first($element['input']->getName()) }}</strong>
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
            @if(Auth::user()->role == 'admin')
                <li class="breadcrumb-item"><a href="{{ url('account') }}">account</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $params['form_type'] }}</li>
            @else
            @endif
        </ol>
    </nav>
@endsection
