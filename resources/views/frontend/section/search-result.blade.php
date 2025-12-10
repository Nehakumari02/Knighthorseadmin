<!-- serching data -->

<section class="parlour-list-area pt-80">
    <div class="container">
        <div class="row justify-content-center mb-20-none">
            @foreach ($parlour_lists ?? [] as $item)
                <div class="col-lg-4 col-md-6 col-sm-10 mb-20">
                    <div class="parlor-item">
                        <div class="parlor-img">
                            <img src="{{ get_image($item->image, 'site-section') }}" alt="img">
                        </div>
                        <div class="parlor-details">
                            <h3 class="title">{{ $item->name ?? '' }}</h3>
                            <p>{{ $item->manager_name ?? '' }}</p>
                            <p>{{ $item->experience ?? '' }} {{ __("Year Experience") }}</p>
                            <p>{{ $item->address ?? '' }}</p>
                        </div>
                        <div class="booking-btn pt-2">
                            <a href="{{ setRoute('frontend.get.service.index', $item->slug) }}" class="btn--base w-100">{{ __("Get Service") }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
