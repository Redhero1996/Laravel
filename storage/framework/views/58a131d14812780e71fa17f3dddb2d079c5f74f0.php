 
 <title>Detail</title>
 <?php $__env->startSection('content'); ?>
 <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo e($tintuc->TieuDe); ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Admin</a>
                </p>

                <!-- Preview Image -->
                <img class="img-responsive" src="upload/tintuc/<?php echo e($tintuc->Hinh); ?>" alt="<?php echo e($tintuc->TieuDe); ?>" style="width: 900px; height: 300px;">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on: <?php echo e($tintuc->created_at); ?></p>                
                <hr>
                <!-- Post Content -->
                <p class="lead"><?php echo $tintuc->NoiDung; ?></p>
                
                <hr>
                <!-- Blog Comments -->

                <p><?php echo e($count); ?> Comment</p> 
                <!-- Comments Form -->
               	 <?php if(Auth::user()): ?>
	                <div class="well">
	                    <h4>Comment <span class="glyphicon glyphicon-pencil" ></span></h4>
	                    <form action="url('comment/<?php echo e($tintuc->id); ?>')" method="post" role="form">
	                    	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
	                        <div class="form-group">
	                            <textarea class="form-control" rows="3"></textarea>
	                        </div>
	                        <button type="button" id="submit" class="btn btn-primary">Submit</button>
	                    </form>
	                </div>
	            <?php endif; ?>                               
                <hr>
                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="wrap-comment">
                    <?php $__currentLoopData = $tintuc->comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cmt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="media">
                        <div class="glyphicon glyphicon-remove" id="remove" style="float: right; color: gray"></div>
                        <a class="pull-left" href="#">
                            <img class="media-object" id="img" src="<?php echo e($cmt->user->avatar); ?>" alt="" style="width: 50px; height: 50px">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo e($cmt->user->name); ?>

                                <small><?php echo e($cmt->created_at); ?></small>
                            </h4>
                            <span><?php echo e($cmt->NoiDung); ?></span>
                        </div>
                    </div>                     
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                
            </div>
        
      <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Relates News</b></div>
                    <div class="panel-body">
                    	<?php $__currentLoopData = $tinlienquan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/<?php echo e($tt->id); ?>/<?php echo e($tt->TieuDeKhongDau); ?>.html">
                                    <img class="img-responsive" src="upload/tintuc/<?php echo e($tt->Hinh); ?>" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="#"><b><?php echo e($tt->TieuDe); ?></b></a>
                            </div>
                            <p style="padding-left: 5px;"><?php echo $tt->TomTat; ?></p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Hot News</b></div>
                    <div class="panel-body">
                    	<?php $__currentLoopData = $tinnoibat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/<?php echo e($tt->id); ?>/<?php echo e($tt->TieuDeKhongDau); ?>.html">
                                    <img class="img-responsive" src="upload/tintuc/<?php echo e($tt->Hinh); ?>" alt="">
                                </a>
                            </div>
                             <div class="col-md-7">
                                <a href="#"><b><?php echo e($tt->TieuDe); ?></b></a>
                            </div>
                            <p style="padding-left: 5px;"><?php echo $tt->TomTat; ?></p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>