
<?php $__env->startSection('content'); ?>


        <div class="page-content--bgf7">

		<br/><br/>
            <!-- WELCOME-->
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="title-4">Blog Posts</h2>
                            <hr class="line-seprate">
							

<div class="col-md-12">

                 <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<div class="card">
                                    <div class="card-body rounded">
									<div style="float:left;" class=" col-sm-3 col-md-2 col-lg-2">
									<img src="<?php echo e(asset('images/user-1.png')); ?>" alt="John Doe" />
									</div>
									<div  style="float:left;" class=" col-sm-9 col-md-9 col-lg-9">
									<span style="color:#6777ef; margin-bottom:5pt;"><?php echo e($post->title); ?> </span>
                                        <p class="card-text"><?php echo e($post->description); ?></p>
										<div class="float-left mt-sm-0 mt-0">
                        <a href="<?php echo e(route('post_details', ['post_id' => $post->id ])); ?>" class="btn btn-primary btn-sm">View Post <i class="fas fa-chevron-right"></i></a>
                      </div>
									</div>
                                    </div>
                                </div>
								
								                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

												 <div style="text-align:center;"> <?php echo e($posts->links()); ?> </div>
                                </div>
								 </div>
							
							
							
							 <div class="col-md-4">
                            <h2 class="title-4">Most Popular Posts</h2>
                            <hr class="line-seprate">
						

<div class="col-md-12">

                 <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<div class="card">
                                    <div class="card-body rounded">
									<div style="float:left;" class=" col-sm-3 col-md-2 col-lg-2">
									<img src="<?php echo e(asset('images/user-1.png')); ?>" alt="John Doe" />
									</div>
									<div  style="float:left;" class=" col-sm-9 col-md-9 col-lg-9">
									<span style="color:#6777ef; margin-bottom:5pt;"><?php echo e($post->title); ?> </span>
                                        <p class="card-text"><?php echo e($post->description); ?></p>
										<div class="float-left mt-sm-0 mt-0">
                        <a href="#" class="btn btn-primary btn-sm">View Post <i class="fas fa-chevron-right"></i></a>
                      </div>
									</div>
                                    </div>
                                </div>
								
								                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
								
							
                        </div>
                    </div>
                </div>
				
            </section>
       



  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Simon Pc\Documents\GitHub\machinelearningbusiness\resources\views/test/posts.blade.php ENDPATH**/ ?>