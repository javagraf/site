
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Job Portalддды</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo e(URL::asset('public/Logo.png')); ?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo e(URL::asset('public/plugins/bootstrap/css/bootstrap.css')); ?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo e(URL::asset('public/plugins/node-waves/waves.css')); ?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo e(URL::asset('public/plugins/animate-css/animate.css')); ?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo e(URL::asset('public/css/style.css')); ?>" rel="stylesheet">
</head>

<body class="login-page">
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);">JOB<b>PORTAL</b></a>
        
    </div>
    <div class="card">
        <div class="body">

            <?php if($errors  && !$errors->isEmpty()): ?>
                <div class="errors-msg alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <ul>
                        <?php if($errors->has('email')): ?>
                            <li><?php echo e($errors->first('email')); ?></li>
                        <?php endif; ?>
                        <?php if($errors->has('password')): ?>
                            <li><?php echo e($errors->first('password')); ?></li>
                        <?php endif; ?>
                        <?php if($errors->has('mailnotexist')): ?>
                            <li><?php echo e($errors->first('mailnotexist')); ?></li>
                        <?php endif; ?>
                        <?php if($errors->has('notverify')): ?>
                            <li><?php echo e($errors->first('notverify')); ?></li>
                        <?php endif; ?>
                        <?php if($errors->has('invalid')): ?>
                            <li><?php echo e($errors->first('invalid')); ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?>
        <form id="sign_in" class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                        <?php echo e(csrf_field()); ?>


              <div class="msg">Sign In</div>

            <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                <div class="form-line">
                    <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                </div>
                <?php if($errors->has('email')): ?>
                 <label id="username-error" class="error" for="username"><?php echo e($errors->first('email')); ?></label>
                <?php endif; ?>
            </div>


            <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                <div class="form-line">
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>
                <?php if($errors->has('password')): ?>
                    <label id="password-error" class="error" for="password"><?php echo e($errors->first('password')); ?></label>
                <?php endif; ?>
            </div>

            <div class="row">
                <div class="col-xs-8 p-t-5">
                    <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                    <label for="rememberme" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>Remember Me</label>
                </div>
                <div class="col-xs-4">
                    <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                </div>
            </div>

            <div class="row m-t-15 m-b--20">
                <div class="col-xs-6">
                    
                </div>
                <div class="col-xs-6 align-right">
                    <a href="<?php echo e(url('/password/reset')); ?>">Forgot Password?</a>
                </div>
            </div>

         </form>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="<?php echo e(URL::asset('public/plugins/jquery/jquery.min.js')); ?>"></script>

<!-- Bootstrap Core Js -->
<script src="<?php echo e(URL::asset('public/plugins/bootstrap/js/bootstrap.js')); ?>"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?php echo e(URL::asset('public/plugins/node-waves/waves.js')); ?>"></script>

<!-- Validation Plugin Js -->
<script src="<?php echo e(URL::asset('public/plugins/jquery-validation/jquery.validate.js')); ?>"></script>

<!-- Custom Js -->
<script src="<?php echo e(URL::asset('public/js/admin.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/js/pages/examples/sign-in.js')); ?>"></script>
</body>

</html>