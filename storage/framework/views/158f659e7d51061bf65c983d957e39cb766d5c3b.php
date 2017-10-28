<title>Edit Slide</title>
<?php $__env->startSection('content'); ?>
  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
                            <small><?php echo e($slide->Ten); ?></small>
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
                        <form action="admin/slide/edit/<?php echo e($slide->id); ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">                                                 
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" placeholder="Please Enter name slide" value="<?php echo e($slide->Ten); ?>" />
                            </div> 
                             <div class="form-group">
                                <label>Image</label>
                                <p>
                                    <img src="upload/slide/<?php echo e($slide->Hinh); ?>" width="200px">
                                </p>
                                <input type="file" name="Hinh" />
                            </div>                                                       
                            <div class="form-group">
                                <label>Content</label>
                                <textarea id="demo" name="NoiDung" rows="10" cols="100"><?php echo e($slide->NoiDung); ?></textarea>
                            </div>
                           <div class="form-group">
                                <label>Link</label>
                                <input class="form-control" name="link" placeholder="Please Enter link" value="<?php echo e($slide->link); ?>" />
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