@extends('admin.layouts.master')

@push('css')
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
        ],
        'active' => __('Order Logs'),
    ])
@endsection

@section('content')
    <div class="table-area">
        <div class="table-wrapper">
            <div class="table-header">
                <h5 class="title">{{ $page_title }}</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>TRX ID</th>
                            <th>{{ __('User Name') }}</th>
                            <th>{{ __('Phone') }}</th>
                            <th>{{ __('Category') }}</th>
                            <th>{{ __('Sub Category') }}</th>
                            <th>Product Name</th>
                            <th>Quantity</th> {{-- Quantity Header --}}
                            {{-- <th>Price</th> --}} {{-- <th>Image</th> --}} </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                            @php
                                $cartItems = $transaction->booking_data->data->user_cart->data ?? [];
                                $itemCount = count((array)$cartItems);
                            @endphp

                            @foreach($cartItems as $index => $item)
                                @php
                                    $item = (object) $item;
                                    $categoryName = 'N/A';
                                    $subCategoryName = 'N/A';
                                    $userType = ''; // 1. Initialize user_type variable
                                    
                                    try {
                                        if (!empty($item->name)) {
                                            // Search for Product
                                            $product = \Illuminate\Support\Facades\DB::table('products')
                                                        ->where('data', 'like', '%"'.$item->name.'"%')
                                                        ->orWhere('data', 'like', '%'.$item->name.'%')
                                                        ->first();

                                            if ($product) {
                                                // Fetch Category & User Type
                                                if (isset($product->category_id)) {
                                                    $category = \Illuminate\Support\Facades\DB::table('categories')
                                                                ->where('id', $product->category_id)
                                                                ->first();
                                                    
                                                    if ($category) {
                                                        // 2. Fetch User Type from Category Table
                                                        $userType = $category->user_type ?? '';

                                                        if (!empty($category->data)) {
                                                            $catData = json_decode($category->data);
                                                            $categoryName = $catData->language->en->name ?? $catData->language->en->title ?? 'N/A';
                                                        }
                                                    } 
                                                }

                                                // Fetch Sub Category
                                                if (isset($product->sub_category_id)) {
                                                    $subCategory = \Illuminate\Support\Facades\DB::table('sub_categories')
                                                                ->where('id', $product->sub_category_id)
                                                                ->first();
                                                    
                                                    if ($subCategory && !empty($subCategory->data)) {
                                                        $subCatData = json_decode($subCategory->data);
                                                        $subCategoryName = $subCatData->language->en->name ?? $subCatData->language->en->title ?? 'N/A';
                                                    } 
                                                }
                                            }
                                        }
                                    } catch (\Exception $e) {
                                        // Keep defaults
                                    }
                                @endphp

                                <tr>
                                    @if($index === 0)
                                        <td rowspan="{{ $itemCount }}" class="align-middle">
                                            {{ $transaction->trx_id }}
                                        </td>
                                        <td rowspan="{{ $itemCount }}" class="align-middle">
                                            <span class="fw-bold">{{ $transaction->user->fullname ?? 'N/A' }}</span>
                                        </td>
                                        <td rowspan="{{ $itemCount }}" class="align-middle text-center">
                                            {{ $transaction->user->mobile ?? 'N/A' }}
                                        </td>
                                    @endif

                                    {{-- Category --}}
                                    <td class="align-middle">
                                        <span class="badge badge--primary">{{ $categoryName }}</span>
                                    </td>

                                    {{-- Sub Category --}}
                                    <td class="align-middle">
                                        <span class="badge badge--info">{{ $subCategoryName }}</span>
                                    </td>

                                    <td>{{ $item->name }}</td>

                                    {{-- 3. Quantity with Unit Logic --}}
                                    <td>
                                        <span class="fw-bold text-dark">{{ $item->quantity }}</span>
                                        
                                        <span class="text-muted small" style="font-size: 11px;">
                                            @if(strtolower($userType) === 'wholesaler')
                                                {{ __('Box') }}
                                            @elseif(strtolower($userType) === 'retailer')
                                                {{ __('Piece') }}
                                            @endif
                                        </span>
                                    </td>

                                    {{-- Price & Image (Hidden) --}}
                                    {{-- <td>Rs {{ number_format($item->price ?? 0, 2) }}</td> --}}
                                    {{-- <td><img ... ></td> --}}
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ get_paginate($transactions) }}
        </div>
    </div>
@endsection

@push('script')
@endpush