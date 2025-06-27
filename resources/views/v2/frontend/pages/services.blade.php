    @extends('v2.frontend.layout.master')

    @section('content')
        <section class="px_service_wrapper px_padderBottom80 px-dark-light-section-new px-bg-none px_padderTop80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center mb-4">
                        <h1 class="px_heading px_heading_center">our services</h1>
                        <p class="px_font14 px_padderBottom5" style="max-width: 700px; word-wrap: break-word; text-align: center; margin: 0 auto;">
    Professional solutions combining ancient Vastu wisdom with modern scientific approaches for holistic well-being.
</p>

                    </div>

                    <div class="d-flex flex-wrap justify-content-center gap-4 w-100">
                        @foreach ($services as $service)
                            <div style="width: 270px;" class="mb-4">
                                <div
                                    class="px_service_box px_service_box01 px_service_box_new text-center px-light-section-new">
                                    <img src="{{ asset('storage/app/public/' . $service->service_icon) }}"
                                        alt="{{ $service->service_title }} Icon" width="80" height="80">

                                    <h4 class="px_subheading"> {{ \Illuminate\Support\Str::limit(strip_tags($service->service_title), 20) }}</h4>

                                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($service->service_details), 80) }}</p>

                                    {{-- <a href="{{ route('front.servicedetail', ['id' => $service->id]) }}"
                                        class="px_link">read more</a> --}}

                                        <a href="{{ route('front.servicedetail', ['id' => $service->id]) }}" class="btn service_99"
                            >Read
                            more</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>
        {{-- @include('layout.components.divider')
        @include('v2.frontend.components.whychooseus')
        @include('layout.components.divider')
        @include('v2.frontend.components.testimonials', ['testimonials' => $testimonials]) --}}

        <style>
    .px_link:hover {
        border-bottom: 1px solid var(--primary-color);
        transition: border-bottom 0.3s ease-in-out;
    }

    .service_99 {
        background: var(--secondary-color);
        color: var(--primary-color);
        border: 1px solid var(--primary-color);
        font-weight: bold;
        scale: 1.1;
        margin-top: 1em;

        &:hover {
            background: var(--primary-color);
            color: var(--secondary-color);
            border: 1px solid var(--secondary-color);
        }
    }
</style>
    @endsection
