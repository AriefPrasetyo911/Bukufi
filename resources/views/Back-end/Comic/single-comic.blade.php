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
@endsection

@section('main-content')
<main class="main-content col-md-12 col-xs-12 single-comic">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<!-- carousel started-->
		<div class="panel panel-default">
			<div class="panel-body">
				
				@foreach($single_comic as $comic)
					<div class="col-md-12 col-xs-12">
						<div class="media col-md-2 col-xs-5">
							<figure>
								<img src="/theme/images_cover/{{$comic->comic_image}}" class="comic-image" alt="image 1">
							</figure>
						</div>

						<div class="contents col-md-10 col-xs-7">
							<figure class="caption hidden-xs">
								<figcaption class="panel-heading" id="posting-title">
									<h4 id="comic_title">{{str_replace('-', ' ', $comic->comic_title)}}</h4>
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
											<li class="list-group-item">: {{str_replace('-', ' ', $comic->comic_author)}}</li>
											<li class="list-group-item">: {{str_replace('-', ' ', $comic->comic_genre)}}</li>
											<li class="list-group-item">: {{$comic->comic_release}}</li>
											<li class="list-group-item">: {{$comic->comic_status}}</li>
										</ul>
									</div>
								</div>
							</figure>


							<figure class="caption visible-xs">
								<figcaption class="panel-heading no-padding-top no-padding-right" id="posting-title">
									<h4 id="comic_title">{{str_replace('-', ' ', $comic->comic_title)}}</h4>
								</figcaption>

								<div class="col-md-12 col-xs-12">
									<h5 id="bold">Author :</h5>
									<h5 id="normal">{{str_replace('-', ' ', $comic->comic_author)}}</h5>
									<h5 id="bold">Genre :</h5>
									<h5 id="normal">{{str_replace('-', ' ', $comic->comic_genre)}}</h5>
									<h5 id="bold">Release :</h5>
									<h5 id="normal">{{$comic->comic_release}}</h5>
									<h5 id="bold">Status :</h5>
									<h5 id="normal">{{$comic->comic_status}}</h5>
								</div>
							</figure>
						</div>
					</div>

					<div class="col-md-12 col-xs-12 sumarry">
						<h4>Summary</h4>
						<hr>
						<p id="comic_desc">{{strip_tags($comic->comic_description)}}</p>
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
										@if(count($comic_chapter))
											@foreach($comic_chapter as $chapter)
												<a href="{{'/show/comic/'.$chapter->comic_title. '/' .$chapter->comic_chapter}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Chapter {{$chapter->comic_chapter}} : {{$chapter->chapter_title}}</a>
												<br>
											@endforeach
										@else
											<h4 id="center">Sorry, this comic has no chapter yet</h4>
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
				
			</div>
		</div>		
	</div>

</main>
@endsection

