@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Subscription List') }}
                        <div class="float-end">
                            <a class="btn btn-success" href="{{ route('subscriptions.create') }}">
                                {{ __('Create New Subscription') }}
                            </a>
                        </div>
                    </div>

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
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="row pb-3">
                            <div class="col">
                                <form class="d-flex float-end" action="{{ route('subscriptions.index') }}" method="GET">
                                    <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search"
                                        id="term" name="term">
                                    <button class="btn btn-primary me-1" type="submit">Search</button>
                                    <a href="{{ route('subscriptions.index') }}" class="btn btn-danger ">Reset</a>
                                </form>
                            </div>
                        </div>

                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                {{-- <th>User Name</th> --}}
                                <th> @sortablelink('station.station_name',trans('Station Name'))</th>
                                <th> @sortablelink('station.alert_level',trans('Station Status'))</th>
                                <th> @sortablelink('station.updated_at',trans('Last Updated'))</th>

                                {{-- <th>Last Updated</th> --}}
                                <th>Action</th>
                            </tr>
                            @foreach ($subscriptions as $subscription)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $subscription->station->station_name }}</td>
                                    <td>
                                        {{ $subscription->station->current_level->current_level }}
                                        @if ($subscription->station->current_level->alert_level == 1)
                                            <span class="badge bg-danger" id="alert-badge">Danger</span>
                                        @elseif($subscription->station->current_level->alert_level == 2)
                                            <span class="badge bg-orange" id="alert-badge">Warning</span>
                                        @elseif($subscription->station->current_level->alert_level == 3)
                                            <span class="badge bg-warning" id="alert-badge">Alert</span>
                                        @else
                                            <span class="badge bg-info" id="alert-badge">Normal</span>
                                        @endif

                                    </td>
                                    <td>
                                        {{ $subscription->station->current_level->updated_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        <form action="{{ route('subscriptions.destroy', $subscription->id) }}"
                                            method="POST">

                                            <a class="btn btn-info"
                                                href="{{ route('stations.show', $subscription->station_id) }}">Show</a>

                                            {{-- <a class="btn btn-primary" href="">Edit</a> --}}

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $subscriptions->links() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
@endsection
