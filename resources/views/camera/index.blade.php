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

                        <div class="row pb-3">
                            <div class="col">
                                <form class="d-flex float-end" action="{{ route('cameras.index') }}" method="GET">
                                    <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search"
                                        id="term" name="term">
                                    <button class="btn btn-primary me-1" type="submit">Search</button>
                                    <a href="{{ route('cameras.index') }}" class="btn btn-danger ">Reset</a>
                                </form>
                            </div>
                        </div>

                        <table class="table table-bordered">
                            <tr>
                                <th>{{ __('No') }}</th>
                                <th> @sortablelink('camera_name', trans('Camera Name'))</th>
                                <th> @sortablelink('district', trans('District'))</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                            @foreach ($cameras as $camera)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $camera->camera_name }}</td>
                                    <td>{{ $camera->district->name }}</td>
                                    <td>
                                        <form action="" method="POST">

                                            <a class="btn btn-info"
                                                href="{{ route('cameras.show', $camera->id) }}">Show</a>
                                            @auth
                                                @if (Auth::user()->is_admin)
                                                    <a class="btn btn-warning"
                                                        href="{{ route('cameras.edit', $camera->id) }}">Edit
                                                @endif
                                            @endauth
                                            </a>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $cameras->links() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
