@extends('frontend.layouts.master')
@push('css')
@endpush
@php
    $app_local = get_default_language_code() ?? 'en';
    $default = App\Constants\LanguageConst::NOT_REMOVABLE;
    $delivery_settings = App\Models\Admin\DeliverySettings::first();

    // Find the default shipment
    $defaultShipment = null;
    foreach ($grouped as $shipmentId => $products) {
        $shipment = $products->first()->shipment;
        if ($shipment->default == true) {
            $defaultShipment = $shipment;
            break;
        }
    }

    // If no default found, use the first shipment
    if (!$defaultShipment && count($grouped) > 0) {
        $defaultShipment = $grouped->first()->first()->shipment;
    }

    // Calculate time slots for default shipment (for together delivery)
    $defaultTimeSlots = [];
    $defaultEarliestDate = null;
    $defaultLatestDate = null;

    if ($defaultShipment) {
        $startTime = Carbon\Carbon::parse($defaultShipment->star_time);
        $endTime = Carbon\Carbon::parse($defaultShipment->end_time);
        $timeRangeHours = (int) $defaultShipment->time_range;
        $currentSlot = $startTime->copy();

        while ($currentSlot->lt($endTime)) {
            $slotEnd = $currentSlot->copy()->addHours($timeRangeHours);
            if ($slotEnd->gt($endTime)) {
                $slotEnd = $endTime->copy();
            }

            $defaultTimeSlots[] = [
                'start' => $currentSlot->format('H:i'),
                'end' => $slotEnd->format('H:i'),
                'full_start' => $currentSlot->format('H:i'),
                'full_end' => $slotEnd->format('H:i'),
            ];

            $currentSlot = $slotEnd;
        }

        $defaultEarliestDate = now()->addDays($defaultShipment->delivery_delay_days);
        $defaultLatestDate = $defaultEarliestDate->copy()->addDays(5);
    }

    $totalDeliveryCharge = 0;
    $defaultShipment = App\Models\Admin\Shipment::where('default', true)->first();
    $default_charge = $defaultShipment->delivery_charge;

@endphp

