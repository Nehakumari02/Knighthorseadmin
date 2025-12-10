@extends('user.layouts.master')

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
        <div class="table-wrapper">
            <div class="dashboard-header-wrapper">
                <h4 class="title">{{ __('Booking History') }}</h4>

            </div>
            <div class="table-responsive">
                @include('user.components.data-table.service-booking-table',compact('transactions'))
            </div>
        </div>
        {{ get_paginate($transactions) }}
    </div>
@endsection
@push('script')
<script>
    itemSearch($("input[name=search_text]"),$(".booking-search-table"),"{{ setRoute('user.my.booking.search') }}",1);
</script>

@endpush
