 
 <title>Account</title>
 <?php $__env->startSection('content'); ?>
 <!-- Page Content -->
    <div class="container" style="height: 90%">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading">Account Information</div>				  	 
				  	<div class="panel-body">
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
				    	<form action="user/<?php echo e(Auth::user()->id); ?>" method="POST" enctype="multipart/form-data">
				    		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <div>
                                <label>Avatar</label>                               
                                    <p>
                                        <img src="<?php echo e(Auth::user()->avatar); ?>" style="width: 200px; height: 200px; ">                                      
                                    </p>                               
                                <input type="file" name="image" />
                            </div><br>       
				    		<div>
				    			<label>UserName</label>
							  	<input type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1" value="<?php echo e(Auth::user()->name); ?>">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1" value="<?php echo e(Auth::user()->email); ?>" 
							  	readonly 
							  	>
							</div>
							<br>	
							<div>
								<input type="checkbox" class="" name="checkpassword" id="checkpassword">
				    			<label>Change your password</label>
							  	<input type="password" class="form-control password" name="password" aria-describedby="basic-addon1" disabled>
							</div>
							<br>
							<div>
				    			<label>Reset your password</label>
							  	<input type="password" class="form-control password" name="passwordAgain" aria-describedby="basic-addon1" disabled>
							</div>
							<br>
							<button type="submit" class="btn btn-primary">Edit
							</button>

				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script >
        $(document).ready(function(){
            $('#checkpassword').change(function(){
                if($(this).is(':checked')){
                    $('.password').removeAttr('disabled');
                }else{
                    $('.password').attr('disabled', '');
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>