@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="row pt-default-header w-100">
            <div class="col d-flex justify-content-center align-items-center">
                <div class="card-auth">
                    <form class="form-horizontal " method="POST" action="{{ route('login') }}">
                        <h1 class="text-center mt-3 mb-5">{{ __('auth/login.welcome_back') }}</h1>

                        <div class="form-group">
                            <label for="email" class=" control-label">{{ __('auth/login.email') }}</label>
                            <input id="email" type="email"
                                   class="form-control {{ $errors->has('EMAIL') ? ' is-invalid' : '' }}"
                                   name="EMAIL"
                                   value="{{ old('EMAIL') }}" required>

                            @if ($errors->has('EMAIL'))
                                <small class="text-danger">
                                    <strong>{{ $errors->first('EMAIL') }}</strong>
                                </small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password" class=" control-label">{{ __('auth/login.password') }}</label>

                            <div class="">
                                <input id="password" type="password"
                                       class="form-control {{ $errors->has('PASSWORD') ? ' is-invalid' : '' }}"
                                       name="password" required>

                                @if ($errors->has('PASSWORD'))
                                    <small class="text-danger">
                                        <strong>{{ $errors->first('PASSWORD') }}</strong>
                                    </small>
                                @endif
                            </div>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                {{ __('auth/login.remember_me') }}
                            </label>
                        </div>

                        <div class="form-group">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn-default px-3 py-2">
                                    {{ __('auth/login.login') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <span>{{ __('auth/login.not_register_yet') }} <a
                                        href="{{ route('register') }}">{{ __('auth/login.register_here') }}</a>
                            </span>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
