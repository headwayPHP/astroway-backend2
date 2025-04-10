@extends('v2.frontend.layout.master')

@section('content')
    <section class="px_contact_section px_padderTop80">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="px_contact_info">
                        <h1 class="px_heading">Contact Information</h1>
                        <p class="px_font14 px_margin0">H Block-107, Titanium City Center, Nr. Sachin Tower,
                            Anandnagar Road,
                            Satelite,
                            Ahmedabad, Gujarat, India</p>

                        <div class="row">
                            <div class="col-xl-6 col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                <div class="px_info_box">
                                    <span class="px_icon"><img src="assets/images/svg/call1.svg" alt=""></span>
                                    <div class="px_info">
                                        <h5>Call Us</h5>
                                        <p class="px_margin0 px_font14">+ (91) 9825744633</p>
                                        <p class="px_margin0 px_font14">+ (91) 1800-326-324</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                <div class="px_info_box">
                                    <span class="px_icon"><img src="assets/images/svg/mail.svg" alt=""></span>
                                    <div class="px_info">
                                        <h5>Mail Us</h5>
                                        <a class="px_margin0 px_font14" href="javascript:;">
                                            info@example.com</a>
                                        <a class="px_margin0 px_font14" href="javascript:;">d_m_zaveri@yahoo.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-6 col-md-12">
                                                                                                                                                                                                                                    <div class="px_contact_form">
                                                                                                                                                                                                                                        <h4 class="px_subheading">Have A Question?</h4>
                                                                                                                                                                                                                                        <form>
                                                                                                                                                                                                                                            <div class="form-group">
                                                                                                                                                                                                                                                <label>Full Name</label>
                                                                                                                                                                                                                                                <input type="text" class="form-control require" id="full_name" name="full_name">
                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                            <div class="form-group">
                                                                                                                                                                                                                                                <label>Email Address</label>
                                                                                                                                                                                                                                                <input type="text" class="form-control" id="email" name="email" data-valid="email"
                                                                                                                                                                                                                                                    data-error="Email should be valid.">
                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                            <div class="form-group">
                                                                                                                                                                                                                                                <label>Message</label>
                                                                                                                                                                                                                                                <textarea class="form-control rquire" id="message" name="message"></textarea>
                                                                                                                                                                                                                                            </div>

                                                                                                                                                                                                                                            <button type="button" class="px_btn submitForm">submit</button>
                                                                                                                                                                                                                                            <div class="response"></div>
                                                                                                                                                                                                                                        </form>
                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                </div> -->
                <div class="col-lg-6 col-md-12">
                    <div class="px_contact_form px_form_style">
                        <h3 class="px_subheading px_form_title">Have A Question?</h3>
                        <form id="contactForm" class="px_needs-validation" method="POST"
                            action="{{ route('front.store.contact') }}" novalidate>
                            @csrf
                            <div class="form-group px_input_group" style="border:none;">
                                <label for="full_name" class="px_input_label">Full Name *</label>
                                <input type="text" class="form-control px_input_field" id="full_name" name="contact_name"
                                    required>
                                <div class="px_invalid_feedback">Please provide your name.</div>
                            </div>

                            <div class="form-group px_input_group" style="border:none;">
                                <label for="email" class="px_input_label">Email Address *</label>
                                <input type="email" class="form-control px_input_field" id="email"
                                    name="contact_email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                <div class="px_invalid_feedback">Please provide a valid email address.</div>
                            </div>

                            <div class="form-group px_input_group" style="border:none;">
                                <label for="message" class="px_input_label">Your Message *</label>
                                <textarea class="form-control px_input_field px_textarea" id="message" name="contact_message" rows="5" required></textarea>
                                <div class="px_invalid_feedback">Please enter your message.</div>
                            </div>

                            <div class="px_form_actions" style="transform: translateX(20px);">
                                <button type="submit" class="px_btn px_btn_primary px_submit_btn">
                                    <span class="px_btn_text">Submit</span>
                                    <span class="px_btn_loader" style="display:none;">
                                        <svg class="px_spinner" viewBox="0 0 50 50">
                                            <circle cx="25" cy="25" r="20" fill="none" stroke-width="5">
                                            </circle>
                                        </svg>
                                    </span>
                                </button>
                            </div>

                            <div class="px_form_response mt-3"></div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div class="px_map_section">
        <iframe src="{{ $map_url }}" width="600" height="450" style="border:0;" allowfullscreen=""
            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        {{-- <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7344.618039230788!2d72.51746925142233!3d23.012423297435927!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e84d5654d16df%3A0xad0e088472f0cccf!2sDhaval%20Zaveri!5e0!3m2!1sen!2sin!4v1743673438576!5m2!1sen!2sin"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
    </div>
@endsection
