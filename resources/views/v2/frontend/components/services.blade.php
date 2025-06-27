<section class="px_service_wrapper px_padderBottom80 px-dark-light-section-new px-bg-none px_padderTop80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <h1 class="px_heading px_heading_center">our services</h1>
                <p class="px_font14 px_padderBottom5"
                    style="max-width: 600px;
  margin: 0 auto; /* Center the container horizontally */
  text-align: center; /* Center the text inside */
  word-wrap: break-word;
  overflow-wrap: break-word;
  white-space: normal;">
                    Professional solutions combining ancient Vastu wisdom with
                    modern scientific approaches for holistic well-being.
                </p>
            </div>

            @foreach ($services as $service)
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mb-4">
                    <div class="px_service_box px_service_box01 px_service_box_new text-center px-light-section-new">
                        <img src="{{ asset('storage/app/public/' . $service->service_icon) }}"
                            alt="{{ $service->service_title }} Icon" width="80" height="80">

                        <h4 class="px_subheading">
                            {{ \Illuminate\Support\Str::limit(strip_tags($service->service_title), 23) }}</h4>

                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($service->service_details), 80) }}</p>

                        {{-- <a href="{{ route('front.servicedetail', ['id' => $service->id]) }}" class="px_link">read
                            more</a> --}}

                        <a href="{{ route('front.servicedetail', ['id' => $service->id]) }}" class="btn service_99"
                            >Read
                            more</a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div class="text-center mt-4">
        <a href="{{ route('front.services') }}" class="btn"
            style="background: var(--primary-color); color: var(--secondary-color);font-weight:bold; scale:1.1;margin-top:1em;">See
            more</a>
    </div>
</section>

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
@include('layout.components.divider')
