@if (session('warning'))
    <div class="col-12 mt-3">
        <div class="alert alert-warning-custom">
            {!!  session('warning') !!}
            <form class="d-none" id="encryptPassword"
                  action="{{route('encrypt', ['user' => request()->user()->ID])}}"
                  method="post">
                @method("PUT")
                @csrf
            </form>
        </div>
    </div>
@endif
@if (session('success'))
    <div class="col-12 mt-3">
        <div class="alert alert-success-custom">
            {!!  session('success') !!}
        </div>
    </div>
@endif
