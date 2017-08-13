@extends('Front-end/Master-layout/master-home')

@section('push-style')
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/Custom/css/item-carousel.css')}}">
<style>
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

	.np:nth-child(1){
		padding-right: 15px;
	}

	.np:nth-child(2){
		padding-right: 15px;
	}

	.np:nth-child(3){
		padding-left: 0;
		padding-right: 7.5px;
	}
	
	.np:nth-child(4){
		padding-left: 7.5px;
	}

	.np:nth-child(5){
		padding-right: 0;
		padding-left: 15px;
	}

	.np:nth-child(6){
		padding-right: 0;
		padding-left: 15px;
	}

	.np:nth-child(7){
		padding-right: 15px;
	}

	.np:nth-child(8){
		padding-right: 15px;
	}

	.np:nth-child(9){
		padding-left: 0;
		padding-right: 7.5px;
	}

	.np:nth-child(10){
		padding-left: 7.5px;
	}

	.np:nth-child(11){
		padding-right: 0;
		padding-left: 15px;
	}

	.np:nth-child(12){
		padding-right: 0;
		padding-left: 15px;
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
</style>
@endsection

@section('main-content')
<main class="main-content">

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
	      		@foreach($carousel as $slide)
				<div class="item active">
					<img class="first-slide" src="{{asset('theme/Slider_carousel/'.$slide->slider_image)}}" alt="{{$slide->slider_image}}">
				</div>
				@endforeach
				@foreach($carousel2 as $slide)
				<div class="item">
					<img class="first-slide" src="{{asset('theme/Slider_carousel/'.$slide->slider_image)}}" alt="{{$slide->slider_image}}">
				</div>
				@endforeach
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
		<!--trenidng books-->
		<div class="panel panel-default trending-books">
			<div class="panel-heading latest-update">
				<div class="col-lg-12 col-sm-12 hidden-xs">
					<div class="col-md-6 col-sm-6 col-xs-6 left margin-top-5 margin-bottom-5">
						<h4>TRENDING BOOKS</h4>
					</div>
				</div>

				<div class="col-xs-12 visible-xs">
					<div class="col-xs-6 left margin-top-5 margin-bottom-5">
						<h5>TRENDING BOOKS</h5>
					</div>
				</div>
			</div>

			<!--only for large-->
			<div class="panel-body visible-lg hidden-xs">
				<div class="col-lg-12 no-padding-right visible-lg">
					
					<div class="carousel slide" id="carouselItems">
						<ol class="carousel-indicators">
							<li data-target="#carouselItems" data-slide-to="0" class="active"></li>
							<li data-target="#carouselItems" data-slide-to="1"></li>
							<li data-target="#carouselItems" data-slide-to="2"></li>
							<li data-target="#carouselItems" data-slide-to="3"></li>
						</ol>
				        <div class="carousel-inner">
				        	<div class="item active">
				        		@foreach($popular_book_1 as $book)
			                	<div class="col-md-3">
			                        <div class="thumbnail">
			                            <a href="{{url('book').'/'.$book->book_title}}">
			                            	<img src="{{asset('/theme/book/book_cover').'/'.$book->book_image}}" alt="{{$book->book_image}}">
			                            </a>
			                        </div>
			                    </div>
			                    @endforeach
				          	</div><!-- /Slide1 --> 

				          	<div class="item">
				          		@foreach($popular_book_2 as $book)
			                	<div class="col-md-3">
			                        <div class="thumbnail">
			                            <a href="{{url('book').'/'.$book->book_title}}">
			                            	<img src="{{asset('/theme/book/book_cover').'/'.$book->book_image}}" alt="{{$book->book_image}}">
			                            </a>
			                        </div>
			                    </div>
			                    @endforeach
				          	</div><!-- /Slide2 --> 
				        	
				        </div>
				        
				        <div class="control-box">                            
				            <a data-slide="prev" href="#carouselItems" class="carousel-control left">‹</a>
				            <a data-slide="next" href="#carouselItems" class="carousel-control right">›</a>
				        </div><!-- /.control-box -->   
				                              
				    </div><!-- /#carouselItems -->

				</div>
			</div>
			<!--/only for large-->

			<!--only for medium-->
			<div class="panel-body visible-md hidden-xs">
				<div class="col-md-12 no-padding-right visible-md">
					
					<div class="carousel slide" id="carouselItems">
				        <div class="carousel-inner">
				        	<div class="item active">
				        		@foreach($popular_book_1 as $book)
			                	<div class="col-md-3">
			                        <div class="thumbnail">
			                            <a href="{{url('book').'/'.$book->book_title}}">
			                            	<img src="{{asset('/theme/book/book_cover').'/'.$book->book_image}}" alt="{{$book->book_image}}">
			                            </a>
			                        </div>
			                    </div>
			                    @endforeach
				          	</div><!-- /Slide1 --> 

				          	<div class="item">
				          		@foreach($popular_book_2 as $book)
			                	<div class="col-md-3">
			                        <div class="thumbnail">
			                            <a href="{{url('book').'/'.$book->book_title}}">
			                            	<img src="{{asset('/theme/book/book_cover').'/'.$book->book_image}}" alt="{{$book->book_image}}">
			                            </a>
			                        </div>
			                    </div>
			                    @endforeach
				          	</div><!-- /Slide2 --> 
				        	
				        </div>
				        
				        <div class="control-box">                            
				            <a data-slide="prev" href="#carouselItems" class="carousel-control left">‹</a>
				            <a data-slide="next" href="#carouselItems" class="carousel-control right">›</a>
				        </div><!-- /.control-box -->   
				    </div><!-- /#carouselItems -->

				</div>
			</div>
			<!--/only for medium-->

			<!--only for small-->
			<div class="panel-body visible-sm hidden-xs">
				<div class="col-sm-12 no-padding-right visible-sm">
					
					<div class="carousel slide" id="carouselItems">
				        <div class="carousel-inner">

				        	<div class="item active">
				        		@foreach($popular_book_1 as $book)
			                	<div class="col-sm-3">
			                        <div class="thumbnail">
			                            <a href="{{url('book').'/'.$book->book_title}}">
			                            	<img src="{{asset('/theme/book/book_cover').'/'.$book->book_image}}" alt="{{$book->book_image}}">
			                            </a>
			                        </div>
			                    </div>
			                    @endforeach
				          	</div><!-- /Slide1 --> 

				          	<div class="item">
				          		@foreach($popular_book_2 as $book)
			                	<div class="col-sm-3">
			                        <div class="thumbnail">
			                            <a href="{{url('book').'/'.$book->book_title}}">
			                            	<img src="{{asset('/theme/book/book_cover').'/'.$book->book_image}}" alt="{{$book->book_image}}">
			                            </a>
			                        </div>
			                    </div>
			                    @endforeach
				          	</div><!-- /Slide2 --> 

				        </div>
				        
				        <div class="control-box">                            
				            <a data-slide="prev" href="#carouselItems" class="carousel-control left">‹</a>
				            <a data-slide="next" href="#carouselItems" class="carousel-control right">›</a>
				        </div><!-- /.control-box -->   
				    </div><!-- /#carouselItems -->

				</div>
			</div>
			<!--/only for small-->

			<!--only for small-->
			<div class="panel-body visible-xs">
				<div class="col-xs-12 no-padding-right visible-xs">
					
					<div class="carousel slide" id="carouselItems">
				        <div class="carousel-inner">

				        	<div class="item active">
				        		@foreach($popular_book_1 as $book)
			                	<div class="col-xs-3">
			                        <div class="thumbnail">
			                            <a href="{{url('book').'/'.$book->book_title}}">
			                            	<img src="{{asset('/theme/book/book_cover').'/'.$book->book_image}}" alt="{{$book->book_image}}">
			                            </a>
			                        </div>
			                    </div>
			                    @endforeach
				          	</div><!-- /Slide1 --> 

				          	<div class="item">
				          		@foreach($popular_book_2 as $book)
			                	<div class="col-xs-3">
			                        <div class="thumbnail">
			                            <a href="{{url('book').'/'.$book->book_title}}">
			                            	<img src="{{asset('/theme/book/book_cover').'/'.$book->book_image}}" alt="{{$book->book_image}}">
			                            </a>
			                        </div>
			                    </div>
			                    @endforeach
				          	</div><!-- /Slide2 --> 
				        	
				        </div>
				        
				        <div class="control-box">                            
				            <a data-slide="prev" href="#carouselItems" class="carousel-control left">‹</a>
				            <a data-slide="next" href="#carouselItems" class="carousel-control right">›</a>
				        </div><!-- /.control-box -->   
				    </div><!-- /#carouselItems -->

				</div>
			</div>
			<!--/only for small-->
		</div>

		<!--trending comics-->
		<div class="panel panel-default trending-comics">
			<div class="panel-heading latest-update">
				<div class="col-lg-12 col-sm-12 hidden-xs">
					<div class="col-md-6 col-xs-6 left margin-top-5 margin-bottom-5">
						<h4>TRENDING COMICS</h4>
					</div>
				</div>
				<div class="col-xs-12 visible-xs">
					<div class="col-xs-6 left margin-top-5 margin-bottom-5">
						<h5>TRENDING COMICS</h5>
					</div>
				</div>
			</div>

			<!--only for large-->
			<div class="panel-body visible-lg hidden-xs">
				<div class="col-lg-12 no-padding-right visible-lg">
					
					<div class="carousel slide" id="carouselItems2">
				        <div class="carousel-inner">
				        	<div class="item active">
				        		@foreach($popular_comics_1 as $popular)
			                	<div class="col-md-3">
			                        <div class="thumbnail">
			                            <a href="{{url('/comic'.'/'.$popular->comic_title)}}">
			                            	<img src="{{asset('theme/images_cover').'/'.$popular->comic_image}}" alt="{{$popular->comic_image}}">
			                            </a>
			                        </div>
			                    </div>
			                    @endforeach
				          	</div><!-- /Slide1 --> 

				          	<div class="item">
				          		@foreach($popular_comics_2 as $popular)
			                	<div class="col-md-3">
			                        <div class="thumbnail">
			                            <a href="{{url('/comic'.'/'.$popular->comic_title)}}">
			                            	<img src="{{asset('theme/images_cover').'/'.$popular->comic_image}}" alt="{{$popular->comic_image}}">
			                            </a>
			                        </div>
			                    </div>
			                    @endforeach
				          	</div><!-- /Slide2 --> 
				        	
				        </div>
				        
				        <div class="control-box">                            
				            <a data-slide="prev" href="#carouselItems2" class="carousel-control left">‹</a>
				            <a data-slide="next" href="#carouselItems2" class="carousel-control right">›</a>
				        </div><!-- /.control-box -->   
				                              
				    </div><!-- /#carouselItems2 -->

				</div>
			</div>
			<!--/only for large-->

			<!--only for medium-->
			<div class="panel-body visible-md hidden-xs">
				<div class="col-md-12 no-padding-right visible-md">
					
					<div class="carousel slide" id="carouselItems2">
				        <div class="carousel-inner">

				        	<div class="item active">
				        		@foreach($popular_comics_1 as $popular)
			                	<div class="col-md-3">
			                        <div class="thumbnail">
			                            <a href="{{url('/comic'.'/'.$popular->comic_title)}}">
			                            	<img src="{{asset('theme/images_cover').'/'.$popular->comic_image}}" alt="{{$popular->comic_image}}">
			                            </a>
			                        </div>
			                    </div>
			                    @endforeach
				          	</div><!-- /Slide1 --> 

				          	<div class="item">
				          		@foreach($popular_comics_2 as $popular)
			                	<div class="col-md-3">
			                        <div class="thumbnail">
			                            <a href="{{url('/comic'.'/'.$popular->comic_title)}}">
			                            	<img src="{{asset('theme/images_cover').'/'.$popular->comic_image}}" alt="{{$popular->comic_image}}">
			                            </a>
			                        </div>
			                    </div>
			                    @endforeach
				          	</div><!-- /Slide2 --> 
				        	
				        </div>
				        
				        <div class="control-box">                            
				            <a data-slide="prev" href="#carouselItems2" class="carousel-control left">‹</a>
				            <a data-slide="next" href="#carouselItems2" class="carousel-control right">›</a>
				        </div><!-- /.control-box -->   
				                              
				    </div><!-- /#carouselItems2 -->

				</div>
			</div>
			<!--/only for medium-->

			<!--only for small-->
			<div class="panel-body visible-sm hidden-xs">
				<div class="col-lg-sm no-padding-right visible-sm">
					
					<div class="carousel slide" id="carouselItems2">
				        <div class="carousel-inner">

				        	<div class="item active">
				        		@foreach($popular_comics_1 as $popular)
			                	<div class="col-sm-3">
			                        <div class="thumbnail">
			                            <a href="{{url('/comic'.'/'.$popular->comic_title)}}">
			                            	<img src="{{asset('theme/images_cover').'/'.$popular->comic_image}}" alt="{{$popular->comic_image}}">
			                            </a>
			                        </div>
			                    </div>
			                    @endforeach
				          	</div><!-- /Slide1 --> 

				          	<div class="item">
				          		@foreach($popular_comics_2 as $popular)
			                	<div class="col-sm-3">
			                        <div class="thumbnail">
			                            <a href="{{url('/comic'.'/'.$popular->comic_title)}}">
			                            	<img src="{{asset('theme/images_cover').'/'.$popular->comic_image}}" alt="{{$popular->comic_image}}">
			                            </a>
			                        </div>
			                    </div>
			                    @endforeach
				          	</div><!-- /Slide2 --> 
				        	
				        </div>
				        
				        <div class="control-box">                            
				            <a data-slide="prev" href="#carouselItems2" class="carousel-control left">‹</a>
				            <a data-slide="next" href="#carouselItems2" class="carousel-control right">›</a>
				        </div><!-- /.control-box -->   
				                              
				    </div><!-- /#carouselItems2 -->

				</div>
			</div>
			<!--/only for small-->

			<!--only for xs-small-->
			<div class="panel-body visible-xs">
				<div class="col-xs-sm no-padding-right visible-xs">
					
					<div class="carousel slide" id="carouselItems2">
				        <div class="carousel-inner">

				        	<div class="item active">
				        		@foreach($popular_comics_1 as $popular)
			                	<div class="col-xs-3">
			                        <div class="thumbnail">
			                            <a href="{{url('/comic'.'/'.$popular->comic_title)}}">
			                            	<img src="{{asset('theme/images_cover').'/'.$popular->comic_image}}" alt="{{$popular->comic_image}}">
			                            </a>
			                        </div>
			                    </div>
			                    @endforeach
				          	</div><!-- /Slide1 --> 

				          	<div class="item">
				          		@foreach($popular_comics_2 as $popular)
			                	<div class="col-xs-3">
			                        <div class="thumbnail">
			                            <a href="{{url('/comic'.'/'.$popular->comic_title)}}">
			                            	<img src="{{asset('theme/images_cover').'/'.$popular->comic_image}}" alt="{{$popular->comic_image}}">
			                            </a>
			                        </div>
			                    </div>
			                    @endforeach
				          	</div><!-- /Slide2 -->
				        	
				        </div>
				        
				        <div class="control-box">                            
				            <a data-slide="prev" href="#carouselItems2" class="carousel-control left">‹</a>
				            <a data-slide="next" href="#carouselItems2" class="carousel-control right">›</a>
				        </div><!-- /.control-box -->   
				                              
				    </div><!-- /#carouselItems2 -->

				</div>
			</div>
			<!--/only for xs-small-->
		</div>

		<!--sales-->
		<div class="panel panel-default sales">
			<div class="panel-heading latest-update">
				<div class="col-md-12 col-sm-12 hidden-xs">
					<div class="col-md-6 col-sm-6 left margin-top-5 margin-bottom-5">
						<h4>SALES</h4>
					</div>
				</div>
				<div class="col-xs-12 visible-xs">
					<div class="col-md-6 col-xs-6 left margin-top-5 margin-bottom-5">
						<h5>SALES</h5>
					</div>
				</div>
			</div>

			<!--only for large-->
			<div class="panel-body visible-lg hidden-xs">
				<div class="col-lg-12 no-padding-right visible-lg">
					
					<div class="carousel slide" id="carouselItems3">
				        <div class="carousel-inner">
				        	<div class="item active">
			                	<div class="col-md-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                    </div>
			                    <div class="col-md-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                   	</div>
			                    <div class="col-md-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                    </div>
			                    <div class="col-md-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                    </div>
				          	</div><!-- /Slide1 --> 

				          	<div class="item">
			                	<div class="col-md-3">
			                       <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                    </div>
			                    <div class="col-md-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                   	</div>
			                    <div class="col-md-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                    </div>
			                    <div class="col-md-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                    </div>
				          	</div><!-- /Slide2 --> 
				        	
				        </div>
				        
				        <div class="control-box">                            
				            <a data-slide="prev" href="#carouselItems3" class="carousel-control left">‹</a>
				            <a data-slide="next" href="#carouselItems3" class="carousel-control right">›</a>
				        </div><!-- /.control-box -->   
				                              
				    </div><!-- /#carouselItems3 -->

				</div>
			</div>
			<!--/only for large-->

			<!--only for medium-->
			<div class="panel-body visible-md hidden-xs">
				<div class="col-md-12 no-padding-right visible-md">
					
					<div class="carousel slide" id="carouselItems3">
				        <div class="carousel-inner">
				        	<div class="item active">
			                	<div class="col-md-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                    </div>
			                    <div class="col-md-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                   	</div>
			                    <div class="col-md-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                    </div>
			                    <div class="col-md-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                    </div>
				          	</div><!-- /Slide1 --> 

				          	<div class="item">
			                	<div class="col-md-3">
			                       <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                    </div>
			                    <div class="col-md-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                   	</div>
			                    <div class="col-md-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                    </div>
			                    <div class="col-md-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                    </div>
				          	</div><!-- /Slide2 --> 
				        	
				        </div>
				        
				        <div class="control-box">                            
				            <a data-slide="prev" href="#carouselItems3" class="carousel-control left">‹</a>
				            <a data-slide="next" href="#carouselItems3" class="carousel-control right">›</a>
				        </div><!-- /.control-box -->   
				                              
				    </div><!-- /#carouselItems3 -->

				</div>
			</div>
			<!--/only for medium-->

			<!--only for small-->
			<div class="panel-body visible-sm hidden-xs">
				<div class="col-sm-12 no-padding-right visible-sm">
					
					<div class="carousel slide" id="carouselItems3">
				        <div class="carousel-inner">
				        	<div class="item active">
			                	<div class="col-sm-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                    </div>
			                    <div class="col-sm-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                   	</div>
			                    <div class="col-sm-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                    </div>
			                    <div class="col-sm-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                    </div>
				          	</div><!-- /Slide1 --> 

				          	<div class="item">
			                	<div class="col-sm-3">
			                       <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                    </div>
			                    <div class="col-sm-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                   	</div>
			                    <div class="col-sm-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                    </div>
			                    <div class="col-sm-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                    </div>
				          	</div><!-- /Slide2 --> 
				        	
				        </div>
				        
				        <div class="control-box">                            
				            <a data-slide="prev" href="#carouselItems3" class="carousel-control left">‹</a>
				            <a data-slide="next" href="#carouselItems3" class="carousel-control right">›</a>
				        </div><!-- /.control-box -->   
				                              
				    </div><!-- /#carouselItems3 -->

				</div>
			</div>
			<!--/only for small-->

			<!--only for xs-->
			<div class="panel-body visible-xs">
				<div class="col-xs-12 no-padding-right visible-xs">
					
					<div class="carousel slide" id="carouselItems3">
				        <div class="carousel-inner">
				        	<div class="item active">
			                	<div class="col-xs-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                    </div>
			                    <div class="col-xs-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                   	</div>
			                    <div class="col-xs-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                    </div>
			                    <div class="col-xs-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                    </div>
				          	</div><!-- /Slide1 --> 

				          	<div class="item">
			                	<div class="col-xs-3">
			                       <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                    </div>
			                    <div class="col-xs-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                   	</div>
			                    <div class="col-xs-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                    </div>
			                    <div class="col-xs-3">
			                        <div class="thumbnail">
			                            <a href="#"><img src="theme/sales/sales.png" alt=""></a>
			                        </div>
			                    </div>
				          	</div><!-- /Slide2 --> 
				        	
				        </div>
				        
				        <div class="control-box">                            
				            <a data-slide="prev" href="#carouselItems3" class="carousel-control left">‹</a>
				            <a data-slide="next" href="#carouselItems3" class="carousel-control right">›</a>
				        </div><!-- /.control-box -->   
				                              
				    </div><!-- /#carouselItems3 -->

				</div>
			</div>
			<!--/only for xs-->
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
@endsection