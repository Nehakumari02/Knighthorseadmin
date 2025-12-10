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
        'active' => __('Shipment Logs'),
    ])
@endsection

@section('content')
    <div class="table-area">
        <div class="table-wrapper">
            <div class="table-header">
                <h5 class="title">{{ $page_title }}</h5>
            </div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>{{ __('SL') }}</th>
                            <th>{{ __('Order ID') }}</th>
                            <th>{{ __('Shipment Method') }}</th>
                            <th>{{ __('Tracking Number') }}</th>
                            <th>{{ __('Delivery Date') }}</th>
                            <th>{{ __('Time Slot') }}</th>
                            <th>{{ __('Status') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $key => $item)
                            <tr>
                                <td>{{ $key + $transactions->firstItem() }}</td>
                                <td>{{ $item->product_order->trx_id ?? 'N/A' }}</td>
                                <td>{{ $item->shipment->name ?? 'N/A' }}</td>
                                <td>{{ $item->tracking_number }}</td>
                                <td>
                                    {{ date('Y-m-d', strtotime($item->delivery_date)) }}
                                </td>
                                <td>{{ $item->start_time }} - {{ $item->end_time }}</td>
                                <td>
                                    @if ($item->shipment_status == 0)
                                        <span class="badge badge--warning">{{ __('booked') }}</span>
                                    @elseif($item->shipment_status == 1)
                                        <span class="badge badge--success">{{ __('ready for shipping') }}</span>
                                    @elseif($item->shipment_status == 2)
                                        <span class="badge badge--success">{{ __('on the way') }}</span>
                                    @elseif($item->shipment_status == 3)
                                        <span class="badge badge--success">{{ __('delivered') }}</span>
                                    @else
                                        <span class="badge badge--danger">{{ __('Cancelled') }}</span>
                                    @endif
                                </td>
                                    <td>
                                    <a href="{{ setRoute('admin.shipment.log.details', $item->id) }}"
                                        class="btn btn--base btn--primary"><i class="las la-info-circle"></i></a>

                                </td>
                           
                            </tr>
                        @empty
                            @include('admin.components.alerts.empty', ['colspan' => 8])
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ get_paginate($transactions) }}
        </div>
    </div>
@endsection

@push('script')
@endpush
