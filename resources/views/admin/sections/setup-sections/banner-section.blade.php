@php
    $default_lang_code = language_const()::NOT_REMOVABLE;
    $system_default_lang = get_default_language_code();
    $languages_for_js_use = $languages->toJson();
@endphp
@extends('admin.layouts.master')

@push('css')
    <style>
        .fileholder {
            min-height: 374px !important;
        }

        .fileholder-files-view-wrp.accept-single-file .fileholder-single-file-view,
        .fileholder-files-view-wrp.fileholder-perview-single .fileholder-single-file-view {
            height: 330px !important;
        }
    </style>
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
        'active' => __('Setup Section'),
    ])
@endsection

@section('content')
    <div class="custom-card">
        <div class="card-header">
            <h6 class="title">{{ __($page_title) }}</h6>
        </div>
        <div class="card-body">
            {{-- banner item started --}}
            <div class="table-area mt-15">
                <div class="table-wrapper">
                    <div class="table-header justify-content-end">
                        <div class="table-btn-area">
                            <a href="#banner-add" class="btn--base modal-btn"><i class="fas fa-plus me-1"></i>
                                {{ __('Add Item') }}</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th>image</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data->value->items ?? [] as $key => $item)
                                    <tr data-item="{{ json_encode($item) }}">
                                        <td><span class="">
                                                <ul class="user-list">
                                                    <li>
                                                        <img src="{{ get_image($item->image ?? '','site-section') }}">
                                                </ul>
                                        </td>
                                        <td>
                                            <button class="btn btn--base edit-modal-button"><i
                                                    class="las la-pencil-alt"></i></button>
                                            <button class="btn btn--base btn--danger delete-modal-button"><i
                                                    class="las la-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    @include('admin.components.alerts.empty', ['colspan' => 4])
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @include('admin.components.modals.site-section.banner-section.add')

            @include('admin.components.modals.site-section.banner-section.edit')
        </div>
    </div>
@endsection

@push('script')
    <script>
        openModalWhenError("banner-add", "#banner-add");
        openModalWhenError("banner-edit", "#banner-edit");


        $(".edit-modal-button").click(function() {
            var oldData = JSON.parse($(this).parents("tr").attr("data-item"));
            var editModal = $("#banner-edit");

            editModal.find("form").first().find("input[name=target]").val(oldData.id);
            editModal.find("input[name=old_image]").val(oldData.image);
            editModal.find("input[name=image_edit]").attr("data-preview-name", oldData.image);

            fileHolderPreviewReInit("#banner-edit input[name=image_edit]");
            openModalBySelector("#banner-edit");

        });

        $(".delete-modal-button").click(function() {
            var oldData = JSON.parse($(this).parents("tr").attr("data-item"));

            var actionRoute = "{{ setRoute('admin.setup.sections.section.item.delete', $slug) }}";
            var target = oldData.id;
            var message = `Are you sure to <strong>delete</strong> item?`;

            openDeleteModal(actionRoute, target, message);
        });
    </script>
@endpush
