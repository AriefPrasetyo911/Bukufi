<?php $__env->startSection('push-style'); ?>
<style>
	.panel-heading{
		display: flex;
		padding-top: 0;
		padding-bottom: 0;
	}

	.panel-alphabet{
		padding-top: 0;
		padding-bottom: 0;
	}

	img{
		width: 100%;
		object-fit: cover;
	}

	h4{
		padding-top: 5px;
		padding-bottom: 5px;
	}

	.media{
		margin-top: 0;
	}

	.alphabet{
		display: flex
	}
	
	.alph{
		padding-right: 10px;
		padding-left: 10px;
	}

	.nav > li > .alph{
		padding: 8px;
	}

	table > tbody > tr{
		line-height: 2em;
	}

	ul.pager{
		margin-top: 10px;
	}

	.main-content .col-sm-3 .col-sm-12
	{
		padding-bottom: 0;
	}

	.main-content .col-md-9{
		padding-left: 0;
		padding-right: 0;
	}

	.main-content .col-md-3{
		padding-right: 0;
	}

	.col-lg-3 .panel-body ul.col-sm-6, ul.col-sm-12{
		padding-left: 0;
	}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<main class="main-content col-lg 12 col-sm-12 col-md-12">
	
	<div class="col-xs-12 col-md-9 col-sm-9 col-lg 9">
		<!-- carousel started-->
		<div class="panel panel-default">
			<div class="panel-body">
				<table class="table-responsive table-striped" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Comic Name</th>
							<th>Comic Author</th>
							<th>Comic Status</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;?>
						<?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($no++); ?></td>
							<td>
								<a href="<?php echo e(url('/comic').'/'.$comic->comic_title); ?>" title="<?php echo e(str_replace('-', ' ', $comic->comic_title)); ?>">
									<?php echo e(str_replace('-', ' ', $comic->comic_title)); ?>

								</a>
								</td>
							<td><?php echo e(str_replace('-', ' ', $comic->comic_author)); ?></td>
							<td><?php echo e($comic->comic_status); ?></td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
				<?php echo e($status->links('pagination.custom')); ?>

			</div>
		</div>
	</div>

	<div class="col-xs-12 col-sm-3 comic-status col-md-3 col-lg-3">
		<!--genre sidebar -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="col-md-6 col-sm-6 col-xs-6">
					<div class="pull-left margin-top-5 margin-bottom-5">
						<h4>Genre</h4>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6">
					<div class="pull-right margin-top-5 margin-bottom-5" style="padding-top: 5px;">
						<a href="<?php echo e(route('single.genre')); ?>" class="pull-right">More...</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<ul class="col-sm-6">
					<a href="<?php echo e(url('/comic-genre/'.$genre->comic_genre)); ?>"><p><?php echo e($genre->comic_genre); ?></p></a>
				</ul>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>

		<!--status sidebar -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="col-sm-12 margin-top-5 margin-bottom-5 no-padding-left no-padding-right">
					<h4>Comic Status</h4>
				</div>
			</div>
			<div class="panel-body">
				<?php $__currentLoopData = $comic_statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<ul class="col-sm-12 margin-top-5 margin-bottom-5 no-pl">
					<a href="<?php echo e(url('/comic/status/'.$stat->comic_status)); ?>">
					<p class="no-pl"><?php echo e($stat->comic_status); ?></p>
					</a>
				</ul>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Front-end/Master-layout/master-home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>