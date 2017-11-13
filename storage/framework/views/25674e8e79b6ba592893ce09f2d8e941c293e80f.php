<title>Add News</title>
<?php $__env->startSection('content'); ?>
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">News
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
                        <form action="admin/tintuc/add" method="POST" enctype="multipart/form-data">
                        	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <div class="form-group">
                                <label>Category</label>                              
                                <select class="form-control" name="TheLoai" id="TheLoai">
                                     <?php $__currentLoopData = $theloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    	<option value="<?php echo e($tl->id); ?>"><?php echo e($tl->Ten); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                             <div class="form-group">
                                <label>Product</label>
                                 <select class="form-control" name="LoaiTin" id="LoaiTin">
                                    <?php $__currentLoopData = $loaitin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    	<option value="<?php echo e($lt->id); ?>"><?php echo e($lt->Ten); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" name="TieuDe" placeholder="Please Enter Title" />
                            </div>                            
                            <div class="form-group">
                                <label>Summary</label>
                                <textarea name="TomTat" id="demo" class="form-control ckeditor" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea id="demo" class="form-control ckeditor" name="NoiDung" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="Hinh" />
                            </div>
                            <div class="form-group">
                                <label>Highlights</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0" checked="" type="radio">No
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="1" type="radio">Yes
                                </label>
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

<?php $__env->startSection('script'); ?>
	<script>
		$(document).ready(function(){
			$('#TheLoai').change(function(){
				var idTheLoai = $(this).val();
				// tao va goi 1 trang ajax
				$.get("admin/ajax/loaitin/"+idTheLoai, function(data){
					$("#LoaiTin").html(data);
				});  // lay theloai ve de truyen idTheLoai sang va nhan cai theloai ve
			});
		});
    
	</script>
<?php $__env->stopSection(); ?>
	
<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>