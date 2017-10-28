<title>List Slide</title>
<?php $__env->startSection('content'); ?>
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                      <?php if(session('notification')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('notification')); ?>

                            </div>
                        <?php endif; ?>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Imgage</th>
                                <th>Content</th>
                                <th>Link</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $slide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="odd gradeX" align="center">                                
                                <td><?php echo e($sl->id); ?></td>
                                <td><?php echo e($sl->Ten); ?></td>
                                <td>
                                    <img src="upload/slide/<?php echo e($sl->Hinh); ?>" width="200px">
                                </td>
                                <td><?php echo e($sl->NoiDung); ?></td>
                                <td><a href="<?php echo e($sl->link); ?>"><?php echo e($sl->link); ?></a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/slide/delete/<?php echo e($sl->id); ?>"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/slide/edit/<?php echo e($sl->id); ?>">Edit</a></td>                                
                            </tr>  
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                         
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>