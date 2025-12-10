@extends('frontend.layouts.master')

@push('css')
@endpush

@section('content')
    <div class="ptb-20 pt-5">
        <div class="Section-title">
            <h2 class="title">{{ __('Payment History') }}</h2>
        </div>
        <div class="profile-details">
            <div class="table-area mt-10">
                <div class="table-wrapper">
                    <div class="table-responsive">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th>{{ __('Order Number') }}</th>
                                    <th>{{ __('Method') }}</th>
                                    <th>{{ __('Payment') }}</th>
                                    <th>{{ __('Date') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                @forelse ($transactions ?? [] as $item)
                                    <tr>
                                        <td>{{ $item->trx_id }}</td>
                                        <td>{{ $item->type }} </td>
                                        <td>{{ get_amount($item->payable_price) }}</td>
                                        <td>{{ date_format($item->created_at,'Y/m/d') }}</td>
                                    </tr>
                                @empty
                                      <tr>
                                    <td colspan="12">
                                        <div class="my-order mb-20 d-flex justify-content-center" style="margin-top: 37.5px">
                                            {{ __('No payment made yet!') }}</div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
