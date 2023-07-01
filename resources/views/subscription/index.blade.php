@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Subscription List') }}
                        <div class="float-end">
                            <a class="btn btn-outline-success" href="{{ route('subscriptions.create') }}">
                                {{ __('Add Station') }}
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

                            <div class="d-flex ">
                                {{-- <div class="me-auto">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Sort By
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item"
                                                    href="{{ route('subscriptions.index') . '?sort=station&order=asc' }}">Name
                                                    (ascending)</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('subscriptions.index') . '?sort=station&order=desc' }}">Name
                                                    (desending)</a></li>
                                            
                                        </ul>
                                    </div>
                                </div> --}}
                                <div>
                                    <form class="d-flex  float-end" action="{{ route('subscriptions.index') }}"
                                        method="GET">
                                        <input class="form-control me-1" type="search" placeholder="Search Name"
                                            aria-label="Search Name" id="term" name="term">
                                        <button class="btn btn-outline-primary me-1" type="submit"><i
                                                class="bi bi-search"></i></button>
                                        <a href="{{ route('subscriptions.index') }}" class="btn btn-outline-danger "><i
                                                class="bi bi-x"></i>
                                        </a>

                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="list-group">
                            @foreach ($subscriptions as $subscription)
                                <a href="{{ route('stations.show', $subscription->id) }}"
                                    class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ $subscription->station->station_name }}
                                        </h5>
                                        <small
                                            class="text-muted">{{ $subscription->station->current_level->updated_at->diffForHumans() }}</small>
                                    </div>
                                    <p class="mb-1">{{ $subscription->station->district->name }}</p>
                                    <small class="text-muted"> Water Level:
                                        {{ $subscription->station->current_level->current_level }}m

                                        @if ($subscription->station->current_level->alert_level == 1)
                                            <span class="badge bg-danger" id="alert-badge">Danger</span>
                                        @elseif($subscription->station->current_level->alert_level == 2)
                                            <span class="badge bg-orange" id="alert-badge">Warning</span>
                                        @elseif($subscription->station->current_level->alert_level == 3)
                                            <span class="badge bg-warning" id="alert-badge">Alert</span>
                                        @else
                                            <span class="badge bg-info" id="alert-badge">Normal</span>
                                        @endif

                                    </small>

                                    @csrf
                                    @method('DELETE')
                                </a>
                            @endforeach
                        </div> --}}
                        <div class="list-group">
                            @foreach ($subscriptions as $subscription)
                                <a href="{{ route('stations.show', $subscription->id) }}"
                                    class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ $subscription->station->station_name }}</h5>
                                        <small
                                            class="text-muted">{{ $subscription->station->current_level->updated_at->diffForHumans() }}</small>
                                    </div>
                                    <p class="mb-1">{{ $subscription->station->district->name }}</p>
                                    <small class="text-muted"> Water Level:
                                        {{ $subscription->station->current_level->current_level }}m

                                        @if ($subscription->station->current_level->alert_level == 3)
                                            <span class="badge bg-danger" id="alert-badge">Danger</span>
                                        @elseif($subscription->station->current_level->alert_level == 2)
                                            <span class="badge bg-orange" id="alert-badge">Warning</span>
                                        @elseif($subscription->station->current_level->alert_level == 1)
                                            <span class="badge bg-warning" id="alert-badge">Alert</span>
                                        @else
                                            <span class="badge bg-info" id="alert-badge">Normal</span>
                                        @endif

                                    </small>

                                    <div class="float-end">
                                        <form action="{{ route('subscriptions.destroy', $subscription->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="reset-btn-style text-danger"><i
                                                    class="bi bi-trash3"></i></button>
                                        </form>

                                    </div>
                                </a>
                            @endforeach
                        </div>

                        {{-- <div style="padding-top:10px;">{!! $stations->links() !!}</div> --}}
                        <div style="padding-top:10px;">{{ $subscriptions->onEachSide(2)->links() }}</div>


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
