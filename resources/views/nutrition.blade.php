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
    <div class="col">
        <div class="row">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('fitness') }}">Fitness</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  active" href="{{ url('nutrition') }}">Nutrition</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('health') }}">Health</a>
                </li>
            </ul>
        </div>
    </div>
    <div id="nutrition">
        <a href="{{ url('nutrition/form') }}" class="btn btn-secondary" role="button">add nutrition info</a>
        <div class="spacer-50"></div>
        @foreach($nutritions as $nutrition)
            <div class="col">
                <div class="row">
                    <div class="table-responsive d-block">
                        <h4>Nutrition Record</h4>
                        <table class="table table-sm table-hover">
                            <thead>
                            <th>Start Date Time</th>
                            <th>End Date Time</th>
                            <th>Status</th>
                            </thead>
                            <tbody>
                                <th scope="row">{{ date('m/d/Y H:i:s', strtotime($nutrition->start_date_time)) }}</th>
                                <th scope="row">{{ date('m/d/Y H:i:s', strtotime($nutrition->end_date_time)) }}</th>
                                <tr class='clickable-row' data-href='/dashboard/nutrition/'>
                                    <td>Portion</td>
                                    <td>{{ $nutrition->portion_size }}</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class='clickable-row' data-href='/dashboard/nutrition/'>
                                    <td>Protein</td>
                                    <td>{{ $nutrition->gram_protein }} g</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class='clickable-row' data-href='/dashboard/nutrition/'>
                                    <td>Fat</td>
                                    <td>{{ $nutrition->gram_fat }} g</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60% mid</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class='clickable-row' data-href='/dashboard/nutrition/'>
                                    <td>Saturated Fat</td>
                                    <td>{{ $nutrition->gram_saturated_fat }} g</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80% high</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class='clickable-row' data-href='/dashboard/nutrition/'>
                                    <td>Cholesterol</td>
                                    <td>{{ $nutrition->cholesterol }} mg</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class='clickable-row' data-href='/dashboard/nutrition/'>
                                    <td>Sodium</td>
                                    <td>{{ $nutrition->sodium }} mg</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50% mid</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class='clickable-row' data-href='/dashboard/nutrition/'>
                                    <td>Carbohydrates</td>
                                    <td>{{ $nutrition->carbohydrates }} g</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class='clickable-row' data-href='/dashboard/nutrition/'>
                                    <td>Sugar</td>
                                    <td>{{ $nutrition->sugars }} g</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80% high</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class='clickable-row' data-href='/dashboard/nutrition/'>
                                    <td>Fiber</td>
                                    <td>{{ $nutrition->fiber }} g</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40% low mid</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class='clickable-row' data-href='/dashboard/nutrition/'>
                                    <td>Calories</td>
                                    <td>{{ number_format($nutrition->calories, 2, '.', ',') }}</td>
                                    <td>
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
    </div>
@endsection
@section('footer')
    @parent
@endsection