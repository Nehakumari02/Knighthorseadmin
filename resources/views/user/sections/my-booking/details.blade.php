@extends('frontend.layouts.master')

@section('breadcrumb')
    @include('user.components.breadcrumb', [
        'breadcrumbs' => [
            [
                'name' => __('Profile'),
                'url' => setRoute('user.profile.index'),
            ],
        ],
        'active' => __('My History'),
    ])
@endsection

@section('content')
    @php
        $bookingData = $transactions->booking_data->data;
        $products = $bookingData->user_cart->data ?? [];
    
        $deliveryInfo = $bookingData->delivery_info ?? new stdClass();
        $userCart = $bookingData->user_cart ?? new stdClass();
        $shipments = $shipment;
    @endphp

    <div class="order-details-container">
        <div class="table-area mt-4 mb-4">
            <div class="table-wrapper">
                <h3 class="mb-4">{{ __('Order Details') }}</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>{{ __('Product Image') }}</th>
                                <th>{{ __('Product Name') }}</th>
                                <th>{{ __('Price') }}</th>
                                <th>{{ __('Quantity') }}</th>
                                <th>{{ __('Shipment Type') }}</th>
                                <th>{{ __('Total') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $index => $product)
                        
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <div class="product-img">
                                            <img src="{{ get_image($product->image, 'site-section' ?? '') }}"
                                                alt="{{ $product->name }}" style="max-width: 80px;" class="img-fluid">
                                        </div>
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ number_format($product->price, 2) }} {{ get_default_currency_symbol() }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>
                                        @php
                                            $shipment = App\Models\Admin\Shipment::where('id',$product->shipment_type)->first();
                                        @endphp
                                      {{ $shipment->name }}
                                    </td>
                                    <td>{{ number_format($product->price * $product->quantity, 2) }}
                                        {{ get_default_currency_symbol() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Shipment Details Section -->
                <h3 class="mt-5 mb-4">{{ __('Shipment Details') }}</h3>
                <div class="row">
                    @foreach ($shipments as $shipment)
                        <div class="col-md-6 mb-4">
                            <div class="card border">
                                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">{{ __('Shipment') }} #{{ $loop->iteration }}: {{ $shipment->shipment->name }}
                                    </h5>
                                     @if ($shipment->shipment_status == 0)
                                        <span class="badge badge--warning">{{ __('booked') }}</span>
                                    @elseif($shipment->shipment_status == 1)
                                        <span class="badge badge--success">{{ __('ready for shipping') }}</span>
                                    @elseif($shipment->shipment_status == 2)
                                        <span class="badge badge--success">{{ __('on the way') }}</span>
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
                                            <p class="font-weight-bold">{{ $shipment->tracking_number }}</p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <p class="mb-1 text-muted">{{ __('Delivery Date') }}</p>
                                            <p class="font-weight-bold">{{ $shipment->delivery_date }}</p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <p class="mb-1 text-muted">{{ __('Delivery Time') }}</p>
                                            <p class="font-weight-bold">{{ $shipment->start_time }} -
                                                {{ $shipment->end_time }}</p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <p class="mb-1 text-muted">{{ __('Shipping Method') }}</p>
                                            <p class="font-weight-bold">{{ $shipment->shipment->name }}</p>
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

                <!-- Delivery Information -->
                <div class="mt-5">
                    <h3 class="mb-4">{{ __('Delivery Information') }}</h3>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">{{ __('Phone') }}</label>
                            <input type="text" class="form-control" value="{{ $deliveryInfo->phone ?? '' }}" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">{{ __('Email') }}</label>
                            <input type="text" class="form-control" value="{{ $deliveryInfo->email ?? '' }}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">{{ __('Address') }}</label>
                            <textarea class="form-control" rows="3" readonly>{{ $deliveryInfo->address ?? '' }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">{{ __('Order notes') }}</label>
                            <textarea class="form-control" rows="3" readonly>{{ $deliveryInfo->notes ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Billing Summary -->
                <div class="row mt-5">
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">{{ __('Billing Summary') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">{{ __('Subtotal') }}:</span>
                                    <span class="font-weight-bold">{{ number_format($userCart->sub_total ?? 0, 2) }}
                                        {{ get_default_currency_symbol() }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">{{ __('Delivery Charge') }}:</span>
                                    <span class="font-weight-bold">{{ number_format($deliveryInfo->delivery_charge, 2) }}
                                        {{ get_default_currency_symbol() }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">{{ __('Reusable Bag') }}:</span>
                                    <span class="font-weight-bold">{{ number_format($deliveryInfo->reusable_bag, 2) }}
                                        {{ get_default_currency_symbol() }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">{{ __('Payment gateway Charge') }}:</span>
                                    <span class="font-weight-bold">{{ number_format($transactions->total_charge, 2) }}
                                        {{ get_default_currency_symbol() }}</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <span class="font-weight-bold">{{ __('Total Amount') }}:</span>
                                    <span class="font-weight-bold">{{ number_format($transactions->payable_price, 2) }}
                                        {{ get_default_currency_symbol() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Information -->
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">{{ __('Payment Information') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="payment-checkout">
                                    <div class="radio-wrapper">
                                        <div class="radio-item">
                                            <input type="radio" class="field-radio-btn" name="radio-group" id="cash"
                                                {{ $transactions->payment_method === 'cash' ? 'checked' : '' }} disabled>
                                            <label for="cash">{{ __('Cash on delivery') }}</label>
                                        </div>
                                    </div>
                                    <div class="radio-wrapper">
                                        <div class="radio-item">
                                            <input type="radio" class="field-radio-btn" name="radio-group" id="wallet"
                                                {{ $transactions->payment_method === 'wallet' ? 'checked' : '' }} disabled>
                                            <label for="wallet">{{ __('Wallet Payment') }}</label>
                                        </div>
                                    </div>
                                    <div class="radio-wrapper">
                                        <div class="radio-item">
                                            <input type="radio" class="field-radio-btn" name="radio-group"
                                                id="online"
                                                {{ $transactions->type === 'online' ? 'checked' : '' }} disabled>
                                            <label for="online">{{ __('Online Payment') }}</label>
                                        </div>
                                         </div>

                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-muted">{{ __('Transaction ID') }}:</span>
                                            <span class="font-weight-bold">{{ $transactions->trx_id }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-muted">{{ __('Order Status') }}:</span>
                                            <span class="font-weight-bold">
                                                @switch($transactions->status)
                                                    @case(1)
                                                        {{ __('Success') }}
                                                    @break

                                                    @case(2)
                                                        {{ __('Pending') }}
                                                    @break

                                                    @case(3)
                                                        {{ __('Rejected') }}
                                                    @break

                                                    @default
                                                        {{ __('Unknown') }}
                                                @endswitch
                                            </span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span class="text-muted">{{ __('Order Date') }}:</span>
                                            <span
                                                class="font-weight-bold">{{ $transactions->created_at->format('M d, Y h:i A') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
