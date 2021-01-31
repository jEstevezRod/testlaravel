<div class="my-2">
    <button type="button" class="btn btn-outline-dark" id="autogenerateBtn">
        <i class="fas fa-code mr-2"></i>
        {{ __('shared/new-user-form-fields.autogenerate_data') }}
    </button>

    <div class="my-2 d-none" id="autogenerateHint">
        <p>
            {{ __('shared/new-user-form-fields.autogenerate_password') }}
            <code class="mx-3">password</code>
        </p>
    </div>
</div>

<div class="form-group">
    <label for="NOMBRE" class=" control-label">{{ __('shared/new-user-form-fields.name') }}</label>

    <div class="">
        <input id="NOMBRE" type="text"
               class="form-control {{ $errors->has('NOMBRE') ? ' is-invalid' : '' }}"
               name="NOMBRE"
               value="{{ old('NOMBRE') }}" required autofocus>

        @if ($errors->has('NOMBRE'))
            <small class="text-danger">
                <strong>{{ $errors->first('NOMBRE') }}</strong>
            </small>
        @endif
    </div>
</div>

<div class="form-row">

    <div class="form-group col-md-6 ">
        <label for="APELLIDO1" class=" control-label">{{ __('shared/new-user-form-fields.first_lastname') }}</label>

        <div class="">
            <input id="APELLIDO1" type="text"
                   class="form-control {{ $errors->has('APELLIDO1') ? ' is-invalid' : '' }}"
                   name="APELLIDO1"
                   value="{{ old('APELLIDO1') }}" required>

            @if ($errors->has('APELLIDO1'))
                <small class="text-danger">
                    <strong>{{ $errors->first('APELLIDO1') }}</strong>
                </small>
            @endif
        </div>
    </div>

    <div class="form-group col-md-6 ">
        <label for="APELLIDO2" class=" control-label">{{ __('shared/new-user-form-fields.second_lastname') }}</label>

        <div class="">
            <input id="APELLIDO2" type="text"
                   class="form-control {{ $errors->has('APELLIDO2') ? ' is-invalid' : '' }}"
                   name="APELLIDO2" value="{{ old('APELLIDO2') }}">

            @if ($errors->has('APELLIDO2'))
                <small class="text-danger">
                    <strong>{{ $errors->first('APELLIDO2') }}</strong>
                </small>
            @endif
        </div>
    </div>
</div>


<div class="form-group">
    <label for="EMAIL" class=" control-label">{{ __('shared/new-user-form-fields.email') }}</label>

    <div class="">
        <input id="EMAIL" type="email"
               class="form-control {{ $errors->has('EMAIL') ? ' is-invalid' : '' }}"
               name="EMAIL"
               value="{{ old('EMAIL') }}" required>

        @if ($errors->has('EMAIL'))
            <small class="text-danger">
                <strong>{{ $errors->first('EMAIL') }}</strong>
            </small>
        @endif
    </div>
</div>

<div class="form-row d-flex align-items-end">

    <div class="form-group col-md-6 ">
        <label for="TELEFONO1" class=" control-label">{{ __('shared/new-user-form-fields.phone') }}</label>

        <div class="">
            <input id="TELEFONO1" type="text"
                   class="form-control {{ $errors->has('TELEFONO1') ? ' is-invalid' : '' }}"
                   name="TELEFONO1"
                   value="{{ old('TELEFONO1')}}" required>

            @if ($errors->has('TELEFONO1'))
                <small class="text-danger">
                    <strong>{{ $errors->first('TELEFONO1') }}</strong>
                </small>
            @endif
        </div>
    </div>

    <div class="form-group col-md-6" id="addSecondPhoneFieldRow">
        <button class="btn btn-sm btn-light" type="button" id="addSecondPhoneField">
            <i class="fas fa-plus mr-2"></i>
            {{ __('shared/new-user-form-fields.add_other_phone') }}
        </button>
    </div>

    <div class="form-group col-md-6 d-none" id="formGroupPhone2Field">
        <label for="TELEFONO2" class=" control-label">{{ __('shared/new-user-form-fields.phone2') }}</label>

        <div class="">
            <input id="TELEFONO2" type="tel" class="form-control {{ $errors->has('TELEFONO2') ? ' is-invalid' : '' }}"
                   name="TELEFONO2"
                   value="{{ old('TELEFONO2') }}">

            @if ($errors->has('TELEFONO2'))
                <small class="text-danger">
                    <strong>{{ $errors->first('TELEFONO2') }}</strong>
                </small>
            @endif
        </div>
    </div>
</div>

<div class="form-group">
    <label for="PASSWORD" class=" control-label">{{ __('shared/new-user-form-fields.password') }}</label>

    <div class="">
        <input id="PASSWORD" type="password"
               class="form-control {{ $errors->has('PASSWORD') ? ' is-invalid' : '' }}"
               name="PASSWORD" required>

        @if ($errors->has('PASSWORD'))
            <small class="text-danger">
                <strong>{{ $errors->first('PASSWORD') }}</strong>
            </small>
        @endif
    </div>
</div>

<div class="form-group">
    <label for="PASSWORD-confirm" class="control-label">{{ __('shared/new-user-form-fields.password_confirm') }}</label>

    <div class="">
        <input id="PASSWORD-confirm" type="password" class="form-control"
               name="PASSWORD_confirmation" required>
    </div>
</div>

<div class="form-group">
    <label for="IDCENTRO">{{ __('shared/new-user-form-fields.center') }}</label>
    <select class="form-control" id="IDCENTRO" name="IDCENTRO">
        <option value="" disabled selected>{{ __('shared/new-user-form-fields.select_center') }}</option>
        @foreach($centers as $center)
            <option value="{{ $center->ID }}">{{ $center->NOMBRE }}</option>
        @endforeach
    </select>
    @if ($errors->has('IDCENTRO'))
        <small class="text-danger">
            <strong>{{ $errors->first('IDCENTRO') }}</strong>
        </small>
    @endif
</div>
