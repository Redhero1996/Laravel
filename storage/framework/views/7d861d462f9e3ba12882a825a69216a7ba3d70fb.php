 
<title>Sign Up</title> 
<?php $__env->startSection('content'); ?>
  <!-- Page Content -->
    <div class="container" style="height: 90%">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading">Create an account</div>
				  	<div class="panel-body">
				  		<!-- In error -->
                        <?php if(count($errors) > 0): ?>
                            <div class="alert alert-danger">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($err); ?><br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
				    	<form action="signup" method="POST">
				    		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				    		<div>
                                <label>Avatar</label>
                                <input type="file" name="image"/>
                            </div> <br/>    
				    		<div>
				    			<label>UserName</label>
							  	<input type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Your email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1"
							  	>
							</div>
							<br>	
							<div>								
				    			<label>Your password</label>
							  	<input type="password" class="form-control" name="password" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Please confirm your assword</label>
							  	<input type="password" class="form-control" name="passwordAgain" aria-describedby="basic-addon1">
							</div>
							<br>
							<button type="submit" class="btn btn-primary">Sign Up
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
<?php echo $__env->make('layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>