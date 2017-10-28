<title>Category List</title>

<?php $__env->startSection('content'); ?>

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>List</small>
                        </h1>
                    </div>
                     <?php if(session('notification')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('notification')); ?>

                            </div>
                        <?php endif; ?>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Unsigned Name</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- foreach danh sach the loai tu phia controller -->
                            <?php $__currentLoopData = $theloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo e($tl->id); ?></td>
                                <td><?php echo e($tl->Ten); ?></td>
                                <td><?php echo e($tl->TenKhongDau); ?></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/theloai/delete/<?php echo e($tl->id); ?>"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/theloai/edit/<?php echo e($tl->id); ?>">Edit</a></td>
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