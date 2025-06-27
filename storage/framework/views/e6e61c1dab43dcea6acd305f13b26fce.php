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

            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mb-4">
                    <div class="px_service_box px_service_box01 px_service_box_new text-center px-light-section-new">
                        <img src="<?php echo e(asset('storage/app/public/' . $service->service_icon)); ?>"
                            alt="<?php echo e($service->service_title); ?> Icon" width="80" height="80">

                        <h4 class="px_subheading">
                            <?php echo e(\Illuminate\Support\Str::limit(strip_tags($service->service_title), 23)); ?></h4>

                        <p><?php echo e(\Illuminate\Support\Str::limit(strip_tags($service->service_details), 80)); ?></p>

                        

                        <a href="<?php echo e(route('front.servicedetail', ['id' => $service->id])); ?>" class="btn service_99"
                            >Read
                            more</a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
    <div class="text-center mt-4">
        <a href="<?php echo e(route('front.services')); ?>" class="btn"
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
<?php echo $__env->make('layout.components.divider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\astroway-backend2\resources\views/v2/frontend/components/services.blade.php ENDPATH**/ ?>