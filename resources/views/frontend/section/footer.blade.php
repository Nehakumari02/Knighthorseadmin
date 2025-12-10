@php

    $basic_settings = App\Models\Admin\BasicSettings::first();
    $useful_links = App\Models\Admin\UsefulLink::where('status', true)->get();
    $app_local = get_default_language_code();
    $default = App\Constants\LanguageConst::NOT_REMOVABLE;
@endphp


<div class="footer-area d-flex justify-content-between p-2 pb-0">
    <div class="copyright-text">
        <p>&copy; {{ date('Y') }}, {{ __('All Rights Reserved.') }} <a class="fw-bold"
                href=""><span>{{ $basic_settings->site_name }}</span></a></p>
    </div>
    <div class="privacy-policy">
        @if (isset($useful_links))
            @foreach ($useful_links as $item)
                <li><a
                        href="{{ setRoute('frontend.link', $item->slug) }}">{{ $item->title->language->$app_local->title ?? ($item->title->language->$default->title ?? '') }}</a>
                </li>
            @endforeach
        @endif

    </div>
</div>
