<?php $__env->startSection('push-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('theme/css/Custom/css/item-carousel.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('theme/js/AdminLTE/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
<style type="text/css">
	.col-lg-12, .col-lg-2{
		padding-right: 0;
		padding-left: 0;
	}

	.no-pl{
		padding-left: 0 !important;
	}

	.no-padding-left
	{
		margin-bottom: 15px;
		height: 235px;
		max-height: 235px;
	}

	.xs{
		padding-left: 0;
	}

	.col-lg-12, .col-lg-2{
		padding-right: 0;
		padding-left: 0;
	}

	.col-sm-12.visible-sm, .col-sm-4{
		padding-right: 0;
		padding-left: 0;
	}

	.panel-heading{
		display: flex;
		padding-top: 0;
		padding-bottom: 0;
	}

	img{
		width: 100%;
	}

	h4, h5{
		padding-top: 5px;
		padding-bottom: 5px;
	}

	.main-content .col-md-3 .col-md-12, .main-content .col-md-9 .col-md-12{
		padding-bottom: 0;
	}

	.col-md-3{
		margin-bottom: 10px;
	}

	.np{
		padding-bottom: 15px;
	}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<main class="main-content">

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 book">
		<!-- Carousel
		================================================== -->
    	<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
	      	<div class="carousel-inner" role="listbox">
				<?php $__currentLoopData = $carousel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="item active">
					<img class="first-slide" src="<?php echo e(asset('theme/Slider_carousel/'.$slide->slider_image)); ?>" alt="<?php echo e($slide->slider_image); ?>">
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php $__currentLoopData = $carousel2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="item">
					<img class="first-slide" src="<?php echo e(asset('theme/Slider_carousel/'.$slide->slider_image)); ?>" alt="<?php echo e($slide->slider_image); ?>">
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	      	</div>
	      	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	        	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	        	<span class="sr-only">Previous</span>
	      	</a>
	      	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	        	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	        	<span class="sr-only">Next</span>
	      	</a>
    	</div><!-- /.carousel -->
	</div>

	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
		<div class="panel panel-default trending-books">
			<div class="panel-heading latest-update">
				<div class="col-lg-12 col-sm-12 hidden-xs">
					<div class="col-md-6 col-sm-6 col-xs-6 left margin-top-5 margin-bottom-5">
						<h4>BOOK LIST</h4>
					</div>					
				</div>

				<div class="col-xs-12 visible-xs">
					<div class="col-xs-6 left margin-top-5 margin-bottom-5">
						<h5>BOOK LIST</h5>
					</div>
				</div>
			</div>

			<!--only for large medium-->
			<div class="panel-body visible-lg visible-md hidden-xs">
				<div class="col-lg-12 col-md-12 no-padding-right visible-md visible-lg">
					
					<table class="table table-hover table-responsive" id="book-list" width="100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Title</th>
								<th>Author</th>
								<th>Publisher</th>
								<th>Year of Release</th>
								<th></th>
							</tr>
						</thead>
						<?php $no = 1;?>
						<tbody>
							<?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($no++); ?></td>
								<td><?php echo e(str_replace('-', ' ', $book->book_title)); ?></td>
								<td><?php echo e(str_replace('-', ' ', $book->book_author)); ?></td>
								<td><?php echo e(str_replace('-', ' ', $book->book_publisher)); ?></td>
								<td><?php echo e($book->book_release); ?></td>
								<td>
									<a href="<?php echo e(url('book').'/'.$book->book_title); ?>" class="btn btn-default" title="<?php echo e(str_replace('-', ' ', $book->book_title)); ?>">Read</a>
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>

				</div>
			</div>
			<!--/only for large-->

			<!--only for small-->
			<div class="panel-body visible-sm hidden-xs">
				<div class="col-sm-12 no-padding-right visible-sm">
					
					<table class="table table-hover table-responsive" id="book-list2" width="100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Title</th>
								<th>Author</th>
								<th>Publisher</th>
								<th>Year of Release</th>
								<th></th>
							</tr>
						</thead>
						<?php $no = 1;?>
						<tbody>
							<?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($no++); ?></td>
								<td><?php echo e(str_replace('-', ' ', $book->book_title)); ?></td>
								<td><?php echo e(str_replace('-', ' ', $book->book_author)); ?></td>
								<td><?php echo e(str_replace('-', ' ', $book->book_publisher)); ?></td>
								<td><?php echo e($book->book_release); ?></td>
								<td>
									<a href="<?php echo e(url('book').'/'.$book->book_title); ?>" class="btn btn-default" title="<?php echo e(str_replace('-', ' ', $book->book_title)); ?>">Read</a>
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>

				</div>
			</div>
			<!--/only for small-->

			<!--only for xs-->
			<div class="panel-body visible-xs">
				<div class="col-xs-12 no-padding-right visible-xs">
					
					<table class="table table-hover table-responsive" id="book-list3" width="100%">
						<thead>
							<tr>
								<th>Title</th>
								<th>Author</th>
								<th></th>
							</tr>
						</thead>
						<?php $no = 1;?>
						<tbody>
							<?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e(str_replace('-', ' ', $book->book_title)); ?></td>
								<td><?php echo e(str_replace('-', ' ', $book->book_author)); ?></td>
								<td>
									<a href="<?php echo e(url('book').'/'.$book->book_title); ?>" class="btn btn-default" title="<?php echo e(str_replace('-', ' ', $book->book_title)); ?>">Read</a>
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>

				</div>
			</div>
			<!--/only for small-->
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<!--except xs -->
		<div class="panel panel-default hidden-xs">
			<div class="panel-heading">
				<div class="col-md-12 margin-top-5 margin-bottom-5">
					<h4>QUICK LINKS</h4>
				</div>
			</div>
			<div class="panel-body">
				<ul class="list-group">
					<a href="#"><li class="list-group-item">Welcome to Bukufi</li></a>
					<a href="#"><li class="list-group-item">New Releases</li></a>
					<a href="#"><li class="list-group-item">Top Rated</li></a>
					<a href="#"><li class="list-group-item">Free Books</li></a>
					<a href="#"><li class="list-group-item">Free Comics</li></a>
					<a href="#"><li class="list-group-item">Follow us on Facebook</li></a>
					<a href="#"><li class="list-group-item">Follow us on Twitter</li></a>
				</ul>
			</div>
		</div>

		<!--except xs -->
		<div class="panel panel-default hidden-xs">
			<div class="panel-heading">
				<div class="col-md-12 margin-top-5 margin-bottom-5">
					<h4>Best Sellers</h4>
				</div>
			</div>
			<div class="panel-body">
				<ul class="list-group">
					<li class="list-group-item">1. Saga #223</li>
					<li class="list-group-item">2. Secret Empire</li>
					<li class="list-group-item">3. Detective Comics</li>
					<li class="list-group-item">4. The Flash</li>
					<li class="list-group-item">5. Action Comics</li>
					<li class="list-group-item">6. Injustice 2</li>
					<li class="list-group-item">7. All Star Batman</li>
					<li class="list-group-item">8. Wonder Women</li>
					<li class="list-group-item">9. X-Men</li>
					<li class="list-group-item">10. Teen Titan</li>
				</ul>
			</div>
		</div>

		<!--====================================-->
	</div>

</main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('push-script'); ?>
<script type="text/javascript" src="<?php echo e(asset('theme/js/AdminLTE/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('theme/js/AdminLTE/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
  <script>
    $(function () {
      $('#book-list').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true
      });

      $('#book-list2').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true
      });

      $('#book-list3').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true
      });
    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Front-end/Master-layout/master-home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>