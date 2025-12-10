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
            [
                'name' => __('Shipments'),
                'url' => setRoute('admin.shipment.log.delivered'),
            ],
        ],
        'active' => __('Shipment Details'),
    ])
@endsection

@section('content')
    <div class="booking-details-log">
        <div class="row mb-30-none">
            <!-- Order Information -->
            <div class="col-lg-6 mb-30">
                <div class="transaction-area">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="title mb-0"><i
                                class="fas fa-shopping-cart text--base me-2"></i>{{ __('Order Information') }}</h4>
                    </div>
                    <div class="content pt-0">
                        <div class="list-wrapper">
                            <ul class="list">
                                <li>{{ __('Order ID') }} <span>{{ $data->product_order->order_id ?? 'N/A' }}</span></li>
                                <li>{{ __('Transaction ID') }} <span>{{ $data->product_order->trx_id ?? 'N/A' }}</span></li>
                                <li>{{ __('Total Amount') }}
                                    <span>{{ get_default_currency_symbol() }}{{ get_amount($data->product_order->payable_price ?? 0) }}</span>
                                </li>
                                <li>{{ __('Order Status') }}
                                    <span
                                        class="badge badge--{{ $data->product_order->status == 1 ? 'success' : 'warning' }}">
                                        {{ $data->product_order->status == 1 ? 'Completed' : 'Pending' }}
                                    </span>
                                </li>
                                <li>{{ __('Order Date') }} <span>{{ $data->product_order->created_at ?? 'N/A' }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shipment Information -->
            <div class="col-lg-6 mb-30">
                <div class="transaction-area">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="title mb-0"><i class="fas fa-truck text--base me-2"></i>{{ __('Shipment Information') }}
                        </h4>
                    </div>
                    <div class="content pt-0">
                        <div class="list-wrapper">
                            <ul class="list">
                                <li>{{ __('Tracking Number') }} <span>{{ $data->tracking_number ?? 'N/A' }}</span></li>
                                <li>{{ __('Shipment Method') }} <span>{{ $data->shipment->name ?? 'N/A' }}</span></li>
                                <li>{{ __('Delivery Date') }} <span>{{ $data->delivery_date ?? 'N/A' }}
                                        days</span></li>
                                <li>{{ __('Delivery Charge') }}
                                    <span>{{ get_default_currency_symbol() }}{{ get_amount($data->shipment->delivery_charge ?? 0) }}</span>
                                </li>
                                <li>{{ __('Delivery Time Window') }}
                                    <span>{{ $data->start_time ?? 'N/A' }} - {{ $data->end_time ?? 'N/A' }}</span>
                                </li>
                                <li>{{ __('Status') }}
                                    @if ($data->shipment_status == 0)
                                        <span class="badge badge--warning">{{ __('booked') }}</span>
                                    @elseif($data->shipment_status == 1)
                                        <span class="badge badge--success">{{ __('ready for shipping') }}</span>
                                    @elseif($data->shipment_status == 2)
                                        <span class="badge badge--success">{{ __('on the way') }}</span>
                                    @elseif($data->shipment_status == 3)
                                        <span class="badge badge--success">{{ __('delivered') }}</span>
                                    @else
                                        <span class="badge badge--danger">{{ __('Cancelled') }}</span>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Customer Information -->
            <div class="col-lg-6 mb-30">
                <div class="transaction-area">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="title mb-0"><i class="fas fa-user text--base me-2"></i>{{ __('Customer Information') }}
                        </h4>
                    </div>
                    <div class="content pt-0">
                        <div class="list-wrapper">
                            <ul class="list">
                                @php
                                    $bookingData = $data->product_order->booking_data->data ?? (object) [];
                                    $deliveryInfo = $bookingData->delivery_info ?? (object) [];

                                @endphp
                                <li>{{ __('Name') }} <span>{{ $data->product_order->user->username ?? 'N/A' }}</span>
                                </li>
                                <li>{{ __('Email') }} <span>{{ $deliveryInfo->email ?? 'N/A' }}</span></li>
                                <li>{{ __('Phone') }} <span>{{ $deliveryInfo->phone ?? 'N/A' }}</span></li>
                                <li>{{ __('Delivery Notes') }} <span>{{ $deliveryInfo->notes ?? 'N/A' }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            {{-- <div class="col-lg-6 mb-30">
                <div class="transaction-area">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="title mb-0"><i class="fas fa-boxes text--base me-2"></i>{{ __('Order Items') }}</h4>
                    </div>
                    <div class="content pt-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('Product') }}</th>
                                        <th>{{ __('Price') }}</th>
                                        <th>{{ __('Qty') }}</th>
                                        <th>{{ __('Total') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $bookingData = $data->product_order->booking_data ?? (object) [];
                                        $cartItems = $bookingData->data->user_cart->data ?? [];
                                    @endphp

                                    @forelse($cartItems as $item)
                                        @php
                                            $item = (object) $item; // Convert array to object if needed
                                        @endphp
                                        <tr>
                                            <td>{{ $item->name ?? 'N/A' }}</td>
                                            <td>{{ get_default_currency_symbol() }}{{ get_amount($item->price ?? 0) }}
                                            </td>
                                            <td>{{ $item->quantity ?? 0 }}</td>
                                            <td>{{ get_default_currency_symbol() }}{{ get_amount(($item->price ?? 0) * ($item->quantity ?? 0)) }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">{{ __('No items found') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}


            <!-- Action Buttons -->
            <div class="col-lg-12 mb-30">
                <div class="transaction-area text-end">
                    @if ($data->product_order->status === payment_gateway_const()::STATUS_SUCCESS)
                      

                            @if ($data->shipment_status === global_const()::BOOKED)
                                <a href="{{ route('admin.shipment.log.status.update', ['id' => $data->id, 'status' => 1]) }}"
                                    class="btn btn-success">
                                    {{ __('Ready To Ship') }}
                                </a>
                            @elseif($data->shipment_status === global_const()::READY_FOR_SHIPPING)
                                <a href="{{ route('admin.shipment.log.status.update', ['id' => $data->id, 'status' => 2]) }}"
                                    class="btn btn-success">
                                    {{ __('On The Way') }}
                                </a>
                            @elseif($data->shipment_status === global_const()::ON_THE_WAY)
                                <a href="{{ route('admin.shipment.log.status.update', ['id' => $data->id, 'status' => 3]) }}"
                                    class="btn btn-success">
                                    {{ __('Delivered') }}
                                </a>
                                @elseif($data->shipment_status === global_const()::DELIVERED)
                                <button href=""
                                    class="btn btn-success">
                                    {{ __('Delivered Successful') }}
                                </button>
                            @endif
                       
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
    </script>
@endpush
