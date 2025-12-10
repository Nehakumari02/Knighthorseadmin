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
        'active' => __('Product Category'),
    ])
@endsection

@section('content')
    <div id="" class="table-area">
        <div class="modal-data">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Product Category') }}</h5>
            </div>
            <div class="modal-form-data">
                <form class="modal-form" method="POST" action="{{ setRoute('admin.product.update') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="target" value="{{ $product->id }}">
                    <input type="hidden" name="old_image" value="{{ $product->image }}">
                    <div class="row mb-10-none">
                        <div class="col-xl-6 col-lg-6 form-group">
                            @include('admin.components.form.input-file', [
                                'label' => __('Image'),
                                'name' => 'image',
                                'class' => 'file-holder',
                                'old_files_path' => files_asset_path('site-section'),
                                'old_files' => $product->image ?? '',
                            ])
                        </div>
                        <div class="col-xl-6 col-lg-6 form-group">
                            @include('admin.components.form.input-file', [
                                'label' => __('Image'),
                                'name' => 'image',
                                'class' => 'file-holder',
                                'old_files_path' => files_asset_path('site-section'),
                                'old_files' => $product->meta_image ?? '',
                            ])
                        </div>
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
                                                    'value' => old(
                                                        $lang_code . '_name',
                                                        $product->data->language->$lang_code->name ?? ''),
                                                ])
                                            </div>
                                            <div class="col-xl-12 col-lg-12 form-group">
                                                @include('admin.components.form.input', [
                                                    'label' => __('Description') . '*',
                                                    'name' => $lang_code . '_description',
                                                    'placeholder' => __('Write Here') . '...',
                                                    'value' => old(
                                                        $lang_code . '_description',
                                                        $product->data->language->$lang_code->description ?? ''),
                                                ])
                                            </div>

                                            <div class="col-xl-12 col-lg-12 form-group">
                                                @include('admin.components.form.input', [
                                                    'label' => __('Meta Title') . '*',
                                                    'name' => $lang_code . '_meta_title',
                                                    'placeholder' => __('Write Here') . '...',
                                                    'value' => old(
                                                        $lang_code . '_meta_title',
                                                        $product->data->language->$lang_code->meta_title ?? ''),
                                                ])
                                            </div>
                                            <div class="col-xl-12 col-lg-12 form-group">
                                                @include('admin.components.form.input', [
                                                    'label' => __('Metal Description') . '*',
                                                    'name' => $lang_code . '_metal_description',
                                                    'placeholder' => __('Write Here') . '...',
                                                    'value' => old(
                                                        $lang_code . '_meta_description',
                                                        $product->data->language->$lang_code->meta_description ??
                                                            ''),
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
                                            {{ $product->category_id == $item->id ? 'selected' : '' }}>
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
                                        <option value="{{ $item->id }}" data-unit-name="{{ $item->unit }}"
                                            @if ($product->unit_id == $item->id) selected @endif>
                                            {{ $item->unit }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                      
                             <div class="row">
                                <div class="col-xl-3 col-lg-3 form-group">

                                    <label for="">{{ __('Price') }}*</label>
                                    <div class="input-group">
                                        <input type="text" class="form--control" name="price" value="{{ old('price', $product->price ?? '') }}">

                                        <span class="input-group-text">{{ get_default_currency_code() }}</span>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 form-group">

                                    <label for="">{{ __('Offer Price') }}{{ __('(optional)') }}</label>
                                    <div class="input-group">
                                        <input type="text" class="form--control" name="offer_price" value="{{ old('price', $product->offer_price ?? '') }}">

                                        <span class="input-group-text">{{ get_default_currency_code() }}</span>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 form-group">
                                    <label for="">{{ __('Stock') }}*</label>
                                    <div class="input-group">
                                        <input type="text" class="form--control" name="quantity" value="{{ old('price', $product->available_quantity ?? '') }}">
                                        <span class="input-group-text unit-display"></span>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-3 form-group">
                                    <label for="">{{ __('Order Quantity') }}*</label>
                                    <div class="input-group">
                                        <input type="text" class="form--control" name="order_quantity" value="{{ old('price', $product->order_quantity ?? '') }}">
                                        <span class="input-group-text unit-display"></span>
                                    </div>
                                </div>



                            </div>
                            <div class="col-xl-12 col-lg-12 col-sm-6 mb-20">
                                <label>{{ __('Select Shipment ') }}<span class="text--base">*</span></label>

                                <select id="" class="form--control select2-basic" name="shipment_id">
                                    <option>{{ __('Select Shipment') }}</option>
                                    @foreach ($shipment as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($product->shipment_id == $item->id) selected @endif>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-sm-6 mb-20">
                                <label for="sports">{{ __('Mark as popular') }}</label><br>
                                <input type="checkbox" id="sports" name="popular" value="1"
                                    @checked($product->popular == 1)>

                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group d-flex align-items-center justify-content-between mt-4">
                            <a href="{{ url()->previous() }}" class="btn btn--danger">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit" class="btn btn--base">{{ __('Update') }}</button>
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
        var unit  = "{{ $product->unit()->first()->unit }}";
        languages = JSON.parse(languages.replace(/&quot;/g, '"'));
        $(document).on('change', '#category', function() {
            var selectedOption = $(this).find('option:selected');
            var sub_category = selectedOption.data('sub_category');
            var subCatDropDown = $('#sub_category');
            subCatDropDown.empty();
            subCatDropDown.append(
                '<option disabled selected>{{ __('Select Sub Category') }}</option>');

            if (sub_category && sub_category.length > 0) {
                sub_category.forEach(function(dept) {
                    subCatDropDown.append('<option value="' + dept.id + '">' + dept.data.language[
                            default_language].name +
                        '</option>');
                });
            }
        });
        // Function to handle branch change
        function handleBranchChange() {
            var selectedOption = $('#category').find('option:selected');
            var sub_category = selectedOption.data('sub_category');


            var subCatDropDown = $('#sub_category');

            var currentSubCatId = @json($product->sub_category_id); // Get current department ID

            subCatDropDown.empty();
            subCatDropDown.append('<option disabled selected>{{ __('Select Subcategory') }}</option>');

            if (sub_category && sub_category.length > 0) {
                sub_category.forEach(function(dept) {
                    // Check if this department is the one currently assigned to the doctor
                    var isSelected = (dept.id == currentSubCatId);
                    subCatDropDown.append('<option value="' + dept.id + '"' +
                        (isSelected ? ' selected' : '') + '>' + dept.data.language[
                            default_language].name + '</option>');
                });
            }
        }
        // Trigger branch change on page load
        handleBranchChange();

        // Bind the change event
        $(document).on('change', '#category', handleBranchChange);
                  
                   
            $(document).ready(function() {
                  $('.unit-display').text(unit);
            $('#unit-select').on('change', function() {
                 // Update the span with the unit name
             

             
                
                // Get the selected option's data-unit-name attribute
                var unitName = $(this).find('option:selected').data('unit-name');

                // Update the span with the unit name
                $('.unit-display').text(unitName);
            });
        });
        
    </script>
@endpush
