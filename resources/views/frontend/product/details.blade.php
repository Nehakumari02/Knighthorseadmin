@extends('frontend.layouts.master')
@push('css')
@endpush
@php
    $app_local = get_default_language_code() ?? 'en';
    $default = App\Constants\LanguageConst::NOT_REMOVABLE;
    $system_default_lang = get_default_language_code();

    $productData = $item->data;
    $metaTitle =
        $productData->language->$system_default_lang->meta_title ??
        ($productData->language->$default->name ?? 'Product Details');
    $metaDescription =
        $productData->language->$system_default_lang->meta_description ??
        ($productData->language->$default->description ?? 'Product details page');
@endphp
<style>
    
 
</style>

@section('meta')
    <!-- Primary Meta Tags -->
    <title>{{ $metaTitle }} | {{ config('app.name') }}</title>
    <meta name="title" content="{{ $metaTitle }}">
    <meta name="description" content="{{ $metaDescription }}">

    <meta itemprop="name" content="{{ $metaTitle }}">
    <meta itemprop="description" content="{{ $metaDescription }}">
    <meta itemprop="image" content="{{ get_image($item->image, 'site-section') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:image" content="{{ get_image($item->image, 'site-section') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $metaTitle }}">
    <meta property="twitter:description" content="{{ $metaDescription }}">
    <meta property="twitter:image" content="{{ get_image($item->image, 'site-section') }}">
@endsection
@section('content')
    <div class="food-catagori ptb-80 ">
        <div class="item-details-page">
            <div class="catagori-details pt-20">
                <div class="row mb-20-none">
                    <div class="col-xl-5 col-lg-6 col-md-12 mb-20">
                        <div class="modal-item-img">
                            <div class="image">
                                <img src="{{ get_image($item->image, 'site-section' ?? '') }}" alt="img">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6 col-md-12 mb-20">
                        <div class=" catagori-item">
                            <h3 class="title">{{ $item->data->language->$system_default_lang->name }}</h3>
                            <P>{{ $item->order_quantity }} {{ $item->unit()->first()->unit ?? ''  }}</P>
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
                            <div class="button add-to-bag-{{ $item->id }}">

                                <button class="btn btn--base w-25 add-to-cart-btn" data-id="{{ $item->id }}"
                                    data-name="{{ $item->data->language->$system_default_lang->name }}"
                                    data-price="{{ $item->offer_price ?? $item->price }}"
                                    data-main-price="{{ $item->price }}" data-offer-price="{{ $item->offer_price ?? 0 }}"
                                    data-image="{{ $item->image }}">
                                    {{ __('Add to bag') }}
                                </button>
                                <div class="quantity-area w-25">
                                    <input type="button" value="-" class="qtyminus" data-id="{{ $item->id }}"
                                        data-name="{{ $item->data->language->$system_default_lang->name }}"
                                        data-price="{{ $item->offer_price ?? $item->price }}"
                                        data-main-price="{{ $item->price }}"
                                        data-offer-price="{{ $item->offer_price ?? 0 }}" data-image="{{ $item->image }}">
                                    <input type="text" name="quantity"
                                        class="qty text-center product-qty-{{ $item->id }}">
                                    <input type="button" value="+" class="qtyplus" data-id="{{ $item->id }}"
                                        data-name="{{ $item->data->language->$system_default_lang->name }}"
                                        data-price="{{ $item->offer_price ?? $item->price }}"
                                        data-main-price="{{ $item->price }}"
                                        data-offer-price="{{ $item->offer_price ?? 0 }}" data-image="{{ $item->image }}">
                                </div>
                            </div>
                            <div class="product-content">
                                <p>{{ $item->data->language->$system_default_lang->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="similer-product ptb-40">
            <h3 class="title">{{ __('Similar Items') }}</h3>
            <div class="food-area">
                <div class="row mb-20-none">
                    @foreach ($similar_product as $item)
                        @include('partials.product-item', [
                            'item' => $item,
                            'app_local' => $app_local,
                            'system_default_lang' => $system_default_lang,
                        ])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="application/ld+json">
            {
            "@context": "https://schema.org",
            "@type": "WebPage",
            "name": "{{ $metaTitle }}",
            "description": "{{ $metaDescription }}",
            "url": "{{ url()->current() }}",
            "image": "{{ get_image($item->image, 'site-section') }}"
            }
</script>
@endpush
