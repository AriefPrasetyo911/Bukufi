<?php $__env->startSection('push-style'); ?>
<style>
	.panel-heading{
		display: flex;
	}

	.col-md-4{
		margin-top: 15px;
	}

	.panel-9{
		padding-top: 0;
	}

	img{
		height: 150px;
	}

	.caption{
		padding-top: 5px;
		text-align: center;
	}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<main class="main-content col-md-12">
	<div class="col-md-9">
		<!-- carousel started-->
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="col-md-12">
					<div class="col-md-6">
						<h4>Comic List</h4>
					</div>

					<div class="col-md-6">
						<div class="pull-right">
							<a href="#">More Comic</a>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-body panel-9">
				
				<div class="col-md-12">
					<div class="row">
						<?php $__currentLoopData = $comics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

	<div class="col-md-3">
		<!--genre sidebar -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="pull-left">
					<h4>Genre</h4>
				</div>
				<div class="pull-right">
					<a href="<?php echo e(route('single.genre')); ?>">More...</a>
				</div>
			</div>
			<div class="panel-body">
				<?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<ul class="col-md-6">
					<a href="<?php echo e(url('/comic-genre/'.$genre->comic_genre)); ?>"><p><?php echo e($genre->comic_genre); ?></p></a>
				</ul>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>

		<!--third sidebar -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="pull-left">
					<h4>Popular Comics</h4>
				</div>
				<div class="pull-right">
					<a href="#">More...</a>
				</div>
			</div>
			<div class="panel-body">
				<div class="col-md-12">
					<div class="media col-md-4">
						<figure>
							<img src="https://s-media-cache-ak0.pinimg.com/originals/a9/56/f7/a956f76efc384e3caed63c55e1ca3d6e.jpg" class="img img-responsive media-object" alt="image 1">
						</figure>
					</div>
					<div class="teks col-md-8">
						<figure class="caption">
							<figcaption ">
								<h5 class="comic-title">Spider Man</h5>
								<a href="#">Ch. 75</a>
							</figcaption>
						</figure>
					</div>
				</div>

				<div class="col-md-12">
					<div class="media col-md-4">
						<figure>
							<img src="http://comicsalliance.com/files/2011/08/idwtmnteastmancover.jpg" class="img img-responsive media-object" alt="image 1">
						</figure>
					</div>
					<div class="teks col-md-8">
						<figure class="caption">
							<figcaption ">
								<h5 class="comic-title">Teenage Mutant Ninja Turtles</h5>
								<a href="#">Ch. 75</a>
							</figcaption>
						</figure>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Front-end/Master-layout/master-home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>