@php
    $app_local = get_default_language_code();
    $default = App\Constants\LanguageConst::NOT_REMOVABLE;

    $slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::DOWNLOAD_APP_SECTION);
    $download_app = App\Models\Admin\SiteSections::getData($slug)->first();
  
@endphp

<div class="app-section mt-40 bg-overlay-base bg_img" id="overview"
    data-background="{{ asset('public/frontend/images/element/background-bg.png') }}"
    style="background-image: url('{{ asset('public/frontend/images/element/background-bg.png') }}');">

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="app-area">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-12 col-md-12 pb-20">
                        <div class="apk-img">
                            <img src="{{ get_image($download_app?->value?->image, 'site-section') }}" alt="img">
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-12 col-md-12">
                        <div class="get-app">
                            <h2>{{ $download_app->value->language->$app_local->heading ?? ($download_app->value->language->$default->heading ?? '') }}.
                            </h2>
                            <p>{{ $download_app->value->language->$app_local->sub_heading ?? ($download_app->value->language->$default->sub_heading ?? '') }}
                            </p>
                        </div>
                        <div class="app-btn-wrapper pt-3">
                            <div class="img-1 apps-sorch">
                                @foreach ($download_app->value->items ?? [] as $item)
                                    <a href="{{ $item->link }}" class="app-btn">

                                        <div class="content">
                                            <span>{{ $item->language->$app_local->item_title ?? ($item->language->$default->item_title ?? '') }}</span>
                                            <h5 class="title">
                                                {{ $item->language->$app_local->item_heading ?? ($item->language->$default->item_heading ?? '') }}
                                            </h5>
                                        </div>
                                        <div class="app-icon">
                                            <i class="{{ $item->icon ?? '' }}"></i>
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
