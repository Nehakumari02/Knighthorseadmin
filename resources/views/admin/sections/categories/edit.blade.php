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
'active' => __('Edit Category'),
])
@endsection

@section('content')

<div id="categories-item-edit" class="table-area">
    <div class="modal-data">
        <div class="modal-header">
            <h5 class="modal-title">{{ __("Edit Category") }}</h5>
        </div>
        <div class="modal-form-data">
            <form class="modal-form" method="POST" action="{{ setRoute('admin.product.categories.update') }}"
                enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <input type="hidden" name="target" value="{{ $category->id }}">
                <input type="hidden" name="old_image" value="{{ $category->image }}">

                <div class="row mb-10-none">

<div class="col-xl-12 col-lg-12 form-group">
    <label for="user_type">{{ __('User Type') }}</label>
    <select name="user_type" id="user_type" class="form-control">
        <option value="" disabled>{{ __('Select User Type') }}</option>
        
        <option value="Wholesaler" 
            {{ old('user_type', $category->user_type ?? '') == 'Wholesaler' ? 'selected' : '' }}>
            {{ __('Wholesaler') }}
        </option>
        
        <option value="Retailer" 
            {{ old('user_type', $category->user_type ?? '') == 'Retailer' ? 'selected' : '' }}>
            {{ __('Retailer') }}
        </option>
    </select>
</div>

                    {{-- Language Tabs --}}
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            @foreach ($languages as $item)
                            <button class="nav-link @if ($system_default_lang == $item->code) active @endif"
                                id="modal-{{ $item->name }}-tab" data-bs-toggle="tab"
                                data-bs-target="#modal-{{ $item->name }}" type="button" role="tab"
                                aria-controls="modal-{{ $item->name }}" aria-selected="true">{{ $item->name }}</button>
                            @endforeach
                        </div>
                    </nav>

                    {{-- Multilingual Inputs --}}
                    <div class="col-xl-12 col-lg-12 form-group">
                        <div class="tab-content" id="nav-tabContent">
                            @foreach ($languages as $item)
                            @php $lang_code = $item->code; @endphp
                            <div class="tab-pane fade @if ($system_default_lang == $item->code) show active @endif"
                                id="modal-{{ $item->name }}" role="tabpanel"
                                aria-labelledby="modal-{{ $item->name }}-tab">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 form-group">
                                        @include('admin.components.form.input', [
                                        'label' => __('Name') . '*',
                                        'name' => $lang_code . '_name',
                                        'placeholder' => __('Write Here') . '...',
                                        'value' => old($lang_code . '_name', $category->data->language->$lang_code->name
                                        ?? ''),
                                        ])
                                    </div>
                                    <div class="col-xl-12 col-lg-12 form-group">
                                        @include('admin.components.form.input', [
                                        'label' => __('Title') . '*',
                                        'name' => $lang_code . '_title',
                                        'placeholder' => __('Write Here') . '...',
                                        'value' => old($lang_code . '_title',
                                        $category->data->language->$lang_code->title ?? ''),
                                        ])
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        {{-- Image Upload --}}
                        <div class="col-xl-12 col-lg-12 form-group">
                            @include('admin.components.form.input-file', [
                            'label' => __('Image'),
                            'name' => 'image',
                            'class' => 'file-holder',
                            'old_files_path' => files_asset_path('site-section'),
                            'old_files' => $category->image ?? '',
                            ])
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="col-xl-12 col-lg-12 form-group d-flex align-items-center justify-content-between mt-4">
                        <a href="{{ url()->previous() }}" class="btn btn--danger">
                            {{ __('Cancel') }}
                        </a>
                        <button type="submit" class="btn btn--base">{{ __("Update") }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('script')
@endpush