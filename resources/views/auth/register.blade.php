@extends('layouts.app')

@push('scripts')
    <script src="{{ asset('js/registerUser.js') }}"></script>
@endpush

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="row pt-default-header w-100">
            <div class="col d-flex justify-content-center align-items-center">
                <div class="card-auth">
                    <form class="form-horizontal " method="POST" action="{{ route('register') }}">
                        <h1 class="text-center mt-3 mb-5">{{ __('auth/register.join_the_change') }}</h1>

                        @component('shared.new-user-form-fields', ['centers' => $centers])
                        @endcomponent

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required
                                   checked>
                            <label class="form-check-label" for="defaultCheck1">
                                {{ __('auth/register.terms') }}
                            </label>
                        </div>

                        <div class="form-group mt-3">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn-default">
                                    {{ __('auth/register.register') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <span>
                                {{ __('auth/register.already_account') }} <a
                                        href="{{ route('login') }}">{{ __('auth/register.login') }}</a>
                            </span>
                        </div>

                        @csrf
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
