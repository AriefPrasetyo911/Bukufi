<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Sign-Up/Login Form</title>
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('theme/css/Login/style.css')); ?>">
</head>

<body>
    <div class="form">
        <ul class="tab-group">
            <li class="tab active"><a href="#login">Log In</a></li>
            <li class="tab"><a href="#signup">Sign Up</a></li>
        </ul>
          
        <div class="tab-content">
            <div id="login">   
                <h1>Welcome Back!</h1>
          
                <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('login')); ?>">
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
                    <button class="button button-block"/>Log In</button>

                    <p class="back-to-website"><a href="<?php echo e(route('home.index')); ?>">Back to Website</a></p>
                </form>
            </div>

            <div id="signup">   
                <h1>Sign Up for Free</h1>
                <form action="/" method="post">
                    <div class="top-row">
                        <div class="field-wrap">
                            <label>
                                First Name<span class="req">*</span>
                            </label>
                            <input type="text" required autocomplete="off" />
                        </div>

                        <div class="field-wrap">
                            <label>
                                Last Name<span class="req">*</span>
                            </label>
                            <input type="text"required autocomplete="off"/>
                        </div>
                    </div>

                    <div class="field-wrap">
                        <label>
                            Email Address<span class="req">*</span>
                        </label>
                        <input type="email"required autocomplete="off"/>
                    </div>
              
                    <div class="field-wrap">
                        <label>
                            Set A Password<span class="req">*</span>
                        </label>
                        <input type="password"required autocomplete="off"/>
                    </div>
              
                    <button type="submit" class="button button-block"/>Get Started</button>

                    <p class="back-to-website"><a href="<?php echo e(route('home.index')); ?>">Back to Website</a></p>
                </form>
            </div>
        </div><!-- tab-content -->
    </div> <!-- /form -->
</body>
<script type="text/javascript" src="<?php echo e(asset('theme/js/Bootstrap/jquery-3.2.1.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('theme/js/Login/index.js')); ?>"></script>
