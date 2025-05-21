@extends('v2.frontend.layout.master')

@section('content')
    <section class="px_breadcrum_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>{{ $service->service_title }}</h1>

                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
{{--                        <li>{{ $service->service_title }}</li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="px_servicedetail_wrapper px_padderBottom80 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-9 col-xl-9 col-lg-10 col-md-12 mx-auto">
                    <div class="px_service_detail_inner text-center">

                        {{-- Service Banner --}}
                        <img src="{{ asset('storage/app/public/' . $service->service_banner) }}"
                            alt="{{ $service->service_title }}" class="img-responsive mb-4">

                        {{-- Title --}}
{{--                        <h1 class="px_heading">{{ $service->service_title }}</h1>--}}

                        {{-- Description --}}
                        <p class="px_font14 text-start">{!! nl2br(e($service->service_details)) !!}</p>

                        {{-- Service Images --}}
                        @if ($service->service_images)
                            <div class="row mt-4 justify-content-center">
                                @foreach (json_decode($service->service_images, true) as $index => $image)
                                    <div class="col-lg-4 col-md-4 col-sm-6 px_padderBottom20 text-center">
                                        <a href="{{ asset('storage/app/public/' . $image) }}"
                                            data-lightbox="service-gallery" data-title="Service Image {{ $index + 1 }}">
                                            <img src="{{ asset('storage/app/public/' . $image) }}" alt="Service Image"
                                                class="img-thumbnail"
                                                style="width: 100%; max-width: 300px; height: 200px; object-fit: cover;">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <style>
                            .service-thumb {
                                border-radius: 10px;
                                transition: transform 0.2s ease;
                                cursor: pointer;
                            }

                            .service-thumb:hover {
                                transform: scale(1.03);
                            }
                        </style>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
