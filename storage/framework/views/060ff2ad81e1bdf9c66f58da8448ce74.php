<div class="px_header_wrapper">
    <div class="px_header_detail">

        <div class="px_menu_wrapper" style="background-color: rgb(143, 26, 26);">
            <span class="px_toggle bg_overlay">
                <img src="public/images/svg/menu.svg" alt="">
            </span>
            <div class="px_logo">
                <img src="public/images/logo.png" alt="logo" srcset="" width="100"
                    style="margin-right: 1em; width: 3.1em;">
                <h1>Dhaval Zaveri</h1>

            </div>

            <div class="px_menu">
                <ul>
                    
                    <li>
                        <a href="<?php echo e(route('front.home')); ?>"
                            class="<?php echo e(request()->routeIs('front.home') ? 'active' : ''); ?>">home</a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('front.aboutus')); ?>"
                            class="<?php echo e(request()->routeIs('front.aboutus') ? 'active' : ''); ?>">about</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('front.services')); ?>"
                            class="<?php echo e(request()->routeIs('front.services') ? 'active' : ''); ?>">services</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('front.remotebooking')); ?>"
                            class="<?php echo e(request()->routeIs('front.remotebooking') ? 'active' : ''); ?>">remote booking</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('front.appointment')); ?>"
                            class="<?php echo e(request()->routeIs('front.appointment') ? 'active' : ''); ?>">appointment</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('front.contact')); ?>"
                            class="<?php echo e(request()->routeIs('front.contact') ? 'active' : ''); ?>">contact</a>
                    </li>

                </ul>
                

            </div>

        </div>
        <span class="px_body_overlay"></span>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\astroway-backend2\resources\views/v2/frontend/layout/header.blade.php ENDPATH**/ ?>