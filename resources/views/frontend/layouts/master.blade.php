<!DOCTYPE html>
<html lang="{{ get_default_language_code() }}">


@php
    $cookie = App\Models\Admin\SiteSections::where('key', 'site_cookie')->first();

    //cookies results
    $approval_status = request()->cookie('approval_status');
    $c_user_agent = request()->cookie('user_agent');
    $c_ip_address = request()->cookie('ip_address');
    $c_browser = request()->cookie('browser');
    $c_platform = request()->cookie('platform');
    //system informations
    $s_ipAddress = request()->ip();
    $s_location = geoip()->getLocation($s_ipAddress);
    $s_browser = Agent::browser();
    $s_platform = Agent::platform();
    $s_agent = request()->header('User-Agent');
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Yield for additional meta tags -->
    @yield('meta')
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    @php
        $current_url = URL::current();
    @endphp

    @if ($current_url == setRoute('frontend.index'))
        <title>{{ __($basic_settings->site_name) ?? '' }} - {{ __($basic_settings->site_title) ?? '' }}</title>
    @else
        <title>{{ __($basic_settings->site_name) ?? '' }} - {{ __($page_title) ?? '' }}</title>
    @endif

    @include('partials.header-asset')

    @stack('css')
    @php
        $primaryColor = @$basic_settings->base_color ?? '#7A3DDD';
        $secondaryColor = @$basic_settings->secondary_color ?? '#D860EC';
    @endphp

    <style>
        :root {
            --primary-color: {{ $primaryColor }};
            --secondary-color: {{ $secondaryColor }};
        }
    </style>


</head>

<body class="{{ get_default_language_dir() }}">


    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start body overlay
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="body-overlay" class="body-overlay"></div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End body overlay
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


    @include('frontend.partials.header')


    <div class="page-wrapper">
        @include('frontend.partials.side-nav')
    </div>

    <div class="main-wrapper">
        <div class="main-body-wrapper">
            <div
                class="body-wrapper  {{ request()->routeIs(['user.login', 'user.register', 'user.password.forgot']) ? 'active' : '' }}">
                <div class="food-catagori custom-section ptb-20">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>


    @include('partials.cart-bar')
    @include('partials.cookie')
    @include('frontend.partials.footer')
    @include('partials.footer-asset')
    @include('frontend.partials.extensions.tawk-to')

    @stack('script')
    @php
        $errorName = '';
    @endphp
    @if ($errors->any())
        @php
            $error = (object) $errors;
            $msg = $error->default;
            $messageNames = $msg->keys();
            $errorName = $messageNames[0];
        @endphp
    @endif

    <script>
        $(document).ready(function() {
            const $cartBtns = $('.cart-btn-wrapper');
            const $cartBar = $('.cart-bar');
            const $cartCloseBtn = $('.cartbar-close');
            const $bodyWrapper = $('.body-wrapper');

            // Add click event for all cart buttons
            $cartBtns.on('click', function() {
                $cartBar.toggleClass('show');
                $bodyWrapper.toggleClass('show');
            });

            // Close button inside cart bar
            $cartCloseBtn.on('click', function() {
                $cartBar.removeClass('show');
                $bodyWrapper.toggleClass('show');
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            // Get the area select element
            var areaSelect = $("select[name='area_switcher']").val();
                 

            function loadAreaData(areaSelect) {
                
                $.ajax({
                    url: "{{ route('frontend.area.switch') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        area_id: areaSelect
                    },
                    success: function(response) {

                    },
                    error: function(xhr) {

                    }
                });
            }

            loadAreaData(areaSelect)

        });
    </script>
    <script>
        var error = "{{ $errorName }}";
        if (
            error == 'firstname' ||
            error == 'agree' ||
            error == 'register_password' ||
            error == 'register_email' ||
            error == 'lastname'
        ) {
            $('.register-btn').addClass('active');
            $('#login').addClass('d-none');
            $('.login-btn').removeClass('active');
            $('#register').removeClass('d-none');
        }
    </script>

    <script>
        var status = "{{ @$cookie->status }}";
        //cookies results
        var approval_status = "{{ $approval_status }}";
        var c_user_agent = "{{ $c_user_agent }}";
        var c_ip_address = "{{ $c_ip_address }}";
        var c_browser = "{{ $c_browser }}";
        var c_platform = "{{ $c_platform }}";
        //system informations
        var s_ipAddress = "{{ $s_ipAddress }}";
        var s_browser = "{{ $s_browser }}";
        var s_platform = "{{ $s_platform }}";
        var s_agent = "{{ $s_agent }}";
        const pop = document.querySelector('.cookie-main-wrapper')
        if (status == 1) {
            if (approval_status == 'allow' || approval_status == 'decline' || c_user_agent === s_agent || c_ip_address ===
                s_ipAddress || c_browser === s_browser || c_platform === s_platform) {
                pop.style.bottom = "-300px";
            } else {
                window.onload = function() {
                    setTimeout(function() {
                        pop.style.bottom = "20px";
                    }, 2000)
                }
            }
        } else {
            pop.style.bottom = "-300px";
        }
        // })
    </script>
    <script>
        (function($) {
            "use strict";
            //Allow
            $('.cookie-btn').on('click', function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var postData = {
                    type: "allow",
                };
                $.post('{{ route('global.set.cookie') }}', postData, function(response) {
                    throwMessage('success', [response]);
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                });
            });
            //Decline
            $('.cookie-btn-cross').on('click', function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var postData = {
                    type: "decline",
                };
                $.post('{{ route('global.set.cookie') }}', postData, function(response) {
                    throwMessage('error', [response]);
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                });
            });
        })(jQuery)
    </script>



</body>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</html>
