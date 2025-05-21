<?php $__env->startSection('content'); ?>
    <section class="px_appointment_wrapper px_padderTop80 px_padderBottom80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="px_heading px_heading_center text-center">Make Your Appointment To Discuss Any
                        Problem.</h2>
                    <p class="px_font14 px_padderBottom10 text-center">There are many variations of passages of
                        Lorem Ipsum available, but the majority have suffered alteration in some form, by injected
                        humour, or randomised words which don't look even slightly believable. If you are going to
                        use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden
                        in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat
                        predefined chunks as necessary, making this the first true generator on the Internet.</p>
                    <!-- <p class="px_font14 px_padderBottom20 text-center">It uses a dictionary of over 200 Latin words,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            combined with a handful of model sentence structures, to generate Lorem Ipsum which looks
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            humour, or non-characteristic words etc.</p> -->



                    <div class="px_journal_box_wrapper">
                        <form method="POST" action="<?php echo e(route('front.store.appointment')); ?>">
                            <?php echo csrf_field(); ?>
                            <h3 class="px_subheading">Appointment Form</h3>
                            <div class="row">
                                
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Name</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Name" name="name"
                                            required>
                                    </div>
                                </div>

                                
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Email</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Email" name="email"
                                            required>
                                    </div>
                                </div>

                                
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Mobile Number</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Mobile Number"
                                            name="mobile" required>
                                    </div>
                                </div>

                                
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Gender</label>
                                    <div class="form-group px_select_box">
                                        <select class="form-control" name="gender" required>
                                            <option value="">Choose a Gender 🡇</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Time of Day</label>
                                    <div class="form-group px_select_box">
                                        <select class="form-control" name="time_of_day" required>
                                            <option value="">Choose prefered time 🡇</option>
                                            <option value="morning">Morning</option>
                                            <option value="afternoon">Afternoon</option>
                                            <option value="evening">Evening</option>
                                        </select>
                                    </div>
                                </div>

                                
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Way to Reach</label>
                                    <div class="form-group px_select_box d-flex align-items-center">
                                        <select class="form-control" name="way_to_reach" required>
                                            <option value="">Choose prefered way to reach 🡇</option>
                                            <option value="phone">Phone</option>
                                            <option value="email">Email</option>

                                        </select>

                                    </div>
                                </div>

                                
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Preferred Date</label>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Date" name="day"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Month"
                                                    name="month" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Year" name="year"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Preferred Time</label>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Hrs" name="hrs"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Mins" name="mins"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Sec" name="secs"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Address</label>
                                    <div class="form-group">
                                        <textarea placeholder="Address" class="form-control" name="address" required></textarea>
                                    </div>
                                </div>

                                
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Reason for Appointment</label>
                                    <div class="form-group">
                                        <textarea placeholder="Message" class="form-control" name="reason"> required</textarea>
                                    </div>
                                </div>

                                
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 px_padderTop20">
                                    <button type="submit" class="px_btn">Make an Appointment</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php echo $__env->make('v2.frontend.components.whychooseus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('v2.frontend.components.testimonials', ['testimonials' => $testimonials], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('v2.frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\astroway-backend2\resources\views/v2/frontend/pages/appointment.blade.php ENDPATH**/ ?>