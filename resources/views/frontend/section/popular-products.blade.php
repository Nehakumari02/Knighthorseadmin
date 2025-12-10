@php
    $product = App\Models\Admin\Product::forArea()
        ->with('shipment', 'unit')
        ->where('status', true)
        ->where('popular', true)
        ->paginate(20);
    $app_local = language_const()::NOT_REMOVABLE;
    $system_default_lang = get_default_language_code();

@endphp

<h2 class="title">{{ __('Popular') }}</h2>
<div class="food-area">

    <div class="row mb-20-none">
        @forelse ($product as $item)
            @include('partials.product-item', [
                'item' => $item,
                'app_local' => $app_local,
                'system_default_lang' => $system_default_lang,
            ])
         @empty
           <h3 class="title text-center">{{ "No Product Found! "}}</h3>
        @endforelse
    </div>
    <div class="pagination-area">
      {{ get_paginate($product) }}
    </div>
</div>
