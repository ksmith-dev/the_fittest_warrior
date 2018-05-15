@extends('layouts.app')

@section('head')
    @parent
@endsection

@section('navigation')
    @parent
@endsection

@section('content')
    <div class="spacer-100"></div>
    <div id="form">
        <h2>Nutrition Information</h2>
        <div class="spacer-50"></div>
        <form method="POST" action="{{ url('nutrition/store') }}">
            @csrf
            @if(!empty($nutrition->id))
                <input type="hidden" name="nutrition_id" value="{{ $nutrition->id }}">
            @endif
            <div class="form-group row">
                <label for="portion_size" class="col-md-4 col-form-label text-md-right">{{ __('Portion Size') }}</label>

                <div class="col-md-6">
                    @if(empty($nutrition->portion_size))
                        <input id="portion_size" type="text" class="form-control{{ $errors->has('portion_size') ? ' is-invalid' : '' }}" name="portion_size" value="{{ old('portion_size') }}" placeholder="Enter Portion Size" required autofocus>
                    @else
                        <input id="portion_size" type="text" class="form-control{{ $errors->has('portion_size') ? ' is-invalid' : '' }}" name="portion_size" value="{{ $nutrition->portion_size }}" required autofocus>
                    @endif

                    @if ($errors->has('portion_weight'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('portion_weight') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="gram_protein"
                       class="col-md-4 col-form-label text-md-right">{{ __('Grams of Protein') }}</label>

                <div class="col-md-6">
                    @if(empty($nutrition->gram_protein))
                        <input id="gram_protein" type="text" class="form-control{{ $errors->has('gram_protein') ? ' is-invalid' : '' }}" name="gram_protein" value="{{ old('gram_protein') }}" placeholder="Enter Grams of Protein" required autofocus>
                    @else
                        <input id="gram_protein" type="text" class="form-control{{ $errors->has('gram_protein') ? ' is-invalid' : '' }}" name="gram_protein" value="{{ $nutrition->gram_protein }}" required autofocus>
                    @endif

                    @if ($errors->has('gram_protein'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('gram_protein') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="gram_fat" class="col-md-4 col-form-label text-md-right">{{ __('Grams of Fat') }}</label>

                <div class="col-md-6">
                    @if(empty($nutrition->gram_fat))
                        <input id="gram_fat" type="text" class="form-control{{ $errors->has('gram_fat') ? ' is-invalid' : '' }}" name="gram_fat" value="{{ old('gram_fat') }}" placeholder="Enter Grams of Fat" required>
                    @else
                        <input id="gram_fat" type="text" class="form-control{{ $errors->has('gram_fat') ? ' is-invalid' : '' }}" name="gram_fat" value="{{ $nutrition->gram_fat }}" required>
                    @endif

                    @if ($errors->has('gram_fat'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('gram_fat') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="gram_saturated_fat"
                       class="col-md-4 col-form-label text-md-right">{{ __('Grams of Saturated Fat') }}</label>

                <div class="col-md-6">
                    @if(empty($nutrition->gram_saturated_fat))
                        <input id="gram_saturated_fat" type="text" class="form-control{{ $errors->has('gram_saturated_fat') ? ' is-invalid' : '' }}" name="gram_saturated_fat" placeholder="Enter Grams of Saturated Fat" required>
                    @else
                        <input id="gram_saturated_fat" type="text" class="form-control{{ $errors->has('gram_saturated_fat') ? ' is-invalid' : '' }}" name="gram_saturated_fat" value="{{ $nutrition->gram_saturated_fat }}" required>
                    @endif

                    @if ($errors->has('gram_saturated_fat'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('gram_saturated_fat') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="cholesterol" class="col-md-4 col-form-label text-md-right">{{ __('Cholesterol') }}</label>

                <div class="col-md-6">
                    @if(empty($nutrition->cholesterol))
                        <input id="cholesterol" type="text" class="form-control{{ $errors->has('cholesterol') ? ' is-invalid' : '' }}" name="cholesterol" placeholder="Enter Cholesterol Intake" required>
                    @else
                        <input id="cholesterol" type="text" class="form-control{{ $errors->has('cholesterol') ? ' is-invalid' : '' }}" name="cholesterol" value="{{ $nutrition->cholesterol }}" required>
                    @endif

                    @if ($errors->has('cholesterol'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('cholesterol') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="sodium" class="col-md-4 col-form-label text-md-right">{{ __('Sodium') }}</label>

                <div class="col-md-6">
                    @if(empty($nutrition->sodium))
                        <input id="sodium" type="text" class="form-control{{ $errors->has('sodium') ? ' is-invalid' : '' }}" name="sodium" placeholder="Enter Your Sodium Intake" required>
                    @else
                        <input id="sodium" type="text" class="form-control{{ $errors->has('sodium') ? ' is-invalid' : '' }}" name="sodium" value="{{ $nutrition->sodium }}" required>
                    @endif

                    @if ($errors->has('sodium'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('sodium') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="carbohydrates" class="col-md-4 col-form-label text-md-right">{{ __('Carbohydrates') }}</label>

                <div class="col-md-6">
                    @if(empty($nutrition->carbohydrates))
                        <input id="carbohydrates" type="text" class="form-control{{ $errors->has('carbohydrates') ? ' is-invalid' : '' }}" name="carbohydrates" placeholder="Enter Your Carbohydrates Intake" required>
                    @else
                        <input id="carbohydrates" type="text" class="form-control{{ $errors->has('carbohydrates') ? ' is-invalid' : '' }}" name="carbohydrates" value="{{ $nutrition->carbohydrates }}" required>
                    @endif

                    @if ($errors->has('carbohydrates'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('carbohydrates') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="sugars" class="col-md-4 col-form-label text-md-right">{{ __('Sugars') }}</label>

                <div class="col-md-6">
                    @if(empty($nutrition->sugars))
                        <input id="sugars" type="text" class="form-control{{ $errors->has('sugars') ? ' is-invalid' : '' }}" name="sugars" placeholder="Enter Sugar Intake">
                    @else
                        <input id="sugars" type="text" class="form-control{{ $errors->has('sugars') ? ' is-invalid' : '' }}" name="sugars" value="{{ $nutrition->sugars }}">
                    @endif

                    @if ($errors->has('sugars'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('sugars') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="fiber" class="col-md-4 col-form-label text-md-right">{{ __('Fiber') }}</label>

                <div class="col-md-6">
                    @if(empty($nutrition->fiber))
                        <input id="fiber" type="text" class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="fiber" placeholder="Enter Fiber Intake">
                    @else
                        <input id="fiber" type="text" class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="fiber" value="{{ $nutrition->fiber }}">
                    @endif

                    @if ($errors->has('fiber'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('fiber') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="calories" class="col-md-4 col-form-label text-md-right">{{ __('Calories') }}</label>

                <div class="col-md-6">
                    @if(empty($nutrition->calories))
                        <input id="calories" type="text" class="form-control{{ $errors->has('calories') ? ' is-invalid' : '' }}" name="calories" placeholder="Enter Your Calorie Intake">
                    @else
                        <input id="calories" type="text" class="form-control{{ $errors->has('calories') ? ' is-invalid' : '' }}" name="calories" value="{{ $nutrition->calories }}">
                    @endif

                    @if ($errors->has('calories'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('calories') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="start_date_time" class="col-md-4 col-form-label text-md-right">{{ __('Start Date') }}</label>

                <div class="col-md-6">
                    @if(empty($nutrition->stard_date_time))
                        <input id="start_date_time" type="date" class="form-control{{ $errors->has('start_date_time') ? ' is-invalid' : '' }}" name="start_date_time" placeholder="Enter Start Date">
                    @else
                        <input id="start_date_time" type="date" class="form-control{{ $errors->has('start_date_time') ? ' is-invalid' : '' }}" name="start_date_time" value="{{ $nutrition->start_date_time }}">
                    @endif

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
                    @if(empty($nutrition->end_date_time))
                        <input id="end_date_time" type="date" class="form-control{{ $errors->has('end_date_time') ? ' is-invalid' : '' }}" name="end_date_time" placeholder="Enter End Date">
                    @else
                        <input id="end_date_time" type="date" class="form-control{{ $errors->has('end_date_time') ? ' is-invalid' : '' }}" name="end_date_time" value="{{ $nutrition->end_date_time }}">
                    @endif

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
                @if (empty($nutrition))
                    <li class="breadcrumb-item active" aria-current="page">add</li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">edit</li>
                @endif
            </ol>
        </nav>
@endsection
