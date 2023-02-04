@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Edit Camera') }}</div>

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


                        <form action="{{ route('cameras.update', $data['camera']->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="camera_name">Camera Name</label>
                                        <input type="text" id="camera_name" name="camera_name"
                                            class="form-control {{ $errors->has('camera_name') ? 'is-invalid' : '' }}"
                                            value="{{ $data['camera']->camera_name }}" placeholder="Camera Name">
                                        @error('camera_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="station_name">Station Name</label>

                                        <select name="station_name" id="station_name"
                                            class="form-control select2 {{ $errors->has('station_name') ? 'is-invalid' : '' }}"
                                            data-placeholder="Choose one thing">
                                            <option value="0" selected >No Camera</option>
                                            
                                            @foreach ($data['stations'] as $station)
                                                <option value="{{ $station->id }}"
                                                    {{ $data['camera']->station_id == $station->id ? 'selected' : '' }}
                                                    >{{ $station->station_name }}</option>
                                            @endforeach

                                        </select>
                                        @error('station_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
