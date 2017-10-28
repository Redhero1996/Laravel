<title>Log In</title>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                     <?php if($errors->has('msg')): ?>
                            <div class="alert alert-danger">
                                <?php echo e($errors->first('msg')); ?>

                            </div>
                         <!-- In message -->
                        <?php elseif(session('created')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('created')); ?>

                            </div>
                        <?php endif; ?>
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="email" required autofocus>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                    Forgot Your Password?
                                </a>                            
                            </div>
                        </div>

                         <div class="text-center center-block">
                                <div class="btn-block">
                                    <a class="btn btn-social btn-facebook" href="login/facebook">
                                        <span class="fa fa-facebook"></span> Sign in with Facebook
                                    </a>
                                </div>
                                <div class="btn-block">
                                    <a class="btn btn-social btn-twitter" href="login/twitter">
                                        <span class="fa fa-twitter"></span> Sign in with Twitter
                                    </a>
                                </div>
                                <div class="btn-block">
                                    <a class="btn btn-social btn-google" href="login/google">
                                        <span class="fa fa-google"></span> Sign in with Google
                                    </a>
                                </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>