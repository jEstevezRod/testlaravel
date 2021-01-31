@extends('layouts.dashboard')

@push('scripts')
    <script src="{{ asset('js/view1.js') }}"></script>
@endpush

@section('content')

    <div class="container">
        <div class="row">

            @include('shared.notifications')

            <div class="col-12 pt-4 pb-2">
                <h1 class="">{{ __('view1.header') }}</h1>
                <div class="mt-3">
                    <p>{{ __('view1.subtitle1') }}</p>
                    <p>{{ __('view1.subtitle2') }}</p>
                </div>
            </div>

            <div class="col-12 pt-4 d-flex justify-content-end">
                <div class="filter-row">
                    <form action="{{ route('view1') }}">
                        <span class="font-weight-bold mr-2">{{ __('view1.filter') }}</span>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="filterCenters" id="filterCenters1"
                                   value="1"
                                   @if ((request()->get('filterCenters') === "1") ) checked @endif>
                            <label class="form-check-label" for="filterCenters1">
                                {{ __('view1.show_all') }}
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="filterCenters" id="filterCenters2"
                                   value="2"
                                   @if (request()->get('filterCenters') === "2" || (!request()->has('filterCenters'))) checked @endif>
                            <label class="form-check-label" for="filterCenters2">
                                {{ __('view1.only_south_north') }}
                            </label>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12">
                @foreach($centers as $center)
                    @component('components.table-exercise1', ['center' => $center])
                    @endcomponent
                @endforeach
            </div>
        </div>
    </div>

    <input type="hidden" name="userId" value="{{ Auth::id() }}">

    @component('components.modal-delete')
    @endcomponent

@endsection
