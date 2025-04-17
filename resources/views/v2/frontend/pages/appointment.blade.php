@extends('v2.frontend.layout.master')

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
                            <h3 class="px_subheading">Appointment Form</h3>
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
                                        <input class="form-control" type="text" placeholder="Email" name="email">
                                    </div>
                                </div>

                                {{-- Mobile Number --}}
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Mobile Number</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Mobile Number"
                                            name="mobile">
                                    </div>
                                </div>

                                {{-- Gender --}}
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Gender</label>
                                    <div class="form-group px_select_box">
                                        <select class="form-control" name="gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- Time of Day --}}
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Time of Day</label>
                                    <div class="form-group px_select_box">
                                        <select class="form-control" name="time_of_day">
                                            <option value="morning">Morning</option>
                                            <option value="afternoon">Afternoon</option>
                                            <option value="evening">Evening</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- Way to Reach --}}
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Way to Reach</label>
                                    <div class="form-group px_select_box">
                                        <select class="form-control" name="way_to_reach">
                                            <option value="phone">Phone</option>
                                            <option value="email">Email</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- Preferred Date (Day, Month, Year) --}}
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Preferred Date</label>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Date"
                                                    name="day">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Month"
                                                    name="month">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Year"
                                                    name="year">
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
                                                <input class="form-control" type="text" placeholder="Hrs" name="hrs">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Mins"
                                                    name="mins">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Sec" name="secs">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Address --}}
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Address</label>
                                    <div class="form-group">
                                        <textarea placeholder="Address" class="form-control" name="address"></textarea>
                                    </div>
                                </div>

                                {{-- Reason --}}
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Reason for Appointment</label>
                                    <div class="form-group">
                                        <textarea placeholder="Message" class="form-control" name="reason"></textarea>
                                    </div>
                                </div>

                                {{-- Submit Button --}}
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

    @include('v2.frontend.components.whychooseus')
    @include('v2.frontend.components.testimonials', ['testimonials' => $testimonials])
@endsection
