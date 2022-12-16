@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Station Detail</h2>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Station Name:</strong>
                    {{ $subscription->station->station_name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>District:</strong>
                    {{ $subscription->station->district }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Main Basin:</strong>
                    {{ $subscription->station->main_basin }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Subriver Basin:</strong>
                    {{ $subscription->station->subriver_basin }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Current Level:</strong>
                    {{ $subscription->station->current_level->current_level }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Normal Level:</strong>
                    {{ $subscription->station->normal_water_level }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alert Level:</strong>
                    {{ $subscription->station->alert_water_level }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Warning Level:</strong>
                    {{ $subscription->station->warning_water_level }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Danger Level:</strong>
                    {{ $subscription->station->danger_water_level }}
                </div>
            </div>
        </div>


        <div class="row py-4">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('subscriptions.index') }}"> Back</a>
            </div>
        </div>
    </div>
@endsection
