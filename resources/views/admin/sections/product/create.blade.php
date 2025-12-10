@extends('admin.layouts.master')
@php
    $default_lang_code = language_const()::NOT_REMOVABLE;
    $system_default_lang = get_default_language_code();
    $languages_for_js_use = $languages->toJson();
@endphp

@push('css')
@endpush

@section('page-title')
    @include('admin.components.page-title', ['title' => __($page_title)])
@endsection

@section('breadcrumb')
    @include('admin.components.breadcrumb', [
        'breadcrumbs' => [
            [
                'name' => __('Dashboard'),
                'url' => setRoute('admin.dashboard'),
            ],
        ],
        'active' => __('Add Product'),
    ])
@endsection

@section('content')
    <div id="sub-categories-add" class="table-area">
        <div class="modal-data">
            <div class="modal-header px-0">
                <h5 class="modal-title">{{ __('Add Product') }}</h5>
            </div>
            <div class="modal-form-data">
                <form class="modal-form" method="POST" action="{{ setRoute('admin.product.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-10-none">

                        <div class="col-xl-6 col-lg-6 form-group">
                            @include('admin.components.form.input-file', [
                                'label' => __('Image'),
                                'name' => 'image',
                                'class' => 'file-holder',
                            ])
                        </div>
                        <div class="col-xl-6 col-lg-6 form-group">
                            @include('admin.components.form.input-file', [
                                'label' => __('Meta Image'),
                                'name' => 'meta_image',
                                'class' => 'file-holder',
                            ])
                        </div>
                        {{-- START: 10 SEPARATE GALLERY CONTAINERS --}}
<div class="col-xl-12 col-lg-12 form-group mt-3">
    <h6 class="mb-3">{{ __('Gallery Images (Max 10)') }}</h6>
    <div class="row">
        {{-- This loop creates 10 boxes automatically --}}
        @for ($i = 1; $i <= 10; $i++)
            <div class="col-xl-3 col-lg-4 col-md-6 form-group">
                @include('admin.components.form.input-file', [
                    'label' => __('Image') . ' ' . $i,
                    'name' => 'images[]',  // <--- IMPORTANT: This collects them all into one list
                    'class' => 'file-holder',
                ])
            </div>
        @endfor
    </div>
