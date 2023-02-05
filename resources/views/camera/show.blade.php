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
            /* filter: blur(10px); */
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

                    @if (empty($camera->img_url))
                        <div class="image-container" data-large="{{ asset('images/nocctv.png') }}">
                            <img class="placeholder" src="{{ asset('images/img-placeholder2.jpg') }}" class="img-small"
                                alt="Station Img">
                        </div>
                    @else
                        <div class="image-container" data-large="{{  route('camera.show-img', $camera->JPS_camera_id) }}">
                        {{-- <div class="image-container" data-large="{{ $camera->img_url }}"> --}}
                            <img class="placeholder" src="{{ asset('images/img-placeholder2.jpg') }}" class="img-small"
                                alt="Station Img">
                        </div>
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $camera->camera_name }}, {{ $camera->main_basin }}
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            {{ $camera->district->name }}</h6>



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
