@extends('Front-end/Master-layout/master-home')

@section('push-style')
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

	.control-label
	{
		padding-left: 15px;
	}
</style>
@endsection

@section('main-content')
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
				@foreach($carousel as $slide)
				<div class="item active">
					<img class="first-slide" src="{{asset('storage/slider_carousel/'.$slide->slider_image)}}" alt="{{$slide->slider_image}}">
				</div>
				@endforeach
				@foreach($carousel2 as $slide)
				<div class="item">
					<img class="first-slide" src="{{asset('storage/slider_carousel/'.$slide->slider_image)}}" alt="{{$slide->slider_image}}">
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

			@if(count($popular_book_1) or count($popular_book_2))
			<!--only for large-->
			<div class="panel-body visible-lg hidden-xs">
				<div class="col-lg-12 no-padding-right visible-lg">
					
					<div class="carousel carouseltrendinglg slide" id="carouselItems">
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
			                            <a href="{{url('books').'/'.$book->book_title}}">
			                            	<img src="{{asset('/storage/book/book_cover').'/'.$book->book_image}}" alt="{{$book->book_image}}">
			                            </a>
			                        </div>
			                    </div>
			                    @endforeach
				          	</div><!-- /Slide1 --> 
				        	
				          	<div class="item">
				          		@foreach($popular_book_2 as $book)
			                	<div class="col-md-3">
			                        <div class="thumbnail">
			                            <a href="{{url('books').'/'.$book->book_title}}">
			                            	<img src="{{asset('/storage/book/book_cover').'/'.$book->book_image}}" alt="{{$book->book_image}}">
			                            </a>
			                        </div>
			                    </div>
			                    @endforeach
				          	</div><!-- /Slide2 --> 
				          	
				        </div>
				        
				        <div class="control-box">                            
				            <a class="carousel-control left" href=".carouseltrendinglg" data-slide="prev">‹</a>
					      	<a class="carousel-control right" href=".carouseltrendinglg" data-slide="next">›</a>
				        </div><!-- /.control-box -->   
				                              
				    </div><!-- /#carouselItems -->

				</div>
			</div>
			<!--/only for large-->

			<!--only for medium-->
			<div class="panel-body visible-md hidden-xs">
				<div class="col-md-12 no-padding-right visible-md">
					
					<div class="carousel carouseltrendingmd slide" id="carouselItems">
				        <div class="carousel-inner">
				        	<div class="item active">
				        		@foreach($popular_book_1 as $book)
			                	<div class="col-md-3">
			                        <div class="thumbnail">
			                            <a href="{{url('books').'/'.$book->book_title}}">
			                            	<img src="{{asset('/storage/book/book_cover').'/'.$book->book_image}}" alt="{{$book->book_image}}">
			                            </a>
			                        </div>
			                    </div>
			                    @endforeach
				          	</div><!-- /Slide1 --> 

				          	<div class="item">
				          		@foreach($popular_book_2 as $book)
			                	<div class="col-md-3">
			                        <div class="thumbnail">
			                            <a href="{{url('books').'/'.$book->book_title}}">
			                            	<img src="{{asset('/storage/book/book_cover').'/'.$book->book_image}}" alt="{{$book->book_image}}">
			                            </a>
			                        </div>
			                    </div>
			                    @endforeach
				          	</div><!-- /Slide2 --> 
				        	
				        </div>
				        
				        <div class="control-box">                            
				            <a class="carousel-control left" href=".carouseltrendingmd" data-slide="prev">‹</a>
					      	<a class="carousel-control right" href=".carouseltrendingmd" data-slide="next">›</a>
				        </div><!-- /.control-box -->   
				    </div><!-- /#carouselItems -->

				</div>
			</div>
			<!--/only for medium-->

			<!--only for small-->
			<div class="panel-body visible-sm hidden-xs">
				<div class="col-sm-12 no-padding-right visible-sm">
					
					<div class="carousel carouseltrendingsm slide" id="carouselItems">
				        <div class="carousel-inner">

				        	<div class="item active">
				        		@foreach($popular_book_1 as $book)
			                	<div class="col-sm-3">
			                        <div class="thumbnail">
			                            <a href="{{url('books').'/'.$book->book_title}}">
			                            	<img src="{{asset('/storage/book/book_cover').'/'.$book->book_image}}" alt="{{$book->book_image}}">
			                            </a>
			                        </div>
			                    </div>
			                    @endforeach
				          	</div><!-- /Slide1 --> 

				          	<div class="item">
				          		@foreach($popular_book_2 as $book)
			                	<div class="col-sm-3">
			                        <div class="thumbnail">
			                            <a href="{{url('books').'/'.$book->book_title}}">
			                            	<img src="{{asset('/storage/book/book_cover').'/'.$book->book_image}}" alt="{{$book->book_image}}">
			                            </a>
			                        </div>
			                    </div>
			                    @endforeach
				          	</div><!-- /Slide2 --> 

				        </div>
				        
				        <div class="control-box">                            
				            <a class="carousel-control left" href=".carouseltrendingsm" data-slide="prev">‹</a>
					      	<a class="carousel-control right" href=".carouseltrendingsm" data-slide="next">›</a>
				        </div><!-- /.control-box -->   
				    </div><!-- /#carouselItems -->

				</div>
			</div>
			<!--/only for small-->

			<!--only for small-->
			<div class="panel-body visible-xs">
				<div class="col-xs-12 no-padding-right visible-xs">
					
					<div class="carousel carouseltrendingxs slide" id="carouselItems">
				        <div class="carousel-inner" role="listbox">

				        	<div class="item active">
				        		@foreach($popular_book_1 as $book)
			                	<div class="col-xs-3">
			                        <div class="thumbnail">
			                            <a href="{{url('books').'/'.$book->book_title}}">
			                            	<img src="{{asset('/storage/book/book_cover').'/'.$book->book_image}}" alt="{{$book->book_image}}">
			                            </a>
			                        </div>
			                    </div>
			                    @endforeach
				          	</div><!-- /Slide1 --> 

				          	<div class="item">
				          		@foreach($popular_book_2 as $book)
			                	<div class="col-xs-3">
			                        <div class="thumbnail">
			                            <a href="{{url('books').'/'.$book->book_title}}">
			                            	<img src="{{asset('/storage/book/book_cover').'/'.$book->book_image}}" alt="{{$book->book_image}}">
			                            </a>
			                        </div>
			                    </div>
			                    @endforeach
				          	</div><!-- /Slide2 --> 
				        	
				        </div>
				        
				        <div class="control-box">                            
				            <a class="carousel-control left" href=".carouseltrendingxs" data-slide="prev">‹</a>
					      	<a class="carousel-control right" href=".carouseltrendingxs" data-slide="next">›</a>
				        </div><!-- /.control-box -->   
				    </div><!-- /#carouselItems -->

				</div>
			</div>
			<!--/only for small-->
			@else
				<div class="panel-body">
				<h4 class="text-center text-info">Sorry there is no trending book yet</h4>
				</div>
			@endif
		</div>

		<!--new books-->
		<div class="panel panel-default new-books">
			<div class="panel-heading latest-update">
				<div class="col-lg-12 col-sm-12 hidden-xs">
					<div class="col-md-6 col-xs-6 left margin-top-5 margin-bottom-5">
						<h4>NEW BOOKS</h4>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6 right margin-top-5 margin-bottom-5 pull-right">
						<a href="{{route('book.all')}}"><h5 class="pull-right">VIEW MORE</h5></a>
					</div>
				</div>
				<div class="col-xs-12 visible-xs">
					<div class="col-xs-6 left margin-top-5 margin-bottom-5">
						<h5>NEW BOOKS</h5>
					</div>
					<div class="col-xs-6 right margin-top-5 margin-bottom-5 pull-right">
						<a href="{{route('book.all')}}"><h5 class="pull-right">VIEW MORE</h5></a>
					</div>
				</div>
			</div>

			@if(count($filter))
			<!--only for large-->
			<div class="panel-body visible-lg hidden-xs">
				<div class="col-lg-12 no-padding-right visible-lg">
					@foreach($filter as $latest)
						<div class="col-md-3">

							<div class="thumbnail">
	                            <a href="{{url('books').'/'.$latest->book_title}}">
	                            	<img src="{{asset('/storage/book/book_cover').'/'.$latest->book_image}}" alt="{{$book->book_image}}">
	                            </a>
	                        </div>

						</div>
					@endforeach
				</div>
				{{ $filter->links('pagination.custom') }}
			</div>
			<!--/only for large-->

			<!--only for medium-->
			<div class="panel-body visible-md hidden-xs">
				<div class="col-md-12 no-padding-right visible-md">
					
					@foreach($filter as $latest)
						<div class="col-md-3">

							<div class="thumbnail">
	                            <a href="{{url('books').'/'.$latest->book_title}}">
	                            	<img src="{{asset('/storage/book/book_cover').'/'.$latest->book_image}}" alt="{{$book->book_image}}">
	                            </a>
	                        </div>

						</div>
					@endforeach

				</div>
				{{ $filter->links('pagination.custom') }}
			</div>
			<!--/only for medium-->

			<!--only for small-->
			<div class="panel-body visible-sm hidden-xs">
				<div class="col-sm-12 no-padding-right visible-sm">
					
					@foreach($filter as $latest)
						<div class="col-sm-3">

							<div class="thumbnail">
	                            <a href="{{url('books').'/'.$latest->book_title}}">
	                            	<img src="{{asset('/storage/book/book_cover').'/'.$latest->book_image}}" alt="{{$book->book_image}}">
	                            </a>
	                        </div>

						</div>
					@endforeach

				</div>
				{{ $filter->links('pagination.custom') }}
			</div>
			<!--/only for small-->

			<!--only for small-->
			<div class="panel-body visible-xs">
				<div class="col-xs-12 no-padding-right visible-xs">
					
					@foreach($filter as $latest)
						<div class="col-xs-3">

							<div class="thumbnail">
	                            <a href="{{url('books').'/'.$latest->book_title}}">
	                            	<img src="{{asset('/storage/book/book_cover').'/'.$latest->book_image}}" alt="{{$book->book_image}}">
	                            </a>
	                        </div>

						</div>
					@endforeach

				</div>
				{{ $filter->links('pagination.custom') }}
			</div>
			<!--/only for small-->
			@else
				<div class="panel-body">
					<h4 class="text-center text-info">Sorry there is no book yet</h4>
				</div>
			@endif
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

		<div class="panel panel-default visible-xs">
			<div class="panel-heading">
				<div class="col-xs-12 margin-top-5 margin-bottom-5">
					<h4>QUICK LINKS</h4>
				</div>
			</div>
			<div class="panel-body">
				<ul class="list-group">
					<a href="#"><li class="list-group-item">Welcome to Bukufi</li></a>
					<a href="#"><li class="list-group-item">New Releases</li></a>
					<!-- <a href="#"><li class="list-group-item">Top Rated</li></a> -->
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
					<h4>Report Bug or Error</h4>
				</div>
			</div>
			<div class="panel-body">
				<p class="text-justify">
					If you find any error or bug please let us know. We really appreciate your report. You have helped us to develop a better system for Bukufi.
				</p>
				<hr>
				<button type="button" title="Report Bug or Error" class="btn btn-block btn-primary" data-toggle="modal" data-target="#reportbug">Report Bug or Error</button>
			</div>
		</div>

		<!--show xs -->
		<div class="panel panel-default visible-xs">
			<div class="panel-heading">
				<div class="col-xs-12 margin-top-5 margin-bottom-5">
					<h4>Report Bug or Error</h4>
				</div>
			</div>
			<div class="panel-body">
				<p class="text-justify">
					If you find any error or bug please let us know. We really appreciate your report. You have helped us to develop a better system for Bukufi.
				</p>
				<hr>
				<button type="button" title="Report Bug or Error" class="btn btn-block btn-primary" data-toggle="modal" data-target="#reportbug">Report Bug or Error</button>
			</div>
		</div>

		<!--====================================-->
	</div>

