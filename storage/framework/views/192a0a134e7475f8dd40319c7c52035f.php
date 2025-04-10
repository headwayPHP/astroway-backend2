<?php $__env->startSection('subhead'); ?>
    <title>Remote Booking List</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <div class="loader"></div>
    <h2 class="intro-y text-lg font-medium mt-10 d-inline">Remote Bookings</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2"></div>
    </div>

    <?php if($totalRecords > 0): ?>
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible list-table">
            <table class="table table-report mt-2" aria-label="remote-booking-list">
                <thead class="sticky-top">
                    <tr>
                        <th class="whitespace-nowrap">#</th>
                        <th class="whitespace-nowrap">Full Name</th>
                        <th class="whitespace-nowrap">Birthdate</th>
                        <th class="whitespace-nowrap">City</th>
                        <th class="whitespace-nowrap">Entry Date</th>
                        <th class="text-center whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody id="remote-booking-list">
                    <?php $no = 0; ?>
                    <?php $__currentLoopData = $remotebookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rbook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="intro-x">
                            <td><?php echo e(($page - 1) * 15 + ++$no); ?></td>
                            <td><?php echo e($rbook->fullname ?? '--'); ?></td>
                            <td><?php echo e($rbook->birthdate ?? '--'); ?></td>
                            <td><?php echo e($rbook->city ?? '--'); ?></td>
                            <td><?php echo e($rbook->created_at ? $rbook->created_at->format('d M, Y h:i A') : '--'); ?></td>
                            <td class="text-center">
                                <a class="flex items-center text-success"
                                    href="<?php echo e(route('remotebookingshow', $rbook->id)); ?>">
                                    <i data-lucide="eye" class="w-4 h-4 mr-1"></i>View
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <div class="d-inline text-slate-500 pagecount">
            Showing <?php echo e($start); ?> to <?php echo e($end); ?> of <?php echo e($totalRecords); ?> entries
        </div>

        <div class="d-inline intro-y col-span-12 addbtn">
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination" id="pagination">
                    <li class="page-item <?php echo e($page == 1 ? 'disabled' : ''); ?>">
                        <a class="page-link" href="<?php echo e(route('remotebookinglist', ['page' => $page - 1])); ?>">
                            <i class="w-4 h-4" data-lucide="chevron-left"></i>
                        </a>
                    </li>
                    <?php for($i = 0; $i < $totalPages; $i++): ?>
                        <li class="page-item <?php echo e($page == $i + 1 ? 'active' : ''); ?>">
                            <a class="page-link"
                                href="<?php echo e(route('remotebookinglist', ['page' => $i + 1])); ?>"><?php echo e($i + 1); ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?php echo e($page == $totalPages ? 'disabled' : ''); ?>">
                        <a class="page-link" href="<?php echo e(route('remotebookinglist', ['page' => $page + 1])); ?>">
                            <i class="w-4 h-4" data-lucide="chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    <?php else: ?>
        <div class="intro-y" style="height:100%">
            <div style="display:flex;align-items:center;height:100%;">
                <div style="margin:auto">
                    <img src="<?php echo e(asset('build/assets/images/nodata.png')); ?>" style="height:290px" alt="noData">
                    <h3 class="text-center">No Data Available</h3>
                </div>
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

<?php echo $__env->make('../layout/' . $layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\astroway-backend2\resources\views/pages/remotebookinglist.blade.php ENDPATH**/ ?>