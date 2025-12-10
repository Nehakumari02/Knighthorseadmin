@extends('frontend.layouts.master')
@push('css')
@endpush
@php
    $app_local = get_default_language_code() ?? 'en';
    $default = App\Constants\LanguageConst::NOT_REMOVABLE;
    $system_default_lang = get_default_language_code();
@endphp
@section('content')
    <div class="food-area pt-5">
        <h2 class="title"></h2>
        <div class="row mb-20-none">
            @forelse ($product as $item)
                @include('partials.product-item', [
                    'item' => $item,
                    'app_local' => $app_local,
                    'system_default_lang' => $system_default_lang,
                ])
            @empty
       

                    <h3 class="">{{ 'No Product Found! ' }}</h3>
             
            @endforelse
        </div>
        <div class="pagination-area">
            {{ get_paginate($product) }}
        </div>
    </div>
@endsection
