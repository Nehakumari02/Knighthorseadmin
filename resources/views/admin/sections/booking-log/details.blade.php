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
        'active' => __('Booking Details'),
    ])
@endsection

@section('content')
    <div class="booking-details-log">
        <div class="row mb-30-none">


            <div class="col-lg-12 mb-30">
                <div class="transaction-area">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="title mb-0"><i
                                class="fas fa-info-circle text--base me-2"></i>{{ __('Additional Information') }}</h4>
                    </div>
                    <div class="content pt-0">
                        <div class="list-wrapper">
                            <ul class="list">
                                <li>{{ __('Order ID') }} <span>{{ $data->order_id }}</span> </li>
                                <li>{{ __('Transaction ID') }} <span>{{ $data->trx_id }}</span> </li>
                                <li>{{ __('Created At') }} <span>{{ $data->created_at }}</span> </li>
                                <li>{{ __('Updated At') }} <span>{{ $data->updated_at }}</span> </li>
                                <li>{{ __('Status') }} <span
                                        class="{{ $data->stringStatus->class }}">{{ __($data->stringStatus->value) }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mb-30">
                <div class="transaction-area">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="title mb-0"><i class="fas fa-user text--base me-2"></i>{{ __('Payment Information') }}
                        </h4>
                    </div>
                    <div class="content pt-0">
                        <div class="list-wrapper">
                            <ul class="list">
                              
                                <li>{{ __('Booking Number') }} <span>{{ $data->trx_id }}</span> </li>
                                <li>{{ __('Payment Method') }} <span>{{ $data->payment_method }}</span> </li>
                                <li>{{ __('Product Price') }}
                                    <span>{{ get_default_currency_symbol() }}{{ get_amount($data->price) }}</span>
                                </li>
                                <li>{{ __('Fees & Charges') }}
                                    <span>{{ get_default_currency_symbol() }}{{ get_amount($data->total_charge) }}</span>
                                </li>
                                <li>{{ __('Total Payable Price') }}
                                    <span>{{ get_default_currency_symbol() }}{{ get_amount($data->payable_price) }}</span>
                                </li>
                                <li>{{ __('Payment Currency') }} <span>{{ $data->payment_currency ?? 'N/A' }}</span> </li>
                                <li>{{ __('Payment Status') }}
                                    <span>{{ $data->status == 1 ? 'Completed' : 'Pending' }}</span>
                                </li>
                                <li>{{ __('Payment Type') }} <span>{{ ucfirst($data->type) }}</span> </li>
                                <li>{{ __('Remark') }} <span>{{ $data->remark ?? 'N/A' }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mb-30">
                <div class="transaction-area">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="title mb-0"><i class="fas fa-truck text--base me-2"></i>{{ __('Shipping Information') }}
                        </h4>
                    </div>
                    <div class="content pt-0">
                        <div class="list-wrapper">
                            <ul class="list">
                                @if ($data->shipments && $shipments)
                                    <div class="row">

                                        @foreach ($shipments as $shipment)
                                            <div class="col-md-6 mb-4">
                                                <div class="card border">
                                                    <div
                                                        class="card-header bg-light d-flex justify-content-between align-items-center">
                                                        <h5 class="mb-0">{{ __('Shipment') }} #{{ $loop->iteration }}:
                                                            {{ $shipment->shipment->name }}
                                                        </h5>
                                                        @if ($shipment->shipment_status == 0)
                                                            <span class="badge badge--warning">{{ __('booked') }}</span>
                                                        @elseif($shipment->shipment_status == 1)
                                                            <span
                                                                class="badge badge--success">{{ __('ready for shipping') }}</span>
                                                        @elseif($shipment->shipment_status == 2)
                                                            <span
                                                                class="badge badge--success">{{ __('on the way') }}</span>
                                                        @elseif($shipment->shipment_status == 3)
                                                            <span class="badge badge--success">{{ __('delivered') }}</span>
                                                        @else
                                                            <span class="badge badge--danger">{{ __('Cancelled') }}</span>
                                                        @endif

                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <p class="mb-1 text-muted">{{ __('Tracking Number') }}</p>
                                                                <p class="font-weight-bold">
                                                                    {{ $shipment->tracking_number }}
                                                                </p>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <p class="mb-1 text-muted">{{ __('Delivery Date') }}</p>
                                                                <p class="font-weight-bold">{{ $shipment->delivery_date }}
                                                                </p>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <p class="mb-1 text-muted">{{ __('Delivery Time') }}</p>
                                                                <p class="font-weight-bold">{{ $shipment->start_time }} -
                                                                    {{ $shipment->end_time }}</p>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <p class="mb-1 text-muted">{{ __('Shipping Method') }}</p>
                                                                <p class="font-weight-bold">{{ $shipment->shipment->name }}
                                                                </p>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <p class="mb-1 text-muted">{{ __('Delivery Charge') }}</p>
                                                                <p class="font-weight-bold">
                                                                    {{ number_format($shipment->shipment->delivery_charge, 2) }}
                                                                    {{ get_default_currency_symbol() }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <li>{{ __('No shipping information available') }}</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <td>
                <div style="justify-content: center">

                    @if ($data->status == 2)
                        <a href="{{ route('admin.booking.log.status.update', ['trxId' => $data->trx_id, 'status' => 1]) }}"
                            class="btn btn-success">
                            {{ __('Accept') }}
                        </a>
                        <a href="{{ route('admin.booking.log.status.update', ['trxId' => $data->trx_id, 'status' => 4]) }}"
                            class="btn btn-danger">
                            {{ __('Reject') }}
                        </a>
                    @endif
                </div>
            </td>
        </div>
    </div>
@endsection
@push('script')
@endpush
