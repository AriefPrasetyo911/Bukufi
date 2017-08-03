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

	.thumbnail{
		padding: 0;
		margin-bottom: 0;
		border-radius: 0;
	}

	.thumbnail a>img, .thumbnail>img{
		height: 235px;
		width: 100%;
	}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<main class="main-content col-md-12 author">
	<div class="col-md-12">
		<!-- carousel started-->
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php $__currentLoopData = $s_auth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<h4>Comic by Author : <?php echo e(str_replace('-', ' ', $author->comic_author)); ?></h4>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			<div class="panel-body">
			<div class="col-md-12">
				<div class="row">
					<?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-sm-3 col-md-2">
						<a href="<?php echo e(url('/comic').'/'.$author->comic_title); ?>" class="link">
						<div class="thumbnail">
							<img src="/theme/images_cover/<?php echo e($author->comic_image); ?>" alt="comic image">
							<div class="caption">
								<h4><?php echo e(str_replace('-', ' ', $author->comic_title)); ?></h4>
							</div>
						</div>
						</a>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
			</div>
		</div>
		
	</div>
</main>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Front-end/Master-layout/master-home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>