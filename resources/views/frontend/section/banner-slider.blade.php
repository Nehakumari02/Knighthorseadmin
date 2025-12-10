@php

    $app_local = get_default_language_code() ?? 'en';
    $default = App\Constants\LanguageConst::NOT_REMOVABLE;

    $slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::BANNER_SECTION);
    $banner = App\Models\Admin\SiteSections::getData($slug)->first();

@endphp



<div class="banner-section">
    <div class="banner-slider">
        <div class="swiper-wrapper">
            @foreach ($banner->value->items ?? [] as $item)
                <div class="swiper-slide">
                    <div class="banner-wrapper">
                        <a href="#">
                            <div class="baner-img">
                                <img
                                    src="{{ isset($item->image) ? get_image($item->image, 'site-section') : asset('path/to/default/image.jpg') }}"}}">
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class=" pt-3"></div>
</div>


