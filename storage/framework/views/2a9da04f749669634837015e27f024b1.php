<!DOCTYPE html>
<!--
Template Name:jyotish HTML5 Website Template
Version: 1.0.0
Author: PixelNX
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zxx">


<!-- Mirrored from kamleshyadav.com/templatemonster-html/Jyotish/index-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2025 11:28:38 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>Dhaval Zaveri</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- stylesheet -->
    <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="public/js/plugin/slick/slick.css">
    <link rel="stylesheet" type="text/css" media="screen" href="public/js/plugin/airdatepicker/datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/fonts.css">
    <link rel="stylesheet" href="public/css/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" id="theme-change" type="text/css" href="#">
    <!-- favicon -->
    <link rel="shortcut icon" href="public/images/logo.png" type="image/x-icon">
</head>

<body class="px-indexLight">
    <!-- <div class="px_loader">
        <img src="public/images/GIF_01.gif" alt="" class="img-responsive">
    </div> -->

    <!-- color option end -->
    <div class="px_main_wrapper">
        <?php echo $__env->make('v2.frontend.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('v2.frontend.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Modal -->
        <div id="px_login" class="modal fade" tabindex="-1" aria-labelledby="px_login" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">&times;</button>
                        <h4 class="modal-title">Login</h4>
                    </div>
                    <div class="modal-body">
                        <div class="px_login_box active">
                            <form>
                                <div class="form-group">
                                    <input type="text" placeholder="Enter email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Enter password here" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="px_login_data">
                                        <label>Remember me
                                            <input type="checkbox" name="px_remember_me" value="">
                                            <span class="checkmark"></span>
                                        </label>
                                        <a href="#">Forgot password ?</a>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="javascript:;" class="px_btn">login</a>
                                </div>
                            </form>
                            <p class="text-center px_margin0 px_padderTop20">Create An Account ? <a href="javascript:;"
                                    class="px_orange px_signup">SignUp</a></p>
                        </div>
                        <div class="px_signup_box">
                            <form>
                                <div class="form-group">
                                    <input type="text" placeholder="Enter name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Enter email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Enter password here" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Enter mobile number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <select class="form-control">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <a href="javascript:;" class="px_btn">Sign Up</a>
                                </div>
                            </form>
                            <p class="text-center px_margin0 px_padderTop20">Have An Account ? <a href="javascript:;"
                                    class="px_orange px_login">Login</a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- go top wrapper start -->
        <div id="scroll" class="main_go_top ">
            <div class="go_top item-bounce">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                        width="20" height="30" x="0" y="0" viewBox="0 0 512 512"
                        style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                        <g>
                            <g data-name="24 Pluto">
                                <path
                                    d="M256 230.63a109.82 109.82 0 1 0-109.85-109.81A109.94 109.94 0 0 0 256 230.63zm0-159.71a49.9 49.9 0 1 1-49.89 49.9A50 50 0 0 1 256 70.92z"
                                    opacity="1" data-original="#000000"></path>
                                <path
                                    d="M420.29 132.24a30 30 0 0 0-33.8 25.55c-7.49 53.87-63.6 94.5-130.53 94.5s-123-40.63-130.45-94.5A30 30 0 0 0 66.16 166C76.52 240.6 143 298.75 226 310.16v49.35h-49.88a30 30 0 1 0 0 59.92H226V471a30 30 0 0 0 30 30 30 30 0 0 0 30-30v-51.57h49.89a30 30 0 1 0 0-59.92H286v-49.35c83.1-11.43 149.52-69.57 159.88-144.13a30 30 0 0 0-25.59-33.79z"
                                    opacity="1" data-original="#000000"></path>
                            </g>
                        </g>
                    </svg>
                </span>
            </div>
        </div>


        <!-- javascript -->
        <script src="public/js/jquery.min.js"></script>
        <script src="public/js/bootstrap.min.js"></script>
        <script src="public/js/smooth-scroll.min.js"></script>
        <script src="public/js/plugin/slick/slick.min.js"></script>
        <script src="public/js/plugin/countto/jquery.countTo.js"></script>
        <script src="public/js/plugin/airdatepicker/datepicker.min.js"></script>
        <script src="public/js/plugin/airdatepicker/i18n/datepicker.en.js"></script>
        <!-- Include Toastr CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
        
        <!-- Include jQuery (required) + Toastr JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script src="public/js/custom.js"></script>
        <?php if(session('success')): ?>
            <script>
                $(document).ready(function() {
                    toastr.success(<?php echo json_encode(session('success'), 15, 512) ?>);
                });
            </script>
        <?php endif; ?>


</body>

<!-- Mirrored from kamleshyadav.com/templatemonster-html/Jyotish/index-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2025 11:28:39 GMT -->

</html>
<?php /**PATH C:\xampp\htdocs\astroway-backend2\resources\views/v2/frontend/layout/master.blade.php ENDPATH**/ ?>