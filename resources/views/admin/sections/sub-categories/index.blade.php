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
    ], 'active' => __("Sub Category")])
@endsection

@section('content')

    <div class="table-area">
        <div class="table-wrapper">
            <div class="table-header">
                <h5 class="title">{{ __($page_title) }}</h5>
                <div class="table-btn-area">

                    @include('admin.components.link.add-default',[
                        'text'          => __("Add Sub Category"),
                        'href'          =>  route('admin.product.sub.categories.create'),
                        'class'         => "",
                        'permission'    => "admin.sub.category.store",
                    ])
                </div>
            </div>
            <div class="table-responsive">
                @include('admin.components.data-table.sub-categories-table',[
                    'data'=> $sub_category
                    ])
            </div>
        </div>
        {{ get_paginate($sub_category) }}
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
            var actionRoute =  "{{ setRoute('admin.product.sub.categories.delete') }}";
            var target      = oldData.id;
            var message     = `{{ __("Are you sure to delete") }} <strong>${oldData.id}</strong> {{ __("Sub Category?") }}`;
            openDeleteModal(actionRoute,target,message);
        });
    </script>

@endpush
