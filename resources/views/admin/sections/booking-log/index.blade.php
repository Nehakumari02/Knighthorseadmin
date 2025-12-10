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
        'active' => __('Order Logs'),
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
                            <th>{{ __('TRX ID') }}</th>
                            <th>{{ __('Full Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Phone') }}</th>
                            <th>{{ __('Amount') }}</th>
                            <th>{{ __('Gateway') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Time') }}</th>
                            <th>{{ __('Shipment') }}</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions  as $key => $item)
                            <tr>
                                <td>{{ $item->trx_id }}</td>
                                <td>{{ $item->user->fullname ?? 'N/A' }}</td>
                                <td>{{ $item->user->email ?? "N/A"}}</td>
                                <td>{{ $item->user->mobile ?? 'N/A' }}</td>
                                <td>{{ get_amount($item->payable_price) }}</td>
                                <td><span class="text--info">{{ $item->gateway_currency->name ?? $item->type }}</span></td>
                                <td>
                                    <span
                                        class="{{ $item->stringStatus->class }}">{{ __($item->stringStatus->value) }}</span>
                                </td>
                                <td>{{ $item->created_at->format('d-m-y h:i:s A') }}</td>


                                <td>
                                    <a href="{{ setRoute('admin.booking.log.details', $item->trx_id) }}"
                                        class="btn btn--base btn--primary"><i class="las la-info-circle"></i></a>

                                </td>

                            </tr>
                        @empty
                            @include('admin.components.alerts.empty', ['colspan' => 11])
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
