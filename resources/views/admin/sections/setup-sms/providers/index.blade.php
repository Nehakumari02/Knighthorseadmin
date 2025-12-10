@extends('admin.layouts.master')

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
    ], 'active' => __("Providers")])
@endsection

@section('content')

    <div class="table-area">
        <div class="table-wrapper">
            <div class="table-header">
                <h5 class="title">{{ __("SMS Providers") }}</h5>

                @env('local')
                    <div class="table-btn-area">
                        @include('admin.components.link.add-default',[
                            'href'          => "#provider-add",
                            'class'         => "modal-btn",
                            'text'          => __("Add New"),
                            'permission'    => "admin.setup.sms.providers.store",
                        ])
                    </div>
                @endenv

            </div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>{{ __("Provider") }}</th>
                            <th>{{ __("Status") }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($providers ?? [] as $item)
                            <tr>
                                <td>
                                    <ul class="user-list">
                                        <li><img src="{{ get_image($item->image,'api-providers') }}" alt="image"></li>
                                    </ul>
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    @include('admin.components.form.switcher',[
                                        'name'          => 'status',
                                        'data_target'   => $item->id,
                                        'value'         => $item->status,
                                        'options'       => [__('Enable') => 1, __('Disable') => 0],
                                        'onload'        => true,
                                        'permission'    => "admin.setup.sms.providers.status.update",
                                    ])
                                </td>
                                <td>
                                    @include('admin.components.link.edit-default',[
                                        'href'          => setRoute('admin.setup.sms.providers.edit',$item->uuid),
                                        'permission'    => "admin.setup.sms.providers.edit",
                                    ])
                                </td>
                            </tr>
                        @empty
                            @include('admin.components.alerts.empty',['colspan' => 6])
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal START --}}
    @env('local')
        @if (admin_permission_by_name("admin.setup.sms.providers.store"))
            <div id="provider-add" class="mfp-hide large">
                <div class="modal-data">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __("Add SMS Provider") }}</h5>
                    </div>
                    <div class="modal-form-data">
                        <form class="modal-form" method="POST" action="{{ setRoute('admin.setup.sms.providers.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-10-none">

                                <div class="col-xl-12 col-lg-12 form-group">
                                    <label for="gatewayImage">{{ __("Provider Image") }}</label>
                                    <div class="col-12 col-sm-3 m-auto">
                                        @include('admin.components.form.input-file',[
                                            'label'         => false,
                                            'class'         => "file-holder m-auto",
                                            'name'          => "image",
                                        ])
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 form-group">
                                    @include('admin.components.form.input',[
                                        'label'         => __("Provider Name"),
                                        'label_after'   => "*",
                                        'placeholder'   => __("Write Here").'...',
                                        'name'          => "provider_name",
                                        'data_limit'    => 60,
                                        'value'         => old('provider_name'),
                                    ])
                                </div>

                                <div class="col-xl-12 col-lg-12 form-group">
                                    @include('admin.components.form.input',[
                                        'label'         => __("Provider Title"),
                                        'label_after'   => "*",
                                        'placeholder'   => __("Write Here").'...',
                                        'name'          => "provider_title",
                                        'data_limit'    => 60,
                                        'value'         => old('provider_title'),
                                    ])
                                </div>

                                <div class="col-xl-12 col-lg-12 form-group">
                                    <div class="custom-inner-card input-field-generator" data-source="add_money_automatic_gateway_credentials_field">
                                        <div class="card-inner-header">
                                            <h6 class="title">{{ __("Generate Fields") }}</h6>
                                            <button type="button" class="btn--base add-row-btn"><i class="fas fa-plus"></i> {{ __("Add") }}</button>
                                        </div>
                                        <div class="card-inner-body">
                                            <div class="results">
                                                <div class="row align-items-end">
                                                    <div class="col-xl-3 col-lg-3 form-group">
                                                        @include('admin.components.form.input',[
                                                            'label'     => __("Title"),
                                                            'label_after'   => "*",
                                                            'placeholder'   => __("Write Here").'...',
                                                            'name'      => "title[]",
                                                        ])
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 form-group">
                                                        @include('admin.components.form.input',[
                                                            'label'     => __("Name"),
                                                            'label_after'   => "*",
                                                            'placeholder'   => __("Write Here").'...',
                                                            'name'      => "name[]",
                                                        ])
                                                    </div>

                                                    <div class="col-xl-5 col-lg-5 form-group">
                                                        @include('admin.components.form.input',[
                                                            'label'     => __("Value"),
                                                            'placeholder'   => __("Write Here").'...',
                                                            'name'      => "value[]",
                                                        ])
                                                    </div>

                                                    <div class="col-xl-1 col-lg-1 form-group">
                                                        <button type="button" class="custom-btn btn--base btn--danger row-cross-btn w-100"><i class="las la-times"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 form-group d-flex align-items-center justify-content-between mt-4">
                                    <button type="button" class="btn btn--danger modal-close">{{ __("Cancel") }}</button>
                                    <button type="submit" class="btn btn--base">{{ __("Add") }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    @endenv

@endsection

@push('script')
    <script>
        openModalWhenError("provider-add","#provider-add");

        $(document).ready(function(){
            switcherAjax("{{ setRoute('admin.setup.sms.providers.status.update') }}");
        });
    </script>
@endpush
