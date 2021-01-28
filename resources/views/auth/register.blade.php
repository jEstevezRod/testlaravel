@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row pt-30">

            <div class="col-md-6">
                <img src="{{ asset('storage/home2.png') }}" class="img-fluid" alt="">

            </div>
            <div class="col-md-6">

                <div class="cus-card">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <h1 class="text-center">Sign up</h1>

                        <div class="form-group{{ $errors->has('NOMBRE') ? ' has-error' : '' }}">
                            <label for="NOMBRE" class=" control-label">Name</label>

                            <div class="">
                                <input id="NOMBRE" type="text" class="form-control" name="NOMBRE"
                                       value="{{ old('NOMBRE') }}" required autofocus>

                                @if ($errors->has('NOMBRE'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('NOMBRE') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('EMAIL') ? ' has-error' : '' }}">
                            <label for="EMAIL" class=" control-label">E-Mail Address</label>

                            <div class="">
                                <input id="EMAIL" type="email" class="form-control" name="EMAIL"
                                       value="{{ old('EMAIL') }}" required>

                                @if ($errors->has('EMAIL'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('EMAIL') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('PASSWORD') ? ' has-error' : '' }}">
                            <label for="PASSWORD" class=" control-label">Password</label>

                            <div class="">
                                <input id="PASSWORD" type="password" class="form-control" name="PASSWORD" required>

                                @if ($errors->has('PASSWORD'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('PASSWORD') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="PASSWORD-confirm" class="control-label">Confirm Password</label>

                            <div class="">
                                <input id="PASSWORD-confirm" type="password" class="form-control"
                                       name="PASSWORD_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
