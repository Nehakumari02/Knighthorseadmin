@extends('frontend.layouts.master')



@section('content')
    <section class="forgot-password pt-150 pb-80">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-10 col-sm-12">
                    <div class="forgot-password-area">
                        <div class="account-form-area text-center w-100">
                            <div class="account-logo">
                                <a class="site-logo site-title" href="{{ setRoute('frontend.index') }}"><img
                                        src="{{ get_logo($basic_settings) }}"
                                        data-white_img="{{ get_logo($basic_settings, 'white') }}"
                                        data-dark_img="{{ get_logo($basic_settings, 'dark') }}" alt="site-logo"></a>
                            </div>
                            <h4 class="title">{{ __('Please enter the code') }}</h4>
                            <form action="{{ setRoute('user.authorize.google.2fa.submit') }}" class="account-form"
                                method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 form-group">
                                        <input class="otp" type="text" name="code[]" oninput='digitValidate(this)'
                                            onkeyup='tabChange(1)' maxlength=1 required>
                                        <input class="otp" type="text" name="code[]" oninput='digitValidate(this)'
                                            onkeyup='tabChange(2)' maxlength=2 required>
                                        <input class="otp" type="text" name="code[]" oninput='digitValidate(this)'
                                            onkeyup='tabChange(3)' maxlength=1 required>
                                        <input class="otp" type="text" name="code[]" oninput='digitValidate(this)'
                                            onkeyup='tabChange(4)' maxlength=1 required>
                                        <input class="otp" type="text" name="code[]" oninput='digitValidate(this)'
                                            onkeyup='tabChange(5)' maxlength=1 required>
                                        <input class="otp" type="text" name="code[]" oninput='digitValidate(this)'
                                            onkeyup='tabChange(6)' maxlength=1 required>
                                    </div>
                                    <div class="col-lg-12 form-group text-center">
                                        <button type="submit" class="btn--base w-100">{{ __('Submit') }}</button>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="account-item text-center mt-10">
                                            <label>{{ __('Already Have An Account?') }} <a
                                                    href="{{ setRoute('user.login') }}"
                                                    class="text--base">{{ __('Login Now') }}</a></label>
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
    <script>
        let tabChange = function(val) {
            let ele = document.querySelectorAll('.otp');
            if (ele[val - 1].value != '') {
                ele[val].focus()
            } else if (ele[val - 1].value == '') {
                ele[val - 2].focus()
            }
        }
        $(".otp").parents("form").find("input[type=submit],button[type=submit]").click(function(e) {

            var otps = $(this).parents("form").find(".otp");
            var result = true;
            $.each(otps, function(index, item) {
                if ($(item).val() == "" || $(item).val() == null) {
                    result = false;
                }
            });
            if (result == false) {
                $(this).parents("form").find(".otp").addClass("required");
            } else {
                $(this).parents("form").find(".otp").removeClass("required");
                $(this).parents("form").submit();
            }
        });
    </script>
@endpush
