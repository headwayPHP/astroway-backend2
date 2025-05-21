<?php $__env->startSection('content'); ?>
    <section class="px_breadcrum_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1><?php echo e($service->service_title); ?></h1>

                    <ul class="breadcrumb">
                        <li><a href="<?php echo e(url('/')); ?>">Home</a></li>

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

                        
                        <img src="<?php echo e(asset('storage/app/public/' . $service->service_banner)); ?>"
                            alt="<?php echo e($service->service_title); ?>" class="img-responsive mb-4">

                        


                        
                        <p class="px_font14 text-start"><?php echo nl2br(e($service->service_details)); ?></p>

                        
                        <?php if($service->service_images): ?>
                            <div class="row mt-4 justify-content-center">
                                <?php $__currentLoopData = json_decode($service->service_images, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-4 col-md-4 col-sm-6 px_padderBottom20 text-center">
                                        <a href="<?php echo e(asset('storage/app/public/' . $image)); ?>"
                                            data-lightbox="service-gallery" data-title="Service Image <?php echo e($index + 1); ?>">
                                            <img src="<?php echo e(asset('storage/app/public/' . $image)); ?>" alt="Service Image"
                                                class="img-thumbnail"
                                                style="width: 100%; max-width: 300px; height: 200px; object-fit: cover;">
                                        </a>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('v2.frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\astroway-backend2\resources\views/v2/frontend/pages/servicedetail.blade.php ENDPATH**/ ?>