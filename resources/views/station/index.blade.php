@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Station List') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="row pb-3">
                            <div class="col">
                                <form class="d-flex float-end" action="{{ route('stations.index') }}" method="GET">
                                    <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search"
                                        id="term" name="term">
                                    <button class="btn btn-primary me-1" type="submit">Search</button>
                                    <a href="{{ route('stations.index') }}" class="btn btn-danger ">Reset</a>
                                </form>
                            </div>
                        </div>

                        <table class="table table-bordered">
                            <tr>
                                <th>{{ __('No') }}</th>
                                <th> @sortablelink('station_name', trans('Station Name'))</th>
                                <th> @sortablelink('district_id', trans('District'))</th>
                                <th> @sortablelink('current_level.alert_level', trans('Alert'))</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                            @foreach ($stations as $station)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $station->station_name }}</td>
                                    <td>{{ $station->district->name }}</td>
                                    <td>

                                        @if ($station->current_level->alert_level == 1)
                                            <span class="badge bg-danger" id="alert-badge">Danger</span>
                                        @elseif($station->current_level->alert_level == 2)
                                            <span class="badge bg-orange" id="alert-badge">Warning</span>
                                        @elseif($station->current_level->alert_level == 3)
                                            <span class="badge bg-warning" id="alert-badge">Alert</span>
                                        @else
                                            <span class="badge bg-info" id="alert-badge">Normal</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="" method="POST">

                                            <a class="btn btn-info"
                                                href="{{ route('stations.show', $station->id) }}">Show</a>

                                            {{-- <a class="btn btn-warning" href="">Edit</a> --}}

                                            {{-- @csrf
                                            @method('DELETE')
               
                                            <button type="submit" class="btn btn-danger">Delete</button> --}}
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $stations->links() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
