<?php $__env->startSection('content'); ?>
    <?php
        $videos = \App\Models\AstrologerModel\AstrologyVideo::where('isActive', 1)
            ->where('isDelete', 0)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
        $videoSrc = \App\Models\AdminModel\SystemFlag::find(66)?->value;
    ?>
    <section class="px-banner-new-wrapper">
        <video autoplay loop muted playsinline class="px-banner-video">
            <source src="<?php echo e($videoSrc); ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Dark Overlay -->
        <div class="px-banner-overlay"></div>

        <div class="px-banner-new-box">
            <h2>Vastu Shastra, Astrology, Numerology</h2>
            <h1>Solve your problems, <br />Achieve your goals</h1>
            <!-- <a href="javascript:void(0);" class="px_btn">get started</a> -->
        </div>
    </section>



    <!-- Client Logo Marquee -->
    

    <div class="client-marquee">
        <div class="marquee-container">
            <div class="marquee-track">
                <!-- First set of client logos -->
                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($client->client_image): ?>
                        <img src="<?php echo e(asset('storage/app/public/' . $client->client_image)); ?>"
                            alt="<?php echo e($client->client_name); ?>">
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <!-- Duplicate set for seamless looping -->
                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($client->client_image): ?>
                        <img src="<?php echo e(asset('storage/app/public/' . $client->client_image)); ?>"
                            alt="<?php echo e($client->client_name); ?>">
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <section class="px_about_wrapper px_about_wrapper_new px_padderTop80 px_padderBottom80 px-dark-section-new px-bg-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="pxAboutImg">
                        <img src="public/images/about-sec.png" alt="" class="img-responsive">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <h1 class="px_heading">We believe in Results.</h1>
                    <p>With 15+ years of experience, Dhaval Zaveri has transformed thousands of spaces using Vastu
                        Shastra principles. His unique "No Demolition" correction technique has helped clients
                        worldwide achieve remarkable improvements in their living and working environments.</p>
                    <p>As a Civil Engineer and Vastu expert, Dhaval combines ancient wisdom with modern scientific
                        approaches. He has successfully completed over 10,000 case studies, helping more than 5,000
                        clients resolve problems related to health, wealth, and relationships through Vastu and
                        Astrology.</p>
                    <p>Our mission is to spread happiness, wealth, and peace by applying Indian energy dynamics to
                        modern spaces. We offer customized solutions that work without structural changes, verified
                        through scientific instruments and client results.</p>
                    <!-- <a href="javascript:;" class="px_btn">read more</a> -->
                </div>
            </div>
        </div>
    </section>
    
    <?php echo $__env->make('v2.frontend.components.services', ['services' => $limitedServices], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="px_zodiac_sign_wrapper px_padderTop80 px_padderBottom80 px-dark-section-new">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="px_heading px_heading_center">Vastu Energy Assessment</h1>
                    <p class="px_font14 px_margin0" style="margin-bottom: 2em;">Vastu Shastra redefined is the
                        science of how 16 directions and
                        5 cosmic elements influence human energy within built spaces. <br>We apply modern energy
                        correction techniques to harmonize your environment without structural changes, customized
                        to your astrological profile.</p>


                    <div class="px_zodiac_inner text-left">
                        <div class="row px_verticle_center">
                            <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                                <ul class="px_sign_ul">
                                    <li class="px_sign_box" style="display: none;">
                                        <a href="javascript:;">

                                            <div class="px_sign_text">
                                                <h6>East - Air</h6>
                                                <p>Indra(Prosperity)</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="px_sign_box">
                                        <a href="javascript:;">

                                            <div class="px_sign_text">
                                                <h6>North - Water</h6>
                                                <p>Kuber(Wealth)</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="px_sign_box">
                                        <a href="javascript:;">

                                            <div class="px_sign_text">
                                                <h6>South - Fire</h6>
                                                <p>Yama(Discipline)</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="px_sign_box">
                                        <a href="javascript:;">

                                            <div class="px_sign_text">
                                                <h6>West - Space</h6>
                                                <p>Varun(Rain)</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="px_sign_box">
                                        <a href="javascript:;">

                                            <div class="px_sign_text">
                                                <h6>Northeast - Water + Air</h6>
                                                <p>Ishaan(Spirituality)</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="px_sign_box" style="display: none;">
                                        <a href="javascript:;">

                                            <div class="px_sign_text">
                                                <h6>Southeast - Fire</h6>
                                                <p>Agni(Energy)</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-12" style="z-index: 99;">
                                <div class="px_sign_img text-center">
                                    <img src="public/images/zodiac.png" alt="" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                                <ul class="px_sign_ul px_sign_ul_right">
                                    <li class="px_sign_box" style="display: none;">
                                        <a href="javascript:;">

                                            <div class="px_sign_text">
                                                <h6>Northwest - Air</h6>
                                                <p>Vayu(Movement)</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="px_sign_box">
                                        <a href="javascript:;">

                                            <div class="px_sign_text">
                                                <h6>Southwest - Earth</h6>
                                                <p>Niruti(Stability)</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="px_sign_box">
                                        <a href="javascript:;">

                                            <div class="px_sign_text">
                                                <h6>Southeast - Fire</h6>
                                                <p>Agni(Energy)</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="px_sign_box">
                                        <a href="javascript:;">

                                            <div class="px_sign_text">
                                                <h6>Northwest - Air</h6>
                                                <p>Vayu(Movement)</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="px_sign_box">
                                        <a href="javascript:;">

                                            <div class="px_sign_text">
                                                <h6>Southeast - Fire</h6>
                                                <p>Agni(Energy)</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="px_sign_box" style="display: none;">
                                        <a href="javascript:;">

                                            <div class="px_sign_text">
                                                <h6>Pisces</h6>
                                                <p>Mar 21 - Apr 19</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <section class="px_know_sign_wrapper px_padderTop80 px_padderBottom80 px-dark-light-section-new px-bg-none">
                                                                                                                                                                                                                            <div class="container">
                                                                                                                                                                                                                                <div class="row">
                                                                                                                                                                                                                                    <div class="col-lg-12 text-center">
                                                                                                                                                                                                                                        <h1 class="px_heading px_heading_center">Know Your Zodiac Sign</h1>
                                                                                                                                                                                                                                        <p class="px_font14 px_margin0 px_padderBottom50">Consectetur adipiscing elit, sed do eiusmod
                                                                                                                                                                                                                                            tempor incididuesdeentiut labore <br>etesde dolore magna aliquapspendisse and the gravida.
                                                                                                                                                                                                                                        </p>


                                                                                                                                                                                                                                        <div class="px_sign_form text-left px-light-section-new">
                                                                                                                                                                                                                                            <ul>
                                                                                                                                                                                                                                                <li class="px_form_box">
                                                                                                                                                                                                                                                    <h3 class="px_subheading">Date Of Birth</h3>
                                                                                                                                                                                                                                                    <div class="px_input_feild">
                                                                                                                                                                                                                                                        <input type="text" class="px-dark-section-new form-control px_datepicker"
                                                                                                                                                                                                                                                            placeholder="DD/MM/YYYY">
                                                                                                                                                                                                                                                        <span><img src="public/images/svg/date.svg" alt=""></span>
                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                </li>
                                                                                                                                                                                                                                                <li class="px_form_box">
                                                                                                                                                                                                                                                    <h3 class="px_subheading">Time Of Birth</h3>
                                                                                                                                                                                                                                                    <div class="px_input_feild">
                                                                                                                                                                                                                                                        <input type="text" class="px-dark-section-new form-control px_timepicker"
                                                                                                                                                                                                                                                            placeholder="08:00">
                                                                                                                                                                                                                                                        <span><img src="public/images/svg/time.svg" alt=""></span>
                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                </li>
                                                                                                                                                                                                                                                <li class="px_form_box">
                                                                                                                                                                                                                                                    <h3 class="px_subheading">Place Of Birth</h3>
                                                                                                                                                                                                                                                    <div class="px_input_feild">
                                                                                                                                                                                                                                                        <input type="text" class="px-dark-section-new form-control"
                                                                                                                                                                                                                                                            placeholder="Enter City Name....">
                                                                                                                                                                                                                                                        <span><img src="public/images/svg/map1.svg" alt=""></span>
                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                </li>
                                                                                                                                                                                                                                                <li class="px_form_box">
                                                                                                                                                                                                                                                    <a href="javascript:;" class="px_btn">find zodiac</a>
                                                                                                                                                                                                                                                </li>
                                                                                                                                                                                                                                            </ul>
                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                        </section> -->
    <?php echo $__env->make('v2.frontend.components.testimonials', $testimonials, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php echo $__env->make('v2.frontend.components.whychooseus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="px_blog_wrapper px_blog_wrapper_new px_padderTop80 px_padderBottom80 px-dark-section-new px-bg-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="px_heading px_heading_center">Our Latest Videos</h1>
                    <p class="px_font14 px_margin0 px_padderBottom20">Discover powerful Vastu remedies and
                        transformations<br>Direct from our certified Vastu consultant with 20+ years experience.</p>

                    <div class="text-left">
                        <div class="row">
                            <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="px_blog_box">
                                        <div class="px_blog_img" style="height: 300px; overflow: hidden;">
                                            <a href="<?php echo e($video->youtubeLink); ?>" target="_blank">
                                                <img src="<?php echo e($video->coverImage); ?>" alt="" class="img-responsive"
                                                    style="width: 100%; height: 100%; object-fit: cover;">
                                                <div class="instagram-hover">
                                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/GLAM_icon_externalLink-ltr.svg/800px-GLAM_icon_externalLink-ltr.svg.png"
                                                        alt="Instagram" class="instagram-icon">
                                                </div>
                                                <span class="px_btn">July 29, 2024</span>
                                            </a>
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="javascript:;">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        preserveAspectRatio="xMidYMid" width="19" height="16"
                                                        viewBox="0 0 15 16">
                                                        <path
                                                            d="M14.393,15.913 C14.264,15.970 14.131,15.997 13.999,15.997 C13.853,15.997 13.709,15.963 13.575,15.893 C13.293,15.747 13.089,15.469 13.000,15.108 C12.724,13.988 12.254,13.098 11.563,12.387 C10.005,10.783 8.158,10.249 6.076,10.801 C4.056,11.336 2.703,12.713 2.053,14.893 C1.787,15.786 1.331,16.140 0.698,15.945 C0.406,15.855 -0.237,15.517 0.091,14.319 C1.053,10.795 4.048,8.452 7.543,8.482 C11.088,8.515 14.063,10.930 14.946,14.492 C15.112,15.159 14.905,15.691 14.393,15.913 ZM7.497,7.509 C7.495,7.509 7.493,7.509 7.491,7.509 C6.526,7.508 5.619,7.115 4.937,6.405 C4.255,5.693 3.880,4.750 3.882,3.748 C3.884,2.748 4.263,1.806 4.949,1.095 C5.633,0.387 6.537,-0.003 7.496,-0.003 C7.499,-0.003 7.502,-0.003 7.505,-0.003 C9.494,0.003 11.111,1.692 11.109,3.761 C11.109,4.764 10.732,5.706 10.048,6.414 C9.366,7.121 8.460,7.509 7.497,7.509 ZM8.617,2.608 C8.325,2.302 7.935,2.132 7.519,2.131 C7.517,2.131 7.515,2.131 7.513,2.131 C6.614,2.131 5.933,2.833 5.928,3.767 C5.926,4.191 6.087,4.595 6.382,4.903 C6.681,5.216 7.077,5.388 7.497,5.389 C7.497,5.389 7.497,5.389 7.497,5.389 C8.360,5.389 9.066,4.661 9.070,3.766 C9.072,3.329 8.911,2.917 8.617,2.608 Z">
                                                        </path>
                                                    </svg>
                                                    By - Admin
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        preserveAspectRatio="xMidYMid" width="19" height="16"
                                                        viewBox="0 0 19 16">
                                                        <path
                                                            d="M18.247,11.278 C17.745,12.069 17.056,12.738 16.180,13.283 C16.250,13.466 16.323,13.632 16.397,13.783 C16.472,13.935 16.560,14.081 16.662,14.221 C16.765,14.361 16.844,14.471 16.901,14.551 C16.957,14.631 17.049,14.742 17.176,14.886 C17.303,15.029 17.385,15.124 17.420,15.170 C17.427,15.177 17.441,15.194 17.462,15.221 C17.484,15.247 17.500,15.266 17.510,15.278 C17.521,15.289 17.535,15.308 17.552,15.334 C17.570,15.360 17.582,15.382 17.590,15.396 L17.616,15.453 C17.616,15.453 17.623,15.476 17.638,15.522 C17.651,15.567 17.653,15.592 17.643,15.595 C17.632,15.599 17.629,15.624 17.632,15.669 C17.611,15.775 17.565,15.858 17.494,15.919 C17.424,15.979 17.345,16.005 17.261,15.999 C16.908,15.946 16.603,15.885 16.349,15.817 C15.260,15.513 14.278,15.029 13.402,14.362 C12.765,14.483 12.144,14.544 11.536,14.544 C9.620,14.544 7.952,14.044 6.531,13.045 C6.941,13.074 7.252,13.089 7.464,13.089 C8.602,13.089 9.694,12.919 10.740,12.579 C11.786,12.237 12.719,11.749 13.539,11.113 C14.423,10.416 15.102,9.612 15.575,8.704 C16.049,7.795 16.285,6.833 16.285,5.818 C16.285,5.235 16.204,4.659 16.041,4.091 C16.953,4.629 17.674,5.303 18.204,6.113 C18.734,6.924 18.999,7.795 18.999,8.727 C18.999,9.636 18.749,10.486 18.247,11.278 ZM11.212,10.857 C10.064,11.376 8.814,11.636 7.464,11.635 C6.856,11.635 6.234,11.574 5.598,11.453 C4.722,12.120 3.739,12.605 2.650,12.908 C2.396,12.976 2.092,13.036 1.739,13.089 L1.707,13.089 C1.629,13.089 1.557,13.059 1.489,12.999 C1.423,12.938 1.382,12.858 1.367,12.760 C1.360,12.737 1.357,12.713 1.357,12.687 C1.357,12.661 1.359,12.635 1.362,12.613 C1.366,12.589 1.373,12.567 1.383,12.545 L1.410,12.488 C1.410,12.488 1.423,12.467 1.447,12.426 C1.472,12.384 1.486,12.365 1.489,12.369 C1.493,12.373 1.509,12.353 1.538,12.312 C1.566,12.270 1.580,12.253 1.580,12.261 C1.615,12.215 1.697,12.121 1.824,11.977 C1.951,11.833 2.043,11.721 2.099,11.642 C2.156,11.562 2.235,11.452 2.338,11.312 C2.441,11.172 2.529,11.026 2.603,10.875 C2.677,10.724 2.749,10.557 2.821,10.375 C1.944,9.830 1.255,9.159 0.753,8.363 C0.251,7.569 -0.000,6.720 -0.000,5.818 C-0.000,4.766 0.332,3.793 0.997,2.898 C1.661,2.005 2.568,1.298 3.716,0.780 C4.865,0.260 6.114,0.001 7.464,0.001 C8.815,0.001 10.064,0.260 11.212,0.780 C12.361,1.298 13.267,2.005 13.932,2.898 C14.596,3.793 14.928,4.766 14.928,5.818 C14.928,6.871 14.596,7.845 13.932,8.738 C13.267,9.632 12.361,10.339 11.212,10.857 ZM12.739,3.648 C12.184,2.974 11.437,2.440 10.497,2.046 C9.556,1.652 8.546,1.456 7.464,1.456 C6.383,1.456 5.372,1.652 4.432,2.046 C3.492,2.440 2.744,2.974 2.190,3.648 C1.635,4.322 1.357,5.045 1.357,5.818 C1.357,6.439 1.545,7.038 1.919,7.614 C2.294,8.190 2.820,8.689 3.499,9.114 L4.527,9.749 L4.156,10.704 C4.396,10.553 4.616,10.405 4.813,10.261 L5.280,9.909 L5.842,10.023 C6.394,10.128 6.934,10.181 7.464,10.181 C8.546,10.181 9.556,9.984 10.497,9.591 C11.437,9.197 12.184,8.662 12.739,7.988 C13.294,7.314 13.572,6.591 13.572,5.818 C13.572,5.045 13.294,4.322 12.739,3.648 Z">
                                                        </path>
                                                    </svg>
                                                    0 comments
                                                </a>
                                            </li>
                                        </ul>
                                        <h4 class="px_subheading"><a
                                                href="blog_left_detail.html"><?php echo e($video->videoTitle); ?></a></h4>

                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <section class="px_product_wrapper px_padderTop80 px_padderBottom80 px-dark-light-section-new px-bg-none">
                                                                                                                                                                                                                        <div class="container">
                                                                                                                                                                                                                            <div class="row">
                                                                                                                                                                                                                                <div class="col-lg-12 text-center">
                                                                                                                                                                                                                                    <h1 class="px_heading px_heading_center">Our Latest Products</h1>
                                                                                                                                                                                                                                    <p class="px_font14 px_margin0 px_padderBottom20">Consectetur adipiscing elit, sed do eiusmod tempor
                                                                                                                                                                                                                                        incididuesdeentiut labore <br>etesde dolore magna aliquapspendisse and the gravida.</p>

                                                                                                                                                                                                                                    <div class="row px_product_slider">
                                                                                                                                                                                                                                        <div class="col-lg-3 col-md-6">
                                                                                                                                                                                                                                            <div class="px_product_box">
                                                                                                                                                                                                                                                <div class="px_product_img">
                                                                                                                                                                                                                                                    <img src="public/images/prod-new1.png" alt="" class="img-responsive">

                                                                                                                                                                                                                                                    <ul>
                                                                                                                                                                                                                                                        <li><a href="cart.html"><img src="public/images/svg/wishlist.svg" alt=""></a>
                                                                                                                                                                                                                                                        </li>
                                                                                                                                                                                                                                                        <li><a href="cart.html"><img src="public/images/svg/cart.svg" alt=""><span>Add
                                                                                                                                                                                                                                                                    To Card</span></a></li>
                                                                                                                                                                                                                                                        <li><a href="shop.html"><img src="public/images/svg/compare.svg" alt=""></a>
                                                                                                                                                                                                                                                        </li>
                                                                                                                                                                                                                                                    </ul>
                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                <span><img src="public/images/rating.png" alt=""></span>
                                                                                                                                                                                                                                                <h4 class="px_subheading">Gemstone</h4>
                                                                                                                                                                                                                                                <span class="px_price">$20 <del>$80</del> <span class="px_orange">(60%
                                                                                                                                                                                                                                                        off)</span></span>
                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                        <div class="col-lg-3 col-md-6">
                                                                                                                                                                                                                                            <div class="px_product_box">
                                                                                                                                                                                                                                                <div class="px_product_img">
                                                                                                                                                                                                                                                    <img src="public/images/prod-new2.png" alt="" class="img-responsive">

                                                                                                                                                                                                                                                    <ul>
                                                                                                                                                                                                                                                        <li><a href="cart.html"><img src="public/images/svg/wishlist.svg" alt=""></a>
                                                                                                                                                                                                                                                        </li>
                                                                                                                                                                                                                                                        <li><a href="cart.html"><img src="public/images/svg/cart.svg" alt=""><span>Add
                                                                                                                                                                                                                                                                    To Card</span></a></li>
                                                                                                                                                                                                                                                        <li><a href="shop.html"><img src="public/images/svg/compare.svg" alt=""></a>
                                                                                                                                                                                                                                                        </li>
                                                                                                                                                                                                                                                    </ul>
                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                <span><img src="public/images/rating.png" alt=""></span>
                                                                                                                                                                                                                                                <h4 class="px_subheading">Gemstone</h4>
                                                                                                                                                                                                                                                <span class="px_price">$20 <del>$80</del> <span class="px_orange">(60%
                                                                                                                                                                                                                                                        off)</span></span>
                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                        <div class="col-lg-3 col-md-6">
                                                                                                                                                                                                                                            <div class="px_product_box">
                                                                                                                                                                                                                                                <div class="px_product_img">
                                                                                                                                                                                                                                                    <img src="public/images/prod-new3.png" alt="" class="img-responsive">

                                                                                                                                                                                                                                                    <ul>
                                                                                                                                                                                                                                                        <li><a href="cart.html"><img src="public/images/svg/wishlist.svg" alt=""></a>
                                                                                                                                                                                                                                                        </li>
                                                                                                                                                                                                                                                        <li><a href="cart.html"><img src="public/images/svg/cart.svg" alt=""><span>Add
                                                                                                                                                                                                                                                                    To Card</span></a></li>
                                                                                                                                                                                                                                                        <li><a href="shop.html"><img src="public/images/svg/compare.svg" alt=""></a>
                                                                                                                                                                                                                                                        </li>
                                                                                                                                                                                                                                                    </ul>
                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                <span><img src="public/images/rating.png" alt=""></span>
                                                                                                                                                                                                                                                <h4 class="px_subheading">Gemstone</h4>
                                                                                                                                                                                                                                                <span class="px_price">$20 <del>$80</del> <span class="px_orange">(60%
                                                                                                                                                                                                                                                        off)</span></span>
                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                        <div class="col-lg-3 col-md-6">
                                                                                                                                                                                                                                            <div class="px_product_box">
                                                                                                                                                                                                                                                <div class="px_product_img">
                                                                                                                                                                                                                                                    <img src="public/images/prod-new4.png" alt="" class="img-responsive">

                                                                                                                                                                                                                                                    <ul>
                                                                                                                                                                                                                                                        <li><a href="cart.html"><img src="public/images/svg/wishlist.svg" alt=""></a>
                                                                                                                                                                                                                                                        </li>
                                                                                                                                                                                                                                                        <li><a href="cart.html"><img src="public/images/svg/cart.svg" alt=""><span>Add
                                                                                                                                                                                                                                                                    To Card</span></a></li>
                                                                                                                                                                                                                                                        <li><a href="shop.html"><img src="public/images/svg/compare.svg" alt=""></a>
                                                                                                                                                                                                                                                        </li>
                                                                                                                                                                                                                                                    </ul>
                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                <span><img src="public/images/rating.png" alt=""></span>
                                                                                                                                                                                                                                                <h4 class="px_subheading">Gemstone</h4>
                                                                                                                                                                                                                                                <span class="px_price">$20 <del>$80</del> <span class="px_orange">(60%
                                                                                                                                                                                                                                                        off)</span></span>
                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                        <div class="col-lg-3 col-md-6">
                                                                                                                                                                                                                                            <div class="px_product_box">
                                                                                                                                                                                                                                                <div class="px_product_img">
                                                                                                                                                                                                                                                    <img src="public/images/prod-new1.png" alt="" class="img-responsive">

                                                                                                                                                                                                                                                    <ul>
                                                                                                                                                                                                                                                        <li><a href="cart.html"><img src="public/images/svg/wishlist.svg" alt=""></a>
                                                                                                                                                                                                                                                        </li>
                                                                                                                                                                                                                                                        <li><a href="cart.html"><img src="public/images/svg/cart.svg" alt=""><span>Add
                                                                                                                                                                                                                                                                    To Card</span></a></li>
                                                                                                                                                                                                                                                        <li><a href="shop.html"><img src="public/images/svg/compare.svg" alt=""></a>
                                                                                                                                                                                                                                                        </li>
                                                                                                                                                                                                                                                    </ul>
                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                <span><img src="public/images/rating.png" alt=""></span>
                                                                                                                                                                                                                                                <h4 class="px_subheading">Gemstone</h4>
                                                                                                                                                                                                                                                <span class="px_price">$20 <del>$80</del> <span class="px_orange">(60%
                                                                                                                                                                                                                                                        off)</span></span>
                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                        <div class="col-lg-3 col-md-6">
                                                                                                                                                                                                                                            <div class="px_product_box">
                                                                                                                                                                                                                                                <div class="px_product_img">
                                                                                                                                                                                                                                                    <img src="public/images/prod-new2.png" alt="" class="img-responsive">

                                                                                                                                                                                                                                                    <ul>
                                                                                                                                                                                                                                                        <li><a href="cart.html"><img src="public/images/svg/wishlist.svg" alt=""></a>
                                                                                                                                                                                                                                                        </li>
                                                                                                                                                                                                                                                        <li><a href="cart.html"><img src="public/images/svg/cart.svg" alt=""><span>Add
                                                                                                                                                                                                                                                                    To Card</span></a></li>
                                                                                                                                                                                                                                                        <li><a href="shop.html"><img src="public/images/svg/compare.svg" alt=""></a>
                                                                                                                                                                                                                                                        </li>
                                                                                                                                                                                                                                                    </ul>
                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                <span><img src="public/images/rating.png" alt=""></span>
                                                                                                                                                                                                                                                <h4 class="px_subheading">Gemstone</h4>
                                                                                                                                                                                                                                                <span class="px_price">$20 <del>$80</del> <span class="px_orange">(60%
                                                                                                                                                                                                                                                        off)</span></span>
                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                        <div class="col-lg-3 col-md-6">
                                                                                                                                                                                                                                            <div class="px_product_box">
                                                                                                                                                                                                                                                <div class="px_product_img">
                                                                                                                                                                                                                                                    <img src="public/images/prod-new3.png" alt="" class="img-responsive">

                                                                                                                                                                                                                                                    <ul>
                                                                                                                                                                                                                                                        <li><a href="cart.html"><img src="public/images/svg/wishlist.svg" alt=""></a>
                                                                                                                                                                                                                                                        </li>
                                                                                                                                                                                                                                                        <li><a href="cart.html"><img src="public/images/svg/cart.svg" alt=""><span>Add
                                                                                                                                                                                                                                                                    To Card</span></a></li>
                                                                                                                                                                                                                                                        <li><a href="shop.html"><img src="public/images/svg/compare.svg" alt=""></a>
                                                                                                                                                                                                                                                        </li>
                                                                                                                                                                                                                                                    </ul>
                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                <span><img src="public/images/rating.png" alt=""></span>
                                                                                                                                                                                                                                                <h4 class="px_subheading">Gemstone</h4>
                                                                                                                                                                                                                                                <span class="px_price">$20 <del>$80</del> <span class="px_orange">(60%
                                                                                                                                                                                                                                                        off)</span></span>
                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                        <div class="col-lg-3 col-md-6">
                                                                                                                                                                                                                                            <div class="px_product_box">
                                                                                                                                                                                                                                                <div class="px_product_img">
                                                                                                                                                                                                                                                    <img src="public/images/prod-new4.png" alt="" class="img-responsive">

                                                                                                                                                                                                                                                    <ul>
                                                                                                                                                                                                                                                        <li><a href="cart.html"><img src="public/images/svg/wishlist.svg" alt=""></a>
                                                                                                                                                                                                                                                        </li>
                                                                                                                                                                                                                                                        <li><a href="cart.html"><img src="public/images/svg/cart.svg" alt=""><span>Add
                                                                                                                                                                                                                                                                    To Card</span></a></li>
                                                                                                                                                                                                                                                        <li><a href="shop.html"><img src="public/images/svg/compare.svg" alt=""></a>
                                                                                                                                                                                                                                                        </li>
                                                                                                                                                                                                                                                    </ul>
                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                <span><img src="public/images/rating.png" alt=""></span>
                                                                                                                                                                                                                                                <h4 class="px_subheading">Gemstone</h4>
                                                                                                                                                                                                                                                <span class="px_price">$20 <del>$80</del> <span class="px_orange">(60%
                                                                                                                                                                                                                                                        off)</span></span>
                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                    </section> -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('v2.frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\astroway-backend2\resources\views/v2/frontend/pages/index.blade.php ENDPATH**/ ?>