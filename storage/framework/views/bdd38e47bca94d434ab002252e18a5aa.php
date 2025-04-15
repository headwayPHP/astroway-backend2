<?php $__env->startSection('subhead'); ?>
    <title>Services</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <h2 class="intro-y text-lg font-medium mt-10 d-inline">Services</h2>

    <?php if($totalRecords > 0): ?>
        <a class="btn btn-primary shadow-md mr-2 mt-10 d-inline addbtn printpdf">PDF</a>
        <a class="btn btn-primary shadow-md mr-2 mt-10 d-inline addbtn downloadcsv">CSV</a>
    <?php endif; ?>

    <a class="btn btn-primary shadow-md mr-2 mt-10 d-inline addbtn" href="<?php echo e(route('serviceadd')); ?>">Add Service</a>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <form action="<?php echo e(route('servicelist')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="w-56 relative text-slate-500" style="display:inline-block">
                        <input value="<?php echo e($searchString); ?>" type="text" class="form-control w-56 box pr-10"
                            placeholder="Search..." id="searchString" name="searchString">
                        <?php if(!$searchString): ?>
                            <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                        <?php else: ?>
                            <a href="<?php echo e(route('servicelist')); ?>"><i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"
                                    data-lucide="x"></i></a>
                        <?php endif; ?>
                    </div>
                    <button class="btn btn-primary shadow-md mr-2">Search</button>
                </form>
            </div>
        </div>
    </div>

    <?php if($totalRecords > 0): ?>
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible list-table">
            <table class="table table-report mt-2" aria-label="service-list">
                <thead class="sticky-top">
                    <tr>
                        <th class="whitespace-nowrap">#</th>
                        <th class="whitespace-nowrap">ICON</th>
                        <th class="whitespace-nowrap">BANNER</th>
                        <th class="whitespace-nowrap">TITLE</th>
                        <th class="whitespace-nowrap">DETAILS</th>
                        <th class="whitespace-nowrap">IMAGES</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody id="service-list">
                    <?php $no = 0; ?>
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="intro-x">
                            <td><?php echo e(($page - 1) * 15 + ++$no); ?></td>
                            <td><img src="<?php echo e(asset('storage/app/public/' . $service->service_icon)); ?>" alt="Icon"
                                    class="w-10 h-10"></td>
                            <td><img src="<?php echo e(asset('storage/app/public/' . $service->service_banner)); ?>" alt="Banner"
                                    class="w-20 h-12"></td>
                            <td><?php echo e($service->service_title); ?></td>
                            <td><?php echo e(Str::limit($service->service_details, 50)); ?></td>
                            
                            <td class="flex items-center">
                                <?php
                                    $images = $service->service_images
                                        ? json_decode($service->service_images, true)
                                        : [];
                                    $totalImages = count($images);
                                ?>

                                <?php if($totalImages > 0): ?>
                                    
                                    <img src="<?php echo e(asset('storage/app/public/' . $images[0])); ?>"
                                        class="w-16 h-16 mr-2 rounded" alt="Main Image">

                                    
                                    <?php if($totalImages > 1): ?>
                                        <div class="text-sm bg-gray-200 px-2 py-1 rounded">
                                            +<?php echo e($totalImages - 1); ?>

                                        </div>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span>No Images</span>
                                <?php endif; ?>
                            </td>


                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3 text-success"
                                        href="<?php echo e(route('serviceshow', $service->id)); ?>">
                                        <i data-lucide="eye" class="w-4 h-4 mr-1"></i>View
                                    </a>
                                    <a class="flex items-center mr-3" href="<?php echo e(route('serviceedit', $service->id)); ?>">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>Edit
                                    </a>
                                    <a href="javascript:;" class="flex items-center deletebtn text-danger"
                                        onclick="if(confirm('Are you sure you want to delete this service?')) { document.getElementById('delete-form-<?php echo e($service->id); ?>').submit(); }">
                                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>Delete
                                    </a>

                                    <form id="delete-form-<?php echo e($service->id); ?>"
                                        action="<?php echo e(route('servicedelete', $service->id)); ?>" method="POST"
                                        style="display: none;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <div class="d-inline text-slate-500 pagecount">Showing <?php echo e($start); ?> to <?php echo e($end); ?> of
            <?php echo e($totalRecords); ?> entries</div>

        <div class="d-inline intro-y col-span-12 addbtn">
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination" id="pagination">
                    <li class="page-item <?php echo e($page == 1 ? 'disabled' : ''); ?>">
                        <a class="page-link"
                            href="<?php echo e(route('servicelist', ['page' => $page - 1, 'searchString' => $searchString])); ?>">
                            <i class="w-4 h-4" data-lucide="chevron-left"></i>
                        </a>
                    </li>
                    <?php
                        $showPages = 15;
                        $halfShowPages = floor($showPages / 2);
                        $startPage = max(1, $page - $halfShowPages);
                        $endPage = min($startPage + $showPages - 1, $totalPages);
                    ?>

                    <?php if($startPage > 1): ?>
                        <li class="page-item"><a class="page-link"
                                href="<?php echo e(route('servicelist', ['page' => 1, 'searchString' => $searchString])); ?>">1</a>
                        </li>
                        <?php if($startPage > 2): ?>
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php for($i = $startPage; $i <= $endPage; $i++): ?>
                        <li class="page-item <?php echo e($page == $i ? 'active' : ''); ?>">
                            <a class="page-link"
                                href="<?php echo e(route('servicelist', ['page' => $i, 'searchString' => $searchString])); ?>"><?php echo e($i); ?></a>
                        </li>
                    <?php endfor; ?>

                    <?php if($endPage < $totalPages): ?>
                        <?php if($endPage < $totalPages - 1): ?>
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        <?php endif; ?>
                        <li class="page-item"><a class="page-link"
                                href="<?php echo e(route('servicelist', ['page' => $totalPages, 'searchString' => $searchString])); ?>"><?php echo e($totalPages); ?></a>
                        </li>
                    <?php endif; ?>

                    <li class="page-item <?php echo e($page == $totalPages ? 'disabled' : ''); ?>">
                        <a class="page-link"
                            href="<?php echo e(route('servicelist', ['page' => $page + 1, 'searchString' => $searchString])); ?>">
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

<?php echo $__env->make('../layout/' . $layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\astroway-backend2\resources\views/pages/servicelist.blade.php ENDPATH**/ ?>