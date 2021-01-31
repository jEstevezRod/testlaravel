<div class="modal fade" id="modalDeleteUser" tabindex="-1" role="dialog"
     aria-labelledby="modalDeleteUserLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteUserLabel">{{ __('components/modal-delete.delete_user') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ __('components/modal-delete.text1') }}</p>
                <strong id="userName-text"></strong>
                <div id="deleteYourself" class="alert alert-danger-custom my-3 d-none">
                    {{ __('components/modal-delete.warning') }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('components/modal-delete.close') }}</button>
                <button type="submit" form="formDeleteUser"
                        class="btn btn-danger">{{ __('components/modal-delete.delete') }}</button>
                <form id="formDeleteUser" class="invisible" method="POST">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="filterCenters" value="{{ request()->get('filterCenters') }}">
                </form>
            </div>
        </div>
    </div>
</div>
