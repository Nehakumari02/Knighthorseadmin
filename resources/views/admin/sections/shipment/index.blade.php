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
        'active' => __('Setup delivery'),
    ])
@endsection

@section('content')
    <div class="table-area">
        <div class="table-wrapper">
            <div class="table-header">
                <h5 class="title">{{ __($page_title) }}</h5>
                <div class="table-btn-area">
                     @include('admin.components.link.add-default',[
                        'text'          => __("Add Shipment"),
                        'href'          =>  route('admin.shipment.create'),
                        'class'         => "",
                    ])
                </div>
            </div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Delivery Delay Days') }}</th>
                            <th>{{ __('Delivery Charge') }}</th>
                            <th>{{ __('Start Time') }}</th>
                            <th>{{ __('End Time') }}</th>
                            <th>{{ __('Time Gap') }}</th>
                            <th>{{ __('Default') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($shipment ?? [] as $key => $item)
                            <tr data-item="{{ $item }}">
                                <td>{{ $item->name ?? '' }}</td>
                                <td>{{ $item->delivery_delay_days ?? '' }}</td>
                                <td>{{ $item->delivery_charge ?? '' }}</td>
                                <td>{{ $item->star_time ?? '' }}</td>
                                <td>{{ $item->end_time ?? '' }}</td>
                                <td>{{ $item->time_range ?? '' }}</td>
                                <td>
                                       <span class="summary-value">
                                            @switch($item->default)
                                                @case(1)
                                                    Default
                                                @break

                                                @default
                                                    Regular
                                            @endswitch
                                        </span>
                                </td>
                                <td>
                                    <button class="btn btn--base btn--danger delete-modal-button"><i
                                            class="las la-trash-alt"></i></button>
                                </td>
                            </tr>
                        @empty
                            @include('admin.components.alerts.empty', ['colspan' => 12])
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        {{ get_paginate($shipment) }}
    </div>
   
@endsection

@push('script')
    <script>
        

        $(".delete-modal-button").click(function() {
            var oldData = JSON.parse($(this).parents("tr").attr("data-item"));
            var actionRoute = "{{ setRoute('admin.shipment.delete') }}";
            var target = oldData.id;
            var message =
                `{{ __('Are you sure to') }} <strong>{{ __('delete') }}</strong> {{ __('this Shipment?') }}`;

            openDeleteModal(actionRoute, target, message);

        });

      
    </script>
@endpush
