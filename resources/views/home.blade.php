@extends('layouts.app')

@section('content')
    <div class="row d-flex flex-wrap justify-content-center flex-fill pt-30">
        <div class="col-md-6 ">
            <div>
                <h1 class="text-white title">We build delightful digital experiences.</h1>
            </div>
            <div>
                <h3 class="text-white subtitle">Salutic is a software design and engineering partner that helps you
                    build successful tech products.</h3>
            </div>
            <div class="d-flex align-items-center mt-5">
                <a href="{{ route('login') }}" class="cto-btn">
                    Get started
                    <img src="{{ asset('storage/arrow.svg') }}" width="20px" alt="">
                </a>
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center">
            <div>
                <img src="{{ asset('storage/home2.png') }}" class="img-fluid" alt="">
            </div>
        </div>
    </div>
@endsection
