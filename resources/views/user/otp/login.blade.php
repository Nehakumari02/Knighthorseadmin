@php

@endphp
@extends('frontend.layouts.master')

@push('css')
@endpush

@section('content')
    <section class="login-verification ptb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="login-verification-area">
                        <div class="account-wrapper">
                            <div class="account-logo text-center">
                                <a href="{{ setRoute('frontend.index') }}" class="site-logo">
                                    <img src="{{ get_logo($basic_settings,'dark') }}" alt="logo">
                                </a>
                                
                            </div>
                            <div class="login-verification-content ptb-30">
                                <h3 class="title">{{ __('Login with phone number') }}?</h3>
                                <p>{{ __("Enter your phone number and we'll send you a otp to login your account") }}</p>
                            </div>
                            <form action="{{ setRoute('user.otp.login.submit') }}" class="account-form" method="POST">
                                @csrf
                                <div class="row ml-b-20">
                                    <div class="col-lg-12 form-group">
                                        <select class="input-group-text copytext nice-select mb-20" name="otp_country">
                                            @foreach (get_all_countries_array() as $item)
                                                <option value="{{ get_country_phone_code($item['name']) }}">
                                                    {{ $item['name'] }} ({{ $item['mobile_code'] }})</option>
                                            @endforeach
                                        </select>
                                        <input  type="number" class="form--control" name="number"
                                            placeholder="Enter Number" id="phone-number">
                                    </div>
                                    <div class="col-lg-12 form-group text-center pt-40">
                                        <button type="submit" class="btn--base w-100">{{ __('Send Otp') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
@endpush