@section('content')
    <div class="order-details-container">
        <div class="table-area mt-30 mb-30">
            <div class="table-wrapper">
                <form action="{{ setRoute('frontend.product.order.confirm') }}" method="POST">
                    @csrf
                    <h3 class="title">{{ __('Order Details') }}</h3>
                    <div class="table-responsive">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th>{{ __('Product List') }}</th>
                                    <th>{{ __('Product Image') }}</th>
                                    <th>{{ __('Product Name') }}</th>
                                    <th>{{ __('Price') }}</th>
                                    <th>{{ __('Quantity') }}</th>
                                    <th>{{ __('Total Amount') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cartData = $guestCart['data'];
                                    $counter = 1;
                                @endphp

                                @foreach ($cartData as $key => $item)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>
                                            <div class="product-img">
                                                <img src="{{ get_image($item->image, 'site-section' ?? '') }}"
                                                    alt="{{ $item->name }}">
                                            </div>
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ get_default_currency_symbol() }}{{ $item->offer_price == '0' ? $item->price : $item->offer_price }}
                                        </td>
                                        <td>{{ $item->quantity }}</td>
                                        <td class="total-amount">
                                            {{ get_default_currency_symbol() }}{{ ($item->offer_price == '0' ? $item->price : $item->offer_price) * $item->quantity }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="checkout-form-area">
                        <h3 class="title">{{ __('Delivery Details') }}</h3>

                        @if ($grouped->count() > 1)
                            <div class="delivery-tab-btn nav nav-pills mb-4" id="deliveryTab" role="tablist">
                                <button class="nav-link active" id="separate-tab" data-bs-toggle="tab"
                                    data-bs-target="#separate" type="button" role="tab">
                                    {{ __('Separate Delivery') }}
                                </button>
                                <button class="nav-link" id="together-tab" data-bs-toggle="tab" data-bs-target="#together"
                                    type="button" role="tab">
                                    {{ __('Together Delivery(default)') }}
                                </button>
                            </div>
                        @endif

                        <input type="hidden" name="user_cart" value="{{ json_encode($guestCart) }}">
                        <input type="hidden" name="delivery_type" id="delivery_type" value="separate">

                        <div class="tab-content">
                            <!-- Separate Delivery Tab -->
                            <div class="tab-pane fade show active" id="separate" role="tabpanel">
                                <div class="row mb-30-none">

                                    @foreach ($grouped as $shipmentId => $products)
                                        @php
                                            $shipment = $products->first()->shipment;

                                            $totalDeliveryCharge += $shipment->delivery_charge;

                                            $earliestDate = now()->addDays($shipment->delivery_delay_days);
                                            $latestDate = $earliestDate->copy()->addDays(5);

                                            $startTime = Carbon\Carbon::parse($shipment->star_time);
                                            $endTime = Carbon\Carbon::parse($shipment->end_time);
                                            $timeRangeHours = (int) $shipment->time_range;

                                            $timeSlots = [];
                                            $currentSlot = $startTime->copy();

                                            while ($currentSlot->lt($endTime)) {
                                                $slotEnd = $currentSlot->copy()->addHours($timeRangeHours);
                                                if ($slotEnd->gt($endTime)) {
                                                    $slotEnd = $endTime->copy();
                                                }

                                                $timeSlots[] = [
                                                    'start' => $currentSlot->format('H:i'),
                                                    'end' => $slotEnd->format('H:i'),
                                                    'full_start' => $currentSlot->format('H:i'),
                                                    'full_end' => $slotEnd->format('H:i'),
                                                ];

                                                $currentSlot = $slotEnd;
                                            }
                                        @endphp

                                        <div class="col-lg-6 col-md-6 com-sm-12 mb-30">
                                            <h4 class="title">{{ $shipment->name }} <span>({{ count($products) }}
                                                    Items)</span></h4>
                                            <div class="delivery-item-img mb-10">
                                                @foreach ($products as $index => $product)
                                                    @if ($index < 2)
                                                        <!-- Show first 2 products by default -->
                                                        <img src="{{ get_image($product->image, 'site-section' ?? '') }}"
                                                            alt="img" height="80px" width="80px">
                                                    @endif
                                                @endforeach
                                                @if (count($products) > 2)
                                                    <a href="#0" class="more-item" data-bs-toggle="modal"
                                                        data-bs-target="#itemModal-{{ $shipmentId }}">+{{ __('More') }}</a>
                                                @endif
                                            </div>

                                            <!-- Shipment-specific modal -->
                                            <div class="modal fade" id="itemModal-{{ $shipmentId }}" tabindex="-1"
                                                aria-labelledby="itemModalLabel-{{ $shipmentId }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="itemModalLabel-{{ $shipmentId }}">
                                                                {{ $shipment->name }} - All Products
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"><i class="las la-times"></i></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="table-responsive">
                                                                <table class="custom-table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>{{ __('Product Image') }}</th>

                                                                            <th>{{ __('Price') }}{{ get_default_currency_code() }}
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($products as $index => $product)
                                                                            <tr>
                                                                                <td>{{ $index + 1 }}</td>
                                                                                <td>
                                                                                    <div class="product-img">
                                                                                        <img src="{{ get_image($product->image, 'site-section' ?? '') }}"
                                                                                            alt="Product Image"
                                                                                            style="max-height: 100px;">
                                                                                    </div>
                                                                                </td>

                                                                                <td>{{ $product->price ?? 'N/A' }}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-5 col-md-6 form-group">
                                                    <label>{{ __('Select Date') }}*</label>
                                                    <select class="form-select delivery-date-select separate-delivery-date"
                                                        id="delivery_date_{{ $shipmentId }}"
                                                        name="delivery_date[{{ $shipmentId }}]"
                                                        data-shipment-id="{{ $shipmentId }}">
                                                        @for ($date = $earliestDate; $date->lte($latestDate); $date->addDay())
                                                            <option value="{{ $date->format('Y-m-d') }}"
                                                                @if ($date->isToday()) selected @endif>
                                                                {{ $date->format('l, F jS') }}
                                                                @if ($date->isToday())
                                                                    (Today)
                                                                @endif
                                                                @if ($date->isTomorrow())
                                                                    (Tomorrow)
                                                                @endif
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-lg-5 col-md-6 form-group"
                                                    id="time_slots_{{ $shipmentId }}">
                                                    <label>{{ __('Select Time') }}*</label>

                                                    <select class="form-select time-slot-select separate-time-slot"
                                                        name="time_slots[{{ $shipmentId }}][selected]"
                                                        data-shipment-id="{{ $shipmentId }}">
                                                        <option value="">Select a time slot</option>
                                                        @foreach ($timeSlots as $index => $slot)
                                                            <option value="{{ $index }}"
                                                                data-start="{{ $slot['start'] }}"
                                                                data-end="{{ $slot['end'] }}"
                                                                data-full-start="{{ $slot['full_start'] }}"
                                                                data-full-end="{{ $slot['full_end'] }}">
                                                                {{ $slot['start'] }} - {{ $slot['end'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <input type="hidden" name="time_slots[{{ $shipmentId }}][start]"
                                                    id="time_slot_start_{{ $shipmentId }}" value="">
                                                <input type="hidden" name="time_slots[{{ $shipmentId }}][end]"
                                                    id="time_slot_end_{{ $shipmentId }}" value="">

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>




                            <!-- Together Delivery Tab -->
                            <div class="tab-pane fade" id="together" role="tabpanel">
                                @if ($defaultShipment)
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 com-sm-12 mb-30">
                                            <h4 class="title">{{ __('All Products Delivered Together') }}
                                                ({{ $defaultShipment->name }})</h4>
                                            <div class="row">
                                                @php
                                                    $allProducts = [];
                                                    $showMoreLink = false;
                                                @endphp
                                                <div class="delivery-item-img mb-10">
                                                    @foreach ($grouped as $shipmentId => $products)
                                                        @php
                                                            $allProducts = array_merge($allProducts, $products->all());
                                                            if (count($products) > 2) {
                                                                $showMoreLink = true;
                                                            }
                                                        @endphp


                                                        @foreach ($products as $index => $product)
                                                            @if ($index < 2)
                                                                <!-- Show first 2 products by default -->
                                                                <img src="{{ get_image($product->image, 'site-section' ?? '') }}"
                                                                    alt="img" height="80px" width="80px"
                                                                    style="margin-right: 5px;">
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                    @if ($showMoreLink)
                                                        <a href="#0" class="more-item" data-bs-toggle="modal"
                                                            data-bs-target="#allProductsModal"
                                                            style="line-height: 80px;">+{{ __('More') }}</a>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Modal for all products -->
                                            <div class="modal fade" id="allProductsModal" tabindex="-1"
                                                aria-labelledby="allProductsModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="allProductsModalLabel">
                                                                {{ __('All Products Delivered Together') }}
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"><i
                                                                    class="las la-times"></i></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="table-responsive">
                                                                <table class="custom-table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>{{ __('Shipment') }}</th>
                                                                            <th>{{ __('Product Image') }}</th>

                                                                            <th>{{ __('Price') }}{{ get_default_currency_code() }}
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @php $counter = 1; @endphp
                                                                        @foreach ($grouped as $shipmentId => $products)
                                                                            @foreach ($products as $product)
                                                                                <tr>
                                                                                    <td>{{ $counter++ }}</td>
                                                                                    <td>{{ $product->shipment->name ?? 'N/A' }}
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="product-img">
                                                                                            <img src="{{ get_image($product->image, 'site-section' ?? '') }}"
                                                                                                alt="Product Image"
                                                                                                style="max-height: 100px;">
                                                                                        </div>
                                                                                    </td>

                                                                                    <td>{{ $product->price ?? 'N/A' }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 form-group">
                                                    <label>{{ __('Select Date') }}*</label>
                                                    <select class="form-select together-delivery-date"
                                                        name="together_delivery_date">
                                                        @for ($date = $defaultEarliestDate; $date->lte($defaultLatestDate); $date->addDay())
                                                            <option value="{{ $date->format('Y-m-d') }}"
                                                                @if ($date->isToday()) selected @endif>
                                                                {{ $date->format('l, F jS') }}
                                                                @if ($date->isToday())
                                                                    (Today)
                                                                @endif
                                                                @if ($date->isTomorrow())
                                                                    (Tomorrow)
                                                                @endif
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-md-6 form-group">
                                                    <label>{{ __('Select Time') }}*</label>
                                                    <select class="form-select together-time-slot"
                                                        name="together_time_slot">
                                                        <option value="">{{ __('Select a time slot') }}</option>
                                                        @foreach ($defaultTimeSlots as $index => $slot)
                                                            <option value="{{ $index }}"
                                                                data-start="{{ $slot['start'] }}"
                                                                data-end="{{ $slot['end'] }}"
                                                                data-full-start="{{ $slot['full_start'] }}"
                                                                data-full-end="{{ $slot['full_end'] }}">
                                                                {{ $slot['start'] }} - {{ $slot['end'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <input type="hidden" name="together_time_slot_start"
                                                    id="together_time_slot_start" value="">
                                                <input type="hidden" name="together_time_slot_end"
                                                    id="together_time_slot_end" value="">

                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="alert alert-warning">
                                        {{ __('No default shipment configuration found. Please contact support.') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 form-group">
                                <label>{{ __('Phone') }}*</label>
                                <input name="phone" type="number" class="form--control" placeholder="" required>
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group">
                                <label>{{ __('Email') }} </label>
                                <input name="email" type="email" class="form--control" placeholder="Gmail id"
                                    value="{{ auth()->user()->email }}" readonly>
                            </div>
                            <div class="col-xl-12 col-lg-12 form-group">
                                <label>{{ __('Address') }}*</label>
                                <textarea name="address" class="form--control" placeholder={{ __('House number and street name') }} required></textarea>
                            </div>
                            <div class="col-xl-12 col-lg-12 form-group">
                                <label>{{ __('Order notes') }}</label>
                                <textarea name="notes" class="form--control"
                                    placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="billing-details mt-20">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 mb-20">
                                <h3 class="title">{{ __('Billing details') }}</h3>
                                <div class="order-summary">
                                    <div class="summary-container">
                                        <div class="cost pt-3 d-flex justify-content-between">
                                            <div class="left">
                                                <h5 class="bill">{{ __('Subtotal') }} :</h5>
                                                <h5 class="bill">{{ __('Delivery Charge') }} :</h5>
                                                @if ($delivery_settings->bag_status == 1)
                                                    <div class="custom-check-group pt-2">
                                                        <input type="checkbox" id="bags" name="reusable_bag"
                                                            value="0">
                                                        <label for="bags">{{ __('Add reusable bags?') }}</label>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="right text-end">
                                                <h5 class="price subtotal">
                                                    {{ get_default_currency_symbol() }}{{ $guestCart->sub_total }}</h5>

                                                @if (auth()->user()->free_delivery_status == 1)
                                                    <h5 class="price delivery-charge">
                                                        {{ get_default_currency_symbol() }}{{ $totalDeliveryCharge }}
                                                    </h5>

                                                    <input type="hidden" value="{{ $totalDeliveryCharge }}"
                                                        name="delivery_charge">
                                                @else
                                                    <h5 class="price delivery-charge">
                                                        {{ get_default_currency_symbol() }} 0
                                                        ({{ auth()->user()->free_delivery_token }}
                                                        {{ __('token
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        remaining') }})
                                                    </h5>

                                                    <input type="hidden" value="0" name="delivery_charge">
                                                @endif
                                                @if ($delivery_settings->bag_status == 1)
                                                    <div class="bags-price pt-2">
                                                        <h5 class="price bag-price">
                                                            {{ get_default_currency_symbol() }}{{ $delivery_settings->bag_price }}
                                                        </h5>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="cost d-flex justify-content-between">
                                            <div class="left">
                                                <h5 class="bill">{{ __('Wallet Balance') }} :</h5>
                                            </div>
                                            <div class="right">
                                                <h5 class="title">
                                                    {{ get_default_currency_symbol() }}{{ get_amount(auth()->user()->wallets->balance) }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="summary-row grand-total">
                                            <div class="left">
                                                <h5 class="summary-label">{{ __('Total Cost') }} :</h5>
                                            </div>
                                            <div class="right">
                                                @if (auth()->user()->free_delivery_status == 1)
                                                    <h5 class="total-cost">
                                                        {{ get_default_currency_symbol() }}{{ $guestCart->sub_total + $totalDeliveryCharge }}
                                                        {{-- @dd($totalDeliveryCharge); --}}
                                                    </h5>
                                                    <input type="hidden" name="total_cost"
                                                        value="{{ $guestCart->sub_total + $totalDeliveryCharge }}">
                                                    <input type="hidden" id="" name="amount"
                                                        value="{{ $guestCart->sub_total + $totalDeliveryCharge }}">
                                                @else
                                                    <h5 class="summary-value total-cost">
                                                        {{ get_default_currency_symbol() }}{{ $guestCart->sub_total }}
                                                    </h5>
                                                    <input type="hidden" name="total_cost"
                                                        value="{{ $guestCart->sub_total }}">
                                                    <input type="hidden" id="" name="amount"
                                                        value="{{ $guestCart->sub_total }}">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 mb-20">
                                <h4 class="title">{{ __('Payment Methods') }}</h4>
                                <div class="radio-wrapper">
                                    <div class="radio-item">
                                        <input type="radio" class="field-radio-btn" name="payment_method"
                                            id="cash" value="cash" checked>
                                        <label for="cash">{{ __('Cash on delivery') }}</label>
                                    </div>
                                </div>
                                @if (auth()->user()->wallets->balance > 0)
                                    <div class="radio-wrapper">
                                        <div class="radio-item">
                                            <input type="radio" class="field-radio-btn" name="payment_method"
                                                id="wallet" value="wallet">
                                            <label for="wallet">{{ __('Use Wallet') }}</label>
                                        </div>
                                    </div>
                                @endif
                                <div class="radio-wrapper">
                                    <div class="radio-item">
                                        <input type="radio" class="field-radio-btn" name="payment_method"
                                            id="online" value="online">
                                        <label for="online">{{ __('Online Payment') }}</label>
                                    </div>
                                </div>
                                <div class="payment-method mb-20" style="display: none;">
                                    <select class="nice-select" name="gateway" id="gateway-select">
                                        @foreach ($payment_method as $item)
                                            @foreach ($item->currencies as $data)
                                                <option value="{{ $data->id }}"
                                                    data-gateway-currency="{{ $data->alias }}">
                                                    {{ $data->name }}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit"
                                        class="btn--base checkout w-100">{{ __('Place Order') }}</button>
                                </div>
                                <input type="hidden" id="selected-currency" name="gateway_currency">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection

@push('script')
    <script>
        $(document).ready(function() {

            const currencySymbol = '{{ get_default_currency_symbol() }}';
            const reusable_bag_price = {{ $delivery_settings->bag_price }};
            const defaultCharge = parseFloat({{ $default_charge }});
            const separateDeliveryCharge = parseFloat(
                {{ auth()->user()->free_delivery_status == 1 ? $totalDeliveryCharge : 0 }});

            let subtotal = parseFloat({{ $guestCart->sub_total }});
            let deliveryCharge = separateDeliveryCharge; // Initialize with separate delivery charge
            let total = subtotal + deliveryCharge;
            let amountInput = $('input[name="amount"]');
          

            // Update delivery type when tabs are clicked
            $('.delivery-tab-btn button').on('click', function() {
             

                const deliveryType = $(this).attr('id') === 'together-tab' ? 'together' : 'separate';
                $('#delivery_type').val(deliveryType);

                // Update delivery charge based on selected tab
                if (deliveryType === 'together') {
                    deliveryCharge =
                        {{ auth()->user()->free_delivery_status == 1 ? $default_charge : 0 }};
                } else {
                    deliveryCharge = separateDeliveryCharge;
                }

                // Recalculate total
                total = subtotal + deliveryCharge;
                if ($('#bags').is(':checked')) {
                    console.log(624);

                    total += reusable_bag_price;
                }

                // Update display
                updateTotal();
             

                // Update hidden fields
                $('input[name="delivery_charge"]').val(deliveryCharge);
            });

            // Update total display
            function updateTotal() {
                $('.total-cost').text(currencySymbol + total.toFixed(2));
                $('input[name="total_cost"]').val(total.toFixed(2));
                amountInput.val(total.toFixed(2));

                // Update delivery charge display
                // if ({{ auth()->user()->free_delivery_status == 1 }}) {
                $('.delivery-charge').text(currencySymbol + deliveryCharge.toFixed(2));
                // }
            }

            // Reusable bag checkbox handler
            $('#bags').change(function() {
                if ($(this).is(':checked')) {

                    $(this).val(reusable_bag_price);
                    total += reusable_bag_price;
                } else {
                    $(this).val('0');
                    total -= reusable_bag_price;
                }
                updateTotal();
            });

            // Payment method selection
            $('input[name="payment_method"]').change(function() {
                if ($(this).val() === 'online') {
                    $('.payment-method').show();
                } else {
                    $('.payment-method').hide();
                }
            });

            // Gateway currency selection
            $('#gateway-select').on('change', function() {
                $('#selected-currency').val($(this).find(':selected').data('gateway-currency'));
            }).trigger('change');

            // Handle time slot selection for separate delivery
            $('.separate-time-slot').on('change', function() {
                const shipmentId = $(this).data('shipment-id');
                const selectedOption = $(this).find(':selected');

                if (selectedOption.val() === "") {
                    $(`#time_slot_start_${shipmentId}`).val('');
                    $(`#time_slot_end_${shipmentId}`).val('');
                    return;
                }

                $(`#time_slot_start_${shipmentId}`).val(selectedOption.data('full-start'));
                $(`#time_slot_end_${shipmentId}`).val(selectedOption.data('full-end'));
            });

            // Handle time slot selection for together delivery
            $('.together-time-slot').on('change', function() {

                const selectedOption = $(this).find(':selected');
                console.log(selectedOption);

                if (selectedOption.val() === "") {
                    $('#together_time_slot_start').val('');
                    $('#together_time_slot_end').val('');
                    return;
                }

                $('#together_time_slot_start').val(selectedOption.data('full-start'));
                $('#together_time_slot_end').val(selectedOption.data('full-end'));
            });

            // Initialize all time slot selects
            $('.time-slot-select').each(function() {
                if ($(this).find('option').length > 1) {
                    $(this).find('option:eq(1)').prop('selected', true).trigger('change');
                }
            });

            // Initialize together time slot if available
            if ($('.together-time-slot').find('option').length > 1) {
                $('.together-time-slot').find('option:eq(1)').prop('selected', true).trigger('change');
            }
        });
    </script>
@endpush
