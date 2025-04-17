<?php $__env->startSection('subhead'); ?>
    <title>Edit Testimonial</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 mt-2">
            <div class="intro-y box">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Edit Testimonial</h2>
                </div>
                <form method="POST" enctype="multipart/form-data" id="edit-form"
                    action="<?php echo e(route('testimonialupdate', $testimonial->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('POST'); ?>
                    <div id="input" class="p-5">
                        <div class="preview">
                            <div class="sm:grid grid-cols-2 gap-4">
                                
                                <div class="input">
                                    <label class="form-label">Image</label>
                                    <?php if($testimonial->image): ?>
                                        <img src="<?php echo e(asset('storage/app/public/' . $testimonial->image)); ?>"
                                            class="h-32 mb-2 rounded" />
                                    <?php endif; ?>
                                    <input type="file" name="image" class="form-control inputs"
                                        onchange="previewImage(this, '#preview-image')">
                                    <img id="preview-image" class="mt-2 h-32" style="display: none;">
                                    <div class="text-danger print-image-error-msg mb-2" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>

                                
                                <div class="input">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select inputs" required>
                                        <option value="active" <?php echo e($testimonial->status == 'active' ? 'selected' : ''); ?>>
                                            Active</option>
                                        <option value="inactive" <?php echo e($testimonial->status == 'inactive' ? 'selected' : ''); ?>>
                                            Inactive</option>
                                    </select>
                                    <div class="text-danger print-status-error-msg mb-2" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>

                                
                                <div class="input">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control inputs"
                                        value="<?php echo e($testimonial->name); ?>" required>
                                    <div class="text-danger print-name-error-msg mb-2" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>

                                
                                <div class="input">
                                    <label class="form-label">Role</label>
                                    <input type="text" name="profession" class="form-control inputs"
                                        value="<?php echo e($testimonial->profession); ?>" required>
                                    <div class="text-danger print-role-error-msg mb-2" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>

                                
                                <div class="input col-span-2">
                                    <label class="form-label">Message</label>
                                    <textarea name="testimonial" class="form-control inputs" rows="4" required><?php echo e($testimonial->testimonial); ?></textarea>
                                    <div class="text-danger print-message-error-msg mb-2" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5">
                                <button type="submit" class="btn btn-primary shadow-md mr-2">Update Testimonial</button>
                                <a href="<?php echo e(route('testimoniallist')); ?>" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function printErrorMsg(msg) {
            jQuery(".text-danger").hide().find("ul").html('');
            jQuery.each(msg, function(key, value) {
                const classMap = {
                    image: '.print-image-error-msg',
                    name: '.print-name-error-msg',
                    role: '.print-role-error-msg',
                    testimonial: '.print-message-error-msg',
                    status: '.print-status-error-msg'
                };

                if (classMap[key]) {
                    jQuery(classMap[key]).show().find("ul").append('<li>' + value + '</li>');
                } else {
                    toastr.warning(value);
                }
            });
        }

        $(window).on('load', function() {
            $('.loader').hide();
        });

        function previewImage(input, previewId) {
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $(previewId).attr('src', e.target.result).show();
                }
                reader.readAsDataURL(file);
            }
        }

        <?php if(session('success')): ?>
            toastr.success("<?php echo e(session('success')); ?>");
        <?php endif; ?>

        <?php if(session('error')): ?>
            toastr.error("<?php echo e(session('error')); ?>");
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../layout/' . $layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\astroway-backend2\resources\views/pages/testimonialedit.blade.php ENDPATH**/ ?>