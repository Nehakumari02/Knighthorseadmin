@extends('admin.layouts.master')

@push('css')
    <style>
        .fileholder {
            min-height: 200px !important;
        }

        .fileholder-files-view-wrp.accept-single-file .fileholder-single-file-view,
        .fileholder-files-view-wrp.fileholder-perview-single .fileholder-single-file-view {
            height: 156px !important;
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
        'active' => __('Provider Edit'),
    ])
@endsection

@section('content')

    <form action="{{ setRoute('admin.setup.sms.providers.update', $provider->uuid) }}" method="POST"
        enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="uuid", value="{{ $provider->uuid }}">

        <div class="custom-card credentials">
            <div class="card-header">
                <h6 class="title">{{ __('Update Provider') }} : {{ $provider->name }}</h6>
            </div>

            <div class="card-body">
                <div class="row mb-10-none">
                    <div class="col-xl-3 col-lg-3 form-group">
                        @include('admin.components.form.input-file', [
                            'label' => __('Gateway Image'),
                            'label_after' => '*',
                            'name' => 'image',
                            'class' => 'file-holder',
                            'old_files' => $provider->image,
                            'old_files_path' => files_asset_path('api-providers'),
                        ])
                    </div>

                    <div class="col-xl-6 col-lg-6">

                        @isset($provider)
                            <div class="gateway-content">
                                <h3 class="title">{{ $provider->title }}</h3>
                                <p>{{ __('Global Setting for') }} {{ $provider->name }} {{ __('in bellow') }}</p>
                            </div>
                            @foreach ($provider->credentials as $item)
                                <div class="form-group">
                                    <label>{{ __($item->label) }}</label>
                                    <input type="text" class="form--control" placeholder="{{ $item->placeholder }}"
                                        name="{{ $item->name }}" value="{{ $item->value }}">
                                </div>
                            @endforeach
                        @endisset

                        <div class="col-xl-2 col-lg-2 form-group">
                            <!-- Open Modal For Test code Send -->
                            @include('admin.components.link.custom', [
                                'class' => 'btn--base modal-btn w-100',
                                'href' => '#test-sms',
                                'text' => 'Send Test Code',
                                'permission' => 'admin.setup.sms.providers.test.code.send',
                            ])
                        </div>



                        <div class="d-block d-md-flex align-items-center justify-content-between">
                            {{-- Production/Sandbox Switcher --}}
                            <div class="col-12 col-md-6 form-group">
                                @include('admin.components.form.switcher', [
                                    'label' => __('Environment'),
                                    'value' => old('mode', $provider->env),
                                    'name' => 'mode',
                                    'options' => [
                                        __('Production') => payment_gateway_const()::ENV_PRODUCTION,
                                        __('Sandbox') => payment_gateway_const()::ENV_SANDBOX,
                                    ],
                                ])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="custom-card mt-15">
            <div class="card-body">
                <div class="row mb-10-none">
                    <div class="col-xl-12 col-lg-12 form-group">
                        @include('admin.components.button.form-btn', [
                            'class' => 'w-100 btn-loading',
                            'text' => __('Update'),
                            'permission' => 'admin.setup.sms.providers.update',
                        ])
                    </div>
                </div>
            </div>
        </div>

    </form>

    {{-- Test mail send modal --}}
    <div id="test-sms" class="mfp-hide medium">
        <div class="modal-data">
            <div class="modal-header px-0">
                <h5 class="modal-title">{{ __('Send Test Sms') }}</h5>
            </div>
            <div class="modal-form-data">
                <form class="modal-form" method="POST" action="{{ setRoute('admin.setup.sms.providers.test.code.send') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-10-none mt-3">
                        <div class="col-lg-12 form-group">
                            <div class="input-group">
                                <select class="input-group-text copytext nice-select" name="otp_country">
                                    @foreach (get_all_countries_array() as $item)
                                        <option value="{{ get_country_phone_code($item['name']) }}">
                                            {{ $item['name'] }} ({{ $item['mobile_code'] }})</option>
                                    @endforeach
                                </select>
                                <input type="number" class="form--control" name="number" placeholder="Enter Number"
                                    id="phone-number">
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group d-flex align-items-center justify-content-between mt-4">
                            <button type="button" class="btn btn--danger modal-close">{{ __('Cancel') }}</button>
                            <button type="submit" class="btn btn--base">{{ __('send') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
