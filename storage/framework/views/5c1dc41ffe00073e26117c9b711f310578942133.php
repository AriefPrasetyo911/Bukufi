<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home : Bukufi</title>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('theme/css/Bootstrap/bootstrap.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('theme/css/Font-awesome/css/font-awesome.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('theme/css/Custom/css/style.css')); ?>">
	<!--plugin-->
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('theme/js/Plugins/slick/slick-theme.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('theme/css/Custom/css/carousel.css')); ?>">
	<?php echo $__env->yieldContent('push-style'); ?>
</head>
<body>
	<div class="container">
		<!-- for top navbar -->
		<nav class="navbar navbar-default top-navbar">
			<div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" class="navbar-brand" href="#">Bukufi</a>
			    </div>

			    <!-- Collect the nav links and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav navbar-right">
			        
			        <li><a href="<?php echo e(url('/login')); ?>">Login or Register </a></li>
			        <li><a href="#">Bookmark <i class="fa fa-bookmark" aria-hidden="true"></i></a></li>
					<li><a href="#">Reading History <i class="fa fa-history" aria-hidden="true"></i></a></li> 
		
			        <li></li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
		  	</div><!-- /.container-fluid -->
		</nav>
		<!-- /for top navbar -->

		<!-- for main navbar -->
		<nav class="nav navbar-default main-navbar">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" aria-expanded="false" data-target="#navbar-menu">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<div class="collapse navbar-collapse" id="navbar-menu">
					<div class="col-md-7">
						<ul class="nav navbar-nav">
	        				<li class="active need-divider"><a class="active" href="<?php echo e(route('home.index')); ?>"><i class="fa fa-home" aria-hidden="true"></i> <span class="sr-only">(current)</span></a></li>
	        				<li class="need-divider"><a href="<?php echo e(route('latest.comic')); ?>">LATEST</a></li>
	        				<li class="need-divider"><a href="<?php echo e(route('single.genre')); ?>">GENRE</a></li>
	        				<li class="need-divider"><a href="<?php echo e(route('single.author')); ?>">AUTHOR</a></li>
	        			</ul>
        			</div>
        			<div class="col-md-5">
	        			<form class="navbar-form navbar-right form-horizontal" action="#" method="post">
							<div class="col-md-12">
								<input type="email" class="form-control input-sm" id="searchinput" placeholder="Search by Title, Publisher, Genre or Creator">
							</div>
						</form>
				    </div>
				</div>
			</div>
		</nav>
		<!-- /for main navbar -->

		<!--for content -->
		<?php echo $__env->yieldContent('main-content'); ?>
		<!--/for content -->

		<!-- Static bottom navbar -->
		<nav class="navbar-static-bottom">
			<div class="col-md-3 footer-about-us">
				<h4 class="footer-titles">About Us</h4>
				<ul>
					<li><a href="#"> OUR STORY </a></li>
					<li><a href="#"> CONTACS US </a></li>
					<li><a href="#"> CAREER </a></li>
					<li><a href="#"> FAQS </a></li>
				</ul>
			</div>
			<div class="col-md-3 footer-ways-to-read">
				<h4 class="footer-titles">Ways to Read</h4>
				<ul>
					<li><a href="#"> IPHONE / IPAD APP </a></li>
					<li><a href="#"> ANDROID APP </a></li>
					<li><a href="#"> KINDLE FIRE APP </a></li>
				</ul>
			</div>
			<div class="col-md-6 footer-subscribe">
				<h4 class="footer-titles">Subscribe</h4>
				<p>Stay informed to receive updates on sales and new releases.</p>
				<form class="form-horizontal" action="#" method="post">
					<div class="col-md-12">
						<div class="col-md-8">
							<div class="input-group">
								<input type="email" class="form-control" placeholder="Email Address">
								<span class="input-group-btn">
									<button class="btn btn-primary" type="button"><i class="fa fa-caret-right" aria-hidden="true"></i></button>
								</span>
							</div><!-- /input-group -->
						</div>
						<div class="col-md-4"></div>
					</div>
				</form>
				<p>By submitting your email address, you are agreeing to our</p>
				<p><a href="#"> Privacy Policy</a> and <a href="#"> Terms of Use </a>.</p>
			</div>
		</nav>
		
		<nav class="navbar navbar-static-bottom-2 col-md-12">
			<div class="col-md-6 pull-left">
				<p>© 2017 Kaigan Games. All rights reserved</p>
			</div>
			<div class="col-md-6">
				<div class="social-media pull-right">
					<a href="#">
						<i class="fa fa-2x fa-twitter-square" aria-hidden="true"></i>
					</a>
					<a href="#">
						<i class="fa fa-2x fa-facebook-official" aria-hidden="true"></i>
					</a>
					<a href="#">
						<i class="fa fa-2x fa-google-plus-square" aria-hidden="true"></i>
					</a>				
				</div>
			</div>
		</nav>
	</div>

	<script type="text/javascript" src="<?php echo e(asset('theme/js/Bootstrap/jquery-3.2.1.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('theme/js/Bootstrap/bootstrap.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('theme/js/Plugins/jq-sticky-anything.min.js')); ?>"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
	<?php echo $__env->yieldContent('push-script'); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('ul.nav li.dropdown').hover(function() {
			  $(this).find('.dropdown-menu').stop(true, true).delay(500).fadeIn(500);
			}, function() {
			  $(this).find('.dropdown-menu').stop(true, true).delay(500).fadeOut(500);
			}, function(){
				$(this).addClass('dropdown-hover-color');
			});
		})
	</script>
</body>
	
