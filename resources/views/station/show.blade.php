@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('images/TNA.png') }}" alt="Card image cap">

                    {{-- <div class="card-header">{{ __('Station Detail') }}</div> --}}
                    {{-- <img src="{{ asset('images/TNA.png') }}"> --}}


                    <div class="card-body">
                        <h5 class="card-title">{{ $station->station_name }}

                            <div class="float-end">
                                <span class="badge bg-info " id="alert-badge">{{ $station->normal_water_level }}m</span>

                                <span class="badge bg-warning" id="alert-badge"> >{{ $station->alert_water_level }}m</span>

                                <span class="badge bg-orange" id="alert-badge"> >{{ $station->warning_water_level }}m</span>

                                <span class="badge bg-danger" id="alert-badge"> >{{ $station->danger_water_level }}m</span>

                            </div>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $station->subriver_basin }},
                            {{ $station->main_basin }},
                            {{ $station->district }}</h6>

                        <p class="card-text"> Water Level: {{ $station->current_level->current_level }}

                            @if ($station->current_level->alert_level == 1)
                                <span class="badge bg-danger" id="alert-badge">Danger</span>
                            @elseif($station->current_level->alert_level == 2)
                                <span class="badge bg-orange" id="alert-badge">Warning</span>
                            @elseif($station->current_level->alert_level == 3)
                                <span class="badge bg-warning" id="alert-badge">Alert</span>
                            @else
                                <span class="badge bg-info" id="alert-badge">Normal</span>
                            @endif
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
