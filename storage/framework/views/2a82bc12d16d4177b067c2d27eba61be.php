<?php $__env->startSection('subhead'); ?>
    <title>Remote Booking Details</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <div class="loader"></div>
    <div class="flex items-center mt-8">
        <h2 class="intro-y text-2xl font-bold">Remote Booking Details</h2>
        <div class="ml-auto">
            <span
                class="px-3 py-1 rounded-full text-xs font-medium
                <?php echo e($booking ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'); ?>">
                <?php echo e($booking ? 'Active Booking' : 'No Booking'); ?>

            </span>
        </div>
    </div>

    <?php if($booking): ?>
        <div class="intro-y box p-8 mt-5 shadow-lg rounded-xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Personal Information Section -->
                <div class="space-y-6">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Personal Information</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Full Name</label>
                                <p class="mt-1 text-gray-900 font-medium"><?php echo e($booking->fullname ?? 'N/A'); ?></p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Birthdate</label>
                                <p class="mt-1 text-gray-900">
                                    <?php echo e($booking->birthdate ? \Carbon\Carbon::parse($booking->birthdate)->format('j F Y') : 'N/A'); ?>

                                </p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Birth Time</label>
                                <p class="mt-1 text-gray-900"><?php echo e($booking->birthtime ?? 'N/A'); ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Location Information -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Location Information</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Birth Place</label>
                                <p class="mt-1 text-gray-900"><?php echo e($booking->birthplace ?? 'N/A'); ?></p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">City</label>
                                <p class="mt-1 text-gray-900"><?php echo e($booking->city ?? 'N/A'); ?></p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Address</label>
                                <p class="mt-1 text-gray-900"><?php echo e($booking->address ?? '--'); ?></p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Google Location</label>
                                <a href="<?php echo e($booking->google_location); ?>" target="_blank"
                                    class="mt-1 inline-flex items-center text-blue-600 hover:text-blue-800">
                                    <i data-lucide="map-pin" class="w-4 h-4 mr-1"></i> View on Map
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Property Details Section -->
                <div class="space-y-6">
                    <!-- Layout Map -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Layout Map</h3>
                        <?php if($booking->layout_map): ?>
                            <?php
                                $ext = pathinfo($booking->layout_map, PATHINFO_EXTENSION);
                                $layoutPath = asset('storage/app/public/' . $booking->layout_map);
                            ?>

                            <?php if(in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])): ?>
                                <img src="<?php echo e($layoutPath); ?>" alt="Layout Map"
                                    class="cursor-pointer rounded-md w-40 h-40 object-cover border"
                                    onclick="openModal('<?php echo e($layoutPath); ?>')">
                            <?php elseif($ext === 'pdf'): ?>
                                <embed src="<?php echo e($layoutPath); ?>" type="application/pdf" width="100%" height="300px" />
                            <?php endif; ?>

                            <a href="<?php echo e($layoutPath); ?>" download
                                class="inline-flex items-center text-blue-600 hover:text-blue-800 mt-3">
                                <i data-lucide="download" class="w-4 h-4 mr-1"></i> Download Layout Map
                            </a>
                        <?php else: ?>
                            <p class="text-gray-500 italic">No layout map provided</p>
                        <?php endif; ?>
                    </div>

                    <!-- Compass Reading -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Compass Reading</h3>
                        <?php if($booking->compass_reading): ?>
                            <?php $compassPath = asset('storage/app/public/' . $booking->compass_reading); ?>
                            <img src="<?php echo e($compassPath); ?>" alt="Compass Reading"
                                class="cursor-pointer rounded-md w-40 h-40 object-cover border"
                                onclick="openModal('<?php echo e($compassPath); ?>')">

                            <a href="<?php echo e($compassPath); ?>" download
                                class="inline-flex items-center text-blue-600 hover:text-blue-800 mt-3">
                                <i data-lucide="download" class="w-4 h-4 mr-1"></i> Download Compass Reading
                            </a>
                        <?php else: ?>
                            <p class="text-gray-500 italic">No compass reading provided</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Full Width Sections -->
                <div class="md:col-span-2">
                    <!-- Property Video -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Property Video</h3>
                        <?php if($booking->property_video): ?>
                            <video controls class="rounded-md w-full border border-gray-200 max-w-2xl mx-auto">
                                <source src="<?php echo e(asset('storage/app/public/' . $booking->property_video)); ?>"
                                    type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <a href="<?php echo e(asset('storage/app/public/' . $booking->property_video)); ?>" download
                                class="inline-flex items-center text-blue-600 hover:text-blue-800 mt-3">
                                <i data-lucide="download" class="w-4 h-4 mr-1"></i> Download Property Video
                            </a>
                        <?php else: ?>
                            <p class="text-gray-500 italic">No property video provided</p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="md:col-span-2">
                    <!-- Additional Notes -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Additional Notes</h3>
                        <p class="text-gray-700"><?php echo e($booking->additional_notes ?: 'No additional notes provided'); ?></p>
                    </div>
                </div>















            </div>
        </div>

        <!-- Image Modal -->
        <div id="imageModal" class="fixed inset-0 z-50 bg-black bg-opacity-75 hidden flex items-center justify-center">
            <span class="absolute top-6 right-6 text-white text-3xl cursor-pointer" onclick="closeModal()">×</span>
            <img id="modalImage" src="" class="max-h-[90vh] max-w-[90vw] rounded shadow-lg">
        </div>
    <?php else: ?>
        <div class="intro-y flex flex-col items-center justify-center mt-10">
            <img src="<?php echo e(asset('build/assets/images/nodata.png')); ?>" class="h-64" alt="No Data">
            <h3 class="text-xl font-medium text-gray-700 mt-6">No Booking Data Available</h3>
            <p class="text-gray-500 mt-2">There are currently no booking details to display.</p>
            <a href="#" class="btn btn-primary mt-4">
                <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Create New Booking
            </a>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(window).on('load', function() {
            $('.loader').hide();
        });

        function openModal(imageSrc) {
            $('#modalImage').attr('src', imageSrc);
            $('#imageModal').removeClass('hidden');
        }

        function closeModal() {
            $('#imageModal').addClass('hidden');
            $('#modalImage').attr('src', '');
        }

        $(document).on('click', '#imageModal', function(e) {
            if (e.target.id === 'imageModal') {
                closeModal();
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../layout/' . $layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\astroway-backend2\resources\views/pages/remotebookingshow.blade.php ENDPATH**/ ?>