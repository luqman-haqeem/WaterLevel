@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Add Station') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('subscriptions.store') }}" method="POST">
                            @csrf
                            <div class="d-flex justify-content-start">
                                <div class="form-group">
                                    <select name="station_id" id="station_id" class="form-select  select2">
                                        <option value="" selected> Select Station</option>
                                        @foreach ($stations as $station)
                                            <option value="{{ $station->id }}">{{ $station->station_name }}</option>
                                        @endforeach

                                    </select>

                                </div>
                                <div class="px-1">
                                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                                    <a class="btn btn-outline-secondary" href="{{ route('subscriptions.index') }}"> Back</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
