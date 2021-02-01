@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex flex-wrap justify-content-center flex-fill pt-default-header">
            <div class="col-md-6 ">
                <div>
                    <p class="text-white text-uppercase title">{!! __('home.title') !!}</p>
                </div>
                <div>
                    <h3 class="text-white subtitle">{{ __('home.subtitle') }}</h3>
                </div>
                <div class="d-flex align-items-center mt-5">
                    <a href="@if(Auth::check()) {{ route('view1') }} @else {{ route('login') }} @endif"
                       class="p-3 btn-default transition decoration-none">
                        {{ __('home.cto_button') }}
                        <i class="fas fa-chevron-right ml-2"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center">
                <div>
                    <img src="{{ asset('storage/assets/doctor.svg') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
        <div class="row pt-default-header">
            <div class="col d-flex flex-column">
                <h2 class="text-center text-white">{!! __('home.features_title') !!}</h2>
                <p class="text-center text-white h5 mt-4">
                    {!! __('home.features_text') !!}
                </p>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 mt-5">
                <div class="d-flex flex-column justify-content-center h-100">
                    <div class="card-feature">
                        <div>
                            <img src="{{ asset('storage/assets/goal.svg') }}" class="card-feature-image" alt="">
                        </div>
                        <div class="card-feature-title">{{ __('home.mision') }}</div>
                        <div>
                            {{ __('home.mision_description') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="d-flex flex-column justify-content-center h-100">
                    <div class="card-feature">
                        <div>
                            <img src="{{ asset('storage/assets/vision.svg') }}" class="card-feature-image" alt="">
                        </div>
                        <div class="card-feature-title">{{ __('home.vision') }}</div>
                        <div>{{ __('home.vision_description') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="d-flex flex-column justify-content-center h-100">
                    <div class="card-feature">
                        <div>
                            <img src="{{ asset('storage/assets/value.svg') }}" class="card-feature-image" alt="">
                        </div>
                        <div class="card-feature-title">{{ __('home.values') }}</div>
                        <div>
                            {{ __('home.values_description') }}
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
