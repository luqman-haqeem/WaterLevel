@extends('layouts.app')
@section('style')
    <style>
        .image-container {
            position: relative;
            overflow: hidden;
        }

        .placeholder {
            position: relative;
            width: 100%;
            filter: blur(10px);
            transform: scale(1);
        }

        .picture {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            transition: opacity 1s linear;
        }

        .picture.loaded {
            opacity: 1;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">


                    @if (empty($station->camera->img_url))
                        <div class="image-container" data-large="{{ asset('images/nocctv.png') }}">
                            <img class="placeholder" src="{{ asset('images/img-placeholder.jpeg') }}" class="img-small"
                                alt="Station Img">
                        </div>
                    @else
                        <div class="image-container"
                            data-large="{{ route('camera.show-img', $station->camera->JPS_camera_id) }}">
                            <img class="placeholder" src="{{ asset('images/img-placeholder.jpeg') }}" class="img-small"
                                alt="Station Img">
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="d-flex ">
                            <h5 class="card-title flex-grow-1">{{ $station->station_name }} 

                              
                            </h5>
                            <div class="float-end">
                                <span class="badge bg-info " id="alert-badge">{{ $station->normal_water_level }}m</span>

                                <span class="badge bg-warning" id="alert-badge"> >{{ $station->alert_water_level }}m</span>

                                <span class="badge bg-orange" id="alert-badge"> >{{ $station->warning_water_level }}m</span>

                                <span class="badge bg-danger" id="alert-badge"> >{{ $station->danger_water_level }}m</span>

                            </div>
                        </div>

                        
                        <h6 class="card-subtitle mb-2 text-muted">
                            {{ $station->district->name }}</h6>

                        <p class="card-text"> Water Level: {{ $station->current_level->current_level }}
                            @if ($station->current_level->alert_level == 3)
                                <span class="badge bg-danger" id="alert-badge">Danger</span>
                            @elseif($station->current_level->alert_level == 2)
                                <span class="badge bg-orange" id="alert-badge">Warning</span>
                            @elseif($station->current_level->alert_level == 1)
                                <span class="badge bg-warning" id="alert-badge">Alert</span>
                            @else
                                <span class="badge bg-info" id="alert-badge">Normal</span>
                            @endif
                        <span class="fw-light"> {{ $station->current_level->updated_at->diffForHumans() }}</span>

                        </p>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        window.onload = function() {
            var largePicture = document.querySelector('.image-container')

            // Load large image
            var imgLarge = new Image();
            imgLarge.src = largePicture?.dataset?.large;
            imgLarge.onload = function() {
                imgLarge.classList.add('loaded');
            };
            imgLarge.classList.add('picture');
            largePicture.appendChild(imgLarge);
        }
    </script>
@endsection
