@if ($item->available_quantity == 0)
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-4 col-sm-6 mb-20">
        <div class="catagori-item item-out">
            <a href="{{ 'javascript:void(0)' }}">
                <div class="catagori-img">
                    <img src="{{ get_image($item->image, 'site-section' ?? '') }}" loading="lazy" alt="img">
                </div>
                <div class="catagori content text-center">
                    <p>{{ $item->data->language->$system_default_lang->name }}</p>
                    <P>{{ $item->order_quantity }} {{ $item->unit()->first()->unit ?? '' }}</P>
                    @if ($item->offer_price)
                        <span class="text--danger"> {{ get_default_currency_symbol() }}
                            {{ get_amount($item->offer_price) }}
                        </span>
                        <span class="mrp">
                            {{ get_default_currency_symbol() }}{{ get_amount($item->price) }}
                        </span>
                    @else
                        <span class="text--danger"> {{ get_default_currency_symbol() }}{{ get_amount($item->price) }}
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

    </div>
@else
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-4 col-sm-6 mb-20">
        <div class="catagori-item">
            <a href="{{ route('frontend.product.details', $item->uuid) }}">
                <div class="catagori-img">
                    <img src="{{ get_image($item->image, 'site-section' ?? '') }}" loading="lazy" alt="img">
                </div>
                <div class="catagori content text-center">
                    <p>{{ $item->data->language->$system_default_lang->name }}</p>
                    <P>{{ $item->order_quantity }} {{ $item->unit()->first()->unit ?? '' }}</P>
                    @if ($item->offer_price)
                        <span class="text--danger"> {{ get_default_currency_symbol() }}
                            {{ get_amount($item->offer_price) }}
                        </span>
                        <span class="mrp">
                            {{ get_default_currency_symbol() }}{{ get_amount($item->price) }}
                        </span>
                    @else
                        <span class="text--danger"> {{ get_default_currency_symbol() }}{{ get_amount($item->price) }}
                        </span>
                    @endif
                </div>
            </a>

            <div class="button pt-2 add-to-bag-{{ $item->id }}">
                <button class="btn btn--base w-100 add-to-cart-btn" data-id="{{ $item->id }}"
                    data-name="{{ $item->data->language->$system_default_lang->name }}"
                    data-price="{{ $item->offer_price ?? $item->price }}" data-main-price="{{ $item->price }}"
                    data-offer-price="{{ $item->offer_price ?? 0 }}" data-shipment-type="{{ $item->shipment->id }}"
                    data-image="{{ $item->image }}">
                    {{ __('Add to bag') }}
                </button>

                <div class="quantity-area w-100">
                    <input type="button" value="-" class="qtyminus" data-id="{{ $item->id }}"
                        data-name="{{ $item->data->language->$system_default_lang->name }}"
                        data-price="{{ $item->offer_price ?? $item->price }}" data-main-price="{{ $item->price }}"
                        data-offer-price="{{ $item->offer_price ?? 0 }}" data-image="{{ $item->image }}">
                    <input type="text" name="quantity" value="1"
                        class="qty text-center product-qty-{{ $item->id }}" readonly>
                    <input type="button" value="+" class="qtyplus" data-id="{{ $item->id }}"
                        data-name="{{ $item->data->language->$system_default_lang->name }}"
                        data-price="{{ $item->offer_price ?? $item->price }}" data-main-price="{{ $item->price }}"
                        data-offer-price="{{ $item->offer_price ?? 0 }}" data-image="{{ $item->image }}">
                </div>
            </div>
        </div>

    </div>
@endif




@push('script')
  
@endpush
