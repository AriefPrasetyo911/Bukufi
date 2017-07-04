<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome to Website</title>
	<link rel="stylesheet" type="text/css" href="{{asset('theme/css/Bootstrap/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('theme/css/Font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('theme/css/Custom/css/style.css')}}">
	<!--plugin-->
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
	<link rel="stylesheet" type="text/css" href="{{asset('theme/js/Plugins/slick/slick-theme.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('theme/css/Custom/css/carousel.css')}}">
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
			      <a class="navbar-brand" class="navbar-brand" href="#">Brand</a>
			    </div>

			    <!-- Collect the nav links and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav navbar-right">
			        <li class="need-divider" id="active"><a href="#">My Books</a></li> 
			        <li class="need-divider"><a href="#">eGift Cards</a></li> 
			        <li class="need-divider"><a href="#">Login <i class="fa fa-angle-down" aria-hidden="true"></i></a></li>
			        <li class="need-divider"><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart (0)</a></li> 
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
	        				<li class="active need-divider"><a class="active" href="#"><i class="fa fa-home" aria-hidden="true"></i> <span class="sr-only">(current)</span></a></li>
	        				<li class="need-divider"><a href="#">NEW</a></li>
	        				<li class="need-divider"><a href="#">SALES</a></li>

	        				<li class="dropdown need-divider">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">BROWSE <i class="fa fa-angle-down" aria-hidden="true"></i></a>
								<ul class="dropdown-menu">
									<li><a href="#">Coming Soon</a></li>
									<li><a href="#">Free Comics</a></li>
									<li><a href="#">Series</a></li>
									<li><a href="#">Publisher</a></li>
									<li><a href="#">Top Rated</a></li>
									<li><a href="#">Top Selling</a></li>
									<li><a href="#">Creator</a></li>
								</ul>
							</li>
	        				<li class="need-divider"><a href="#">UNLIMITED</span></a></li>
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

		<!-- for sub navbar -->
		<nav class="nav navbar-default sub-navbar">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="sub-menu">
					<ul class="nav navbar-nav">
        				<li id="active"><a href="#">Graphics Novels</span></a></li>
        				<li><a href="#">Manga</span></a></li>
        				<li><a href="#">Indie</a></li>
        				<li><a href="#">Marvel Comics</span></a></li>
        				<li><a href="#">DC</span></a></li>
        				<li><a href="#">Image Comics</span></a></li>
        			</ul>
				</div>
			</div>
		</nav>
		<!-- for sub navbar -->

		<!--for content -->
		@yield('main-content')
		<!--/for content -->

		<!-- Static bottom navbar -->
		<nav class="navbar-static-bottom">
			<div class="col-md-2 footer-about-us">
				<h4 class="footer-titles">About Us</h4>
				<ul>
					<li><a href="#"> OUR STORY </a></li>
					<li><a href="#"> CONTACS US </a></li>
					<li><a href="#"> CAREER </a></li>
					<li><a href="#"> FAQS </a></li>
				</ul>
			</div>
			<div class="col-md-2 footer-more">
				<h4 class="footer-titles">More</h4>
				<ul>
					<li><a href="#"> UNLIMITED </a></li>
					<li><a href="#"> SUBMIT </a></li>
					<li><a href="#"> REEDEM </a></li>
					<li><a href="#"> PULL LIST </a></li>
				</ul>
			</div>
			<div class="col-md-2 footer-ways-to-read">
				<h4 class="footer-titles">Ways to Read</h4>
				<ul>
					<li><a href="#"> IPHONE / IPAD APP </a></li>
					<li><a href="#"> ANDROID APP </a></li>
					<li><a href="#"> KINDLE FIRE APP </a></li>
				</ul>
			</div>
			<div class="col-md-6 footer-subscribe">
				4
			</div>
		</nav>
	</div>
</body>
	<script type="text/javascript" src="{{asset('theme/js/Bootstrap/jquery-3.2.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('theme/js/Bootstrap/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('theme/js/Plugins/jq-sticky-anything.min.js')}}"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('ul.nav li.dropdown').hover(function() {
			  $(this).find('.dropdown-menu').stop(true, true).delay(500).fadeIn(500);
			}, function() {
			  $(this).find('.dropdown-menu').stop(true, true).delay(500).fadeOut(500);
			}, function(){
				$(this).addClass('dropdown-hover-color');
			});

			//carousel
			/*$('.newrelease-carousel').slick({
				slidesToShow:3, 
				slidesToScroll:3, 
				dots:true,
				arrow:true,
				infinite: false,
				adaptiveHeight: true,
				slidesPerRow: 3
			});*/
		});	
	</script>
