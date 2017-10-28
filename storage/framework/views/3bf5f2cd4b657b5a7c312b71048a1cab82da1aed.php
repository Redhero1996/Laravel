<title>Product Edit</title>
<?php $__env->startSection('content'); ?>
  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small><?php echo e($loaitin->Ten); ?></small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
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
                        <form action="admin/loaitin/edit/<?php echo e($loaitin->id); ?>" method="POST">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="TheLoai">                        
                                    <!-- Display all category name -->
                                    <?php $__currentLoopData = $theloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                        
                                        <option
                                            <?php if($loaitin->idTheLoai == $tl->id): ?>
                                              <?php echo e("selected"); ?>

                                            <?php endif; ?>
                                                value="<?php echo e($tl->id); ?>"><?php echo e($tl->Ten); ?>

                                        </option>  
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                     <!-- ============================ -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Product Name</label>
                                <input class="form-control" name="name" placeholder="Please Enter Product Name" value="<?php echo e($loaitin->Ten); ?>" />
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
<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>