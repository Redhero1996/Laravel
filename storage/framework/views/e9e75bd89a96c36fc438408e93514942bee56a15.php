<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin/theloai/list"> Admin Area - 
                    <?php if(Auth::check()): ?>
                            <?php echo e(Auth::user()->name); ?>

                    <?php endif; ?>
                </a>
                
            </div>
            <!-- /.navbar-header -->

              <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                         <?php if(Auth::check()): ?>
                            <?php echo e(Auth::user()->name); ?>

                         <?php endif; ?>
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="admin/user/edit/<?php echo e(Auth::user()->id); ?>"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="admin/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

           <?php echo $__env->make('admin.layouts.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- /.navbar-static-side -->
        </nav>
