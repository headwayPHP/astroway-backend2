<?php $__env->startSection('subhead'); ?>
    <title>Service Details</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <div class="loader"></div>
    <h2 class="intro-y text-lg font-medium mt-10 d-inline">Service Details</h2>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 box p-5">
            <div><strong>Service Name:</strong> <?php echo e($service->service_name); ?></div>
            <div><strong>Service Type:</strong> <?php echo e(ucfirst($service->service_type)); ?></div>
            <div><strong>Status:</strong>
                <span class="badge bg-<?php echo e($service->status == 'active' ? 'success' : 'danger'); ?>">
                    <?php echo e(ucfirst($service->status)); ?>

                </span>
            </div>
            <div>
                <strong>Icon:</strong><br>
                <?php if($service->service_icon): ?>
                    <img src="<?php echo e(asset('storage/' . $service->service_icon)); ?>" alt="Service Icon" width="80"
                        height="80">
                <?php else: ?>
                    <span>--</span>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(window).on('load', function() {
            $('.loader').hide();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../layout/' . $layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\astroway-backend2\resources\views/pages/serviceshow.blade.php ENDPATH**/ ?>