 
<?php $__env->startSection('title', 'Search'); ?>
 <?php $__env->startSection('content'); ?>
 <!-- Page Content -->
    <div class="container">
        <div class="row">
            <?php echo $__env->make('layouts.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php function changeColor($str, $keyword){
            	return str_replace($keyword, "<span style= 'color:red'><strong><i>$keyword</strong></i></span>", $str);
            } ?>


            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>Search: <?php echo e($keyword); ?></b></h4>
                    </div>              
                       <?php $__currentLoopData = $tintuc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    	                    <div class="row-item row">                   
    	                        <div class="col-md-3">
    			                            <a href="tintuc/<?php echo e($tt->id); ?>/<?php echo e($tt->TieuDeKhongDau); ?>.html">
    			                                <br>
    			                                <img width="200px" height="200px" class="img-responsive" src="upload/tintuc/<?php echo e($tt->Hinh); ?>" alt="">
    			                            </a>
    			                 </div>

    	                        <div class="col-md-9">
    	                            <h3><?php echo changeColor($tt->TieuDe, $keyword); ?></h3>
    	                            <p><?php echo changeColor($tt->TomTat, $keyword); ?></p>
    	                            <a class="btn btn-primary" href="tintuc/<?php echo e($tt->id); ?>/<?php echo e($tt->TieuDeKhongDau); ?>.html">Detail<span class="glyphicon glyphicon-chevron-right"></span></a>
    	                        </div>
    	                        <div class="break"></div>
    	                    </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <!-- Phân trang -->
                 <?php echo e($tintuc->links()); ?>


                    
                </div>
            </div> 

        </div>

    </div>
    <!-- end Page Content -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>