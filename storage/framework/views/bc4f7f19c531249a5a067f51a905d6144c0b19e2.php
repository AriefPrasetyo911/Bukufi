<?php $__env->startSection('push-style'); ?>
<style>
	a{
		padding-bottom: 5px;
	}

	#center{
		text-align: center;
	}

	.list-group{
		margin-top: 0;
	}

	.list-group-item{
		padding: 5px 15px;
	}

	#accordion{
		margin-bottom: 0;
	}

	#comic_title{
		font-weight: bold;
	}

	.list-group, .list-group .list-group-item{
		border-color: transparent;
		border-radius: 0;
	}

	.col-md-2, .col-md-10, .col-md-12{
		padding-left: 0;
		padding-right: 0;
	}

	hr{
		margin-top: 5px;
		margin-bottom: 5px;
	}

	.sumarry{
		padding-top: 15px;
	}

	#comic_desc{
		text-align: justify;
		line-height: 1.5em;
	}

	.comic_chapter{
		margin-top: 15px;
	}

	.panel-group .panel{
		border-radius: 0;
	}

	.comic-image{
		width: 100%;
	}

	.no-margin-bottom{
		margin-bottom: 0 !important;
	}

	.panel-heading .accordion-toggle:after {
    /* symbol for "opening" panels */
    font-family: 'Glyphicons Halflings';  /* essential for enabling glyphicon */
    content: "\e114";    /* adjust as needed, taken from bootstrap.css */
    float: right;        /* adjust as needed */
    color: grey;         /* adjust as needed */
	}
	.panel-heading .accordion-toggle.collapsed:after {
	    /* symbol for "collapsed" panels */
	    content: "\e080";    /* adjust as needed, taken from bootstrap.css */
	}

	h5#bold, h5#normal{
		padding: 2.5px 15px;
	}

	h5#bold{
		font-weight: bold;
	}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<main class="main-content col-md-12 col-xs-12 single-comic">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<!-- carousel started-->
		<div class="panel panel-default">
			<div class="panel-body">
				
				<?php $__currentLoopData = $single_comic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-md-12 col-xs-12">
						<div class="media col-md-2 col-xs-5">
							<figure>
								<img src="/theme/images_cover/<?php echo e($comic->comic_image); ?>" class="comic-image" alt="image 1">
							</figure>
						</div>

						<div class="contents col-md-10 col-xs-7">
							<figure class="caption hidden-xs">
								<figcaption class="panel-heading" id="posting-title">
									<h4 id="comic_title"><?php echo e(str_replace('-', ' ', $comic->comic_title)); ?></h4>
								</figcaption>

								<div class="col-md-12 col-xs-12">
									<div class="col-md-2 col-xs-4">
										<ul class="list-group">
											<li class="list-group-item">Author</li>
											<li class="list-group-item">Genre</li>
											<li class="list-group-item">Release</li>
											<li class="list-group-item">Status</li>
										</ul>
									</div>
									<div class="col-md-10 col-xs-8">
										<ul class="list-group">
											<li class="list-group-item">: <?php echo e(str_replace('-', ' ', $comic->comic_author)); ?></li>
											<li class="list-group-item">: <?php echo e(str_replace('-', ' ', $comic->comic_genre)); ?></li>
											<li class="list-group-item">: <?php echo e($comic->comic_release); ?></li>
											<li class="list-group-item">: <?php echo e($comic->comic_status); ?></li>
										</ul>
									</div>
								</div>
							</figure>


							<figure class="caption visible-xs">
								<figcaption class="panel-heading no-padding-top no-padding-right" id="posting-title">
									<h4 id="comic_title"><?php echo e(str_replace('-', ' ', $comic->comic_title)); ?></h4>
								</figcaption>

								<div class="col-md-12 col-xs-12">
									<h5 id="bold">Author :</h5>
									<h5 id="normal"><?php echo e(str_replace('-', ' ', $comic->comic_author)); ?></h5>
									<h5 id="bold">Genre :</h5>
									<h5 id="normal"><?php echo e(str_replace('-', ' ', $comic->comic_genre)); ?></h5>
									<h5 id="bold">Release :</h5>
									<h5 id="normal"><?php echo e($comic->comic_release); ?></h5>
									<h5 id="bold">Status :</h5>
									<h5 id="normal"><?php echo e($comic->comic_status); ?></h5>
								</div>
							</figure>
						</div>
					</div>

					<div class="col-md-12 col-xs-12 sumarry">
						<h4>Summary</h4>
						<hr>
						<p id="comic_desc"><?php echo e(strip_tags($comic->comic_description)); ?></p>
					</div>

					<div class="col-md-12 col-xs-12 comic_chapter">
						<div class="panel-group" id="accordion">
							<div class="panel panel-default no-margin-bottom">
								<div class="panel-heading">
									<h4 class="panel-title">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
									Chapter &nbsp;
									</a>
									</h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse in">
									<div class="panel-body">
										<?php if(count($comic_chapter)): ?>
											<?php $__currentLoopData = $comic_chapter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<a href="<?php echo e('/show/comic/'.$chapter->comic_title. '/' .$chapter->comic_chapter); ?>"><i class="fa fa-caret-right" aria-hidden="true"></i> Chapter <?php echo e($chapter->comic_chapter); ?> : <?php echo e($chapter->chapter_title); ?></a>
												<br>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php else: ?>
											<h4 id="center">Sorry, this comic has no chapter yet</h4>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				
			</div>
		</div>		
	</div>

</main>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Front-end/Master-layout/master-home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>