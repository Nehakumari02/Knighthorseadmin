@extends('admin.layouts.master')
@php
$default_lang_code = language_const()::NOT_REMOVABLE;
$system_default_lang = get_default_language_code();
$languages_for_js_use = $languages->toJson();
@endphp

@push('css')

@endpush

@section('page-title')
    @include('admin.components.page-title',['title' => __($page_title)])
@endsection

@section('breadcrumb')
    @include('admin.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("admin.dashboard"),
        ]
    ], 'active' => __("Product")])
@endsection

@section('content')
 <div class="table-area">
        <form action="{{ route('admin.product.filter') }}" method="GET">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="filter-group">
                        <label for="search">{{ __('Search by Name') }}</label>
                        <input type="text" name="search" id="search" class="form-control" 
                               value="{{ request()->search }}" placeholder={{ __("Enter product name") }}>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="filter-group">
                        <label for="category_id">{{ __('Category') }}</label>
                        <select name="category_id" id="category_id" class="form--control select2-basic">
                            <option value="">{{ __('All Categories') }}</option>
                            @foreach($categories as $category)
                                @php
                                    $categoryData = ($category->data);
                                    $categoryName = $categoryData->language->{$system_default_lang}->name ?? '';
                                @endphp
                                <option value="{{ $category->id }}" {{ request()->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $categoryName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="filter-group">
                        <label for="sub_category_id">{{ __('Sub Category') }}</label>
                        <select name="sub_category_id" id="sub_category_id" class="form--control select2-basic">
                            <option value="">All Sub Categories</option>
                            @foreach($subCategories as $subCategory)
                                @php
                                    $subCategoryData = ($subCategory->data);
                                    $subCategoryName = $subCategoryData->language->{$system_default_lang}->name ?? '';
                                @endphp
                                <option  value="{{ $subCategory->id }}" {{ request()->sub_category_id == $subCategory->id ? 'selected' : '' }}>
                                    {{ $subCategoryName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="filter-group">
                        <label for="area_id">{{ __('Area') }}</label>

                   
                        <select name="area_id" id="area_id" class="form--control select2-basic">
                            <option value="">{{ __('All Areas') }}</option>
                            @foreach($areas as $area)
                                @php
                                  
                                    $areaName = $area->name ?? '';
                                  
                                @endphp
                                <option value="{{ $area->id }}" {{ request()->area_id == $area->id ? 'selected' : '' }}>
                                    {{ $areaName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="filter-group">
                        <label for="sort_by">Sort By</label>
                        <select name="sort_by" id="sort_by" class="form--control select2-basic">
                            <option value="">Default</option>
                            <option value="quantity_asc" {{ request()->sort_by == 'quantity_asc' ? 'selected' : '' }}>Quantity (Low to High)</option>
                            <option value="quantity_desc" {{ request()->sort_by == 'quantity_desc' ? 'selected' : '' }}>Quantity (High to Low)</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-1 col-md-6 d-flex align-items-end">
                    <button type="submit" class="btn btn--base w-100">
                        <i class="las la-filter"></i> {{ __('Filter') }}
                    </button>
                </div>
            </div>
        </form>
    </div>


    <div class="table-area pt-5">
        <div class="table-wrapper">
            <div class="table-header">
                <h5 class="title">{{ __($page_title) }}</h5>
                <div class="table-btn-area">

                    @include('admin.components.link.add-default',[
                        'text'          => __("Add Product"),
                        'href'          =>  route('admin.product.create'),
                        'class'         => "",
                        'permission'    => "admin.sub.category.store",
                    ])
                </div>
            </div>
            <div class="table-responsive">
                @include('admin.components.data-table.product-table',[
                    'data'=> $product
                    ])
            </div>
        </div>
        {{ get_paginate($product) }}
    </div>




@endsection

@push('script')
    <script>
        var default_language = "{{ $default_lang_code }}";
        var system_default_language = "{{ $system_default_lang }}";
        var languages = "{{ $languages_for_js_use }}";
        languages = JSON.parse(languages.replace(/&quot;/g,'"'));
        $(".delete-modal-button").click(function(){
            var oldData = JSON.parse($(this).parents("tr").attr("data-item"));
            var actionRoute =  "{{ setRoute('admin.product.delete') }}";
            var target      = oldData.id;
            var message     = `{{ __("Are you sure to delete") }} <strong>${oldData.id}</strong> {{ __("Product?") }}`;
            openDeleteModal(actionRoute,target,message);
        });
    </script>

@endpush