</main>

@if (Session::has('notif'))
    <script type="text/javascript">
		swal(
		  'Thank You',
		  'Thank you for your reporting :)',
		  'success'
		);
	</script>
@endif

@if (auth()->guard('user')->user()) 
	<div class="modal fade" id="reportbug" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header bg-info">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-center">Report Bug or Error</h4>
			</div>
			<form class="form-horizontal" action="{{route('send.error.book')}}" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="user_id" value="{{auth()->guard('user')->user()->id}}">
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-6">URL</label>
						<div class="col-md-8">
							<input type="url" name="error_url" class="form-control" placeholder="Ex. Bukufi.com/some-page">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-6">Error Message</label>
						<div class="col-md-8">
							<input type="text" name="error_message" class="form-control" placeholder="Ex. ErrorException Undefined variable: variables (View: location\location.blade.php)">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-6">Error Description</label>
						<div class="col-md-8">
							<textarea name="error_desc" class="form-control" placeholder="Ex. when i push read button i get this error"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Send</button>
				</div>
		    </form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
@else
	<div class="modal fade" id="reportbug" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header bg-info">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-center">Report Bug or Error</h4>
			</div>
			<form class="form-horizontal" action="{{route('send.error.book')}}" method="post">
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-6">URL</label>
						<div class="col-md-8">
							<input type="url" name="error_url" class="form-control" placeholder="Ex. Bukufi.com/some-page">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-6">Error Message</label>
						<div class="col-md-8">
							<input type="text" name="error_message" class="form-control" placeholder="Ex. ErrorException Undefined variable: variables (View: location\location.blade.php)">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-6">Error Description</label>
						<div class="col-md-8">
							<textarea name="error_desc" class="form-control" placeholder="Ex. when i push read button i get this error"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Send</button>
				</div>
		    </form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
@endif

@endsection