@php

    $app_local = get_default_language_code() ?? 'en';
    $default = App\Constants\LanguageConst::NOT_REMOVABLE;

    $slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::BRAND_SECTION);
    $brand = App\Models\Admin\SiteSections::getData($slug)->first();
   
@endphp
<div class="brand-section  ptb-60">
    <div class="container">
        <h3 class="title text-center">{{ $brand->value->language->$app_local->heading ?? ($brand->value->language->$default->heading ?? '') }}</h3>
        <div class="row">
            <div class="brand-slider">
                <div class="swiper-wrapper">
                    @foreach ($brand->value->items as $item)
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <img src="{{ get_image($item?->image, 'site-section') }}" alt="brand">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
