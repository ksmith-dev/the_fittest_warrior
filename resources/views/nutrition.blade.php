@extends('layouts.app')

@section('head')
    @parent
        <title>{{ config('app.name', 'The Fittest Warrior') }} | Home</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
@endsection
@section('navigation')
    @parent
@endsection
@section('content')
    @include('layouts.dashboard_nav')
    <div id="nutrition">
        <a href="{{ url('nutrition/form') }}" class="btn btn-secondary" role="button">add nutrition information</a>
        <div class="spacer-50" style="border-bottom: 1px solid black"></div>
        <div class="spacer-20"></div>
        @if(empty($nutrition_collection))
            <h1 style="width: 90%;">Sorry {{ $params['user']->first_name }}, we did not find any nutrition records  to display!</h1>
            <span class="spacer-50"></span>
            <p style="width: 80%">This is not a reflection on you, this just means that we do not have any stored records. If you want to store some nutrition records please start by clicking below.
                <br>
                <br>
                <a href="{{ url('nutrition/form') }}" class="btn btn-secondary" role="button">add a nutrition record</a>
                <span style="display: inline-block; width: 20px;"></span>or<span style="display: inline-block; width: 20px;"></span>
                <button type="button" class="btn btn-secondary back">go back</button>
            </p>
            <div class="spacer-50"></div>
            <a title="By Matthew Inman [CC BY 3.0 (https://creativecommons.org/licenses/by/3.0)], via Wikimedia Commons" href="https://commons.wikimedia.org/wiki/File:Tumbeasts_sign1.png">
                <img id="omg-404" width="256" alt="Tumbeasts sign1" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0d/Tumbeasts_sign1.png/256px-Tumbeasts_sign1.png">
            </a>
        @else
            @foreach($nutrition_collection as $nutrition)
                <div class="col">
                    <div class="row">
                        <div class="table-responsive d-block">
                            <h4>Nutrition Record</h4>
                            <hr>
                            <a href="{{ url('nutrition/form') }}/{{ $nutrition->id }}" class="btn btn-secondary" role="button">edit</a>
                            <a href="{{ url('nutrition/delete') }}/{{ $nutrition->id }}" class="btn btn-secondary" role="button" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">{{ __('delete') }}</a>

                            <form id="delete-form" action="{{ url('nutrition/delete') }}/{{ $nutrition->id }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <div class="spacer-20"></div>
                            <table class="table table-sm">
                                <thead>
                                <th class="text-center">Start Date Time</th>
                                <th class="text-center">End Date Time</th>
                                <th class="text-center">Status</th>
                                </thead>
                                <tbody>
                                <th scope="row" class="text-center">{{ date('m/d/Y H:i:s', strtotime($nutrition->start_date_time)) }}</th>
                                <th scope="row" class="text-center">{{ date('m/d/Y H:i:s', strtotime($nutrition->end_date_time)) }}</th>
                                <th scope="row" class="text-center">daily values - calculated</th>
                                <tr>
                                    <td class="text-center">Portion</td>
                                    <td class="text-center">{{ $nutrition->portion_size }}</td>
                                    <td class="text-center">
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">Protein</td>
                                    <td class="text-center">{{ $nutrition->gram_protein }} g</td>
                                    <td class="text-center">
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">Fat</td>
                                    <td class="text-center">{{ $nutrition->gram_fat }} g</td>
                                    <td class="text-center">
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60% mid</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">Saturated Fat</td>
                                    <td class="text-center">{{ $nutrition->gram_saturated_fat }} g</td>
                                    <td class="text-center">
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80% high</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">Cholesterol</td>
                                    <td class="text-center">{{ $nutrition->cholesterol }} mg</td>
                                    <td class="text-center">
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">Sodium</td>
                                    <td class="text-center">{{ $nutrition->sodium }} mg</td>
                                    <td class="text-center">
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50% mid</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">Carbohydrates</td>
                                    <td class="text-center">{{ $nutrition->carbohydrates }} g</td>
                                    <td class="text-center">
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">Sugar</td>
                                    <td class="text-center">{{ $nutrition->sugars }} g</td>
                                    <td class="text-center">
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80% high</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">Fiber</td>
                                    <td class="text-center">{{ $nutrition->fiber }} g</td>
                                    <td class="text-center">
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40% low mid</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">Calories</td>
                                    <td class="text-center">{{ number_format($nutrition->calories, 2, '.', ',') }}</td>
                                    <td class="text-center">
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50% mid</div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="spacer-50"></div>
            @endforeach
        @endif
    </div>
@endsection
@section('footer')
    @parent
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">nutrition</li>
                <li class="breadcrumb-item"><a href="{{ url('nutrition/form') }}">add nutrition</a></li>
            </ol>
        </nav>
@endsection