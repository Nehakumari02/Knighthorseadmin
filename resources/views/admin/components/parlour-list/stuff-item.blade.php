@forelse ($parlour_has_stuff ?? [] as $item)
    <div class="row align-items-end">
        <div class="col-xl-6 col-lg-6 form-group">
            @include('admin.components.form.input',[
                'label'         => __("Stuff Name")."*",
                'name'          => "stuff_name[]",
                'placeholder'   => __("Write Stuff Name")."...",
                'value'         => $item->stuff_name,
            ])
        </div>
        <div class="col-xl-1 col-lg-1 form-group">
            <button type="button" class="custom-btn btn--base btn--danger row-cross-btn w-100"><i class="las la-times"></i></button>
        </div>
    </div>
@empty
    <div class="row align-items-end">
        <div class="col-xl-6 col-lg-6 form-group">
            @include('admin.components.form.input',[
                'label'         => __("Stuff Name")."*",
                'name'          => "stuff_name[]",
                'placeholder'   => __("Write Stuff Name")."...",
                'value'         => $item->stuff_name,
            ])
        </div>
        <div class="col-xl-1 col-lg-1 form-group">
            <button type="button" class="custom-btn btn--base btn--danger row-cross-btn w-100"><i class="las la-times"></i></button>
        </div>
    </div>
@endforelse
