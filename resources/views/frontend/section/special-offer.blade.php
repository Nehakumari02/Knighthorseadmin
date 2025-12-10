@php

    $app_local = language_const()::NOT_REMOVABLE;
    $system_default_lang = get_default_language_code();

    $slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::SPECIAL_OFFER_SECTION);
    $product = App\Models\Admin\Product::forArea()->whereNotNull('offer_price')->inRandomOrder(4)->limit(4)->get();

    $delivery_settings = App\Models\Admin\DeliverySettings::first();

@endphp
<div class="best-offer-area ptb-60">
    <div class="testimonial-area">
        <div class="row align-items-center mb-30-none">

            @if ($delivery_settings->free_delivery_status == 1)

                <div class="col-lg-5 col-md-12 mb-30">
                    <div class="customer-offer">
                        <div class="offer-content">
                            <p>{{ __('If you spend') }}
                                {{ $delivery_settings->amount_spend }}{{ get_default_currency_symbol() }},
                                {{ __('you will get') }} {{ $delivery_settings->delivery_count }}
                                {{ __('free deliveries') }} 😊</p>
                        </div>
                        @if (Auth::guard('web')->check())
                            @php
                                $spentAmount = auth()->user()->total_spend_amount ?? 0;
                                $targetAmount = $delivery_settings->amount_spend;
                                $percentage = min(100, max(0, ($spentAmount / $targetAmount) * 100));
                            @endphp

                            <div class="skill-bar pt-5">
                                <div class="progressbar" data-perc="{{ round($percentage) }}%">
                                    <div class="left">0{{ get_default_currency_symbol() }}</div>
                                    <div class="right">
                                        {{ $delivery_settings->amount_spend }}{{ get_default_currency_symbol() }}</div>
                                    <div class="bar"></div>
                                    <span class="label">{{ $spentAmount }}{{ get_default_currency_symbol() }}</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endif


            <div class="col-lg-7 col-md-12 mb-30">
                <div class="testimonial-section">
                    <div class="testimonial-slider-offer">
                        <h4 class="title">{{ __('Today Spacial Offer') }} <i class="las la-arrow-right"></i> </h4>
                        <div class="swiper-wrapper">
                            @forelse ($product as $item)
                                @if ($item->available_quantity != 0)
                                    <div class="swiper-slide catagori-item">
                                        <a href="{{ route('frontend.product.details', $item->uuid) }}">
                                            <div class="catagori-img">
                                                <img src="{{ get_image($item->image, 'site-section' ?? '') }}"
                                                    loading="lazy" alt="img">
                                            </div>
                                            <div class="catagori content text-center">
                                                <p>{{ $item->data->language->$system_default_lang->name }}</p>
                                                <P>{{ $item->order_quantity }}
                                                    {{ $item->unit()->first()->unit ?? '' }}</P>
                                                @if ($item->offer_price)
                                                    <span class="text--danger"> {{ get_default_currency_symbol() }}
                                                        {{ get_amount($item->offer_price) }}
                                                    </span>
                                                    <span class="mrp">
                                                        {{ get_default_currency_symbol() }}{{ get_amount($item->price) }}
                                                    </span>
                                                @else
                                                    <span class="text--danger">
                                                        {{ get_default_currency_symbol() }}{{ get_amount($item->price) }}
                                                    </span>
                                                @endif
                                            </div>
                                        </a>
                                        <div class="button pt-2 add-to-bag-{{ $item->id }}">
                                            <button class="btn btn--base w-100 add-to-cart-btn"
                                                data-id="{{ $item->id }}"
                                                data-name="{{ $item->data->language->$system_default_lang->name }}"
                                                data-price="{{ $item->offer_price ?? $item->price }}"
                                                data-main-price="{{ $item->price }}"
                                                data-offer-price="{{ $item->offer_price ?? 0 }}"
                                                data-shipment-type="{{ $item->shipment->id }}"
                                                data-image="{{ $item->image }}">
                                                {{ __('Add to bag') }}
                                            </button>

                                            <div class="quantity-area w-100">
                                                <input type="button" value="-" class="qtyminus"
                                                    data-id="{{ $item->id }}"
                                                    data-name="{{ $item->data->language->$system_default_lang->name }}"
                                                    data-price="{{ $item->offer_price ?? $item->price }}"
                                                    data-main-price="{{ $item->price }}"
                                                    data-offer-price="{{ $item->offer_price ?? 0 }}"
                                                    data-image="{{ $item->image }}">
                                                <input type="text" name="quantity" value="1"
                                                    class="qty text-center product-qty-{{ $item->id }}" readonly>
                                                <input type="button" value="+" class="qtyplus"
                                                    data-id="{{ $item->id }}"
                                                    data-name="{{ $item->data->language->$system_default_lang->name }}"
                                                    data-price="{{ $item->offer_price ?? $item->price }}"
                                                    data-main-price="{{ $item->price }}"
                                                    data-offer-price="{{ $item->offer_price ?? 0 }}"
                                                    data-image="{{ $item->image }}">
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="swiper-slide catagori-item item-out">
                                        <a href="{{ route('frontend.product.details', $item->uuid) }}">
                                            <div class="catagori-img">
                                                <img src="{{ get_image($item->image, 'site-section' ?? '') }}"
                                                    loading="lazy" alt="img">
                                            </div>
                                            <div class="catagori content text-center">
                                                <p>{{ $item->data->language->$system_default_lang->name }}</p>
                                                <P>{{ $item->order_quantity }}
                                                    {{ $item->unit()->first()->unit ?? '' }}</P>
                                                @if ($item->offer_price)
                                                    <span class="text--danger"> {{ get_default_currency_symbol() }}
                                                        {{ get_amount($item->offer_price) }}
                                                    </span>
                                                    <span class="mrp">
                                                        {{ get_default_currency_symbol() }}{{ get_amount($item->price) }}
                                                    </span>
                                                @else
                                                    <span class="text--danger">
                                                        {{ get_default_currency_symbol() }}{{ get_amount($item->price) }}
                                                    </span>
                                                @endif
                                            </div>
                                        </a>
                                        <div class="button pt-2">
                                            <button class="btn--close w-100">
                                                {{ __('Out Of Stock') }}
                                            </button>

                                        </div>
                                    </div>
                                @endif
                            @empty
                            <div class="swiper-slide catagori-item">

                                <h3 class="title text-center">{{ 'No Product Found! ' }}</h3>
                            </div>
                            @endforelse
                        </div>
                    </div>
                    <div class="swiper-pagination pt-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>



@push('script')
    {{-- <script>
        $(document).ready(function() {

            $('#modal-qty-plus').on('click', function() {
                const qtyInput = $('#modal-product-qty');
                let qty = parseInt(qtyInput.val());
                qtyInput.val(qty + 1);
            });

            $('#modal-qty-minus').on('click', function() {
                const qtyInput = $('#modal-product-qty');
                let qty = parseInt(qtyInput.val());
                if (qty > 1) {
                    qtyInput.val(qty - 1);
                }
            });


            $('#modal-add-to-cart').on('click', function() {
                const productId = $(this).data('id');
                const quantity = parseInt($('#modal-product-qty').val());


                const originalBtn = $('.add-to-cart-btn[data-id="' + productId + '"]');


                $('.product-qty-' + productId).val(quantity);


                originalBtn.click();


                $('#card-modal').modal('hide');
            });
        });
    </script> --}}
@endpush
