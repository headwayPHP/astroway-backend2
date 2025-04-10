<?php $__env->startSection('subhead'); ?>
    <title>Appointment Details</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <div class="loader"></div>
    <h2 class="intro-y text-lg font-medium mt-10">Appointment Details</h2>

    <?php if($appointment): ?>
        <div class="intro-y box p-5 mt-5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <strong>Name:</strong>
                    <div class="text-gray-700 mt-1"><?php echo e($appointment->name ?? 'N/A'); ?></div>
                </div>

                <div>
                    <strong>Email:</strong>
                    <div class="text-gray-700 mt-1"><?php echo e($appointment->email ?? 'N/A'); ?></div>
                </div>

                <div>
                    <strong>Mobile:</strong>
                    <div class="text-gray-700 mt-1"><?php echo e($appointment->mobile ?? 'N/A'); ?></div>
                </div>

                <div>
                    <strong>Gender:</strong>
                    <div class="text-gray-700 mt-1"><?php echo e(ucfirst($appointment->gender ?? 'N/A')); ?></div>
                </div>

                <div>
                    <strong>Time of Day:</strong>
                    <div class="text-gray-700 mt-1"><?php echo e(ucfirst($appointment->time_of_day ?? 'N/A')); ?></div>
                </div>

                <div>
                    <strong>Way to Reach:</strong>
                    <div class="text-gray-700 mt-1"><?php echo e(ucfirst($appointment->way_to_reach ?? 'N/A')); ?></div>
                </div>

                <div>
                    <strong>Preferred Date:</strong>
                    <div class="text-gray-700 mt-1">
                        <?php echo e(\Carbon\Carbon::parse($appointment->preferred_date)->format('j F Y')); ?>

                    </div>
                </div>

                <div>
                    <strong>Preferred Time:</strong>
                    <div class="text-gray-700 mt-1">
                        <?php echo e(\Carbon\Carbon::parse($appointment->preferred_time)->format('h:i A')); ?>

                    </div>
                </div>

                <div class="md:col-span-2">
                    <strong>Address:</strong>
                    <div class="text-gray-700 mt-1"><?php echo e($appointment->address ?? '--'); ?></div>
                </div>

                <div class="md:col-span-2">
                    <strong>Reason:</strong>
                    <div class="text-gray-700 mt-1"><?php echo e($appointment->reason ?? '--'); ?></div>
                </div>

                <div class="md:col-span-2">
                    <strong>Created At:</strong>
                    <div class="text-gray-700 mt-1">
                        <?php echo e(\Carbon\Carbon::parse($appointment->created_at)->format('j F Y h:i A')); ?>

                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="intro-y flex justify-center items-center mt-10">
            <div class="text-center">
                <img src="<?php echo e(asset('build/assets/images/nodata.png')); ?>" style="height:290px" alt="No Data">
                <h3 class="text-center mt-4">No Appointment Data Available</h3>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(window).on('load', function() {
            $('.loader').hide();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../layout/' . $layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\astroway-backend2\resources\views/pages/appointmentshow.blade.php ENDPATH**/ ?>