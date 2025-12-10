@extends('admin.layouts.master')

@push('css')
    <style>
        .wishlist-product-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .wishlist-product-list li {
            display: flex;
            align-items: flex-start;
            margin-bottom: 8px;
            padding-bottom: 8px;
            border-bottom: 1px dashed #e5e5e5;
        }
        .wishlist-product-list li:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .w-prod-details {
            font-size: 13px;
            line-height: 1.4;
            width: 100%;
        }
        .w-prod-name {
            font-weight: 600;
            color: #333;
            display: block;
            margin-bottom: 2px;
        }
        .w-prod-meta {
            font-size: 11px;
            color: #777;
            display: block;
        }
    </style>
@endpush

@section('page-title')
    @include('admin.components.page-title', ['title' => __($page_title)])
@endsection

@section('breadcrumb')
    @include('admin.components.breadcrumb', [
        'breadcrumbs' => [
            [
                'name' => __("Dashboard"),
                'url' => setRoute("admin.dashboard"),
            ],
        ],
        'active' => __("Wishlist"),
    ])
@endsection

@section('content')
    <div class="table-area">
        <div class="table-wrapper">
            <div class="table-header">
                <h5 class="title">{{ __("User Wishlists") }}</h5>
            </div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>User Details</th>
                            <th style="width: 50%;">Wishlist Items</th>
                            <th>Cart Total</th>
                            <th>Status</th>
                            <th>Last Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($wishlists as $item)
                            <tr>
                                {{-- 1. USER DETAILS (Text Only) --}}
                                <td>
                                    @if($item->user)
                                        <div class="user-content">
                                            <span class="fw-bold text--primary">{{ $item->user->fullname }}</span>
                                            <br>
                                            <span class="text-muted small">{{ $item->user->email }}</span>
                                            @if(!empty($item->user->full_mobile))
                                                <br>
                                                <span class="text-muted small">{{ $item->user->full_mobile }}</span>
                                            @endif
                                        </div>
                                    @else
                                        <span class="fw-bold">Guest User</span>
                                        <br>
                                        <span class="text-muted small">Session: {{ \Illuminate\Support\Str::limit($item->session_id, 10) }}</span>
                                    @endif
                                </td>

                                {{-- 2. PRODUCT LIST (Text Only) --}}
                                <td>
                                    @php
                                        // 🛡️ Safe Data Parsing
                                        $products = [];
                                        $raw = $item->data;

                                        if (is_object($raw)) {
                                            $products = (array) $raw;
                                        } elseif (is_array($raw)) {
                                            $products = $raw;
                                        }
                                        
                                        $count = 0;
                                    @endphp

                                    @if(!empty($products))
                                        <ul class="wishlist-product-list">
                                            @foreach ($products as $product)
                                                @php 
                                                    $p = (object) $product; 
                                                    $count++;
                                                @endphp
                                                
                                                @if($count <= 3) {{-- Show max 3 items --}}
                                                    <li>
                                                        <div class="w-prod-details">
                                                            <span class="w-prod-name">
                                                                <i class="las la-angle-right text--primary small"></i> 
                                                                {{ \Illuminate\Support\Str::limit($p->name ?? 'Unknown', 55) }}
                                                            </span>
                                                            <span class="w-prod-meta">
                                                                Price: {{ get_default_currency_symbol() }}{{ $p->price ?? 0 }} 
                                                                &nbsp;|&nbsp; 
                                                                Qty: {{ $p->quantity ?? 1 }}
                                                            </span>
                                                        </div>
                                                    </li>
                                                @endif
                                            @endforeach

                                            @if(count($products) > 3)
                                                <li class="text-center">
                                                    <span class="badge badge--info">+ {{ count($products) - 3 }} more items</span>
                                                </li>
                                            @endif
                                        </ul>
                                    @else
                                        <span class="text-muted small">- Empty Data -</span>
                                    @endif
                                </td>

                                {{-- 3. TOTAL --}}
                                <td>
                                    <span class="fw-bold text--success">
                                        {{ get_default_currency_symbol() }}{{ number_format((float)($item->sub_total ?? 0), 2) }}
                                    </span>
                                </td>

                                {{-- 4. STATUS --}}
                                <td>
                                    @if ($item->checkout == 1)
                                        <span class="badge badge--success">Purchased</span>
                                    @else
                                        <span class="badge badge--warning">Pending</span>
                                    @endif
                                </td>

                                {{-- 5. DATE --}}
                                <td>
                                    {{ $item->created_at->format('d M Y') }}
                                    <br>
                                    <small>{{ $item->created_at->format('h:i A') }}</small>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">{{ __("No Wishlists found.") }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="table-footer mt-4">
                {{ $wishlists->links() }}
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush