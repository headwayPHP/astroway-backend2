<!-- BEGIN: Top Bar -->
<?php if(Auth()->user()): ?>
    <?php
    define('EXPRESSION', '/(?=[A-Z])/');
    ?>
    <div
        class="top-bar-boxed <?php echo e(isset($class) ? $class : ''); ?> h-[70px] md:h-[65px] z-[51] border-b border-white/[0.08] mt-12 md:mt-0 -mx-3 sm:-mx-8 md:-mx-0 px-3 md:border-b-0 relative md:fixed md:inset-x-0 md:top-0 sm:px-8 md:px-10 md:pt-10 md:bg-gradient-to-b md:from-slate-100 md:to-transparent dark:md:from-darkmode-700">
        <div class="h-full flex items-center">
            <?php
                $teamMember = DB::table('teammember')
                    ->where('userId', Auth()->user()->id)
                    ->first();
                if ($teamMember) {
                    $dashboardPage = DB::table('rolepages')
                        ->where('adminPageId', 1)
                        ->where('teamRoleId', $teamMember->teamRoleId)
                        ->first();
                } else {
                    $dashboardPage = true;
                }
            ?>
            <?php
                $logo = DB::table('systemflag')->where('name', 'AdminLogo')->select('value')->first();
                $appName = DB::table('systemflag')->where('name', 'AppName')->select('value')->first();
            ?>
            <?php if($dashboardPage): ?>
                <a href="<?php echo e(route('getDashboard')); ?>" class="logo -intro-x hidden md:flex xl:w-[180px] block">
                    <img alt="AstroGuru image" class="logo__image w-6" src="<?php echo e(asset($logo->value)); ?>"
                        style="height: 50px;width: 100%; max-width: 50px;border-radius:50%">
                    <span class="logo__text text-white text-lg ml-5 mt-2.5" style="vertical-align: center">
                        <?php echo e($appName->value); ?>

                    </span>
                </a>
            <?php else: ?>
                <a class="logo -intro-x hidden md:flex xl:w-[180px] block">
                    <img alt="AstroGuru image" class="logo__image w-6" src="<?php echo e(env('APP_URL') . '/' . $logo->value); ?>"
                        style="height: 50px;width: 100%; max-width: 50px;border-radius:50%">
                    <span class="logo__text text-white text-lg ml-5 mt-2.5" style="vertical-align: center">
                        <?php echo e($appName->value); ?>

                    </span>
                </a>
            <?php endif; ?>
            <!-- END: Logo -->
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
                <ol class="breadcrumb breadcrumb-light">

                    <li class="breadcrumb-item">
                        <?php if($dashboardPage): ?>
                            <a href="<?php echo e(route('getDashboard')); ?>">Home</a>
                        <?php else: ?>
                            <a>Home</a>
                        <?php endif; ?>
                    </li>
                    
                    <?php if(Request::segment(2)): ?>
                        <li class="breadcrumb-item active" aria-current="page" style="text-transform: capitalize;">
                            <?php if(Request::segment(3)): ?>
                                <?php if(preg_match('/[A-Z]/', Request::segment(2))): ?>
                                    <?php
                                    $capital = preg_split(EXPRESSION, Request::segment(2));
                                    $header = implode(' - ', $capital);
                                    ?>
                                    <a href="/admin/<?php echo e(Request::segment(2)); ?>"> <?php echo e($header); ?></a>
                                <?php else: ?>
                                    <a href="/admin/<?php echo e(Request::segment(2)); ?>"> <?php echo e(Request::segment(2)); ?></a>
                                <?php endif; ?>
                        <li class="breadcrumb-item active" aria-current="page" style="text-transform: capitalize;">
                            <?php if(preg_match('/[A-Z]/', Request::segment(3))): ?>
                                <?php
                                $capital = preg_split(EXPRESSION, Request::segment(3));
                                $header = implode(' - ', $capital);
                                ?>
                                <?php echo e($header); ?>

                            <?php else: ?>
                                <?php echo e(Request::segment(3)); ?>

                            <?php endif; ?>
                        </li>
                    <?php else: ?>
                        <?php if(preg_match('/[A-Z]/', Request::segment(2))): ?>
                            <?php
                            $capital = preg_split(EXPRESSION, Request::segment(2));
                            $header = implode(' - ', $capital);
                            ?>
                            <?php echo e($header); ?>

                        <?php else: ?>
                            <?php echo e(Request::segment(2)); ?>

                        <?php endif; ?>
                    <?php endif; ?>
                    </li>
<?php endif; ?>
</ol>
</nav>
<!-- END: Notifications -->
<!-- BEGIN: Account Menu -->
<div class="intro-x dropdown w-8 h-8">
    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110"
        role="button" aria-expanded="false" data-tw-toggle="dropdown">
        <?php if(auth()->user()): ?>
            
            <img class="rounded-full" src="https://img.icons8.com/?size=100&id=98957&format=png&color=FFFFFF"
                onerror="this.onerror=null;this.src=asset('images/person.png');" alt="Admin Profile" />
        <?php else: ?>
            <img class="rounded-full" src=<?php echo e(asset('images/person.png')); ?> alt="Admin Profile" />
        <?php endif; ?>
        
        
    </div>
    <div class="dropdown-menu w-56">
        <ul
            class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
            <li class="p-2">
                <?php if(auth()->user()): ?>
                    <div class="font-medium"><?php echo e(auth()->user()->name); ?></div>
                <?php endif; ?>
                
            </li>

            <li>
                <hr class="dropdown-divider border-white/[0.08]">
            </li>
            <li>
                <a href="<?php echo e(route('editProfile')); ?>" class="dropdown-item hover:bg-white/5">
                    <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Edit Profile
                </a>
            </li>
            <li>
                <a onclick="document.getElementById('change-modal').reset();"class="dropdown-item hover:bg-white/5 changepassword"
                    href="javascript:;" data-tw-toggle="modal" data-tw-target="#change-modal">
                    <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Change Password
                </a>
            </li>
            <li>
                
            </li>
        </ul>
    </div>
</div>
<!-- END: Account Menu -->
</div>
</div>

<div id="change-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">Change Password</h2>
            </div>
            <form method="POST" enctype="multipart/form-data" id="change-password">
                <?php echo csrf_field(); ?>
                <div id="input" class="p-5">
                    <div class="input">
                        <div>
                            <label for="name" class="form-label">Old Password</label>
                            <input id="old" name="old" type="text" class="form-control"
                                placeholder="Old Password" required>
                            <div class="text-danger print-oldPassword-error-msg mb-2" style="display:none">
                                <ul></ul>
                            </div>
                        </div>
                    </div>
                    <div class="input mt-3">
                        <div>
                            <label for="name" class="form-label">New Password</label>
                            <input id="new" name="new" type="password" class="form-control"
                                placeholder="New Password" required>
                            <div class="text-danger print-newpassword-error-msg mb-2" style="display:none">
                                <ul></ul>
                            </div>
                        </div>

                    </div>
                    <div class="mt-5"><button type="submit" class="btn btn-primary shadow-md mr-2">Change
                            Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    jQuery("#change-password").submit(function(e) {
        e.preventDefault();
        jQuery.ajax({
            type: 'POST',
            url: "<?php echo e(route('changePassword')); ?>",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(data) {
                if (jQuery.isEmptyObject(data.error)) {
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true
                    }
                    location.href = "/admin/login"
                } else {
                    printErrorMsg(data.error);
                }
            }
        });

    });



    function printErrorMsg(msg) {
        jQuery(".print-oldPassword-error-msg").find("ul").html('');
        jQuery.each(msg, function(key, value) {
            if (!key) {
                jQuery(".print-oldPassword-error-msg").css('display', 'block');
                jQuery(".print-oldPassword-error-msg").find("ul").append('<li>' + value + '</li>');
            }
        });
    }

    jQuery('.changepassword').on('click', function() {
        jQuery(".print-oldPassword-error-msg").css('display', 'none');
    })
</script>

<?php endif; ?>
<!-- END: Top Bar -->
<?php /**PATH C:\xampp\htdocs\astroway-backend2\resources\views////layout/components/top-bar.blade.php ENDPATH**/ ?>