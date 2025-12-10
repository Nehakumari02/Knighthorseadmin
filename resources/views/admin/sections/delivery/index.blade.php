@extends('admin.layouts.master')

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
        'active' => __('Delivery Settings'),
    ])
@endsection

@section('content')
    <div class="custom-card">
        <div class="card-header">
            <h6 class="title">{{ __('Delivery Settings') }}</h6>
        </div>
        <div class="card-body pb-5">
            <form class="card-form" method="POST" action="{{ setRoute('admin.delivery.update') }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xl-3 col-lg-3 form-group">
                        <label>{{ __('Reusable Bag') }}*</label>
                        <div class="input-group">
                            <input type="number" class="form--control" value="{{ $delivery->bag_price ?? '' }}"
                                name="bag_price">
                            <span class="input-group-text">{{ __('USD') }}</span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 form-group">
                        <label>{{ __('Free Delivery') }}*</label>
                        <div class="input-group">
                            <input type="number" class="form--control" value="{{ $delivery->amount_spend ?? '' }}"
                                name="amount_spend">
                            <span class="input-group-text">{{ __('Minimum USD') }}</span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 form-group">
                        <label>{{ __('Delivery Count') }}*</label>
                        <div class="input-group">
                            <input type="number" class="form--control" value="{{ $delivery->delivery_count ?? '' }}"
                                name="delivery_count">
                    
                        </div>
                    </div>

                </div>
                <div class="col-xl-12 col-lg-12">
                    @include('admin.components.button.form-btn', [
                        'class' => 'w-100 btn-loading',
                        'text' => __('Update'),
                        'permission' => 'admin.delivery.update',
                    ])
                </div>
            </form>
        </div>
    </div>

    <div class="custom-card mt-15">
        <div class="card-header">
            <h6 class="title">{{ __('Activation Settings') }}</h6>
        </div>
        <div class="card-body">
            <div class="custom-inner-card mt-10 mb-10">
                <div class="card-inner-body">
                    <div class="row mb-10-none">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 form-group">
                            @include('admin.components.form.switcher', [
                                'label' => __('Reusable Bag'),
                                'name' => 'bag_status',
                                'value' => old('bag_status', $delivery->bag_status),
                                'options' => [__('Activated') => 1, __('Deactivated') => 0],
                                'onload' => true,
                              
                            ])
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 form-group">
                            @include('admin.components.form.switcher', [
                                'label' => __('Free Delivery'),
                                'name' => 'free_delivery_status',
                                'value' => old('free_delivery_status', $delivery->free_delivery_status),
                                'options' => [__('Activated') => 1, __('Deactivated') => 0],
                                'onload' => true,
                            ])
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            

            switcherAjax("{{ setRoute('admin.delivery.activation.update') }}");
        });
    </script>
@endpush
