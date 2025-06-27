@extends('v2.frontend.layout.master')
{{-- TODO: change text to number and test it.--}}
@section('content')
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
                        <form method="POST" action="{{ route('front.store.appointment') }}">
                            @csrf
                            {{-- <h3 class="px_subheading">Appointment Form</h3> --}}
                            <div class="row">
                                {{-- Name --}}
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Name</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Name" name="name"
                                            required>
                                    </div>
                                </div>

                                {{-- Email --}}
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Email</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Email" name="email"
                                            required>
                                    </div>
                                </div>

                                {{-- Mobile Number --}}
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Mobile Number</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Mobile Number"
                                            name="mobile" required>
                                    </div>
                                </div>

                                {{-- Gender --}}
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Gender</label>
                                    <div class="form-group px_select_box">
                                        <select class="form-control" name="gender" required>
                                            <option value="">Choose a Gender </option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>

                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                </div>

                                {{-- Time of Day --}}
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Time of Day</label>
                                    <div class="form-group px_select_box">
                                        <select class="form-control" name="time_of_day" required>
                                            <option value="">Choose prefered time </option>
                                            <option value="morning">Morning</option>
                                            <option value="afternoon">Afternoon</option>
                                            <option value="evening">Evening</option>
                                        </select>

                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                </div>

                                {{-- Way to Reach --}}
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Way to Reach</label>
                                    <div class="form-group px_select_box d-flex align-items-center">
                                        <select class="form-control" name="way_to_reach" required>
                                            <option value="">Choose prefered way to reach </option>
                                            <option value="phone">Phone</option>
                                            <option value="email">Email</option>

                                        </select>

                                        <i class="fa fa-chevron-down"></i>

                                        {{-- <i class="fa fa-chevron-down position-absolute" style="right: 15px; top: 50%; transform: translateY(-50%); pointer-events: none; color:#4b0000;"></i> --}}

                                    </div>
                                </div>

                                {{-- Preferred Date (Day, Month, Year) --}}
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Preferred Date</label>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <input class="form-control" max="31" type="number" placeholder="Date" name="day"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <input class="form-control" max="12" type="number" placeholder="Month"
                                                    name="month" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <input class="form-control" type="number" placeholder="Year" name="year"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Preferred Time (Hrs, Mins, Secs) --}}
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Preferred Time</label>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <input class="form-control" type="number" max="23" placeholder="Hrs" name="hrs"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <input class="form-control" type="number" max="59" placeholder="Mins" name="mins"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <input class="form-control" max="59" type="number" placeholder="Sec" name="secs"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Address --}}
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Address</label>
                                    <div class="form-group">
                                        <textarea placeholder="Address" class="form-control" name="address" required></textarea>
                                    </div>
                                </div>

                                {{-- Reason --}}
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Reason for Appointment</label>
                                    <div class="form-group">
                                        <textarea placeholder="Message" class="form-control" name="reason" required></textarea>
                                    </div>
                                </div>

                                {{-- Submit Button --}}
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 px_padderTop20">
                                    <button type="submit" class="px_btn" style="transform:translateX(15px); color:var(--secondary-color); background-color: var(--primary-color);">Make an Appointment</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- @include('layout.components.divider')
    @include('v2.frontend.components.whychooseus')
    @include('layout.components.divider')
    @include('v2.frontend.components.testimonials', ['testimonials' => $testimonials]) --}}


    <style>
    .px_select_box {
        position: relative;
    }

    .px_select_box select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        padding-right: 2rem;
    }

    .px_select_box .fa-chevron-down {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        color: #4b0000;
    }


    textarea.form-control {
        resize:vertical; /* allow horizontal and vertical resizing */
        min-height: 80px; /* optional: to ensure initial size */
    }
</style>
@endsection
