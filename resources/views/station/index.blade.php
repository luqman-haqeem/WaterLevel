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
                            <div class="d-flex ">
                                <div class="me-auto pe-1">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Sort By
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item"
                                                    href="{{ route('stations.index') . '?sort=station&order=asc' }}">Name
                                                    (ascending)</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('stations.index') . '?sort=station&order=desc' }}">Name
                                                    (desending)</a></li>
                                            {{-- <li><a class="dropdown-item"
                                                    href="{{ route('stations.index') . '?sort=district' }}">District
                                                    (ascending)</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('stations.index') . '?sort=alert' }}">Alert (ascending)</a>
                                            </li> --}}
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                    <form class="d-flex  float-end" action="{{ route('stations.index') }}" method="GET">
                                        <input class="form-control me-1" type="search" placeholder="Search Name"
                                            aria-label="Search Name" id="term" name="term">
                                        <button class="btn btn-outline-primary me-1" type="submit"><i
                                                class="bi bi-search"></i></button>
                                        <a href="{{ route('stations.index') }}" class="btn btn-outline-danger "><i
                                                class="bi bi-x"></i>
                                        </a>

                                    </form>
                                </div>
                            </div>

                        </div>


                        <div class="list-group">


                            {{-- <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">List group item heading</h5>
                                    <small>3 days ago</small>
                                </div>
                                <p class="mb-1">Some placeholder content in a paragraph.</p>
                                <small>And some small print.</small>
                            </a> --}}
                            {{-- <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">List group item heading</h5>
                                    <small class="text-muted">3 days ago</small>
                                </div>
                                <p class="mb-1">Some placeholder content in a paragraph.</p>
                                <small class="text-muted">And some muted small print.</small>
                            </a> --}}
                            @foreach ($stations as $station)
                                <a href="{{ route('stations.show', $station->id) }}"
                                    class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ $station->station_name }}
                                        </h5>
                                        <small
                                            class="text-muted">{{ $station->current_level->updated_at->diffForHumans() }}</small>
                                    </div>
                                    <p class="mb-1">{{ $station->district->name }}</p>
                                    <small class="text-muted"> Water Level: {{ $station->current_level->current_level }}m

                                        @if ($station->current_level->alert_level == 1)
                                            <span class="badge bg-danger" id="alert-badge">Danger</span>
                                        @elseif($station->current_level->alert_level == 2)
                                            <span class="badge bg-orange" id="alert-badge">Warning</span>
                                        @elseif($station->current_level->alert_level == 3)
                                            <span class="badge bg-warning" id="alert-badge">Alert</span>
                                        @else
                                            <span class="badge bg-info" id="alert-badge">Normal</span>
                                        @endif
                                    </small>
                                </a>
                            @endforeach
                        </div>
                        {{-- <div style="padding-top:10px;">{!! $stations->links() !!}</div> --}}
                        <div style="padding-top:10px;">{{ $stations->onEachSide(2)->links() }}</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
