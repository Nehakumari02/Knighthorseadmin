@php
    $sub_category = App\Models\Admin\Category::with('sub_category')->where('status', true)->get();
    $default_lang_code = language_const()::NOT_REMOVABLE;
    $system_default_lang = get_default_language_code();

@endphp

<div class="sidebar {{ request()->routeIs(['user.login', 'user.register', 'user.password.forgot']) ? 'active' : '' }}">
    <div class="sidebar-inner">
        <div class="sidebar-menu-wrapper">
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <a href="{{ route('frontend.index') }}">
                        <img src="{{ asset('public/frontend/images/icon/popular.png') }}" alt="img">
                        <span class="menu-title">{{ __('Popular') }}</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="{{ route('frontend.offer.section') }}">
                        <img src="{{ asset('public/frontend/images/icon/special_offer.png') }}" alt="img">
                        <span class="menu-title">{{ __('Special Offer') }}</span>
                    </a>
                </li>
                @foreach ($sub_category as $item)
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="{{ 'javascript:void(0) '}}" title="{{ $item->data->language->$system_default_lang->name }}">
                            <img src="{{ get_image($item->image, 'site-section') }}" alt="img">
                            <span class="menu-title">{{ $item->data->language->$system_default_lang->name }}</span>
                        </a>
                        @foreach ($item->sub_category as $data)
                            <ul class="sidebar-submenu">
                                <li class="sidebar-menu-item">
                                    <a href="{{ route('frontend.product.list', $data->slug) }}" class="nav-link">
                                        <img src="{{ get_image($data->image, 'site-section') }}" alt="img">
                                        <span
                                            class="menu-title">{{ $data->data->language->$system_default_lang->name }}</span>
                                    </a>
                                </li>
                            </ul>
                        @endforeach
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="sidebar-doc-box bg_img" data-background="{{ asset('public/frontend/images/element/them.webp') }}">
            <div class="sidebar-doc-icon">
                <i class="las la-headphones-alt"></i>
            </div>
            <div class="sidebar-doc-content">
                <h4 class="title">{{ __('Need Help') }}?</h4>
                <p>{{ __('How can we help you?') }}</p>
                <div class="sidebar-doc-btn">
                    <a href="{{ setRoute('user.support.ticket.index') }}"
                        class="btn--base w-100">{{ __('Get Support') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
