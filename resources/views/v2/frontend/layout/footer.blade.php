@php
    $appName = \App\Models\AdminModel\SystemFlag::where('id', 47)->first();
    $siteEmail = \App\Models\AdminModel\SystemFlag::where('id', 262)->first();
    $siteAddress = \App\Models\AdminModel\SystemFlag::where('id', 263)->first();
    $siteNumber = \App\Models\AdminModel\SystemFlag::where('id', 261)->first();
    $facebook = \App\Models\AdminModel\SystemFlag::where('id', 30)->first();
    $instagram = \App\Models\AdminModel\SystemFlag::where('id', 37)->first();
    $youtube = \App\Models\AdminModel\SystemFlag::where('id', 29)->first();

@endphp
@include('layout.components.divider')
<section class="px_footer_wrapper">
    <div class="container">
        <div class="px_footer_inner">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12" style="transform: translateY(15px);">
                    <div class="px_footer_widget">
                        {{-- <div class="px_footer_logo">
                            <a href="{{ route('front.home') }}">
                                <h2>{{ $appName->value }}</h2>
                            </a>
                        </div> --}}

                         <div class="px_footer_logo" style="display: flex;flex-direction:column; align-items: center;">
                <img src="public/images/logo.png" alt="logo" srcset="" width="100"
                    style="margin-right: 1em; width: 3.1em; scale:1.3;">
                <h3 style="color: white; margin-bottom: unset; margin-top:0.5em;">Dhaval Zaveri</h3>

            </div style="display: flex;flex-direction:column; align-items: center;">

                        <p style="text-align: center;"> No Structural Altration, No Demolition, Vastu Fault Corrections Without Breaking A Single
                            Brick.</p>

                        <div class="px_share_box" style="
    align-items: center;
    display: flex;
    justify-content: center;
