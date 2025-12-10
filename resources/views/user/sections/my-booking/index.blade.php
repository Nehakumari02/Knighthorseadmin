@extends('frontend.layouts.master')

@push('css')
@endpush
@section('breadcrumb')
    @include('user.components.breadcrumb', [
        'breadcrumbs' => [
            [
                'name' => __($page_title),
                'url' => setRoute('user.profile.index'),
            ],
        ],
    ])
@endsection
@section('content')
    <div class="table-area mt-10">

        <div class="order ptb-20 pt-5">
            <div class="order-details pt-2">
                <div class="row">
                    <div class="col-xl-8 col-lg-12">
                        <div class="order-title">
                            <h3 class="title">{{ __('My Orders') }}</h3>
                            @forelse ($transactions as $item)
                                <div class="my-order mb-20 d-flex justify-content-between">
                                    <div class="left-side">

                                        <span class="btn--base">{{ __($item->stringStatus->value) }}</span>
                                        <div class="order-id pt-3">
                                            <p> {{ __('Id') }} <b>{{ $item->trx_id }}</b></p>
                                            <p><b>{{ get_default_currency_symbol() }}{{ get_amount($item->payable_price) }}</b>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="left-side">
                                        <div class="order-id pt-4">
                                            <p>{{ $item->date }}</p>
                                            <a href="{{ route('user.order.details.details', $item->uuid) }}"
                                                class="show-details">{{ __('Show Details') }}</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="12">
                                        <div class="my-order mb-20 d-flex justify-content-center" style="margin-top: 37.5px">
                                            {{ __('No Order Yet!') }}</div>
                                    </td>
                                </tr>
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ get_paginate($transactions) }}
    </div>
@endsection
@push('script')
@endpush
