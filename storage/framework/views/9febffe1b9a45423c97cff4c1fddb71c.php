<!DOCTYPE html>

<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>"
      class="<?php echo e('default' != 'default' ? ' ' . 'default' : ''); ?>">
<!-- BEGIN: Head -->
<?php
    $logo = DB::table('systemflag')
        ->where('name', 'AdminLogo')
        ->select('value')
        ->first();
    $appName = DB::table('systemflag')
        ->where('name', 'AppName')
        ->select('value')
        ->first();
?>

<head>
    <title><?php echo e($appName->value); ?></title>
    <meta charset="utf-8">
    <link as="image" fetchpriority="high" href="/<?php echo e($logo->value); ?>" rel="preload shortcut icon">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" defer/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
          defer>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
          defer>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Astroway Admin Panel">
    <meta name="keywords"
          content="Astroway Admin Panel">
    <meta name="author" content="LEFT4CODE">
    <script src="https://www.gstatic.com/firebasejs/7.9.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.9.1/firebase-messaging.js"></script>
    <script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
    <script src="<?php echo e(asset('build/assets/jquery.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <style>
        .disabled {
            pointer-events: none
        }

        .edit-modal {
            z-index: 1000 !important;
        }

        p.leading-5 {
            display: none !important;
        }

        .pagination li a:active {
            background-color: red
        }

        .sticky-top {
            position: sticky;
            top: 0;
            z-index: 1020;
            background: #fff
        }

        .list-table {
            height: calc(100vh - 282px);
            overflow-y: auto !important;
            margin-top: 10px;
            margin-bottom: 10px
        }

        .setting-page {
            height: calc(100vh - 251px);
            overflow-y: auto !important;
            margin-top: 10px;
            margin-bottom: 10px
        }

        .grid-table {
            height: calc(100vh - 292px);
            overflow-y: auto !important;
            margin-top: 10px;
            margin-bottom: 10px
        }

        .grid-table-without-search {
            height: calc(100vh - 238px);
            overflow-y: auto !important;
            margin-top: 10px;
            margin-bottom: 10px
        }

        .daily {
            height: calc(100vh - 340px);
            overflow-y: auto !important;
            margin-top: 10px;
            margin-bottom: 10px
        }

        .withoutsearch {
            height: calc(100vh - 227px);
            overflow-y: auto !important;
            margin-top: 10px;
            margin-bottom: 10px
        }

        .d-inline {
            display: inline-block
        }

        .addbtn {
            float: right
        }

        .horobtn:after {
            margin-right: 5px;
            content: "";
            background-color: #000;
            position: absolute;
            width: 2px;
            height: 45px;
            display: revert;
            left: 160px;
            margin-left: 5px;
        }

        .horo-insight:after {
            left: 207px
        }

        .horo:after {
            left: 127px
        }

        .astrologer-tab-content {
            height: calc(100vh - 440px);
            overflow-y: auto;
            overflow-x: hidden
        }

        .pagecount {
            margin-top: 10px
        }

        .text-red {
            color: red
        }

        .text-green {
            color: #78b144;
        }

        .category {
            font-size: 20px;
        }

        @keyframes animName {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .loader {

            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            background: rgba(48, 48, 48, 0.75) url(/<?php echo e($logo->value); ?>) no-repeat center center;
            z-index: 10000;
            background-size: 100px;
        }

        .changeorder {
            border: 1px solid #ddd;
            text-align: center;
            padding: 5px;
            border-radius: 5px;

        }

        input[type='file'] {
            color: rgba(0, 0, 0, 0)
        }

        .mastertab {
            height: calc(100vh - 420px);
            overflow: auto;
            overflow-x: hidden
        }

        .fitbox {
            height: fit-content
        }

        .setting {
            height: calc(100vh - 260px);
            overflow: auto;
            overflow-x: hidden
        }

        .mail {
            margin: auto;
            width: 600px;
        }

        @media (max-width: 695px) {

            .dailyaddbtn {
                float: left;
            }

            .dailytitle {
                margin-top: 0px !important;
            }
        }

        @media (max-width: 920px) {
            .horobtn:after {
                display: none
            }

            .dailytitle {
                margin-top: 10px !important;
            }

            .dailyhorobtn {
                float: left;
            }
        }

        @media (max-width: 830px) {
            .horedit {
                margin-top: 20px
            }
        }

        @media (max-width: 640px) {
            .horosign {
                margin-top: 0px !important
            }
        }

        .nav-link-tabs {
            overflow-x: auto
        }

        .settingimg {
            height: 150px;
            text-align: -webkit-center;
            width: 100%;
        }

        .settingimg img {
            height: 100%;
            /* width: 100%; */
            object-fit: cover
        }

        th,
        td {
            font-size: .875rem
        }

        .select2-container {
            width: 100% !important
        }

        .editastrologertab {
            height: calc(100vh - 280px);
            overflow: auto;
            overflow-x: hidden
        }

        .systooltip {
            position: relative;
            display: inline-block;
        }

        .systooltip .tooltiptext {
            visibility: hidden;
            /* width: 120px; */
            background-color: black;
            color: #fff;
            /* text-align: center; */
            border-radius: 6px;
            padding: 5px 5px;
            font-size: 12px;
            /* Position the tooltip */
            position: initial;
            z-index: 1;
            top: -5px;
            left: 105%;
        }


        .systooltip:hover .tooltiptext {
            visibility: visible;
        }

        .cke_notification.cke_notification_warning {
            display: none;
        }
    </style>
    <script></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <?php echo $__env->yieldContent('head'); ?>

    <!-- BEGIN: CSS Assets-->
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <!-- END: CSS Assets-->
</head>




<?php echo $__env->yieldContent('body'); ?>

<script>
    $(window).on('load', function () {
        $('#loading').hide();
    })
</script>


</html>
<?php /**PATH C:\xampp\htdocs\astroway-backend2\resources\views////layout/base.blade.php ENDPATH**/ ?>