@extends('admin.layouts.master')
@php

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
        'active' => __('Add Shipment'),
    ])
@endsection

@section('content')
    <div id="sub-categories-add" class="table-area">
        <div class="modal-data">
            <div class="modal-header px-0">
                <h5 class="modal-title">{{ __('Add Shipment') }}</h5>
            </div>
            <div class="modal-form-data">
                <form class="modal-form" method="POST" action="{{ setRoute('admin.shipment.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-10-none">


                        <div class="col-xl-12 col-lg-12 form-group">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 form-group">
                                    @include('admin.components.form.input', [
                                        'label' => __('Name') . '*',
                                        'name' => 'name',
                                        'placeholder' => __('Write Here') . '...',
                                    ])
                                </div>
                                <div class="col-xl-4 col-lg-4 form-group">
                                    @include('admin.components.form.input', [
                                        'label' => __('Delivery Delays Days'),
                                        'name' => 'delivery_delay_days',
                                        'placeholder' => __('Write Here') . '...',
                                        'type' => 'number',
                                    ])
                                </div>
                                <div class="col-xl-4 col-lg-4 form-group">
                                    @include('admin.components.form.input', [
                                        'label' => __('Delivery Charge'),
                                        'name' => 'delivery_charge',
                                        'placeholder' => __('Write Here') . '...',
                                        'type' => 'number',
                                    ])
                                </div>
                                <div class="col-xl-4 col-lg-4 form-group">
                                    @include('admin.components.form.input', [
                                        'label' => __('Start Time') . '*',
                                        'name' => 'star_time',
                                        'type' => 'time',
                                        'placeholder' => __('Write Here') . '...',
                                    ])
                                </div>
                                <div class="col-xl-4 col-lg-4 form-group">
                                    @include('admin.components.form.input', [
                                        'label' => __('End Time') . '*',
                                        'name' => 'end_time',
                                        'type' => 'time',
                                        'placeholder' => __('Write Here') . '...',
                                    ])
                                </div>
                                <div class="col-xl-4 col-lg-4 form-group">


                                    <label for="">{{ __('Time Range') }}*</label>
                                    <div class="input-group">
                                        <input type="number" class="form--control" name="time_range">

                                        <span class="input-group-text">{{ __('Hour') }}</span>
                                    </div>

                                </div>
                                <div class="col-xl-12 col-lg-12 col-sm-6 mb-20 pt-2">
                                    <div class="mark-favour d-flex">
                                        <input type="checkbox" id="sports" name="default" value="1">
                                        <label class="ps-2" for="sports">{{ __('Mark as Default') }}</label>
                                    </div>

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
@endpush
