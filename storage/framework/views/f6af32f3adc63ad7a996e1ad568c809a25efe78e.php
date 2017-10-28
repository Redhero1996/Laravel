<title>Home page</title>
<?php $__env->startSection('content'); ?>
 <!-- Page Content -->
    <div class="container">

        <!-- slider -->
        <?php echo $__env->make('layouts.slide', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- end slide -->

        <div class="space20"></div>


        <div class="row main-left">
            <?php echo $__env->make('layouts.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="col-md-9">
                <div class="panel panel-default">            
                    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                        <h2 style="margin-top:0px; margin-bottom:0px;">News</h2>
                    </div>

                    <div class="panel-body">
                        <!-- item -->
                        <?php $__currentLoopData = $theloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(count($tl->loaitin) > 0): ?>
                                <div class="row-item row">
                                    <h3>
                                        <a href=""><?php echo e($tl->Ten); ?></a> |   
                                        <?php $__currentLoopData = $tl->loaitin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <small><a href="loaitin/<?php echo e($lt->id); ?>/<?php echo e($lt->TenKhongDau); ?>.html"><i><?php echo e($lt->Ten); ?></i></a>/</small>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </h3>
                                    <?php 
                                        // lấy ra 5 tin tức nổi bật ms nhất
                                        $data = $lt->tintuc->where('NoiBat', 1)->sortByDesc('created_at')->take(5);
                                        // lấy ra 1 tin. trong data chỉ còn 4 tin. trả về kiểu mảng
                                        $tin1 = $data->shift();
                                     ?>
                                    <div class="col-md-8 border-right">
                                        <div class="col-md-5">
                                            <a href="tintuc/<?php echo e($tin1['id']); ?>/<?php echo e($tin1['TieuDeKhongDau']); ?>.html">
                                                <img class="img-responsive" src="upload/tintuc/<?php echo e($tin1['Hinh']); ?>" alt="">
                                            </a>
                                        </div>

                                        <div class="col-md-7">
                                            <h3><?php echo e($tin1['TieuDe']); ?></h3>
                                            <p><?php echo e($tin1['TomTat']); ?></p>
                                            <a class="btn btn-primary" href="tintuc/<?php echo e($tin1['id']); ?>/<?php echo e($tin1['TieuDeKhongDau']); ?>.html">Detail <span class="glyphicon glyphicon-chevron-right"></span></a>
                                        </div>

                                    </div>
                                    

                                    <div class="col-md-4">
                                        <!-- Goi all cac tin con lai -->
                                        <?php $__currentLoopData = $data->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tintuc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="tintuc/<?php echo e($tintuc['id']); ?>/<?php echo e($tintuc['TieuDeKhongDau']); ?>.html">
                                            <h4>
                                                <span class="glyphicon glyphicon-list-alt"></span>
                                                <?php echo e($tintuc['TieuDe']); ?>

                                            </h4>
                                        </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    
                                    <div class="break"></div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
                        <!-- end item -->

                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>