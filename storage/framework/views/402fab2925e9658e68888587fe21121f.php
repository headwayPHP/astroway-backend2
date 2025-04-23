<?php $__env->startSection('subhead'); ?>
    <title>Appointment Details</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <div class="loader"></div>

    <div class="mt-10">
        <h2 class="text-2xl font-semibold text-gray-800">Appointment Details</h2>
    </div>

    <?php if($appointment): ?>
        <div class="bg-white shadow-md rounded-xl p-6 mt-6 space-y-6">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="text-sm text-gray-500">Name</p>
                    <p class="text-base font-medium text-gray-800"><?php echo e($appointment->name ?? '--'); ?></p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Email</p>
                    <p class="text-base font-medium text-gray-800"><?php echo e($appointment->email ?? '--'); ?></p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Mobile</p>
                    <p class="text-base font-medium text-gray-800"><?php echo e($appointment->mobile ?? '--'); ?></p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Gender</p>
                    <p class="text-base font-medium text-gray-800"><?php echo e(ucfirst($appointment->gender ?? '--')); ?></p>
                </div>
            </div>

            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="text-sm text-gray-500">Time of Day</p>
                    <p class="text-base font-medium text-gray-800"><?php echo e(ucfirst($appointment->time_of_day ?? '--')); ?></p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Way to Reach</p>
                    <p class="text-base font-medium text-gray-800"><?php echo e(ucfirst($appointment->way_to_reach ?? '--')); ?></p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Preferred Date</p>
                    <p class="text-base font-medium text-gray-800">
                        <?php echo e($appointment->preferred_date ? \Carbon\Carbon::parse($appointment->preferred_date)->format('j F Y') : '--'); ?>

                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Preferred Time</p>
                    <p class="text-base font-medium text-gray-800">
                        <?php echo e($appointment->preferred_time ? \Carbon\Carbon::parse($appointment->preferred_time)->format('h:i A') : '--'); ?>

                    </p>
                </div>
            </div>

            
            <div>
                <p class="text-sm text-gray-500">Address</p>
                <p class="text-base font-medium text-gray-800"><?php echo e($appointment->address ?? '--'); ?></p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Reason</p>
                <p class="text-base font-medium text-gray-800"><?php echo e($appointment->reason ?? '--'); ?></p>
            </div>
        </div>
    <?php else: ?>
        <div class="flex justify-center items-center mt-10">
            <div class="text-center">
                <img src="<?php echo e(asset('build/assets/images/nodata.png')); ?>" class="mx-auto h-72" alt="No Data">
                <h3 class="mt-4 text-lg text-gray-600 font-semibold">No Appointment Data Available</h3>
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