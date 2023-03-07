@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Camera List') }}</div>

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

                        {{-- <div class="row pb-3">
                            <div class="col">
                                <form class="d-flex float-end" action="{{ route('cameras.index') }}" method="GET">
                                    <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search"
                                        id="term" name="term">
                                    <button class="btn btn-primary me-1" type="submit">Search</button>
                                    <a href="{{ route('cameras.index') }}" class="btn btn-danger ">Reset</a>
                                </form>
                            </div>
                        </div> --}}
                        <div class="row pb-3">
                            <div class="d-flex ">
                                <div class="me-auto">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Sort By
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item"
                                                    href="{{ route('cameras.index') . '?sort=station&order=asc' }}">Name
                                                    (ascending)</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('cameras.index') . '?sort=station&order=desc' }}">Name
                                                    (desending)</a></li>
                                         
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                    <form class="d-flex  float-end" action="{{ route('cameras.index') }}" method="GET">
                                        <input class="form-control me-1" type="search" placeholder="Search Name"
                                            aria-label="Search Name" id="term" name="term">
                                        <button class="btn btn-outline-primary me-1" type="submit"><i
                                                class="bi bi-search"></i></button>
                                        <a href="{{ route('cameras.index') }}" class="btn btn-outline-danger "><i
                                                class="bi bi-x"></i>
                                        </a>

                                    </form>
                                </div>
                            </div>

                        </div>

                        <div class="list-group">
                            @foreach ($cameras as $camera)
                                <a href="{{ route('cameras.show', $camera->id) }}"
                                    class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ $camera->camera_name }}
                                        </h5>
                                        <small class="text-muted">{{ $camera->main_basin }}</small>
                                    </div>
                                    <p class="mb-1">{{ $camera->district->name }}</p>
                                    <small class="text-muted">{{ $camera->latitude }}, {{ $camera->longitude }}</small>
                                </a>
                            @endforeach
                        </div>
                        {{-- <div style="padding-top:10px;">{!! $cameras->links() !!}</div> --}}
                        <div style="padding-top:10px;">{{ $cameras->onEachSide(2)->links() }}</div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
