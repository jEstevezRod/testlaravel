<div class="my-4">
    <h4 class="font-weight-bold"><i class="fas fa-kaaba mr-3"></i> {{ $center->NOMBRE }} ({{ $center->users->count() }})
    </h4>
</div>
<div class="table-responsive">
    <table class="table cus-table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('components/table-exercise1.name') }}<i
                        class="fas fa-address-book ml-2 secondary-color"></i></th>
            <th scope="col">{{ __('components/table-exercise1.lastname') }} <i
                        class="fas fa-id-card ml-2 secondary-color"></i></th>
            <th scope="col" width="180px">{{ __('components/table-exercise1.actions') }} <i
                        class="fas fa-pencil-ruler ml-2 secondary-color"></i></th>

        </tr>
        </thead>
        <tbody>
        @forelse ($center->users as $user)
            <tr>
                <th scope="row">{{$user->ID}}</th>
                <td>{{ $user->NOMBRE }} @if($user->ID === Auth::id())
                        <span class="font-weight-bold">
                            {{ __('components/table-exercise1.me') }}
                        </span> @endif
                </td>
                <td>{{ $user->apellidos }}</td>
                <td>
                    <i class="far fa-trash-alt text-danger p-2 cursor-pointer btnTriggerModal"
                       data-userid="{{$user->ID}}"
                       data-centerid="{{$center->ID}}"
                       data-fullname="{{ $user->NOMBRE }} {{ $user->apellidos }}"
                       data-formurl="{{ route('user.delete', ['user' => $user->ID ]) }}">
                    </i>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">{{ __('components/table-exercise1.no_users') }}</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

