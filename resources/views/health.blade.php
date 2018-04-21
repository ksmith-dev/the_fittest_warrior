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
    <div id="health">
        <a href="{{ url('health/form') }}" class="btn btn-secondary" role="button">add health info</a>
        <div class="spacer-50"></div>
        @foreach($health_collection as $health)
            <div class="col">
                <div class="row">
                    <div class="table-responsive d-block">
                        <h4>Health Record</h4>
                        <table class="table table-sm table-hover">
                            <thead>
                            <th>Start Date Time</th>
                            <th>End Date Time</th>
                            <th>Status</th>
                            </thead>
                            <tbody>
                            <th scope="row">{{ date('m/d/Y H:i:s', strtotime($health->start_date_time)) }}</th>
                            <th scope="row">{{ date('m/d/Y H:i:s', strtotime($health->end_date_time)) }}</th>
                            <tr class='clickable-row' data-href="/health/form/{{ $health->id }}" data-toggle="tooltip" data-placement="top" title="click to edit">
                                <td>LDL Cholesterol</td>
                                <td>{{ $health->ldl_cholesterol }}</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                    </div>
                                </td>
                            </tr>
                            <tr class='clickable-row' data-href="/health/form/{{ $health->id }}" data-toggle="tooltip" data-placement="top" title="click to edit">
                                <td>Fat Percentage</td>
                                <td>{{ $health->fat_percentage }}</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                    </div>
                                </td>
                            </tr>
                            <tr class='clickable-row' data-href="/health/form/{{ $health->id }}" data-toggle="tooltip" data-placement="top" title="click to edit">
                                <td>Systolic Blood Pressure</td>
                                <td>{{ $health->systolic_blood_pressure }}</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60% mid</div>
                                    </div>
                                </td>
                            </tr>
                            <tr class='clickable-row' data-href="/health/form/{{ $health->id }}" data-toggle="tooltip" data-placement="top" title="click to edit">
                                <td>Systolic Blood Pressure</td>
                                <td>{{ $health->diastolic_blood_pressure }}</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80% high</div>
                                    </div>
                                </td>
                            </tr>
                            <tr class='clickable-row' data-href="/health/form/{{ $health->id }}" data-toggle="tooltip" data-placement="top" title="click to edit">
                                <td>HDL Cholesterol</td>
                                <td>{{ $health->hdl_cholesterol }}</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
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
    <script src="{{ asset('js/dashboard_charts.js') }}"></script>
@endsection