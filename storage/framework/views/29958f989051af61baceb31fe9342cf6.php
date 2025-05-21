<?php
    $appName = \App\Models\AdminModel\SystemFlag::where('id', 47)->first();
    $siteEmail = \App\Models\AdminModel\SystemFlag::where('id', 262)->first();
    $siteAddress = \App\Models\AdminModel\SystemFlag::where('id', 263)->first();
    $siteNumber = \App\Models\AdminModel\SystemFlag::where('id', 261)->first();
    $facebook = \App\Models\AdminModel\SystemFlag::where('id', 30)->first();
    $instagram = \App\Models\AdminModel\SystemFlag::where('id', 37)->first();
    $youtube = \App\Models\AdminModel\SystemFlag::where('id', 29)->first();

?>

<section class="px_footer_wrapper">
    <div class="container">
        <div class="px_footer_inner">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="px_footer_widget">
                        <div class="px_footer_logo">
                            <a href="<?php echo e(route('front.home')); ?>">
                                <h2><?php echo e($appName->value); ?></h2>
                            </a>
                        </div>
                        <p>No Structural Altration, No Demolition, Vastu Fault Corrections Without Breaking A Single
                            Brick.</p>

                        <div class="px_share_box">
                            <p>Follow Us</p>
                            <ul>
                                <li><a href="<?php echo e($facebook->value); ?>"><img src="public/images/svg/facebook.svg"
                                            alt=""></a>
                                </li>
                                <li><a href="<?php echo e($instagram->value); ?>"><img src="public/images/svg/instagram.svg"
                                            alt=""></a>
                                </li>
                                
                                <li><a href="<?php echo e($youtube->value); ?>"><img src="public/images/svg/youtube.svg"
                                            alt=""></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12" style="transform: translateX(20px);">
                    
                    <div class="px_footer_widget">
                        <h3 class="px_footer_heading">Our Services</h3>
                        <ul>
                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e(url('services-details?id=' . $service->id)); ?>">
                                        <span >
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                preserveAspectRatio="xMidYMid" width="8" height="12"
                                                viewBox="0 0 8 12">
                                                <path
                                                    d="M8.000,5.998 L-0.002,11.997 L1.292,5.998 L-0.002,-0.001 L8.000,5.998 ZM1.265,9.924 L6.502,5.998 L1.265,2.071 L2.112,5.998 L1.265,9.924 ZM5.451,5.998 L2.496,8.213 L2.974,5.998 L2.496,3.783 L5.451,5.998 Z" />
                                            </svg>
                                        </span>
                                        <?php echo e($service->service_title); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12" style="transform: translateX(20px);">
                    <div class="px_footer_widget">
                        <h3 class="px_footer_heading">Quick Links</h3>

                        <ul>
                            <li><a href="<?php echo e(route('front.aboutus')); ?>"><span><svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid"
                                            width="8" height="12" viewBox="0 0 8 12">
                                            <path
                                                d="M8.000,5.998 L-0.002,11.997 L1.292,5.998 L-0.002,-0.001 L8.000,5.998 ZM1.265,9.924 L6.502,5.998 L1.265,2.071 L2.112,5.998 L1.265,9.924 ZM5.451,5.998 L2.496,8.213 L2.974,5.998 L2.496,3.783 L5.451,5.998 Z" />
                                        </svg></span> About Us</a></li>
                            <li><a href="#"><span><svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid"
                                            width="8" height="12" viewBox="0 0 8 12">
                                            <path
                                                d="M8.000,5.998 L-0.002,11.997 L1.292,5.998 L-0.002,-0.001 L8.000,5.998 ZM1.265,9.924 L6.502,5.998 L1.265,2.071 L2.112,5.998 L1.265,9.924 ZM5.451,5.998 L2.496,8.213 L2.974,5.998 L2.496,3.783 L5.451,5.998 Z" />
                                        </svg></span> Videos</a></li>
                            <li><a href="<?php echo e(route('front.services')); ?>"><span><svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid"
                                            width="8" height="12" viewBox="0 0 8 12">
                                            <path
                                                d="M8.000,5.998 L-0.002,11.997 L1.292,5.998 L-0.002,-0.001 L8.000,5.998 ZM1.265,9.924 L6.502,5.998 L1.265,2.071 L2.112,5.998 L1.265,9.924 ZM5.451,5.998 L2.496,8.213 L2.974,5.998 L2.496,3.783 L5.451,5.998 Z" />
                                        </svg></span> Services</a></li>
                            <li><a href="<?php echo e(route('front.appointment')); ?>"><span><svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid"
                                            width="8" height="12" viewBox="0 0 8 12">
                                            <path
                                                d="M8.000,5.998 L-0.002,11.997 L1.292,5.998 L-0.002,-0.001 L8.000,5.998 ZM1.265,9.924 L6.502,5.998 L1.265,2.071 L2.112,5.998 L1.265,9.924 ZM5.451,5.998 L2.496,8.213 L2.974,5.998 L2.496,3.783 L5.451,5.998 Z" />
                                        </svg></span> Appointment</a></li>
                            <li><a href="<?php echo e(route('front.remotebooking')); ?>"><span><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid"
                                            width="8" height="12" viewBox="0 0 8 12">
                                            <path
                                                d="M8.000,5.998 L-0.002,11.997 L1.292,5.998 L-0.002,-0.001 L8.000,5.998 ZM1.265,9.924 L6.502,5.998 L1.265,2.071 L2.112,5.998 L1.265,9.924 ZM5.451,5.998 L2.496,8.213 L2.974,5.998 L2.496,3.783 L5.451,5.998 Z" />
                                        </svg></span> Remote Booking</a></li>
                            <li><a href="<?php echo e(route('front.contact')); ?>"><span><svg xmlns="http://www.w3.org/2000/svg"
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
                                
                                <i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp;&nbsp;
                                <p><?php echo e($siteAddress->value); ?></p>
                            </li>
                            <li>
                                
                                <i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;&nbsp;
                                <p>
                                    <a href="mailto:<?php echo e($siteEmail->value); ?>"><?php echo e($siteEmail->value); ?></a>
                                    <!-- <a href="javascript:;">Support@example.com</a> -->
                                </p>
                            </li>
                            <li>
                                
                                <i class="fa fa-phone" aria-hidden="true"></i> &nbsp;&nbsp;
                                <p>
                                    <a href="tel:+91<?php echo e(preg_replace('/\D/', '', $siteNumber->value)); ?>">+ (91)
                                        <?php echo e($siteNumber->value); ?></a><br>
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
                <p>Copyright &copy; 2025 <?php echo e($appName->value); ?>. All Right Reserved.</p>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\astroway-backend2\resources\views/v2/frontend/layout/footer.blade.php ENDPATH**/ ?>