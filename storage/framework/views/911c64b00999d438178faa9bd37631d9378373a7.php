<?php $__env->startSection('push-style'); ?>
<style>
	.panel-heading{
		display: flex;
	}

	.col-md-4{
		padding-left: 0;
		margin-top: 10px;
		margin-bottom: 15px;
	}

	.media{
		padding-right: 0;
	}

	img{
		width: 100%;
		object-fit: cover;
		height: 175px;
	}

	#search_result{
		padding-bottom: 5px;
	}

	#title_search{
		text-align: center;
	}

	#not-found
	{
		text-align: center;
		line-height: 1.5em;
	}

	.col-md-12{
		padding-left: 0;
		padding-right: 0;
	}	
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<main class="main-content col-md-12">
	
		<div class="col-md-12">
			<!-- carousel started-->
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="col-md-12">
						<h4 id="title_search">You're search : <?php echo e($search_now); ?></h4>
					</div>
				</div>
				<div class="panel-body">
					<div class="col-md-12">
					<?php if(count($query)): ?>
						<?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-md-4">
							<a href="<?php echo e(url('/comic').'/'.$result->comic_title); ?>" class="link">
								<div class="media col-md-4">
									<figure>
										<img src="/theme/images_cover/<?php echo e($result->comic_image); ?>" class="comic-image" alt="image 1">
									</figure>
								</div>

								<div class="contents col-md-8">
									<figure class="caption">
										<figcaption id="posting-title">
											<div id="search_result">
												<h5>Comic Title :</h5>
												<h4><?php echo e(str_replace('-', ' ', $result->comic_title)); ?></h4>	
											</div>
											<div id="search_result">
												<h5>Comic Creator: </h5>
												<h4><?php echo e($result->comic_author); ?></h4>
											</div>
											<div id="search_result">
												<h5>Comic Genre :</h5>
												<h4><?php echo e($result->comic_genre); ?></h4>
											</div>
											<div id="search_result">
												<h5>Year of Release :</h5>
												<h4><?php echo e($result->comic_release); ?></h4>
											</div>
										</figcaption>
									</figure>
								</div>
							</a>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
					<?php else: ?>
						<h3 id="not-found">Sorry, what you are looking for can not be found </h3>
						<h4 id="not-found">Please search using other word</h4>
					<?php endif; ?>
					</div>
					<?php echo e($query->appends(Request::only('search'))->links('pagination.custom')); ?>

				</div>
			</div>
			
		</div>
	</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Front-end/Master-layout/master-home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>