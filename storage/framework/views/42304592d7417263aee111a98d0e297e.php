<?php $__env->startSection('subhead'); ?>
    <title>Add Client</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 mt-2">
            <div class="intro-y box">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Add Client</h2>
                </div>
                <form method="POST" enctype="multipart/form-data" id="add-form" action="<?php echo e(route('clientaddApi')); ?>">
                    <?php echo csrf_field(); ?>
                    <div id="input" class="p-5">
                        <div class="preview">
                            <div class="sm:grid grid-cols-2 gap-4">
                                <div class="input">
                                    <label class="form-label">Client Image</label>
                                    <input type="file" name="client_image" class="form-control inputs" required
                                        onchange="previewImage(this, '#preview-image')">
                                    <img id="preview-image" class="mt-2 h-16" style="display: none;">
                                    <div class="text-danger print-client-image-error-msg mb-2" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>

                                <div class="input">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select inputs" required>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    <div class="text-danger print-status-error-msg mb-2" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>

                                <div class="input col-span-2 mt-2">
                                    <label class="form-label">Client Name</label>
                                    <input type="text" name="client_name" class="form-control inputs"
                                        placeholder="Enter client name" required>
                                    <div class="text-danger print-client-name-error-msg mb-2" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5">
                                <button type="submit" class="btn btn-primary shadow-md mr-2">Add Client</button>
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
                    client_image: '.print-client-image-error-msg',
                    client_name: '.print-client-name-error-msg',
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
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../layout/' . $layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\astroway-backend2\resources\views/pages/clientadd.blade.php ENDPATH**/ ?>