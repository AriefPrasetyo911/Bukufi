<?php $__env->startSection('push-style'); ?>
<style>
	.col-md-12{
		padding-left: 0;
		padding-right: 0;
	}
	h4{
		text-align: center;
	}
	.input-group{
		margin-left: 15px;
	}
	#com_auth{
		font-size: 16px;
	}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<main class="main-content col-md-12">
		<div class="col-md-12">
			<!-- carousel started-->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Comic Author List</h4>
				</div>
				<div class="panel-body">
						
					<?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<ul class="col-md-6">
							<i class="fa fa-caret-right" aria-hidden="true"></i> 
							<a href="<?php echo e('/comic/comic-author/name/'.$author->comic_author); ?>" id="com_auth"><?php echo e($author->comic_author); ?></a>
						</ul>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
				</div>
			</div>
			
		</div>
</main>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Front-end/Master-layout/master-home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>