">
                            <ul>
                                <li><a href="{{ $facebook->value }}"><img src="public/images/svg/facebook.svg"
                                            alt=""></a>
                                </li>
                                <li><a href="{{ $instagram->value }}"><img src="public/images/svg/instagram.svg"
                                            alt=""></a>
                                </li>
                                {{-- <li><a href="javascript:;"><img src="public/images/svg/google.svg" alt=""></a>
                                </li> --}}
                                <li><a href="{{ $youtube->value }}"><img src="public/images/svg/youtube.svg"
                                            alt=""></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12" style="transform: translateX(20px);">
                    {{-- <div class="px_footer_widget">
                        <h3 class="px_footer_heading">Our Services</h3>
                        <ul>
                            <li><a href="service_detail.html">
                                    <span><svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid"
                                            width="8" height="12" viewBox="0 0 8 12">
                                            <path
                                                d="M8.000,5.998 L-0.002,11.997 L1.292,5.998 L-0.002,-0.001 L8.000,5.998 ZM1.265,9.924 L6.502,5.998 L1.265,2.071 L2.112,5.998 L1.265,9.924 ZM5.451,5.998 L2.496,8.213 L2.974,5.998 L2.496,3.783 L5.451,5.998 Z" />
                                        </svg></span> Vastu Shastra</a></li>
                            <li><a href="service_detail.html">
                                    <span><svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid"
                                            width="8" height="12" viewBox="0 0 8 12">
                                            <path
                                                d="M8.000,5.998 L-0.002,11.997 L1.292,5.998 L-0.002,-0.001 L8.000,5.998 ZM1.265,9.924 L6.502,5.998 L1.265,2.071 L2.112,5.998 L1.265,9.924 ZM5.451,5.998 L2.496,8.213 L2.974,5.998 L2.496,3.783 L5.451,5.998 Z" />
                                        </svg></span> Geopathic Stress</a></li>
                            <li><a href="service_detail.html"><span><svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid"
                                            width="8" height="12" viewBox="0 0 8 12">
                                            <path
                                                d="M8.000,5.998 L-0.002,11.997 L1.292,5.998 L-0.002,-0.001 L8.000,5.998 ZM1.265,9.924 L6.502,5.998 L1.265,2.071 L2.112,5.998 L1.265,9.924 ZM5.451,5.998 L2.496,8.213 L2.974,5.998 L2.496,3.783 L5.451,5.998 Z" />
                                        </svg></span> Sign & Logo Correction</a></li>
                            <li><a href="service_detail.html"><span><svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid"
                                            width="8" height="12" viewBox="0 0 8 12">
                                            <path
                                                d="M8.000,5.998 L-0.002,11.997 L1.292,5.998 L-0.002,-0.001 L8.000,5.998 ZM1.265,9.924 L6.502,5.998 L1.265,2.071 L2.112,5.998 L1.265,9.924 ZM5.451,5.998 L2.496,8.213 L2.974,5.998 L2.496,3.783 L5.451,5.998 Z" />
                                        </svg></span> Aroma Therapy/ Human aura</a></li>
                            <li><a href="service_detail.html"><span><svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid"
                                            width="8" height="12" viewBox="0 0 8 12">
                                            <path
                                                d="M8.000,5.998 L-0.002,11.997 L1.292,5.998 L-0.002,-0.001 L8.000,5.998 ZM1.265,9.924 L6.502,5.998 L1.265,2.071 L2.112,5.998 L1.265,9.924 ZM5.451,5.998 L2.496,8.213 L2.974,5.998 L2.496,3.783 L5.451,5.998 Z" />
                                        </svg></span> Astrology Consultation</a></li>
                        </ul>
                    </div> --}}
                    <div class="px_footer_widget">
                        <h3 class="px_footer_heading">Our Services</h3>
                        <ul>
                            @foreach ($services as $service)
                                <li>
                                    <a href="{{ url('services-details?id=' . $service->id) }}">
                                        <span >
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                preserveAspectRatio="xMidYMid" width="8" height="12"
                                                viewBox="0 0 8 12">
                                                <path
                                                    d="M8.000,5.998 L-0.002,11.997 L1.292,5.998 L-0.002,-0.001 L8.000,5.998 ZM1.265,9.924 L6.502,5.998 L1.265,2.071 L2.112,5.998 L1.265,9.924 ZM5.451,5.998 L2.496,8.213 L2.974,5.998 L2.496,3.783 L5.451,5.998 Z" />
                                            </svg>
                                        </span>
                                        {{ $service->service_title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12" style="transform: translateX(20px);">
                    <div class="px_footer_widget">
                        <h3 class="px_footer_heading">Quick Links</h3>

                        <ul>
                            <li><a href="{{ route('front.aboutus') }}"><span><svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid"
                                            width="8" height="12" viewBox="0 0 8 12">
                                            <path
                                                d="M8.000,5.998 L-0.002,11.997 L1.292,5.998 L-0.002,-0.001 L8.000,5.998 ZM1.265,9.924 L6.502,5.998 L1.265,2.071 L2.112,5.998 L1.265,9.924 ZM5.451,5.998 L2.496,8.213 L2.974,5.998 L2.496,3.783 L5.451,5.998 Z" />
                                        </svg></span> About Us</a></li>
                            <li><a href="{{ route('front.videos') }}"><span><svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid"
                                            width="8" height="12" viewBox="0 0 8 12">
                                            <path
                                                d="M8.000,5.998 L-0.002,11.997 L1.292,5.998 L-0.002,-0.001 L8.000,5.998 ZM1.265,9.924 L6.502,5.998 L1.265,2.071 L2.112,5.998 L1.265,9.924 ZM5.451,5.998 L2.496,8.213 L2.974,5.998 L2.496,3.783 L5.451,5.998 Z" />
                                        </svg></span> Videos</a></li>
                            <li><a href="{{ route('front.services') }}"><span><svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid"
                                            width="8" height="12" viewBox="0 0 8 12">
                                            <path
                                                d="M8.000,5.998 L-0.002,11.997 L1.292,5.998 L-0.002,-0.001 L8.000,5.998 ZM1.265,9.924 L6.502,5.998 L1.265,2.071 L2.112,5.998 L1.265,9.924 ZM5.451,5.998 L2.496,8.213 L2.974,5.998 L2.496,3.783 L5.451,5.998 Z" />
                                        </svg></span> Services</a></li>
                            <li><a href="{{ route('front.appointment') }}"><span><svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid"
                                            width="8" height="12" viewBox="0 0 8 12">
                                            <path
                                                d="M8.000,5.998 L-0.002,11.997 L1.292,5.998 L-0.002,-0.001 L8.000,5.998 ZM1.265,9.924 L6.502,5.998 L1.265,2.071 L2.112,5.998 L1.265,9.924 ZM5.451,5.998 L2.496,8.213 L2.974,5.998 L2.496,3.783 L5.451,5.998 Z" />
                                        </svg></span> Appointment</a></li>
                            <li><a href="{{ route('front.remotebooking') }}"><span><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid"
                                            width="8" height="12" viewBox="0 0 8 12">
                                            <path
                                                d="M8.000,5.998 L-0.002,11.997 L1.292,5.998 L-0.002,-0.001 L8.000,5.998 ZM1.265,9.924 L6.502,5.998 L1.265,2.071 L2.112,5.998 L1.265,9.924 ZM5.451,5.998 L2.496,8.213 L2.974,5.998 L2.496,3.783 L5.451,5.998 Z" />
                                        </svg></span> Remote Booking</a></li>
                            <li><a href="{{ route('front.contact') }}"><span><svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid"
                                            width="8" height="12" viewBox="0 0 8 12">
                                            <path
                                                d="M8.000,5.998 L-0.002,11.997 L1.292,5.998 L-0.002,-0.001 L8.000,5.998 ZM1.265,9.924 L6.502,5.998 L1.265,2.071 L2.112,5.998 L1.265,9.924 ZM5.451,5.998 L2.496,8.213 L2.974,5.998 L2.496,3.783 L5.451,5.998 Z" />
                                        </svg></span> Contact Us</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="px_footer_widget">
                        <h3 class="px_footer_heading">Contact Us</h3>

                        <ul class="px_contact_list">
                            <li>
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    preserveAspectRatio="xMidYMid" viewBox="0 0 14 18" style="scale:2;">
                                    <path
                                        d="M7.000,-0.001 C3.141,-0.001 -0.000,3.049 -0.000,6.798 C-0.000,12.125 6.342,17.625 6.612,17.857 C6.723,17.952 6.861,18.000 7.000,18.000 C7.138,18.000 7.277,17.952 7.388,17.858 C7.658,17.625 14.000,12.125 14.000,6.798 C14.000,3.049 10.859,-0.001 7.000,-0.001 L7.000,-0.001 ZM7.000,10.499 C4.855,10.499 3.111,8.817 3.111,6.749 C3.111,4.681 4.855,2.999 7.000,2.999 C9.144,2.999 10.889,4.681 10.889,6.749 C10.889,8.817 9.144,10.499 7.000,10.499 L7.000,10.499 Z" />
                                </svg> --}}
                                {{-- <i class="fa fa-map-marker" aria-hidden="true"></i> --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
  <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
</svg>
                                 &nbsp;&nbsp;
                                <p>{{ $siteAddress->value }}</p>
                            </li>
                            <li>
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    preserveAspectRatio="xMidYMid" viewBox="0 0 15 14">
                                    <path
                                        d="M13.276,11.784 C13.256,11.918 13.175,12.036 13.056,12.107 C12.982,12.150 12.898,12.173 12.813,12.173 C12.761,12.173 12.710,12.165 12.661,12.149 L6.109,9.968 L12.552,2.408 L4.226,9.341 L0.317,8.039 C0.140,7.981 0.016,7.825 0.001,7.643 C-0.012,7.460 0.086,7.287 0.252,7.203 L14.314,0.050 C14.471,-0.029 14.659,-0.016 14.803,0.083 C14.947,0.184 15.021,0.353 14.995,0.523 L13.276,11.784 ZM6.315,13.813 C6.225,13.932 6.084,13.999 5.938,13.999 C5.889,13.999 5.840,13.992 5.792,13.977 C5.599,13.914 5.469,13.740 5.469,13.543 L5.469,10.720 L8.011,11.566 L6.315,13.813 Z" />
                                </svg> --}}
                                <i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;&nbsp;
                                <p>
                                    <a href="mailto:{{ $siteEmail->value }}">{{ $siteEmail->value }}</a>
                                    <!-- <a href="javascript:;">Support@example.com</a> -->
                                </p>
                            </li>
                            <li>
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    preserveAspectRatio="xMidYMid" viewBox="0 0 14 14">
                                    <path
                                        d="M13.858,7.341 C13.768,7.432 13.645,7.483 13.517,7.483 C13.250,7.483 13.034,7.267 13.034,7.000 C13.030,3.669 10.331,0.970 7.000,0.965 C6.733,0.965 6.517,0.749 6.517,0.482 C6.517,0.216 6.733,-0.000 7.000,-0.000 C10.864,0.004 13.995,3.135 14.000,7.000 C14.000,7.128 13.949,7.251 13.858,7.341 ZM10.620,7.000 C10.618,5.001 8.999,3.381 7.000,3.379 C6.733,3.379 6.517,3.163 6.517,2.897 C6.517,2.630 6.733,2.414 7.000,2.414 C9.532,2.416 11.583,4.468 11.586,7.000 C11.586,7.267 11.370,7.483 11.103,7.483 C10.837,7.483 10.620,7.267 10.620,7.000 ZM9.005,9.909 C9.153,9.928 9.302,9.876 9.407,9.771 L10.488,8.689 C10.647,8.531 10.894,8.503 11.085,8.622 L13.758,10.343 C13.969,10.476 14.044,10.745 13.933,10.968 L12.632,13.732 C12.543,13.911 12.352,14.017 12.152,13.997 C10.776,13.852 7.394,13.253 4.070,9.929 C0.747,6.605 0.147,3.223 0.002,1.847 C-0.018,1.647 0.088,1.456 0.268,1.367 L3.032,0.065 C3.254,-0.046 3.525,0.030 3.657,0.241 L5.379,2.915 C5.498,3.105 5.470,3.353 5.311,3.512 L4.229,4.593 C4.123,4.698 4.072,4.847 4.091,4.995 C4.159,5.530 4.461,6.866 5.797,8.203 C7.134,9.539 8.470,9.840 9.005,9.909 Z" />
                                </svg> --}}
                                <i class="fa fa-phone" aria-hidden="true"></i> &nbsp;&nbsp;
                                <p>
                                    <a href="tel:+91{{ preg_replace('/\D/', '', $siteNumber->value) }}">+ (91)
                                        {{ $siteNumber->value }}</a><br>
                                    <!-- <a href="javascript:;">+ (91) 1800-326-324</a> -->
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<div class="px_copyright_wrapper text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; 2025 {{ $appName->value }}. All Right Reserved.</p>
            </div>
        </div>
    </div>
</div>
