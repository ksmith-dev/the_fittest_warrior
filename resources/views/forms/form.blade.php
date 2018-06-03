@extends('layouts.app')

@section('head')
    @parent
@endsection

@section('navigation')
    @parent
@endsection

@section('content')
    <div class="spacer-50" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
         xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"></div>
    <div id="form">
        <h2>{{ ucwords(str_replace('_', ' ', $param['table'])) }} Information</h2>
        <div class="spacer-20"></div>
        <form method="POST" action="{{ url('store/' . $param['table'] . '/' . $param['model_id']) }}" novalidate>
            @csrf
                @if(!empty($param['inputs']))
                    @foreach($param['inputs'] as $key => $element)
                        @if(!empty($element['select']))
                            <div class="form-group row">
                                <label class="{{ $element['label']->getClass() }}" for="{{ $element['label']->getFor() }}">{{ _(ucwords(str_replace('_', ' ', $element['label']->getValue()))) }}</label>

                                <div class="col-md-6">
                                    <select id="{{ $element['select']->getName() }}"
                                            class="{{ $element['select']->getClass() }}"
                                            name="{{ $element['select']->getName() }}">
                                        @if(!empty($param['model']))
                                            @if(!in_array($param['model']->$key, $element['select']->getOptions()))
                                                <option selected disabled>Choose...</option>
                                            @endif
                                        @else
                                            <option selected disabled>Choose...</option>
                                        @endif
                                        @foreach($element['select']->getOptions() as $option_value => $option_label)
                                            @if(!empty($param['model']))
                                                @if($param['model']->$key == $option_value)
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
                            </div>
                        @else
                            @if($element['input']->getType() === 'textarea')
                                <div class="form-group row">
                                    <label for="{{ $element['label']->getFor() }}"
                                           class="{{ $element['label']->getClass() }}">{{ __(ucwords(str_replace('_', ' ', $element['label']->getValue()))) }}</label>

                                    <div class="col-md-6">
                                        @if(empty($param['model']->$key))
                                            @if(empty($element['input']->getDefaultInputValue()))
                                                @if(empty(old($element['input']->getName())))
                                                    <textarea id="{{ $element['input']->getName() }}"
                                                              type="{{ $element['input']->getType() }}"
                                                              class="{{ $element['input']->getClass() }}{{ $errors->has($element['input']->getName()) ? ' is-invalid' : '' }}"
                                                              name="{{ $element['input']->getName() }}"
                                                            {{ $element['input']->getInputAttribute() }}></textarea>
                                                @else
                                                    <textarea id="{{ $element['input']->getName() }}"
                                                              type="{{ $element['input']->getType() }}"
                                                              class="{{ $element['input']->getClass() }}{{ $errors->has($element['input']->getName()) ? ' is-invalid' : '' }}"
                                                              name="{{ $element['input']->getName() }}"
                                                            {{ $element['input']->getInputAttribute() }}>{{ old($element['input']->getName()) }}</textarea>
                                                @endif
                                            @else
                                                <textarea id="{{ $element['input']->getName() }}"
                                                          type="{{ $element['input']->getType() }}"
                                                          class="{{ $element['input']->getClass() }}{{ $errors->has($element['input']->getName()) ? ' is-invalid' : '' }}"
                                                          name="{{ $element['input']->getName() }}"
                                                        {{ $element['input']->getInputAttribute() }}>{{ $element['input']->getDefaultInputValue() }}</textarea>
                                            @endif
                                        @else
                                            <textarea id="{{ $element['input']->getName() }}"
                                                      type="{{ $element['input']->getType() }}"
                                                      class="{{ $element['input']->getClass() }}"
                                                      name="{{ $element['input']->getName() }}"
                                                    {{ $element['input']->getInputAttribute() }}>{{ $param['model']->$key }}</textarea>
                                        @endif
                                    </div>
                                </div>
                            @else
                                <div class="form-group row">
                                <label for="{{ $element['label']->getFor() }}"
                                       class="{{ $element['label']->getClass() }}">{{ __(ucwords(str_replace('_', ' ', $element['label']->getValue()))) }}</label>

                                <div class="col-md-6">
                                    @if(empty($param['model']->$key))
                                        @if(empty($element['input']->getDefaultInputValue()))
                                            @if(empty(old($element['input']->getName())))
                                                <input id="{{ $element['input']->getName() }}"
                                                       type="{{ $element['input']->getType() }}"
                                                       class="{{ $element['input']->getClass() }}{{ $errors->has($element['input']->getName()) ? ' is-invalid' : '' }}"
                                                       name="{{ $element['input']->getName() }}"
                                                       placeholder="{{ $element['input']->getPlaceholder() }}"
                                                        {{ $element['input']->getInputAttribute() }}>
                                            @else
                                                <input id="{{ $element['input']->getName() }}"
                                                       type="{{ $element['input']->getType() }}"
                                                       class="{{ $element['input']->getClass() }}{{ $errors->has($element['input']->getName()) ? ' is-invalid' : '' }}"
                                                       name="{{ $element['input']->getName() }}"
                                                       value="{{ old($element['input']->getName()) }}"
                                                       placeholder="{{ $element['input']->getPlaceholder() }}"
                                                        {{ $element['input']->getInputAttribute() }}>
                                            @endif
                                        @else
                                            <input id="{{ $element['input']->getName() }}"
                                                   type="{{ $element['input']->getType() }}"
                                                   class="{{ $element['input']->getClass() }}{{ $errors->has($element['input']->getName()) ? ' is-invalid' : '' }}"
                                                   name="{{ $element['input']->getName() }}"
                                                   value="{{ ucwords(str_replace('_', ' ', $element['input']->getDefaultInputValue())) }}"
                                                   placeholder="{{ $element['input']->getPlaceholder() }}"
                                                    {{ $element['input']->getInputAttribute() }}>
                                        @endif
                                    @else
                                        <input id="{{ $element['input']->getName() }}"
                                               type="{{ $element['input']->getType() }}"
                                               class="{{ $element['input']->getClass() }}"
                                               name="{{ $element['input']->getName() }}"
                                               value="{{ str_replace('_', ' ', $param['model']->$key) }}"
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
                        @endif
                    @endforeach
                @endif
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary" name="submitButton">{{ __('Submit') }}</button>
                    </div>
                </div>
        </form>
        <div class="spacer-50"></div>
        <h2>Checkout one of our partners...</h2>

        @if(empty($param['advertisement']))
            <a id="banner-advertisement" style="background-image: url('http://via.placeholder.com/950x200');"></a>
        @else
            @if(empty($param['advertisement']->message))
                <a id="banner-advertisement" style="background-image: url({{ url($param['advertisement']->banner_src) }});"></a>
            @else
                <a id="banner-advertisement" style="background-image: url({{ url($param['advertisement']->banner_src) }});"><span class="ad-message">{{ $param['advertisement']->message }}</span></a>
            @endif
        @endif

    </div>
    <div class="spacer-50"></div>
@endsection

@section('footer')
    @parent
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @if($param['table'] === 'workout')
                <li class="breadcrumb-item"><a href="{{ url('fitness') }}">add {{ $param['table'] }}</a></li>
            @else
                <li class="breadcrumb-item"><a href="{{ url($param['table']) }}">{{ $param['table'] }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">add {{ $param['table'] }}</li>
            @endif
        </ol>
    </nav>
@endsection
