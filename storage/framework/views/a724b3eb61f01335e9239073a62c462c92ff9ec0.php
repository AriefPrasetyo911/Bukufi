<?php $__env->startSection('push-style'); ?>
<style>
	.col-md-12{
		padding-left: 0;
		padding-right: 0;
	}
	
	#author{
		text-align: center;
	}
	
	#com_auth{
		font-size: 16px;
	}

	.col-md-6{
		padding-bottom: 10px;
	}

	.pager{
		margin-bottom: 15px;
	}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<main class="main-content col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<!-- carousel started-->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 id="author">Comic Author List</h4>
				</div>
				<div class="panel-body">
						
					<?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<ul class="col-md-6 col-sm-6">
							<i class="fa fa-caret-right" aria-hidden="true"></i> 
							<a href="<?php echo e('/comic/comic-author/name/'.$author->comic_author); ?>" id="com_auth"><?php echo e(str_replace('-', ' ', $author->comic_author)); ?></a>
						</ul>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
				<?php echo e($authors->links('pagination.custom')); ?>

			</div>
			
		</div>
</main>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Front-end/Master-layout/master-home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>