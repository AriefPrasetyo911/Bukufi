<?php $__env->startSection('push-style'); ?>
<style>
	<style>
	.panel-heading{
		display: flex;
	}

	.col-md-4{
		margin-top: 15px;
	}

	img{
		height: 230px;
		width: 100%;
	}

	.caption{
		padding-top: 5px;
		text-align: center;
	}

	.col-md-12{
		padding-right: 0;
		padding-left: 0;
	}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<main class="main-content col-md-12">
	<div class="col-md-12">
		<!-- carousel started-->
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-12">
					<div class="row">
						<?php $__currentLoopData = $selected; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<a href="<?php echo e(url('/comic').'/'.$comic->id.'/'.$comic->comic_title); ?>" class="link">
						<div class="col-md-2">
							<div class="media col-md-12">
								<figure>
									<img src="/theme/images_cover/<?php echo e($comic->comic_image); ?>" class="comic-image" alt="image 1">
								</figure>
								<figure class="caption">
									<figcaption id="posting-title">
										<h5><?php echo e(str_replace('-', ' ', $comic->comic_title)); ?></h5>
									</figcaption>
								</figure>
							</div>
						</div>
						</a>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Front-end/Master-layout/master-home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>