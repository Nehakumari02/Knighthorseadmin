{{-- @php
    $app_local = get_default_language_code();
    $default = App\Constants\LanguageConst::NOT_REMOVABLE;
    $slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::FOOTER_SECTION);
    $footer = App\Models\Admin\SiteSections::getData($slug)->first();

    $usefull_links = App\Models\Admin\UsefulLink::where('status', true)->get();
@endphp --}}

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Footer
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
{{-- <footer class="footer-section bg-overlay-footer bg_img"
    data-background="{{ asset('public/frontend/images/element/footer-bg.webp') }}">
    <div class="container">
        <div class="footer-area">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8 col-md-10">
                    <div class="footer-logo">
                        <a href="index.html"> <img src="{{ get_logo($basic_settings) }}" alt="logo"></a>
                    </div>
                    <div class="footer-social-icon">
                        @foreach ($footer->value->contact->social_links ?? [] as $item)
                            <a href="{{ $item->link ?? '' }}"><i class="{{ $item->icon ?? '' }}"></i></a>
                        @endforeach
                    </div>
                    <div class="footer-content">
                        <p>{{ $footer->value->contact->language->$app_local->contact_desc ?? ($footer->value->contact->language->$default->contact_desc ?? '') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="copyright-area">
                <div class="left-side">
                    <div class="copyright-text">
                        <p>{{ __('Copyright') }} &copy; {{ date('Y') }}, {{ __('All Right Reserved') }}
                            <a>{{ $basic_settings->site_name }}</a></p>
                    </div>
                </div>
                <div class="right-side">
                    <div class="page-link-item">
                        @if (isset($usefull_links))
                            @foreach ($usefull_links as $item)
                                <li><a
                                        href="{{ setRoute('frontend.link', $item->slug) }}">{{ $item->title->language->$app_local->title ?? ($item->title->language->$default->title ?? '') }}</a>
                                </li>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer> --}}
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Footer
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
