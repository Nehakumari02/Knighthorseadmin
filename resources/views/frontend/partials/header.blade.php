@php
    $menues = DB::table('setup_pages')->where('status', 1)->get();
    $language = App\Models\Admin\Language::where('status', 1)->first();
@endphp

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Header
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<header class="header-section animated fadeInDown header-fixed">
    <div class="header">
        <div class="header-bottom-area">
            <div class="container-fluid">
                <div class="header-menu-content">
                    <button class="sidebar-menu-bar">
                        <i class="fas fa-bars"></i>
                    </button>
                    <a class="site-logo site-title" href="{{ route('frontend.index') }}"><img
                            src="{{ get_logo($basic_settings,'dark') }}" alt="site-logo"></a>
                    <form class="header-search-form" action="{{ setRoute('frontend.product.search') }}" method="GET">
                        @csrf
                        <input type="text" class="form--control" name="name"
                            value="{{ request()->input('name') }}"
                            placeholder={{ __("Search for products (e.g. fish, apple, oil)...") }}>
                        <button type="submit" class="header-search-btn">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path fill="none" stroke-miterlimit="10" stroke-width="32"
                                    d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"></path>
                                <path fill="none" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32"
                                    d="M338.29 338.29L448 448"></path>
                            </svg>
                        </button>
                    </form>
                    <div class="header-mobile-search-area">
                        <a href="#0" class="header-mobile-search-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 14.053 14">
                                <g id="Group_142972" data-name="Group 14297" transform="translate(0.5 0.5)">
                                    <g id="_x32_-Magnifying_Glass2">
                                        <path id="Path_4" data-name="Path 3"
                                            d="M19.7,19.162l-2.954-2.954a5.685,5.685,0,1,0-.535.535L19.162,19.7a.378.378,0,1,0,.535-.535ZM9,15.954a4.915,4.915,0,1,1,3.475,1.44A4.884,4.884,0,0,1,9,15.954Z"
                                            transform="translate(-6.808 -6.808)" fill="#333e48" stroke="#333e48"
                                            stroke-width="1"></path>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <form class="header-mobile-search-form-area" method="POST"
                            action="{{ route('frontend.product.search') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="text" value="5" name="keyword" placeholder="Search for products....."
                                value="{{ request()->input('name') }}" hidden>
                            <button type="submit">here</button>
                        </form>
                        <div class="header-mobile-search-form-area">

                            <form class="header-mobile-search-form" action="{{ setRoute('frontend.product.search') }}"
                                method="GET">
                                @csrf
                                <input type="search" value="{{ request()->input('name') }}" name="name"
                                    placeholder="Search for products.....">
                                <button class="header-search-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 14.053 14">
                                        <g id="Group_14297" data-name="Group 14297" transform="translate(0.5 0.5)">
                                            <g id="_x32_-Magnifying_Glass">
                                                <path id="Path_3" data-name="Path 3"
                                                    d="M19.7,19.162l-2.954-2.954a5.685,5.685,0,1,0-.535.535L19.162,19.7a.378.378,0,1,0,.535-.535ZM9,15.954a4.915,4.915,0,1,1,3.475,1.44A4.884,4.884,0,0,1,9,15.954Z"
                                                    transform="translate(-6.808 -6.808)" fill="#333e48" stroke="#333e48"
                                                    stroke-width="1"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="header-action-wrapper">
                        <button class="dot-btn">
                            <i class="las la-ellipsis-v"></i>
                        </button>
                        <div class="header-threedot-btn">
                            @php
                                $currentAreaId = \App\Models\Admin\Product::getCurrentAreaFilter();
                                $areas = App\Models\Admin\Area::where('status', true)->get();
                            @endphp
                            @if ($areas->count())
                                <div class="area-switcher">
                                    <select class="location-select nice-select" name="area_switcher">
                        
                                        @foreach ($areas as $area)
                                            <option value="{{ $area->id }}"
                                                {{ $currentAreaId == $area->id ? 'selected' : '' }}>
                                                {{ __($area->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            <div class="lang-select">
                                @php
                                    $session_lan = session('local') ?? get_default_language_code();

                                @endphp
                                <select class="form--control langSel nice-select" name="lang_switcher"
                                    style="display: none;">
                                    @foreach ($__languages as $item)
                                        <option value="{{ $item->code }}"
                                            @if ($session_lan == $item->code) selected @endif>{{ __($item->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="button" class="cart-btn-wrapper cart-icon"><i
                                    class="las la-shopping-bag"></i> <span class="cart-number">0</span></button>
                            <div class="header-action">
                                @if (Auth::guard('web')->check())
                                    <div class="header-action">
                                        <div class="header-profile-wrapper">
                                            <button class="profile-icon btn--base">
                                                <img src="{{ auth()->user()->userImage ?? '' }}" alt="client">
                                            </button>
                                            <div class="profile-wrapper">
                                                <ul class="profile-list">
                                                    <li>
                                                        <div class="title-area">
                                                            <a
                                                                href="{{ route('user.dashboard') }}">{{ __('Your Profile') }}</a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="title-area">
                                                            <a
                                                                href="{{ route('user.order.details.index') }}">{{ __('Your Orders') }}</a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="title-area">
                                                            <a
                                                                href="{{ route('user.order.details.payment.history') }}">{{ __('Payment History') }}</a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="title-area">
                                                            <a href="javascript:void(0)" class="logout-btn">
                                                                <i class="menu-icon las la-sign-out-alt"></i>
                                                                <span class="menu-title">{{ __('Logout') }}</span>
                                                            </a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <button type="button" class="btn--base header-account-btn active">
                                        <img src="{{ asset('public/frontend/images/icon/account.png') }}"
                                            alt="img">
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<section class="account {{ session('from_checkout') ? 'active' : '' }}">
    <div class="account-area">
        <span class="account-cross-btn"></span>
        <div class="account-wrapper change-form">
            <form>
                <div class="account-logo text-center">
                    <a class="site-logo site-title" href="{{ route('frontend.index') }}"><img
                            src="{{ get_logo($basic_settings,'dark') }}" alt="site-logo"></a>
                </div>
                <h4 class="title">{{ __('Login Your Account') }}</h4>
                <div class="login-item">
                    <a href="{{ route('user.otp.login') }}" class="btn--base btn w-100"><i
                            class="las la-phone-volume"></i>{{ __('Login with phone number') }}</a>
                </div>
                <div class="login-item">
                    <a href="{{ route('user.auth.google') }}" class="btn--base btn w-100"><i
                            class="lab la-google"></i>{{ __('Login with Google') }}</a>
                </div>
                <div class="login-item">
                    <a href="{{ route('user.login') }}" class="btn--base btn w-100"><i
                            class="las la-envelope"></i>{{ __('Login with Email') }}</a>
                </div>
            </form>
        </div>
    </div>
</section>
{{-- @dd(get_default_language_dir()); --}}


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Header
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


@push('script')
    <script>
        $(document).on('click', '.profile-icon', function() {
            $('.cart-bar').removeClass('show');
        });
    </script>
    <script>
        $(".logout-btn").click(function() {

            var actionRoute = "{{ setRoute('user.logout') }}";
            var target = 1;
            var message = `{{ __('Are you sure to') }} <strong>{{ __('Logout') }}</strong>?`;

            openAlertModal(actionRoute, target, message, "{{ __('Logout') }}", "POST");
            /**
             * Function for open delete modal with method DELETE
             * @param {string} URL
             * @param {string} target
             * @param {string} message
             * @returns
             */
            function openAlertModal(URL, target, message, actionBtnText = "{{ __('Remove') }}",
                method =
                "DELETE") {
                if (URL == "" || target == "") {
                    return false;
                }

                if (message == "") {
                    message = "Are you sure to delete ?";
                }
                var method = `<input type="hidden" name="_method" value="${method}">`;
                openModalByContent({
                        content: `<div class="card modal-alert border-0">
        <div class="card-body">
            <form method="POST" action="${URL}">
                <input type="hidden" name="_token" value="${laravelCsrf()}">
                ${method}
                <div class="head mb-3">
                    ${message}
                    <input type="hidden" name="target" value="${target}">
                </div>
                <div class="foot d-flex align-items-center justify-content-between">
                    <button type="button" class="modal-close btn--close btn-for-modal">{{ __('Close') }}</button>
                    <button type="submit"
                        class="btn--danger modal-close btn--base btn-for-modal">${actionBtnText}</button>
                </div>
            </form>
        </div>
    </div>`,
                    },

                );
            }
        });
    </script>
    <script>
        function laravelCsrf() {
            return $("head meta[name=csrf-token]").attr("content");
        }
    </script>
    <script>
        $("select[name=lang_switcher]").change(function() {

            var selected_value = $(this).val();
            var submitForm =
                `<form action="{{ route('frontend.languages.switch') }}" id="local_submit" method="POST"> @csrf <input type="hidden" name="target" value="${$(this).val()}" ></form>`;
            $("body").append(submitForm);

            $("#local_submit").submit();
        });
    </script>

    <script>
        $("select[name=area_switcher]").change(function() {
            var selected_value = $(this).val(); 
            var submitForm =
                `<form action="{{ route('frontend.area.switch') }}" id="local_submit" method="POST"> @csrf <input type="hidden" name="area_id" value="${$(this).val()}" ></form>`;
            $("body").append(submitForm);

            $("#local_submit").submit();
        });
    </script>
@endpush
