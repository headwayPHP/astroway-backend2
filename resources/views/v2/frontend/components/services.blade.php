<section class="px_service_wrapper px_padderBottom80 px-dark-light-section-new px-bg-none px_padderTop80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <h1 class="px_heading px_heading_center">our services</h1>
                <p class="px_font14 px_padderBottom5">
                    Professional solutions combining ancient Vastu wisdom with
                    modern scientific approaches for holistic well-being.
                </p>
            </div>

            @foreach ($services as $service)
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mb-4">
                    <div class="px_service_box px_service_box01 px_service_box_new text-center px-light-section-new">
                        <img src="{{ asset('storage/app/public/' . $service->service_icon) }}"
                             alt="{{ $service->service_title }} Icon" width="80" height="80">

                        <h4 class="px_subheading"> {{ \Illuminate\Support\Str::limit(strip_tags($service->service_title), 25) }}</h4>

                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($service->service_details), 80) }}</p>

                        <a href="{{ route('front.servicedetail', ['id' => $service->id]) }}" class="px_link">read
                            more</a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
