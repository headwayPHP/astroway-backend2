<?php $__env->startSection('content'); ?>
    <section class="px_appointment_wrapper px_padderTop80 px_padderBottom80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="px_heading px_heading_center text-center">Book Your Online Consultation</h2>
                    <p class="px_font14 px_padderBottom10 text-center">Please fill out all required details for your
                        Online Consultation. <br />After submission, you'll be directed to the payment page to
                        complete your booking.</p>

                    <div class="px_journal_box_wrapper">
                        <form id="remoteBookingForm" action="<?php echo e(route('front.store.remotebooking')); ?>" method="POST"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <h3 class="px_subheading">Personal Information</h3>
                            <div class="row">
                                <!-- Personal Information -->
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label for="fullname">Full Name *</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" id="fullname" name="fullname"
                                            placeholder="Your full name" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label for="birthdate">Birth Date *</label>
                                    <div class="form-group position-relative"
                                        onclick="document.getElementById('birthdate').showPicker();">
                                        <input class="form-control" type="date" id="birthdate" name="birthdate" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label for="birthtime">Birth Time *</label>
                                    <div class="form-group position-relative"
                                        onclick="document.getElementById('birthtime').showPicker();">
                                        <input class="form-control" type="time" id="birthtime" name="birthtime" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label for="birthplace">Birth Place *</label>
                                    <div class="form-group">
                                        <input class="form-control " type="text" id="birthplace" name="birthplace"
                                            placeholder="City where you were born"  required>
                                    </div>
                                </div>
                            </div>

                            <h3 class="px_subheading px_padderTop20">Property Information</h3>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label for="city">City *</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" id="city" name="city"
                                            placeholder="Current city of residence" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label for="address">Full Address *</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" id="address" name="address"
                                            placeholder="Complete property address" required>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="google_location">Google Maps Location Link *</label>
                                    <div class="form-group position-relative ">
                                        <input class="form-control" type="url" id="google_location"
                                            name="google_location" placeholder="Paste Google Maps share link" required
                                            data-bs-toggle="tooltip" data-bs-placement="right"
                                            title="Click 'Share' on Google Maps and paste the link here.">
                                    </div>
                                </div>
                            </div>

                            <h3 class="px_subheading px_padderTop20">Property Documentation</h3>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label for="layout_map">Layout/Floor Plan (DWG/PDF/Image) *</label>
                                    <div class="form-group position-relative ">
                                        <input class="form-control align-content-center " type="file" id="layout_map" name="layout_map"
                                            accept=".pdf,.jpg,.jpeg,.png" required data-bs-toggle="tooltip"
                                            data-bs-placement="right"
                                            title="Upload a clear image or PDF of your property layout.">
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label for="compass_reading">Compass Reading (Image/Video) *</label>
                                    <div class="form-group position-relative">
                                        <input class="form-control  align-content-center" type="file" id="compass_reading"
                                            name="compass_reading" accept=".jpg,.jpeg,.png,.mp4,.mov" required
                                            data-bs-toggle="tooltip" data-bs-placement="right"
                                            title="Upload an image or video clearly showing compass directions.">
                                    </div>
                                </div>


                                <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                                                                                                                                                                                    <label for="property_video">Property Video Walkthrough (Optional)</label>
                                                                                                                                                                                                                                                                    <div class="form-group">
                                                                                                                                                                                                                                                                        <input class="form-control" type="file" id="property_video"
                                                                                                                                                                                                                                                                            name="property_video" accept=".mp4,.mov">
                                                                                                                                                                                                                                                                        <small class="form-text text-muted">Optional video showing all rooms and
                                                                                                                                                                                                                                                                            directions</small>
                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                </div> -->
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="property_video">Property Video Walkthrough (Optional)</label>
                                    <div class="form-group position-relative">
                                        <input class="form-control  align-content-center" type="file" id="property_video"
                                            name="property_video" accept=".mp4,.mov" data-bs-toggle="tooltip"
                                            data-bs-placement="right"
                                            title="Optional: Upload a video walkthrough showing all rooms and directions.">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="additional_notes">Additional Notes</label>
                                    <div class="form-group">
                                        <textarea id="additional_notes" name="additional_notes" class="form-control"
                                            placeholder="Any specific concerns or questions you have"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 px_padderTop20 text-start">
                                <button type="submit" class="px_btn" style="transform:translateX(15px); color:var(--secondary-color); background-color: var(--primary-color);">Proceed to Payment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .form-control {
            border-radius: 10px;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('v2.frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\astroway-backend2\resources\views/v2/frontend/pages/remotebooking.blade.php ENDPATH**/ ?>