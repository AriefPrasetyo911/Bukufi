<?php $__env->startSection('push-style'); ?>
<style>
	.panel-heading{
		display: flex;
	}

	#comic_title{
		text-align: center;
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

	.input-group{
		margin-left: 15px;
	}

	.panel-group .panel{
		border-radius: 0;
	}

	.comic-image{
		width: 100%;
	}

	.comic{
		padding-top: 15px;
		padding-bottom: 15px;
	}

	.read{
		width: 100%;
		object-fit: cover;
	}

	.col-md-5{
		padding-left: 0;
	}

	.center{
		text-align: center;
	}

	.pager{
		margin-bottom: 15px;
	}

	#ScrollToTop{
		text-align:center; 
		position:fixed; 
		bottom:50px; 
		right:10px; 
		cursor:pointer;
		display:none
	}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<main class="main-content col-md-12">
	<div class="col-md-12">
		<!-- carousel started-->
		<div class="panel panel-default">
			<div class="panel-body">
				<?php if(Session::has('notif')): ?>
		            <div class="alert alert-success">
		            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
		              <?php echo e(Session::get('notif')); ?>

		            </div>
		        <?php endif; ?>
		        <?php if(Session::has('error')): ?>
		            <div class="alert alert-danger">
		            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
		              <?php echo e(Session::get('error')); ?>

		            </div>
		        <?php endif; ?>


		        <input type="hidden" name="valuez" id="valuez" value="<?php echo e($curr_page); ?>">
		        
				<div class="col-md-12">
					<div class="col-md-6">
						<div class="pull-left">
							<select name="comic_chapter" class="form-control pick-chapter" onchange="pickone(this.value)">
								<?php $__currentLoopData = $shows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $show): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($show->comic_chapter); ?>" id="com_chapter" <?php echo e($show->comic_chapter == Request::segment(4) ? "selected":""); ?>>Chapter <?php echo e($show->comic_chapter); ?> : <?php echo e($show->chapter_title); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<?php if(auth()->guard('user')->user()): ?>
							
							<form action="<?php echo e(url('bookmark/user/add'.'/'.auth()->guard('user')->user()->id)); ?>" method="post" class="form-horizontal">
								<?php $__currentLoopData = $shows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $show): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php echo e(csrf_field()); ?>

								<input type="hidden" name="id_user" value="<?php echo e(auth()->guard('user')->user()->id); ?>">
								<input type="hidden" name="comic_title" value="<?php echo e($show->comic_title); ?>">
								<input type="hidden" name="comic_chapter" value="<?php echo e($show->comic_chapter); ?>">
								<input type="hidden" name="chapter_title" value="<?php echo e($show->chapter_title); ?>">
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<button type="submit" class="btn btn-primary add-fav pull-right">Add to Favourite</button>
							</form>
							
						<?php else: ?>
							<a href="#" class="btn btn-primary add-fav pull-right nologin"> Add to Favourite</a>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-md-12"><hr></div>

				<div class="col-md-8 col-md-offset-2 comic">
					<!-- <div class="well">
						<?php $__currentLoopData = $shows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $show): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<h4 class="center"><?php echo e(str_replace('-', ' ', $show->comic_title)); ?> chapter <?php echo e($show->comic_chapter); ?> : <?php echo e($show->chapter_title); ?></h4>
							<p class="center">Now you read <b><?php echo e($show->comic_title); ?> chapter <?php echo e($show->comic_chapter); ?> : <?php echo e($show->chapter_title); ?></b> at Bukufi.com </p> 
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div> -->
					<?php $__currentLoopData = $shows2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $show): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<img src="/theme/images_comic/<?php echo e($show->comic_image); ?>" alt="Comic" class="read">
						<input type="hidden" name="comic_title" id="com_title" value="<?php echo e($show->comic_title); ?>">
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
				
			</div>

			<?php if(auth()->guard('user')->user()): ?>

				<div class="login-user">
					<?php echo e($shows2->appends(Request::except('page'))->links('pagination.custom')); ?>

				</div>
			<?php else: ?>
				<div class="nologin-user">
					<?php echo e($shows2->appends(Request::except('page'))->links('pagination.custom')); ?>

				</div>
			<?php endif; ?>
		</div>		
	</div>

</main>
<div id='ScrollToTop'><img alt='Back to top' src='http://2.bp.blogspot.com/-MFhU3vLp5ho/UiaBZeA1McI/AAAAAAAAAQs/MrzW2ljP5mA/s1600/arrow-up_basic_blue.png' title="Back to Top" /></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('push-script'); ?>
<script type="text/javascript">
	//scroll on top function
	$(function() { $(window).scroll(function() { 
		if($(this).scrollTop()>100) { 
			$('#ScrollToTop').fadeIn()
		} else { 
			$('#ScrollToTop').fadeOut();}
		});

	$('#ScrollToTop').click(function(){$('html,body').animate({scrollTop:0},1000);return false})});

	//bookmark function
	function pickone(value){
		var com_title	= $('#com_title').val();

		window.location = "/show/comic/" + com_title + "/" + value;
	}

	//check login function. to limit page for unlogin user
	var loggedIn = <?php echo e(auth()->guard('user')->check() ? 'true' : 'false'); ?>;

	if (loggedIn){
	    //user already login. no need do anything :)
	}
	else{

		if($('#valuez').val() > 10)
		{
			$('.nologin-user').addClass('disabled');
			$('.nologin-user .pager').addClass('disabled');
			$('.nologin-user .pager li').addClass('disabled');

			$('.nologin-user .pager li a').bind('click', function(e){
			    e.preventDefault();
			});

			swal("Info!", "You must login first to continue reading", "info");
		}
	}

	//to protect add bookmark button
	$('.nologin').on('click', function() {
		swal("Error!", "You must login first to use this menu", "error");
	});
	

	/*$(document).ready(function() {
		$('.pick-chapter').on('change', function() {
			
			var com_title	= $('#com_title').val();
			var com_chapter = $('.pick-chapter').val();
			
			$.ajax({
				url: "/show/comic"+'/'+ com_title + '/' + com_chapter,
				type: 'GET',
				dataType: 'json',
				data: function(d) {
            	}
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		});
	});*/
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Front-end/Master-layout/master-home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>