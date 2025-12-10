@php
    // $app_local = get_default_language_code();
    // $default = App\Constants\LanguageConst::NOT_REMOVABLE;
    // $slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::LOGIN_SECTION);
    // $login = App\Models\Admin\SiteSections::getData($slug)->first();
@endphp
@extends('frontend.layouts.master')

@push('css')
@endpush

@section('content')
    <section class="login-verification ptb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="login-verification-area">
                        <div class="account-wrapper">
                            <div class="account-logo text-center">
                             

                                <a class="site-logo site-title" href="{{ route('frontend.index') }}"><img
                            src="{{ get_logo($basic_settings,'dark') }}" alt="site-logo"></a>
                            </div>
                            <div class="login-verification-content ptb-30">
                                <h5 class="title">{{ __('Register Information') }}</h5>
                                <p>{{ __('Please input your details and register to your account to get access to your account.') }}
                                </p>
                            </div>
                            <form id="register" class="account-form" method="POST"
                                action="{{ setRoute('user.register.submit') }}">
                                @csrf
                                <div class="row ml-b-10">
                                    <div class="col-lg-6 col-md-6 form-group">
                                        @if (isset($phone_number) && $phone_number != null)
                                            <input type="text" class="form-control form--control" name="full_mobile"
                                                placeholder="{{ __('First Name') }}" value="{{ $phone_number }}" hidden>
                                        @endif


                                        <input type="text" class="form-control form--control" name="firstname"
                                            placeholder="{{ __('First Name') }}">
                                    </div>
                                    <div class="col-lg-6 col-md-6 form-group">
                                        <input type="text" class="form-control form--control" name="lastname"
                                            placeholder="{{ __('Last Name') }}">
                                    </div>
                                    <div class="col-lg-12 form-group">

                                        <input type="email" class="form-control form--control" name="email"
                                            placeholder="{{ __('Email') }}">
                                    </div>
                                    <div class="col-lg-12 form-group show_hide_password">
                                        <input type="password" class="form-control form--control" name="password"
                                            placeholder="{{ __('Password') }}">
                                        <a href="javascript:void(0)" class="show-pass"><i class="fa fa-eye-slash"
                                                aria-hidden="true"></i></a>
                                    </div>
                                    @php
                                        $agree_policy = DB::table('basic_settings')->first();
                                    @endphp

                                    @if ($agree_policy->agree_policy == true)
                                        <div class="col-lg-12 form-group">
                                            <div class="custom-check-group">
                                                <input type="checkbox" id="level-1" name="agree">
                                                <label for="level-1"
                                                    class="mb-0">{{ __('I have read agreed with the') }}
                                                    <a href="{{ url('useful-link/terms-condition') }}"
                                                        class="text--base">{{ __('Terms & Conditions') }}</a></label>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-lg-12 form-group text-center">
                                        <button type="submit" class="btn--base w-100">{{ __('Register Now') }}</button>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <div class="account-item">
                                            <label>{{ __('Already Have An Account?') }} <a
                                                    href="{{ route('user.login') }}" class="text--base"
                                                    data-block="login">{{ __('Login
                                                                                                                                                            Now') }}</a></label>
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
