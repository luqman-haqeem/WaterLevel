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
                                            <li><a class="dropdown-item"
                                                    href="{{ route('stations.index') . '?sort=district&order=asc' }}">District
                                                    (ascending)</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('stations.index') . '?sort=district&order=desc' }}">District
                                                    (desending)</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('stations.index') . '?sort=water-level&order=asc' }}">Water Level (ascending)</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('stations.index') . '?sort=water-level&order=desc' }}">Water Level (desending)</a>
                                            </li>
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
                                <div class="list-group-item list-group-item-action flex-row">
                                    <a class="custom-link" href="{{ route('stations.show', $station->id) }}">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">{{ $station->station_name }}
                                            </h5>
                                            <small
                                                class="text-muted">{{ $station->updated_at->diffForHumans() }}</small>
                                        </div>
                                        <p class="mb-1">{{ $station->district->name }}</p>

                                    </a>
                                    <div class="d-flex justify-content-between">
                                        <a class="custom-link flex-grow-1 text-muted"
                                            href="{{ route('stations.show', $station->id) }}">
                                            <small> Water Level: {{ $station->current_level }}m

                                                @if ($station->current_level >= $station->danger_water_level)
                                                    <span class="badge bg-danger" id="alert-badge">Danger</span>
                                                @elseif($station->current_level >= $station->warning_water_level)
                                                    <span class="badge bg-orange" id="alert-badge">Warning</span>
                                                @elseif($station->current_level >= $station->alert_water_level)
                                                    <span class="badge bg-warning" id="alert-badge">Alert</span>
                                                @else
                                                    <span class="badge bg-info" id="alert-badge">Normal</span>
                                                @endif
                                            </small>
                                        </a>
                                        @if (Auth::check())
                                            @if (empty($station->favorite[0]->station_id))
                                                <span><i data-id="{{ $station->id }}"
                                                        class=" heart-icon bi-heart fs-4 "></i></span>
                                            @else
                                                <span class="text-danger"><i data-id="{{ $station->id }}"
                                                        class="heart-icon fs-4 bi-heart-fill"></i></span>
                                            @endif
                                        @endif


                                        {{-- <span class=" text-danger"><i id="heart-icon" class="bi-heart-fill fs-4 "></i>
                                        </span> --}}

                                    </div>
                                </div>
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
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const heartIcons = document.querySelectorAll(".heart-icon");

            heartIcons.forEach((heartIcon) => {
                heartIcon.addEventListener("click", function() {
                    const dataId = heartIcon.getAttribute("data-id");
                    updateFavoriteStation(dataId)
                    // console.log(heartIcon)
                    heartIcon.classList.toggle("bi-heart");
                    heartIcon.classList.toggle("bi-heart-fill");
                    heartIcon.parentElement.classList.toggle("text-danger");
                });
            });

            function updateFavoriteStation(id) {

                const data = {
                    id: id
                };
                const url = `{{ route('favorite.add') }}?id=${id}`;

                // console.log(url)

                fetch(url, {
                        method: "GET",
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.status) {
                            toastr.success(result?.msg ?? "Liked")
                        } else if (result.status == 0) {
                            toastr.warning(result?.msg ?? "Removed")
                        } else {
                            toastr.error(result?.msg ?? "Server unable to process")
                        }

                    })
                    .catch(error => {
                        console.error("Error:", error);
                    });
            }

        });
    </script>
@endsection