</div>
{{-- END: 10 SEPARATE GALLERY CONTAINERS --}}
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                @foreach ($languages as $item)
                                    <button class="nav-link @if ($system_default_lang == $item->code) active @endif"
                                        id="modal-{{ $item->name }}-tab" data-bs-toggle="tab"
                                        data-bs-target="#modal-{{ $item->name }}" type="button" role="tab"
                                        aria-controls="modal-{{ $item->name }}"
                                        aria-selected="true">{{ $item->name }}</button>
                                @endforeach
                            </div>
                        </nav>
                        <div class="col-xl-12 col-lg-12 form-group">
                            <div class="tab-content" id="nav-tabContent">
                                @foreach ($languages as $item)
                                    @php
                                        $lang_code = $item->code;
                                    @endphp
                                    <div class="tab-pane fade @if ($system_default_lang == $item->code) show active @endif"
                                        id="modal-{{ $item->name }}" role="tabpanel"
                                        aria-labelledby="modal-{{ $item->name }}-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 form-group">
                                                @include('admin.components.form.input', [
                                                    'label' => __('Name') . '*',
                                                    'name' => $lang_code . '_name',
                                                    'placeholder' => __('Write Here') . '...',
                                                ])
                                            </div>
                                            <div class="col-xl-12 col-lg-12 form-group">
                                                @include('admin.components.form.textarea', [
                                                    'label' => __('Description') . '*',
                                                    'name' => $lang_code . '_description',
                                                    'placeholder' => __('Write Here') . '...',
                                                ])
                                            </div>
                                            <div class="col-xl-12 col-lg-12 form-group">
                                                @include('admin.components.form.input', [
                                                    'label' => __('Meta Title') . '*',
                                                    'name' => $lang_code . '_meta_title',
                                                    'placeholder' => __('Write Here') . '...',
                                                ])
                                            </div>
                                            <div class="col-xl-12 col-lg-12 form-group">
                                                @include('admin.components.form.textarea', [
                                                    'label' => __('Meta Description') . '*',
                                                    'name' => $lang_code . '_meta_description',
                                                    'placeholder' => __('Write Here') . '...',
                                                ])
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-xl-12 col-lg-12 col-sm-6 mb-20">
                                <label>{{ __('Select Category ') }}<span class="text--base">*</span></label>

                                <select id="category" class="form--control select2-basic" name="category_id">
                                    <option>{{ __('Select Category') }}</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}" data-sub_category="{{ $item->sub_category }}"
                                            {{ old('category') == $item->id ? 'selected' : '' }}>
                                            {{ $item->data->language->$system_default_lang->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-sm-6 mb-20">
                                <label>{{ __('Select Sub Category ') }}<span class="text--base">*</span></label>
                                <select id="sub_category" name="sub_category_id" class="form--control select2-basic">
                                    <option disabled selected>{{ __('Select Sub Category') }}</option>
                                </select>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-sm-6 mb-20">
                                <label>{{ __('Select Area ') }}<span class="text--base">*</span></label>

                                <select name="areas[]" class="form--control select2-auto-tokenize select2-hidden-accessible"
                                    placeholder="Add Language" multiple required>
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}"
                                            {{ in_array($area->id, $product_areas) ? 'selected' : '' }}>
                                            {{ $area->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-sm-6 mb-20">
                                <label>{{ __('Select Unit ') }}<span class="text--base">*</span></label>
                                <select id="unit-select" class="form--control select2-basic" name="unit_id">
                                    <option>{{ __('Select Unit') }}</option>
                                    @foreach ($unit as $item)
                                        <option value="{{ $item->id }}" data-unit-name="{{ $item->unit }}">
                                            {{ $item->unit }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 form-group">

                                    <label for="">{{ __('Price') }}*</label>
                                    <div class="input-group">
                                        <input type="text" class="form--control" name="price">

                                        <span class="input-group-text">{{ get_default_currency_code() }}</span>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 form-group">
                                    {{-- @include('admin.components.form.input', [
                                        'label' => __('Offer Price') . ' ' . __('(optional)'),
                                        'name' => 'offer_price',
                                        'placeholder' => __('Write Here') . '...',
                                    ]) --}}

                                    <label for="">{{ __('Offer Price') }}{{ __('(optional)') }}</label>
                                    <div class="input-group">
                                        <input type="text" class="form--control" name="offer_price">

                                        <span class="input-group-text">{{ get_default_currency_code() }}</span>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 form-group">
                                    <label for="">{{ __('Stock') }}*</label>
                                    <div class="input-group">
                                        <input type="text" class="form--control" name="quantity">
                                        <span class="input-group-text unit-display"></span>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-3 form-group">
                                    <label for="">{{ __('Order Quantity') }}*</label>
                                    <div class="input-group">
                                        <input type="text" class="form--control" name="order_quantity">
                                        <span class="input-group-text unit-display"></span>
                                    </div>
                                </div>



                            </div>
                            <div class="col-xl-12 col-lg-12 col-sm-6 mb-20">
                                <label>{{ __('Select Shipment ') }}<span class="text--base">*</span></label>

                                <select id="" class="form--control select2-basic" name="shipment_id">
                                    <option>{{ __('Select Shipment') }}</option>
                                    @foreach ($shipment as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-sm-6 mb-20 pt-2">
                                <div class="mark-favour d-flex">
                                    <input type="checkbox" id="sports" name="popular" value="1">
                                    <label class="ps-2" for="sports">{{ __('Mark as popular') }}</label>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group d-flex align-items-center justify-content-between mt-4">
                            <a href="{{ url()->previous() }}" class="btn btn--danger">
                                {{ __('Cancel') }}
                            </a>

                            <button type="submit" class="btn btn--base">{{ __('Add') }}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        var default_language = "{{ $default_lang_code }}";
        var system_default_language = "{{ $system_default_lang }}";
        var languages = "{{ $languages_for_js_use }}";


        languages = JSON.parse(languages.replace(/&quot;/g, '"'));
        $(document).on('change', '#category', function() {
            var selectedOption = $(this).find('option:selected');
            var sub_category = selectedOption.data('sub_category');
            var departmentDropdown = $('#sub_category');
            departmentDropdown.empty();
            departmentDropdown.append(
                '<option disabled selected>{{ __('Select Sub Category') }}</option>');

            if (sub_category && sub_category.length > 0) {
                sub_category.forEach(function(dept) {
                    departmentDropdown.append('<option value="' + dept.id + '">' + dept.data.language[
                            default_language].name +
                        '</option>');
                });
            }
        });

        $(document).ready(function() {
            $('#unit-select').on('change', function() {

                // Get the selected option's data-unit-name attribute
                var unitName = $(this).find('option:selected').data('unit-name');

                // Update the span with the unit name
                $('.unit-display').text(unitName);
            });
        });
    </script>
@endpush
