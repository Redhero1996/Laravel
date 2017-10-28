<title>News List</title>
<?php $__env->startSection('content'); ?>
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">News
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
                                <th>Title</th>
                                <th>Summary</th>
                                <th>Category</th>
                                <th>Product</th>
                                <th>Views</th>
                                <th>Highlights</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $tintuc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="odd gradeX" align="center">                                
                                <td><?php echo e($tt->id); ?></td>
                                <td><p><?php echo e($tt->TieuDe); ?></p>
                                    <img width="100px" src="upload/tintuc/<?php echo e($tt->Hinh); ?>">
                                </td>
                                <td><?php echo e($tt->TomTat); ?></td>
                                <td><?php echo e($tt->loaitin->theloai->Ten); ?></td>
                                <td><?php echo e($tt->loaitin->Ten); ?></td>
                                <td><?php echo e($tt->SoLuotXem); ?></td>
                                <td>
                                    <?php if($tt->NoiBat == 0): ?>
                                        <?php echo '<b><i>No</i></b>'; ?>

                                    <?php else: ?>
                                         <?php echo '<b><i>Yes</i></b>'; ?>

                                    <?php endif; ?>        
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/delete/<?php echo e($tt->id); ?>"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tintuc/edit/<?php echo e($tt->id); ?>">Edit</a></td>                                
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