<div class="px_header_wrapper">
    <div class="px_header_detail">

        <div class="px_menu_wrapper" style="background-color: rgb(143, 26, 26);">
            <span class="px_toggle bg_overlay">
                <img src="public/images/svg/menu.svg" alt="">
            </span>
            <div class="px_logo">
                <img src="public/images/logo.png" alt="logo" srcset="" width="100"
                    style="margin-right: 1em; width: 3.1em; scale:1.3;">
                <h3 style="color: white; margin-bottom: unset;">Dhaval Zaveri</h3>

            </div>

            <div class="px_menu">
                <ul>
                    {{-- <li><a href="{{ route('front.home') }}">home</a>

                    </li>
                    <li><a href="{{ route('front.aboutus') }}">about</a></li>
                    <li><a href="{{ route('front.services') }}">services</a></li>
                    </li>
                    <li><a href="{{ route('front.remotebooking') }}">remote booking</a></li>
                    <li><a href="{{ route('front.appointment') }}">appointment</a></li>

                    <li><a href="{{ route('front.contact') }}">contact</a></li> --}}
                    <li>
                        <a href="{{ route('front.home') }}"
                            class="{{ request()->routeIs('front.home') ? 'active' : '' }}">home</a>
                    </li>

                    <li>
                        <a href="{{ route('front.aboutus') }}"
                            class="{{ request()->routeIs('front.aboutus') ? 'active' : '' }}">about</a>
                    </li>
                    <li>
                        <a href="{{ route('front.videos') }}"
                            class="{{ request()->routeIs('front.videos') ? 'active' : '' }}">videos</a>
                    </li>
                    <li>
                        <a href="{{ route('front.services') }}"
                            class="{{ request()->routeIs('front.services') ? 'active' : '' }}">services</a>
                    </li>
                    <li>
                        <a href="{{ route('front.remotebooking') }}"
                            class="{{ request()->routeIs('front.remotebooking') ? 'active' : '' }}">remote booking</a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('front.appointment') }}"
                            class="{{ request()->routeIs('front.appointment') ? 'active' : '' }}">appointment</a>
                    </li> --}}
                    <li>
                        <a href="{{ route('front.contact') }}"
                            class="{{ request()->routeIs('front.contact') ? 'active' : '' }}">contact</a>
                    </li>

                    <li>
                        <a href="{{ route('login.index') }}"
                            class="{{ request()->routeIs('login.index') ? 'active' : '' }}">login</a>
                    </li>

                </ul>
                {{-- <div id="google_translate_button" style="height:38px;"></div> --}}

            </div>

            <a href="{{ route('front.appointment') }}"
                class="{{ request()->routeIs('front.appointment') ? 'active' : '' }}"
                style=" color: var(--primary-color) !important; background-color: var(--secondary-color); border-radius: 0.25em; height: fit-content; padding: 0.5em 1em;">
                Appointment
            </a>


        </div>
        <span class="px_body_overlay"></span>
    </div>
</div>


