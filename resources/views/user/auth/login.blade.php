@php

@endphp
@extends('frontend.layouts.master')

@push('css')
@endpush

@section('content')

    <section class="login-verification pt-120 pb-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="login-verification-area">
                        <div class="account-wrapper">
                            <div class="account-logo text-center">
                    
                                <a class="site-logo site-title" href="{{ route('frontend.index') }}"><img
                            src="{{ get_logo($basic_settings,'dark') }}" alt="site-logo"></a>
                            </div>
                            <div class="login-verification-content ptb-30">
                                <h3 class="title">{{ __('Login with Email') }}</h3>
                            </div>
                            <form class="account-form" id="login" method="POST"
                                action="{{ setRoute('user.login.submit') }}">
                                @csrf
                                <div class="row ml-b-20">
                                    <div class="col-lg-12 form-group">
                                        <label>{{ __('Email') }}</label>
                                        <input type="text" required="" class="form-control form--control"
                                            name="credentials" placeholder="Email id" spellcheck="false" data-ms-editor="true">
                                    </div>
                                    <div class="col-lg-12 form-group show_hide_password">
                                        <input type="password" name="password" class="form-control form--control"
                                            placeholder="Password">
                                        <a href="javascript:void(0)" class="show-pass"><i class="fa fa-eye-slash"
                                                aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-lg-12 form-group">
                                        <div class="forgot-item">
                                            <label><a href="{{ setRoute('user.password.forgot') }}"
                                                    class="text--base">{{ __('Forgot Password?') }}</a></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 form-group text-center">
                                        <button type="submit" class="btn--base w-100">{{ __('Login') }}</button>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <div class="account-item">
                                            <label>Don't Have An Account? <a href="{{ route('user.register') }}"
                                                    data-block="register" class="text--base">{{ __('Register Now') }}</a></label>
                                        </div>
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
