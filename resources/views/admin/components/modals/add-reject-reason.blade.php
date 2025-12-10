<div id="add-reject-reason" class="mfp-hide large">
    <div class="modal-data">
        <div class="modal-header px-0">
            <h5 class="modal-title">{{ __('Add reason') }}</h5>
        </div>
        <div class="modal-form-data">
            <form class="modal-form" method="POST"
                action="{{ setRoute('admin.parlour.list.status.update') }}" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <input type="text" name="data_target" value={{ $data->id }} hidden >
                <input type="text" name="status" value="3" hidden >
                <div class="col-xl-12 col-lg-12 form-group">
                    @include('admin.components.form.textarea', [
                        'label' => __('Explain Rejection Reason') . '*',
                        'name' => 'reason',
                    ])
                </div>
                <div class="col-xl-12 col-lg-12 form-group d-flex align-items-center justify-content-between mt-4">
                    <button type="button" class="btn btn--danger modal-close">{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn--base">{{ __('Submit') }}</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>
