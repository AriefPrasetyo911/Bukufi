<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo e($title); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('theme/css/Bootstrap/bootstrap.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('theme/css/Font-awesome/css/font-awesome.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('theme/css/Custom/css/style.css')); ?>">
	<!--plugin-->
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('theme/js/Plugins/slick/slick-theme.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('theme/css/Custom/css/carousel.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('theme/js/Plugins/sweetalert/sweetalert.css')); ?>">

	<?php echo $__env->yieldContent('push-style'); ?>
	
	<script src="<?php echo e(asset('theme/js/Plugins/sweetalert/sweetalert.min.js')); ?>" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo e(asset('theme/js/Bootstrap/jquery-3.2.1.min.js')); ?>"></script>
	
</head>
<body>
	<script>
		window.fbAsyncInit = function() {
		FB.init({
		  appId      : '1995949823975076',
		  cookie     : true,
		  xfbml      : true,
		  version    : 'v2.8'
		});
		FB.AppEvents.logPageView();   
		};

		(function(d, s, id){
		 var js, fjs = d.getElementsByTagName(s)[0];
		 if (d.getElementById(id)) {return;}
		 js = d.createElement(s); js.id = id;
		 js.src = "//connect.facebook.net/en_US/sdk.js";
		 fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>

	<div class="container">
		<!-- for top navbar -->
		<nav class="navbar navbar-default navbar-fixed-top top-navbar hidden-xs">
			<div class="container">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed navbar-collapse-top" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
		      
			      <a class="navbar-brand" class="navbar-brand" href="<?php echo e(route('home.index')); ?>">
			      	<img src="<?php echo e(asset('theme/icons/bukufi.png')); ?>" alt="Bukufi icon">
			      </a>
			      
			    </div>

			    <!-- Collect the nav links and other content for toggling -->
			    <div class="panel login-dropdown">
				    <div class="collapse navbar-collapse panel-body" id="bs-example-navbar-collapse-1">
				      	<ul class="nav navbar-nav navbar-right">
					        <?php if(auth()->guard('user')->user()): ?> 
					        	<div class="btn-group pull-left user-login-dropdown">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<?php echo e(auth()->guard('user')->user()->name); ?> <span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
									<li><a href="<?php echo e(route('user.dashboard')); ?>">Go to User Panel</a></li>
									<li>
										<a href="<?php echo e(route('user.logout')); ?>"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat"> Sign out</a>
					                    <form id="logout-form" action="<?php echo e(route('user.logout')); ?>" method="POST" style="display: none;">
					                          <?php echo e(csrf_field()); ?>

					                    </form>
									</li>
									</ul>
								</div>
					        <?php else: ?>
					        	<li>
					        		<a href="<?php echo e(url('login/facebook')); ?>" class="fb">
					        			<button type="button" class="btn btn-sm btn-primary">
					        				<i class="fa fa-facebook-official" aria-hidden="true"></i> Login with Facebook
					        			</button>
					        		</a>
					        	</li>

					        	<li>
					        		<a href="<?php echo e(url('/social/redirect/google')); ?>">
					        			<button type="button" class="btn btn-sm btn-danger">
					        				<i class="fa fa-google-plus-square" aria-hidden="true"></i> Login with Google +
					        			</button>
					        		</a>
					        	</li>
					        <?php endif; ?>
				      	</ul>
				    </div><!-- /.navbar-collapse -->
			    </div>
		  	</div><!-- /.container-fluid -->
		</nav>
		<!-- /for top navbar -->

		<!-- for main navbar -->
		<nav class="nav navbar-default main-navbar" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle x collapsed" data-toggle="collapse" aria-expanded="false" data-target="#navbar-menu">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand hidden-lg hidden-md hidden-sm" class="navbar-brand" href="<?php echo e(route('home.index')); ?>">Bukufi</a>
				</div>

				<div class="collapse navbar-collapse" id="navbar-menu">
					<div class="col-xs-12 hidden-md hidden-lg hidden-sm">
						<ul class="nav navbar-nav">
	        				<li class="<?php echo e(Request::segment(2) == '' ? 'actived':''); ?>" id="home"><a id="home" class="<?php echo e(Request::segment(2) == '' ? 'actived':''); ?>" href="<?php echo e(route('home.index')); ?>">HOME <span class="sr-only">(current)</span></a></li>
	        				<li class="<?php echo e(Request::segment(1) == 'books' ? 'actived':''); ?> " id="books"><a id="books" class="<?php echo e(Request::segment(1) == 'books' ? 'actived':''); ?>" href="<?php echo e(route('books')); ?>">BOOKS</a></li>
	        				<li class="<?php echo e(Request::segment(1) == 'comics' ? 'actived':''); ?> " id="comiclist"><a id="comiclist" class="<?php echo e(Request::segment(1) == 'comics' ? 'actived':''); ?>" href="<?php echo e(route('latest.comic')); ?>">COMICS</a></li>
	        				<li class="<?php echo e(Request::segment(1) == 'sales' ? 'actived':''); ?> " id="books"><a id="books" class="<?php echo e(Request::segment(1) == 'sales' ? 'actived':''); ?>" href="#">SALES</a></li>
	        			</ul>
	        			<form class="navbar-form navbar-right form-horizontal" action="<?php echo e(route('search.form')); ?>" method="get">
							<div class="form-group">
								<input type="text" class="form-control input-sm" name="search" id="searchinput" placeholder="Search by Title, Creator, Genre or Year and hit enter">
							</div>
						</form>
						<ul class="nav navbar-nav">
					        <?php if(auth()->guard('user')->user()): ?> 
					        	<div class="btn-group btn btn-block user-login-dropdown">
									<button type="button" class="btn btn-default btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<?php echo e(auth()->guard('user')->user()->name); ?> <span class="caret"></span>
									</button>

									<ul class="dropdown-menu">
										<li>
											<a href="<?php echo e(route('user.dashboard')); ?>" class="btn btn-sm btn-primary btn-block"> User Panel</a>
										</li>
										<li>
											<a href="<?php echo e(url('bookmark/user').'/'.auth()->guard('user')->user()->id); ?>" class="btn btn-sm btn-success btn-block"> Bookmark</a>
										</li>
										<li>
											<a href="<?php echo e(route('user.logout')); ?>"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-warning btn-flat"> Sign out</a>
						                    <form id="logout-form" action="<?php echo e(route('user.logout')); ?>" method="POST" style="display: none;">
						                          <?php echo e(csrf_field()); ?>

						                    </form>
										</li>
									</ul>
								</div>
					        <?php else: ?>
					        	<li>
					        		<a href="<?php echo e(url('login/facebook')); ?>" class="fb">
					        			<button type="button" class="btn btn-sm btn-primary btn-block">
					        				<i class="fa fa-facebook-official" aria-hidden="true"></i> Login with Facebook
					        			</button>
					        		</a>
					        	</li>
					        <?php endif; ?>

					        <?php if(auth()->guard('user')->user()): ?>
					        	<li>
					        		<a href="<?php echo e(url('bookmark/user').'/'.auth()->guard('user')->user()->id); ?>" class="logined">
					        			<button type="button" class="btn-default btn btn-sm btn-block">
					        				<i class="fa fa-bookmark" aria-hidden="true"></i> Bookmark 
					        			</button>
					        		</a>
					        	</li>
					        <?php else: ?>
					        	<li>
					        		<a href="<?php echo e(url('/social/redirect/google')); ?>" class="nologin logined">
					        			<button type="button" class="btn btn-sm btn-danger btn-block">
					        				<i class="fa fa-google-plus-square" aria-hidden="true"></i> Login with Google +
					        			</button>
					        		</a>
					        	</li>
					        <?php endif; ?>
				      	</ul>
					</div>

					<div class="col-md-7 col-sm-7 hidden-xs">
						<ul class="nav navbar-nav">
	        				<li class="<?php echo e(Request::segment(1) == '' ? 'actived':''); ?>" id="home"><a id="home" class="<?php echo e(Request::segment(1) == '' ? 'actived':''); ?>" href="<?php echo e(route('home.index')); ?>"><i class="fa fa-home" aria-hidden="true"></i> <span class="sr-only">(current)</span></a></li>
	        				<li class="<?php echo e(Request::segment(1) == 'books' ? 'actived':''); ?> " id="books"><a id="books" class="<?php echo e(Request::segment(1) == 'books' ? 'actived':''); ?>" href="<?php echo e(route('books')); ?>">BOOKS</a></li>
	        				<li class="<?php echo e(Request::segment(1) == 'comics' ? 'actived':''); ?> " id="comiclist"><a id="comiclist" class="<?php echo e(Request::segment(1) == 'comics' ? 'actived':''); ?>" href="<?php echo e(route('comics')); ?>">COMICS</a></li>
	        				<li class="<?php echo e(Request::segment(1) == 'sales' ? 'actived':''); ?> " id="books"><a id="books" class="<?php echo e(Request::segment(1) == 'sales' ? 'actived':''); ?>" href="#">SALES</a></li>
	        				<!-- 
	        				<li class="need-divider"><a href="<?php echo e(route('single.genre')); ?>">COMIC GENRE</a></li>
	        				<li class="<?php echo e(Request::segment(2) == 'comic-author' ? 'actived':''); ?>" id="comicauthor"><a id="comicauthor" class="<?php echo e(Request::segment(2) == 'comic-author' ? 'actived':''); ?>" href="<?php echo e(route('single.author')); ?>">COMIC AUTHOR</a></li> -->
	        			</ul>
        			</div>
        			<div class="col-md-5 col-sm-5 hidden-xs">
	        			<form class="navbar-form navbar-right form-horizontal" action="<?php echo e(route('search.form')); ?>" method="get">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<input type="text" class="form-control input-sm" name="search" id="searchinput" placeholder="Search by Title, Creator, Genre or Year and hit enter">
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
			<div class="col-md-4 col-sm-4 col-xs-12 footer-about-us">
				<h4 class="footer-titles">ABOUT US</h4>
				<ul class="list-group">
					<a href="#">
						<li class="list-group-item"> Contact Us </li>
					</a>
					<a href="#">
						<li class="list-group-item"> Careers </li>
					</a>
					<a href="#">
						<li class="list-group-item"> FAQs </li>
					</a>
				</ul>
			</div>

			<div class="col-md-4 col-sm-4 col-xs-12 footer-more">
				<h4 class="footer-titles">MORE</h4>
				<ul class="list-group">
					<a href="#">
						<li class="list-group-item"> Submit </li>
					</a>
					<a href="#">
						<li class="list-group-item"> Content Owners </li>
					</a>
					<a href="#">
						<li class="list-group-item"> Advertisers </li>
					</a>
				</ul>
			</div>

			<div class="col-md-4 col-sm-4 col-xs-12 footer-subscribe">
				<h4><?php echo e(date('Y')); ?> BUKUFI SDN BHD</h4>
				<h5>
					<a href="#">Privacy Policy</a> |
					<a href="#">Term of Use</a>
				</h5>
			</div>
		</nav>	

		<div id='ScrollToTop'><img alt='Back to top' src='http://2.bp.blogspot.com/-MFhU3vLp5ho/UiaBZeA1McI/AAAAAAAAAQs/MrzW2ljP5mA/s1600/arrow-up_basic_blue.png' title="Back to Top" /></div>	
	</div>
</body>

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

		$('.nologin').on('click', function() {
			swal("Error!", "You must login first to use this menu", "error");
		});

		if ($('#books').hasClass('actived')) {
			$('#home').removeClass('actived');
		}

		if ($('#comicauthor').hasClass('actived')) {
			$('#home').removeClass('actived');
		}

		$("body").on("contextmenu",function(){
	       return false;
	    });

	    //scroll on top function
		$(function() { $(window).scroll(function() { 
			if($(this).scrollTop()>100) { 
				$('#ScrollToTop').fadeIn()
			} else { 
				$('#ScrollToTop').fadeOut();}
			});

		$('#ScrollToTop').click(function(){$('html,body').animate({scrollTop:0},1000);return false})});
	})
</script>
	
