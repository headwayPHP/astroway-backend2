<?php $__env->startSection('subhead'); ?>
    <title>Add Service</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 mt-2">
            <div class="intro-y box">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Add Service</h2>
                </div>
                <form method="POST" enctype="multipart/form-data" id="add-form" action="<?php echo e(route('serviceaddApi')); ?>">
                    
                    <?php echo csrf_field(); ?>
                    <div id="input" class="p-5">
                        <div class="preview">

                            <div class="sm:grid grid-cols-2 gap-4">
                                <div class="input">
                                    <label class="form-label">Service Icon</label>
                                    <input type="file" name="service_icon" class="form-control inputs" required
                                        onchange="previewImage(this, '#preview-icon')">
                                    <img id="preview-icon" class="mt-2 h-16" style="display: none;">
                                    <div class="text-danger print-service-icon-error-msg mb-2" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>

                                <div class="input">
                                    <label class="form-label">Service Banner</label>
                                    <input type="file" name="service_banner" class="form-control inputs" required
                                        onchange="previewImage(this, '#preview-banner')">
                                    <img id="preview-banner" class="mt-2 h-20" style="display: none;">
                                    <div class="text-danger print-service-banner-error-msg mb-2" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>

                                <div class="input col-span-2 mt-2">
                                    <label class="form-label">Service Images (Multiple)</label>
                                    <input type="file" name="service_images[]" class="form-control inputs" multiple
                                        onchange="previewMultipleImages(this, '#preview-multiple')">
                                    <div id="preview-multiple" class="flex gap-2 mt-2 flex-wrap"></div>
                                    <div class="text-danger print-service-images-error-msg mb-2" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>

                                <div class="input col-span-2 mt-2">
                                    <label class="form-label">Service Title</label>
                                    <input type="text" name="service_title" class="form-control inputs"
                                        placeholder="Enter title" required>
                                    <div class="text-danger print-service-title-error-msg mb-2" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>

                                <div class="input col-span-2 mt-2">
                                    <label class="form-label">Service Details</label>
                                    <textarea name="service_details" class="form-control inputs" rows="4" placeholder="Enter details..." required></textarea>
                                    <div class="text-danger print-service-details-error-msg mb-2" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5">
                                <button type="submit" class="btn btn-primary shadow-md mr-2">Add Service</button>
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
        // var spinner = $('.loader');

        // jQuery(function() {
        //     jQuery('#add-form').submit(function(e) {
        //         e.preventDefault();
        //         spinner.show();
        //         var data = new FormData(this);
        //         jQuery.ajax({
        //             type: 'POST',
        //             url: "<?php echo e(route('serviceaddApi')); ?>",
        //             data: data,
        //             dataType: 'JSON',
        //             processData: false,
        //             contentType: false,
        //             success: function(data) {
        //                 if (jQuery.isEmptyObject(data.error)) {
        //                     spinner.hide();
        //                     location.href = "/admin/services";
        //                 } else {
        //                     printErrorMsg(data.error);
        //                     spinner.hide();
        //                 }
        //             }
        //         });
        //     });
        // });

        function printErrorMsg(msg) {
            jQuery(".text-danger").hide().find("ul").html('');
            jQuery.each(msg, function(key, value) {
                const classMap = {
                    service_icon: '.print-service-icon-error-msg',
                    service_banner: '.print-service-banner-error-msg',
                    service_images: '.print-service-images-error-msg',
                    service_title: '.print-service-title-error-msg',
                    service_details: '.print-service-details-error-msg',
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

        function previewMultipleImages(input, containerId) {
            const container = $(containerId);
            container.html('');
            if (input.files) {
                Array.from(input.files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = $('<img>').attr('src', e.target.result).addClass(
                            'h-16 w-auto rounded border');
                        container.append(img);
                    };
                    reader.readAsDataURL(file);
                });
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../layout/' . $layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\astroway-backend2\resources\views/pages/serviceadd.blade.php ENDPATH**/ ?>