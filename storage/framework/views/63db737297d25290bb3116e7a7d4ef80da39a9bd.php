<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Administrator Login Form</title>
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('theme/css/Login/style.css')); ?>">
</head>

<body>
    <div class="form">
        <div id="login">   
            <h1>Welcome Back</h1>
      
            <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('admin.auth')); ?>">
                <?php echo e(csrf_field()); ?>

      
                <div class="field-wrap<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <label>
                        Email Address<span class="req">*</span>
                    </label>
                    <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus autocomplete="off">
                    <?php if($errors->has('email')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
      
                <div class="field-wrap<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                    <label>
                        Password<span class="req">*</span>
                    </label>
                    <input id="password" type="password" class="form-control" name="password" required autocomplete="off">
                    <?php if($errors->has('password')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>

                <p class="forgot"><a href="#">Forgot Password?</a></p>
                <button type="submit" class="button button-block"/>Log In</button>
            </form>
        </div>
    </div> <!-- /form -->
</body>
<script type="text/javascript" src="<?php echo e(asset('theme/js/Bootstrap/jquery-3.2.1.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('theme/js/Login/index.js')); ?>"></script>
