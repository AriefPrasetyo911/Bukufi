@extends('Front-end/Master-layout/master-home')

@section('push-style')
<style>
	.panel-heading{
		display: flex;
	}

	#comic_title, #center{
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

</style>
@endsection

@section('main-content')
<main class="main-content col-md-12">
	<div class="col-md-12">
		<!-- carousel started-->
		<div class="panel panel-default">
			<div class="panel-body">
				
				@foreach($single_comic as $comic)
					<div class="col-md-12">
						<div class="media col-md-2">
							<figure>
								<img src="/theme/images_cover/{{$comic->comic_image}}" class="comic-image" alt="image 1">
							</figure>
						</div>

						<div class="contents col-md-10">
							<figure class="caption">
								<a href="{{url('/comic').'/'.$comic->comic_title}}" class="link">
									<figcaption id="posting-title">
										<h4 id="comic_title">{{str_replace('-', ' ', $comic->comic_title)}}</h4>
									</figcaption>
								</a>

								<col class="md-12">
									<div class="col-md-2">
										<ul class="list-group">
											<li class="list-group-item">Title</li>
											<li class="list-group-item">Author</li>
											<li class="list-group-item">Genre</li>
											<li class="list-group-item">Release</li>
										</ul>
									</div>
									<div class="col-md-10">
										<ul class="list-group">
											<li class="list-group-item">: {{str_replace('-', ' ', $comic->comic_title)}}</li>
											<li class="list-group-item">: {{str_replace('-', ' ', $comic->comic_author)}}</li>
											<li class="list-group-item">: {{str_replace('-', ' ', $comic->comic_genre)}}</li>
											<li class="list-group-item">: {{$comic->comic_release}}</li>
											<li class="list-group-item">
												<a href="#" class="btn btn-info add-fav"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Add to Favourite</a>
											</li>
										</ul>
									</div>
								</col>
							</figure>
						</div>
					</div>

					<div class="col-md-12 sumarry">
						<h4>Summary</h4>
						<hr>
						<p id="comic_desc">{{strip_tags($comic->comic_description)}}</p>
					</div>

					<div class="col-md-12 comic_chapter">
						<div class="panel-group" id="accordion">
							<div class="panel panel-default">
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

