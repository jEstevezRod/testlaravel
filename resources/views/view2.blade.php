@extends('layouts.dashboard')

@push('scripts')
    <script src="{{ asset('js/registerUser.js') }}"></script>
@endpush

@section('content')
    <div class="container">
        <div class="row">

            @include('shared.notifications')

            <div class="col-12 py-4">
                <h1>{{ __('view2.header') }}</h1>
                <div class="mt-3">
                    <p>{{ __('view2.explanation1') }}</p>
                    <p>{{ __('view2.explanation2') }}</p>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button type="button" class="btn-dashboard ml-4 btnTriggerModalAddUser" data-toggle="modal"
                        data-target="#modalAddUser">
                    {{ __('view2.add_user') }}
                    <i class="fas fa-user-plus ml-2"></i>
                </button>
            </div>
            <div class="col-12">
                @foreach($centers as $center)
                    @component('components.table-exercise2', ['center' => $center])
                    @endcomponent
                @endforeach
            </div>
        </div>
    </div>

    @component('components.modal-add', [ 'centers' => $centers])
    @endcomponent


@endsection
