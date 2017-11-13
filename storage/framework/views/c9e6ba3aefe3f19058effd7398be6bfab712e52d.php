<title>Edit Users</title>
 <?php $__env->startSection('content'); ?>

  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small><?php echo e($user->name); ?></small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <!-- In message -->
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>
                        <form action="admin/user/edit/<?php echo e($user->id); ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">   
                             <div class="form-group">
                                <label>Image</label>
                                <p>
                                    <img src="upload/users/<?php echo e($user->avatar); ?>" style="width: 200px; height: 200px">
                                </p>
                                <input type="file" name="image" />
                            </div>                 
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" placeholder="Please enter username" value="<?php echo e($user->name); ?>" />
                            </div>                                                     
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Please enter email" value="<?php echo e($user->email); ?>" readonly="" />
                            </div>
                           <div class="form-group">
                                <input type="checkbox" name="changePassword" id="changePassword">
                                <label> Change password</label>
                                <input type="password" class="form-control password" name="password" placeholder="Please enter password" disabled="" />
                            </div> 
                            <div class="form-group">
                                <label>Enter password again</label>
                                <input type="password" class="form-control password" name="passwordAgain" placeholder="Please enter password" disabled="" />
                            </div> 
                            <div class="form-group">
                                <label>Level</label>
                               <label class="radio-inline">
                                    <!-- Kiem tra da dc check chua -->
                                    <input name="quyen" value="0" 
                                        <?php if($user->quyen == 0): ?>
                                            <?php echo e('checked'); ?>

                                        <?php endif; ?>
                                      type="radio">User
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen" value="1" 
                                         <?php if($user->quyen == 1): ?>
                                            <?php echo e('checked'); ?>

                                        <?php endif; ?>
                                    type="radio">Admin
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Edit</button>
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

<?php $__env->startSection('script'); ?>
    <script >
        $(document).ready(function(){
            $('#changePassword').change(function(){
                if($(this).is(':checked')){
                    $('.password').removeAttr('disabled');
                }else{
                    $('.password').attr('disabled', '');
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>