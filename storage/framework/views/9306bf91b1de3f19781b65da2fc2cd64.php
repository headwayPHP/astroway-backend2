<?php $__env->startSection('content'); ?>
    <?php
        $appName = \App\Models\AdminModel\SystemFlag::where('id', 47)->first();
        $siteEmail = \App\Models\AdminModel\SystemFlag::where('id', 262)->first();
        $siteAddress = \App\Models\AdminModel\SystemFlag::where('id', 263)->first();
        $siteNumber = \App\Models\AdminModel\SystemFlag::where('id', 261)->first();
    ?>
    <section class="px_contact_section px_padderTop80">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="px_contact_info">
                        <h1 class="px_heading">Contact Information</h1>
                        <p class="px_font14 px_margin0"><?php echo e($siteAddress->value); ?></p>

                        <div class="row">

                            <div class="col-xl-6 col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                <div class="px_info_box">

                                    <div class="px_info">
                                        <a class="px_margin0 px_font14"
                                            href="tel:+91<?php echo e(preg_replace('/\D/', '', $siteNumber->value)); ?>">
                                            <i class="fas fa-phone-alt"></i> &nbsp;&nbsp; + (91)
                                            <?php echo e($siteNumber->value); ?></a>
                                        <br>
                                        <a class="px_margin0 px_font14" href="mailto:<?php echo e($siteEmail->value); ?>"
                                            style="margin-top: 1em;">
                                            <i class="fas fa-envelope"
                                                style="margin-right: 1em;"></i><?php echo e($siteEmail->value); ?></a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="px_contact_form px_form_style">
                        <h3 class="px_subheading px_form_title">Have A Question?</h3>
                        <form id="contactForm" class="px_needs-validation" method="POST"
                            action="<?php echo e(route('front.store.contact')); ?>" novalidate>
                            <?php echo csrf_field(); ?>

                            <!-- Full Name -->
                            <div class="form-group px_input_group" style="border:none;">
                                <label for="full_name" class="px_input_label">Full Name *</label>
                                <input type="text"
                                    class="form-control px_input_field <?php $__errorArgs = ['contact_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="full_name" name="contact_name" value="<?php echo e(old('contact_name')); ?>" required>
                                <?php $__errorArgs = ['contact_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-white"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Email -->
                            <div class="form-group px_input_group" style="border:none;">
                                <label for="email" class="px_input_label">Email Address *</label>
                                <input type="email"
                                    class="form-control px_input_field <?php $__errorArgs = ['contact_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="email" name="contact_email" value="<?php echo e(old('contact_email')); ?>" required>
                                <?php $__errorArgs = ['contact_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-white"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Message -->
                            <div class="form-group px_input_group" style="border:none;">
                                <label for="message" class="px_input_label">Your Message *</label>
                                <textarea class="form-control px_input_field px_textarea <?php $__errorArgs = ['contact_message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="message"
                                    name="contact_message" rows="5" required><?php echo e(old('contact_message')); ?></textarea>
                                <?php $__errorArgs = ['contact_message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-white"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Submit Button -->
                            <div class="px_form_actions" style="transform: translateX(20px);">
                                <button type="submit" class="px_btn px_btn_primary px_submit_btn mt-4">
                                    <span class="px_btn_text">Submit</span>
                                    <span class="px_btn_loader" style="display:none;">
                                        <svg class="px_spinner" viewBox="0 0 50 50">
                                            <circle cx="25" cy="25" r="20" fill="none" stroke-width="5">
                                            </circle>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </form>


                    </div>
                </div>

            </div>
        </div>
    </section>
    <div class="px_map_section">
        <iframe src="<?php echo e($map_url); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('v2.frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\astroway-backend2\resources\views/v2/frontend/pages/contactus.blade.php ENDPATH**/ ?>