<title>Add Users</title>
 <?php $__env->startSection('content'); ?>

  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <!-- In error -->
                       <!--  <?php if(count($errors) > 0): ?>
                            <div class="alert alert-danger">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($err); ?><br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?> -->

                        <!-- In message -->
                        <?php if(session('notification')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('notification')); ?>

                            </div>
                        <?php endif; ?>
                        <form action="admin/user/add" method="POST">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" />
                            </div>                               
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="name" placeholder="Please enter username" value="<?php echo e(old('name')); ?>" />
                                 <?php if($errors->has('name')): ?>
                                    <span style="color: red;"><i><?php echo e($errors->first('name')); ?></i></span>
                                <?php endif; ?>
                            </div>                                                     
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Please enter email" value="<?php echo e(old('email')); ?>" />
                                <?php if($errors->has('email')): ?>
                                    <span style="color: red;"><i><?php echo e($errors->first('email')); ?></i></span>
                                <?php endif; ?>
                            </div>
                           <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Please enter password"/>
                                <?php if($errors->has('password')): ?>
                                    <span style="color: red;"><i><?php echo e($errors->first('password')); ?></i></span>
                                <?php endif; ?>
                            </div> 
                            <div class="form-group">
                                <label>Confirm password</label>
                                <input type="password" class="form-control" name="passwordAgain" placeholder="Please enter password" />
                                <?php if($errors->has('passwordAgain')): ?>
                                    <span style="color: red;"><i><?php echo e($errors->first('passwordAgain')); ?></i></span>
                                <?php endif; ?>
                            </div> 
                            <div class="form-group">
                                <label>Level</label>
                                <label class="radio-inline">
                                    <input name="quyen" value="1" type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen" value="0" checked="" type="radio">User
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php $__env->stopSection(); ?>         
<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>