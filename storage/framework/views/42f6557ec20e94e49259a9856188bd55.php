<?php $__env->startSection('subhead'); ?>
    <title>Service Details</title>
    <style>
        .image-thumbnail {
            width: 150px;
            height: 150px;
            object-fit: cover;
            cursor: pointer;
            border-radius: 8px;
            transition: transform 0.2s;
        }

        .image-thumbnail:hover {
            transform: scale(1.05);
        }

        /* Modal styles */
        .modal-custom {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .modal-content-custom {
            display: block;
            margin: 5% auto;
            max-width: 90%;
            max-height: 80%;
            border-radius: 8px;
        }

        .modal-close {
            position: absolute;
            top: 20px;
            right: 30px;
            color: #fff;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
        }

        .modal-close:hover {
            color: #ccc;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <div class="loader"></div>
    <h2 class="intro-y text-lg font-medium mt-10 d-inline">Service Details</h2>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 box p-5 space-y-4">
            <div><strong>Service Title:</strong> <?php echo e($service->service_title); ?></div>

            <div>
                <strong>Service Details:</strong><br>
                <div class="mt-1"><?php echo nl2br(e($service->service_details)); ?></div>
            </div>

            <div>
                <strong>Service Icon:</strong><br>
                <?php if($service->service_icon): ?>
                    <img src="<?php echo e(asset('storage/app/public/' . $service->service_icon)); ?>" alt="Service Icon"
                        class="image-thumbnail" onclick="openImageModal(this.src)">
                <?php else: ?>
                    <span>--</span>
                <?php endif; ?>
            </div>

            <div>
                <strong>Service Banner:</strong><br>
                <?php if($service->service_banner): ?>
                    <img src="<?php echo e(asset('storage/app/public/' . $service->service_banner)); ?>" alt="Service Banner"
                        class="image-thumbnail" onclick="openImageModal(this.src)">
                <?php else: ?>
                    <span>--</span>
                <?php endif; ?>
            </div>

            <div>
                <strong>Service Images:</strong><br>
                <?php if($service->service_images && is_array(json_decode($service->service_images, true))): ?>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-2">
                        <?php $__currentLoopData = json_decode($service->service_images, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <img src="<?php echo e(asset('storage/app/public/' . $image)); ?>" alt="Service Image"
                                class="image-thumbnail" onclick="openImageModal(this.src)">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <span>No images uploaded.</span>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="imageModal" class="modal-custom" onclick="closeImageModal(event)">
        <span class="modal-close" onclick="closeImageModal(event)">&times;</span>
        <img class="modal-content-custom" id="modalImagePreview">
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(window).on('load', function() {
            $('.loader').hide();
        });

        function openImageModal(src) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImagePreview');
            modalImage.src = src;
            modal.style.display = "block";
        }

        function closeImageModal(event) {
            const modal = document.getElementById('imageModal');
            if (event.target.id === 'imageModal' || event.target.classList.contains('modal-close')) {
                modal.style.display = "none";
            }
        }

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                document.getElementById('imageModal').style.display = 'none';
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../layout/' . $layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\astroway-backend2\resources\views/pages/serviceshow.blade.php ENDPATH**/ ?>