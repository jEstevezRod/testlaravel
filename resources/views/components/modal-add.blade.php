<div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog"
     aria-labelledby="modalAddUserLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddUserLabel">{{ __('components/modal-add.add_user_title') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">

                    @component('shared.new-user-form-fields', ['centers' => $centers])
                    @endcomponent

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('components/modal-add.close') }}</button>
                    <button type="submit" class="btn btn-info">{{ __('components/modal-add.create') }}</button>
                </div>
            </div>
        </form>

    </div>
</div>
