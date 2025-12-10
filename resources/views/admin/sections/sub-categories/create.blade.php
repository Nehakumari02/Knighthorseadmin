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
        'active' => __('Add Sub Category'),
    ])
@endsection

@section('content')

        <div id="sub-categories-add" class="table-area">
            <div class="modal-data">
                <div class="modal-header px-0">
                    <h5 class="modal-title">{{ __('Add Sub Category') }}</h5>
                </div>
                <div class="modal-form-data">
                    <form class="modal-form" method="POST" action="{{ setRoute('admin.product.sub.categories.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-10-none">
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
                                                    @include('admin.components.form.input', [
                                                        'label' => __('Title') . '*',
                                                        'name' => $lang_code . '_title',
                                                        'placeholder' => __('Write Here') . '...',
                                                    ])
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-xl-12 col-lg-12 col-sm-6 mb-20">
                                    <label>{{ __('Select Category ') }}<span class="text--base">*</span></label>

                                    <select id="" class="form--control select2-basic" name="category_id">
                                        <option>{{ __('Select Category') }}</option>
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->data->language->$system_default_lang->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-12 col-lg-12 form-group">
                                    @include('admin.components.form.input-file', [
                                        'label' => __('Image'),
                                        'name' => 'image',
                                        'class' => 'file-holder',
                                    ])
                                </div>
                            </div>
                            <div
                                class="col-xl-12 col-lg-12 form-group d-flex align-items-center justify-content-between mt-4">
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
@endpush
