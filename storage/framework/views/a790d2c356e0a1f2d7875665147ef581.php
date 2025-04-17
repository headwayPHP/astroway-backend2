<?php $__env->startSection('subhead'); ?>
    <title>Testimonial Details</title>
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
    <h2 class="intro-y text-lg font-medium mt-10 d-inline">Testimonial Details</h2>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 box p-5 space-y-4">
            <div><strong>Name:</strong> <?php echo e($testimonial->name); ?></div>

            <div><strong>Profession:</strong> <?php echo e($testimonial->profession); ?></div>

            <div><strong>Testimonial:</strong> <?php echo e($testimonial->testimonial); ?></div>

            <div>
                <strong>Status:</strong>
                <span class="ml-2 <?php echo e($testimonial->status == 'active' ? 'text-success' : 'text-danger'); ?>">
                    <?php echo e(ucfirst($testimonial->status)); ?>

                </span>
            </div>

            <div>
                <strong>Image:</strong><br>
                <?php if($testimonial->image): ?>
                    <img src="<?php echo e(asset('storage/app/public/' . $testimonial->image)); ?>" alt="Testimonial Image"
                        class="image-thumbnail" onclick="openImageModal(this.src)">
                <?php else: ?>
                    <span>No image uploaded.</span>
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

<?php echo $__env->make('../layout/' . $layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\astroway-backend2\resources\views/pages/testimonialshow.blade.php ENDPATH**/ ?>