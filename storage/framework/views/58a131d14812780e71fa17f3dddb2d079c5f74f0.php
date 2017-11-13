 
<?php $__env->startSection('title', 'Detail'); ?>
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

              

                <!-- Comment -->
                <div class="wrap-comment">
                    
                    <?php $__currentLoopData = $tintuc->comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cmt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                            <div class="media" id="<?php echo e($cmt->id); ?>">
                                <?php if(Auth::user()->id == $cmt->user->id): ?>
                                    <div class="glyphicon glyphicon-remove" id="<?php echo e($cmt->id); ?>" style="float: right; color: gray"></div>
                                <?php endif; ?>    
                                    <a class="pull-left" href="#">
                                        <img class="media-object" src="<?php echo e($cmt->user->avatar); ?>" alt="" style="width: 50px; height: 50px">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading" >
                                            <strong style="color: #0066ff; font-family:Arial Black, Gadget, sans-serif; font-size: 15px"><?php echo e($cmt->user->name); ?></strong>
                                            <?php  
                                                $created_at = new DateTime($cmt->created_at);
                                                $time_zone = new DateTimeZone('Asia/Ho_Chi_Minh');
                                                $created_at->setTimezone($time_zone);

                                            ?>
                                            <small><?php echo e($created_at->format('m/d/Y, h:i:s A ')); ?></small>
                                        </h4>
                                        <span><?php echo e($cmt->NoiDung); ?></span>
                                    </div>
                                 
                            </div> 
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
                </div>
                
                 <hr>
                <div class="sum-comment" style="font-size: 15px">                                           
                    <span style="margin-left: 0px"><?php echo e($count); ?> </span><div class="glyphicon glyphicon-comment"></div>
                    <span style="margin-left: 30px"><?php echo e($count); ?> </span><div class="glyphicon glyphicon-heart-empty"></div>
                </div>

                   
                <!--   -->
                <!-- Comments Form -->
                 <?php if(Auth::user()): ?>
                    <div class="well">
                        <h4>Comment <span class="glyphicon glyphicon-pencil" ></span></h4>
                        <form action="comment/<?php echo e($tintuc->id); ?>" method="post" role="form" id="add_comment">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <div class="form-group">
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                            <button type="button" id="submit" class="btn btn-primary">Post</button>
                        </form>
                    </div>
                <?php endif; ?>                               
               
                <!-- Posted Comments -->
                
                    <div id="fb-root"></div>

                    <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5"></div>


                
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
                                <a href="tintuc/<?php echo e($tt->id); ?>/<?php echo e($tt->TieuDeKhongDau); ?>.html"><b><?php echo e($tt->TieuDe); ?></b></a>
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
                                <a href="tintuc/<?php echo e($tt->id); ?>/<?php echo e($tt->TieuDeKhongDau); ?>.html"><b><?php echo e($tt->TieuDe); ?></b></a>
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

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

            // Add comment
            $('#submit').click(function(e){
            //    alert("sf");
                e.preventDefault(); //  ngăn cản trình duyệt thực thi hành động mặc định.
                var NoiDung = $('textarea').val();               

                // alert(NoiDung);
                $.ajax({                                      
                    url: 'comment/'+<?php echo e($tintuc->id); ?> ,
                    type: "POST",
                    data: {noiDung: NoiDung}, // data: dl client gui di
                   // datatype: 'json',
                    success: function(data){ // data: dl server tra ve                         
                        var created_at = new Date().toLocaleString('en-US', {timeZone: 'Asia/Ho_Chi_Minh'});
                        // var time = $.format.Date(created_at,"Y-m-d H:i:s");              
                        // console.log(time);

                        var comment_id = data.comment.id;                    
                        var avatar = data.comment.user.avatar;
                        var name = data.comment.user.name;
                        var nd = data.comment.NoiDung;

                         var comment =`<div class="media" id="${comment_id}">
                            <div class="glyphicon glyphicon-remove" id="${comment_id}" style="float: right; color: gray"></div>
                            <a class="pull-left" href="#">
                                <img class="media-object" src="${avatar}" alt="" style="width: 50px; height: 50px">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <strong style="color: #0066ff; font-family:Arial Black, Gadget, sans-serif; font-size: 15px">${name}</strong>
                                    <small>${created_at}</small>
                                </h4>
                                <span>${nd}</span>
                            </div>
                        </div> `;

                       $('.wrap-comment').append(comment);
                       $('textarea').val('');
                       $('.sum-comment').html(`<div class="count" style="font-size: 15px">                                           
                        <span>${data.count} </span style="margin-left: 0px"><div class="glyphicon glyphicon-comment"></div>
                        <span style="margin-left: 30px">${data.count} </span><div class="glyphicon glyphicon-heart-empty"></div>
                    </div>`);
                       
                  
                    }
                });

            });

            // Delete comment 
           $('.glyphicon-remove').each(function(){
                var btn = this;
                $(btn).click(function(){

                    $.ajax({
                        url: 'tintuc/'+<?php echo e($tintuc->id); ?>+'/comment/'+btn.id,
                        type: "POST",
                        data: {id:btn.id},
                        success: function(data){
                            $('.media#'+btn.id).hide(600);
                            $('.sum-comment').html(`<div class="sum-comment" style="font-size: 15px">                                           
                                <span>${data.count} </span style="margin-left: 0px"><div class="glyphicon glyphicon-comment"></div>
                                <span style="margin-left: 30px">${data.count} </span><div class="glyphicon glyphicon-heart-empty"></div>
                            </div>`);
                        }
                    });
                });
           });

        });

//    (function(d, s, id) {
//   var js, fjs = d.getElementsByTagName(s)[0];
//   if (d.getElementById(id)) return;
//   js = d.createElement(s); js.id = id;
//   js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=268051390385233';
//   fjs.parentNode.insertBefore(js, fjs);
// }(document, 'script', 'facebook-jssdk'));
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>