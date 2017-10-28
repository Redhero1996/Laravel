 
<title>Add Slide</title>
 <?php $__env->startSection('content'); ?>

  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <!-- In error -->
                        <?php if(count($errors) > 0): ?>
                            <div class="alert alert-danger">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($err); ?><br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>

                        <!-- In message -->
                        <?php if(session('notification')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('notification')); ?>

                            </div>
                        <?php endif; ?>
                        <form action="admin/slide/add" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">                        
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder="Please Enter name slide" />
                            </div> 
                             <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="Hinh" value="<?php echo e(old('Hinh')); ?>" />
                            </div>                                                       
                            <div class="form-group">
                                <label>Content</label>
                                <textarea id="demo" name="NoiDung" value="<?php echo e(old('NoiDung')); ?>" rows="10" cols="100"></textarea>
                            </div>
                           <div class="form-group">
                                <label>Link</label>
                                <input class="form-control" name="link"  placeholder="Please Enter link" />
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