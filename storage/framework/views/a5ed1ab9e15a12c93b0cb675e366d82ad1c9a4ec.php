<?php $__env->startSection('content'); ?>
<style type="text/css">
    h3{
        margin-top: 0;
        margin-bottom: 0;
        text-align: center;
    }

    .user-login{
        position: relative;
        top: 100px;
    }
</style>
<div class="container user-login">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php if(Session::has('notif')): ?>
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                    <?php echo e(Session::get('notif')); ?>

                </div>
            <?php endif; ?>

            <?php if(Session::has('notif-fail')): ?>
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                    <?php echo e(Session::get('notif-fail')); ?>

                </div>
            <?php endif; ?>
            <div class="panel panel-default">
                <div class="panel-heading"><h3>User Login</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('user.auth')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label class="col-md-3 control-label">E-Mail</label>
                            <div class="col-md-7">
                                <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>">
                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label class="col-md-3 control-label">Password</label>
                            <div class="col-md-7">
                                <input type="password" class="form-control" name="password">
                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Login</button>
                                <button type="reset" class="btn btn-warning pull-right">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer text-center">
                    Not have an account? <a href="<?php echo e(route('user.register')); ?>" title="Register new account">Register Here</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>