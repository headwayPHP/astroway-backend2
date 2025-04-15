<section class="px_service_wrapper px_padderBottom80 px-dark-light-section-new px-bg-none px_padderTop80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="px_heading px_heading_center">our services</h1>
                <p class="px_font14 px_padderBottom5">
                    Professional solutions combining ancient Vastu wisdom with
                    modern scientific approaches for holistic well-being.
                </p>
            </div>

            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mb-4">
                    <div class="px_service_box px_service_box01 px_service_box_new text-center px-light-section-new">
                        <img src="<?php echo e(asset('storage/app/public/' . $service->service_icon)); ?>"
                            alt="<?php echo e($service->service_title); ?> Icon" width="80" height="80">

                        <h4 class="px_subheading"><?php echo e($service->service_title); ?></h4>

                        <p><?php echo e(\Illuminate\Support\Str::limit(strip_tags($service->service_details), 80)); ?></p>

                        <a href="<?php echo e(route('front.servicedetail', ['id' => $service->id])); ?>" class="px_link">read
                            more</a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\astroway-backend2\resources\views/v2/frontend/components/services.blade.php ENDPATH**/ ?>