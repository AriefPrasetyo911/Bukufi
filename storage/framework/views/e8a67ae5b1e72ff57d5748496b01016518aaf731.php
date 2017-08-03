<?php $__env->startSection('push-style'); ?>
<style>
	.panel-heading{
		display: flex;
	}

	.panel-9{
		padding-top: 5px;
		padding-bottom: 5px;
	}

	.col-md-4{
		padding-right: 0;
	}

	.main-content .time{
		padding-right: 15px;
	}

	.col-md-8{
		padding-left: 0;
	}

	img{
		height: 150px;
	}

	.caption{
		padding-top: 5px;
		text-align: center;
	}

	h3, h4{
		padding-left: 10px;
	}

	h5{
		text-align: right;
	}

	hr{
		margin-top: 10px;
		margin-bottom: 10px;
	}

	#titles{
		text-align: center;
	}

	.list-group, .list-group-item{
		border-color: transparent;
		border-radius: 0;
		padding: 10px;
		padding-top: 0;
	}

	.inner-panel{
		border-left: 2px solid #059e9a;
		border-top: 1px solid #ddd;
		border-right: 1px solid #ddd;
		border-bottom: 1px solid #ddd;
		border-radius: 0;
		padding: 0;
	}

	.panel-2{
		margin-bottom: 2.5px;
	}

	.left{
		padding-left: 0;
	}
	
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<main class="main-content col-md-12 col-lg-12 col-xs-12">
	<div class="col-md-9 col-lg-9 col-sm-9 col-xs-12">
		<!-- carousel started-->
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="col-md-12 no-padding-top no-padding-bottom no-padding-left">
					<h4 id="titles" class="pull-left no-padding-left">Comic Bookmark</h4>
				</div>
			</div>
			<div class="panel-body">
				
				<div class="col-md-12 col-sm-12 hidden-xs">
					<table class="table table-responsive table-striped" width="100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Comic Title</th>
								<th>Comic Chapter</th>
								<th>Chapter Title</th>
								<th>Bookmarked</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						<?php $no=1; ?>
							<?php if(count($user_bookmarks)): ?>
								<?php $__currentLoopData = $user_bookmarks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookmark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($no++); ?></td>
										<td><?php echo e(str_replace('-', ' ', $bookmark->comic_title)); ?></td>
										<td><?php echo e(str_replace('-', ' ', $bookmark->comic_chapter)); ?></td>
										<td><?php echo e($bookmark->chapter_title); ?></td>
										<td><?php echo e($bookmark->created_at->diffForHumans()); ?></td>
										<td>
											<a href="<?php echo e(url('/show/comic/'.$bookmark->comic_title.'/'.$bookmark->comic_chapter)); ?>" title="Read Again" class="btn btn-primary pull-right">Read Again</a>
										</td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php else: ?>
								<tr>
									<td colspan="6">No Data Available to Display</td>
								</tr>
							<?php endif; ?>
						</tbody>
					</table>
					<?php echo e($user_bookmarks->links('pagination.custom')); ?>

				</div>

				<div class="col-xs-12 visible-xs">
					<table class="table table-responsive table-striped" width="100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Comic Title</th>
								<th>Comic Chapter</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						<?php $no=1; ?>
							<?php if(count($user_bookmarks)): ?>
								<?php $__currentLoopData = $user_bookmarks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookmark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($no++); ?></td>
										<td><?php echo e(str_replace('-', ' ', $bookmark->comic_title)); ?></td>
										<td><?php echo e(str_replace('-', ' ', $bookmark->comic_chapter)); ?></td>
										<td>
											<a href="<?php echo e(url('/show/comic/'.$bookmark->comic_title.'/'.$bookmark->comic_chapter)); ?>" title="Read Again" class="btn btn-primary btn-sm">Read Again</a>
										</td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php else: ?>
								<tr>
									<td colspan="6">No Data Available to Display</td>
								</tr>
							<?php endif; ?>
						</tbody>
					</table>
					<?php echo e($user_bookmarks->links('pagination.custom')); ?>

				</div>
			</div>
		</div>
		
	</div>

	<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
		<!--genre sidebar -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="col-xs-6 no-padding-left">
					<div class="pull-left">
						<h4 class="no-padding-left">Genre</h4>
					</div>
				</div>
				<div class="col-xs-6 no-padding-right">
					<div class="pull-right">
						<a href="<?php echo e(route('single.genre')); ?>">More...</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<ul class="col-md-6 col-sm-6 no-padding-left" style="margin-bottom: 5px !important">
					<a href="<?php echo e(url('/comic-genre/'.$genre->comic_genre)); ?>"><p><?php echo e($genre->comic_genre); ?></p></a>
				</ul>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>

		<!--third sidebar -->
		<!-- <div class="panel panel-default">
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
		</div> -->
	</div>
</main>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Front-end/Master-layout/master-home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>