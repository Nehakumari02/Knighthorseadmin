@extends('frontend.layouts.master')

@push('css')
@endpush

@section('content')
    <section class="forgot-password pt-150 pb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-5">
                    <div class="forgot-password-area">
                        <div class="account-wrapper">
                            <span class="account-cross-btn"></span>
                            <div class="account-logo text-center">
                              

                                        <a class="site-logo site-title" href="{{ route('frontend.index') }}"><img
                            src="{{ get_logo($basic_settings,'dark') }}" alt="site-logo"></a>
                            </div><br>
                            <form action="{{ setRoute('user.password.reset', $token) }}" class="account-form" method="POST">
                                @csrf
                                <div class="row ml-b-20">
                                    <div class="col-lg-12 form-group">
                                        @include('admin.components.form.input', [
                                            'name' => 'password',
                                            'type' => 'password',
                                            'placeholder' => 'Enter New Password',
                                            'required' => true,
                                        ])
                                    </div>
                                    <div class="col-lg-12 form-group">
                                        @include('admin.components.form.input', [
                                            'name' => 'password_confirmation',
                                            'type' => 'password',
                                            'placeholder' => 'Enter Confirm Password',
                                            'required' => true,
                                        ])
                                    </div>
                                    <div class="col-lg-12 form-group">
                                        <div class="forgot-item">
                                            <label><a href="{{ setRoute('user.login') }}"
                                                    class="text--base">{{ __('Login') }}</a></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 form-group text-center">
                                        <button type="submit" class="btn--base w-100">{{ __('Reset') }}</button>
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
