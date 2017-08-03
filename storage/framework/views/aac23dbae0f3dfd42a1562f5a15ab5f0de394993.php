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
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<main class="main-content col-md-12 col-lg-12 col-xs-12">
		<div class="col-md-12 col-xs-12">
			<!-- carousel started-->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Comic Genre List</h4>
				</div>
				<div class="panel-body">
						
					<?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<ul class="col-md-3 col-sm-3 col-xs-6">
							<i class="fa fa-caret-right" aria-hidden="true"></i> <a href="<?php echo e(url('/comic-genre/'.$genre->comic_genre)); ?>"><?php echo e($genre->comic_genre); ?></a>
						</ul>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
				</div>
			</div>
			
		</div>
</main>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Front-end/Master-layout/master-home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>