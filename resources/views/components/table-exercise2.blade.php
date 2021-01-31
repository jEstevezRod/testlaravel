<div class="my-4 d-flex align-items-center">
    <h4 class="font-weight-bold">
        <i class="fas fa-kaaba mr-3"></i>
        {{ $center->NOMBRE }} ({{ $center->users->count() }})
    </h4>
</div>
<div class="table-responsive">
    <table class="table cus-table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('components/table-exercise2.email') }} <i class="fas fa-at ml-2 secondary-color"></i>
            </th>
            <th scope="col">{{ __('components/table-exercise2.phone') }} <i
                        class="fas fa-phone ml-2 secondary-color"></i></th>
        </tr>
        </thead>
        <tbody>
        @forelse ($center->users as $user)
            <tr>
                <th scope="row">{{$user->ID}}</th>
                <td>{{ $user->EMAIL }}
                </td>
                <td>{{ $user->TELEFONO1 }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">{{ __('components/table-exercise2.no_user') }}</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>



