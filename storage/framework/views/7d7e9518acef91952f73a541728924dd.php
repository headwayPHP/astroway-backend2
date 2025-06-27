<section class="px_customer_wrapper px_customer_wrapper_new px_padderTop80 px_padderBottom80 px-dark-section-new px-bg-none">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="px_heading px_heading_center">What Our Customers Say</h1>
                <p class="px_font14 px_margin0 px_padderBottom50">
                    Thousands have transformed their spaces and lives through our Vastu corrections and astrological
                    guidance.<br>
                    Here’s what some of our satisfied clients share about their experiences.
                </p>
            </div>

            <div class="col-lg-12">
                <div class="px_customer_slider">
                    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="px_customer_slide">
                            <div class="px_customer_box text-center px-light-section-new">
                                <span class="px_customer_img">
                                    <img src="<?php echo e(asset('storage/app/public/' . $testimonial->image)); ?>" alt="" style="width:82px;height:81px;">
                                    <span><img src="<?php echo e(asset('public/images/svg/quote1.svg')); ?>" alt=""></span>
                                </span>
                                <p class="px_margin0" style="min-height: 8em"><?php echo e($testimonial->testimonial); ?></p>
                                <h3><?php echo e($testimonial->name); ?></h3>
                                <p class="px_margin0"><?php echo e($testimonial->profession); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\astroway-backend2\resources\views/v2/frontend/components/testimonials.blade.php ENDPATH**/ ?>