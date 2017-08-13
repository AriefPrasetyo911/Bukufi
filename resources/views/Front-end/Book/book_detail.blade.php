@extends('Front-end/Master-layout/master-home')

@section('push-style')
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

	.col-md-2, .col-md-10{
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

	#link:hover{
		background-color: #ddd;
	}
</style>
@endsection

@section('main-content')
<main class="main-content col-md-12 col-xs-12 book_detail">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<!-- carousel started-->
		<div class="panel panel-default">
			<div class="panel-body">
				
				<div class="col-lg-12 col-md-12 col-sm-12 hidden-xs">
					@foreach($book_detail as $detail)
					<div class="col-lg-6 col-md-6 col-sm-6 left">
						<figure id="description">
							<h4 id="book_desc">Book Description</h4>
							<caption>
								{{strip_tags($detail->book_description)}}
							</caption>
						</figure>
						<figure id="author">
							<h4 id="book_author">Author</h4>
							<caption>
								{{str_replace('-', ' ', $detail->book_author)}}
							</caption>
						</figure>
						<figure id="publisher">
							<h4 id="book_publisher">Publisher</h4>
							<caption>
								{{str_replace('-', ' ', $detail->book_publisher)}}
							</caption>
						</figure>
						<figure id="release">
							<h4 id="book_release">Year of Release</h4>
							<caption>
								{{$detail->book_release}}
							</caption>
						</figure>
					</div>

					<a href="{{url('book/read').'/'.$detail->book_title}}" id="link">
						<div class="col-lg-6 col-md-6 col-sm-6 right">
							<div class="col-lg-4 col-md-4 col-sm-5" id="outer-thumb">
								<div class="thumbnail">
		                            <img src="{{asset('/theme/book/book_cover').'/'.$detail->book_image}}" alt="{{$detail->book_image}}">
		                        </div>
							</div>
							<div class="col-lg-8 col-md-8 col-sm-7" id="outer-content">
								<figure id="title">
									<h4 id="book_title">{{str_replace('-', ' ', $detail->book_title)}}</h4>
								</figure>
								<button class="btn btn-default pull-right" type="button">
									Read
								</button>
							</div>
						</div>
					</a>
					@endforeach
				</div>

				<div class="col-xs-12 visible-xs">
					@foreach($book_detail as $detail)
					<a href="{{url('book/read').'/'.$detail->book_title}}" id="link">
						<div class="col-xs-12 right">
							<div class="col-xs-5" id="outer-thumb">
								<div class="thumbnail">
		                            <img src="{{asset('/theme/book/book_cover').'/'.$detail->book_image}}" alt="{{$detail->book_image}}">
		                        </div>
							</div>
							<div class="col-xs-7" id="outer-content">
								<figure id="title">
									<h4 id="book_title">{{str_replace('-', ' ', $detail->book_title)}}</h4>
								</figure>
								<button class="btn btn-default pull-right" type="button">
									Read
								</button>
							</div>
						</div>
					</a>

					<div class="col-xs-12 left">
						<figure id="description">
							<h4 id="book_desc">Book Description</h4>
							<caption>
								{{strip_tags($detail->book_description)}}
							</caption>
						</figure>
						<figure id="author">
							<h4 id="book_author">Author</h4>
							<caption>
								{{str_replace('-', ' ', $detail->book_author)}}
							</caption>
						</figure>
						<figure id="publisher">
							<h4 id="book_publisher">Publisher</h4>
							<caption>
								{{str_replace('-', ' ', $detail->book_publisher)}}
							</caption>
						</figure>
						<figure id="release">
							<h4 id="book_release">Year of Release</h4>
							<caption>
								{{$detail->book_release}}
							</caption>
						</figure>
					</div>
					@endforeach
				</div>
				
			</div>
		</div>		
	</div>

</main>
@endsection

