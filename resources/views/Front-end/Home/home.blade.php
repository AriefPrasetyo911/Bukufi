@extends('Front-end/Master-layout/master-home')

@section('push-style')
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
	<!--for large-->
	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
		<!--started-->
		<div class="panel panel-default">
			<div class="panel-heading latest-update">
				<div class="col-lg-12 margin-top-5 margin-bottom-5">
					<h4>Latest Update</h4>
				</div>
			</div>

			<!--only for large-->
			<div class="panel-body visible-lg hidden-xs">
				<div class="col-lg-12 no-padding-right visible-lg">
					
					@foreach($filter as $comic)
						<div class="col-lg-2 col-md-3 np">
							<a href="{{url('/comic').'/'.$comic->comic_title}}" class="link">
							<div class="col-lg-12">
								<div>
									<img src="/theme/images_cover/{{$comic->comic_image}}" class="img-comic-standard" alt="comic cover image">
								</div>
								<div class="posting-center">
									<h4>
									<?php $count = str_replace('-', ' ', $comic->comic_title)?>
									@if(strlen($count) < 17)
										{{str_replace('-', ' ', $comic->comic_title)}}
									@else
										<?php $count = str_replace('-', ' ', $comic->comic_title)?>
										{{substr($count, 0, 17)."..."}}
									@endif
									</h4>
								</div>
							</div>
							</a>
							<p class="posting-center">{{$comic->created_at->diffForHumans()}}</p>
						</div>
					@endforeach
					
				</div>
				{{ $filter->links('pagination.custom') }}
			</div>
			<!--/only for large-->

			<!--only for med-->
			<div class="panel-body visible-md hidden-xs">
				<div class="col-md-12 no-padding-right visible-md">
					
					@foreach($filter_med as $comic)
						<div class="col-md-3 mp">
							<a href="{{url('/comic').'/'.$comic->comic_title}}" class="link">
							<div class="col-md-12">
								<figure>
									<img src="/theme/images_cover/{{$comic->comic_image}}" class="img-comic-standard" alt="comic cover image">
								</figure>
								<figcaption class="posting-center">
									<h4>
									<?php $count = str_replace('-', ' ', $comic->comic_title)?>
									@if(strlen($count) < 17)
										{{str_replace('-', ' ', $comic->comic_title)}}
									@else
										<?php $count = str_replace('-', ' ', $comic->comic_title)?>
										{{substr($count, 0, 17)."..."}}
									@endif
									</h4>
								</figcaption>
							</div>
							</a>
							<p class="posting-center">{{$comic->created_at->diffForHumans()}}</p>
						</div>
					@endforeach
					
				</div>
				{{ $filter_med->links('pagination.custom') }}
			</div>
			<!--/only for med-->

			<!--only for sm-->
			<div class="panel-body visible-sm">
				<div class="col-sm-12 visible-sm">
					
					@foreach($filter_sm as $comic)
						<div class="col-sm-4 padding-bottom-15">
							<a href="{{url('/comic').'/'.$comic->comic_title}}" class="link">
							<div class="col-sm-12">
								<figure>
									<img src="/theme/images_cover/{{$comic->comic_image}}" class="img-comic-standard" alt="comic cover image">
								</figure>
								<figcaption class="posting-center">
									<h4>
									<?php $count = str_replace('-', ' ', $comic->comic_title)?>
									@if(strlen($count) < 17)
										{{str_replace('-', ' ', $comic->comic_title)}}
									@else
										<?php $count = str_replace('-', ' ', $comic->comic_title)?>
										{{substr($count, 0, 17)."..."}}
									@endif
									</h4>
								</figcaption>
							</div>
							</a>
							<p class="posting-center">{{$comic->created_at->diffForHumans()}}</p>
						</div>
					@endforeach

				</div>
				{{ $filter_sm->links('pagination.custom') }}
			</div>
			<!--/only for sm-->

			<!--only for xs-->
			<div class="panel-body visible-xs home-xs">
				<div class="col-xs-12 visible-xs">
					
					@foreach($filter_sm as $comic)
						<div class="col-xs-4 padding-bottom-15">
							<a href="{{url('/comic').'/'.$comic->comic_title}}" class="link">
							<div class="col-xs-12 inside">
								<figure>
									<img src="/theme/images_cover/{{$comic->comic_image}}" class="img-comic-standard" alt="comic cover image">
								</figure>
								<figcaption class="posting-center">
									<h5 style="font-weight: bold;">
									<?php $count = str_replace('-', ' ', $comic->comic_title)?>
									@if(strlen($count) < 8)
										{{str_replace('-', ' ', $comic->comic_title)}}
									@else
										<?php $count = str_replace('-', ' ', $comic->comic_title)?>
										{{substr($count, 0, 8)."..."}}
									@endif
									</h5>
								</figcaption>
							</div>
							</a>
							<p class="posting-center">{{$comic->created_at->diffForHumans()}}</p>
						</div>
					@endforeach

				</div>
				{{ $filter_sm->links('pagination.custom') }}
			</div>
			<!--/only for xs-->
				
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<!--except xs -->
		<div class="panel panel-default hidden-xs">
			<div class="panel-heading">
				<div class="col-md-12 margin-top-5 margin-bottom-5">
					<div class="pull-left">
						<h4>Genre</h4>
					</div>
					<div class="pull-right">
						<a href="{{route('single.genre')}}">More...</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				@foreach($genres as $genre)
				<ul class="col-md-6 col-xs-12 margin-top-5 margin-bottom-5 no-pl">
					<a href="{{url('/comic-genre/'.$genre->comic_genre)}}">
					<p class="no-pl">{{$genre->comic_genre}}</p>
					</a>
				</ul>
				@endforeach
			</div>
		</div>

		<!--except xs -->
		<div class="panel panel-default hidden-xs">
			<div class="panel-heading">
				<div class="col-md-12 margin-top-5 margin-bottom-5">
					<h4>Comic Status</h4>
				</div>
			</div>
			<div class="panel-body">
				@foreach($status as $stat)
				<ul class="col-md-12 margin-top-5 margin-bottom-5 no-pl">
					<a href="{{url('/comic/status/'.$stat->comic_status)}}">
					<p class="no-pl">{{$stat->comic_status}}</p>
					</a>
				</ul>
				@endforeach
			</div>
		</div>

		<!--====================================-->

		<!--for xs -->
		<div class="panel panel-default visible-xs">
			<div class="panel-heading">
				<div class="col-xs-12 margin-top-5 margin-bottom-5" style="padding-right: 0 !important; padding-left: 0 !important;">
					<div class="pull-left">
						<h4>Genre</h4>
					</div>
					<div class="pull-right margin-top-5">
						<a href="{{route('single.genre')}}">More...</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				@foreach($genres as $genre)
				<ul class="col-xs-6 col-xs-12 margin-top-5 margin-bottom-5 sidebar">
					<a href="{{url('/comic-genre/'.$genre->comic_genre)}}">
					<p class="no-pl">{{$genre->comic_genre}}</p>
					</a>
				</ul>
				@endforeach
			</div>
		</div>

		<!--for xs -->
		<div class="panel panel-default visible-xs">
			<div class="panel-heading">
				<div class="col-xs-12 margin-top-5 margin-bottom-5" style="padding-right: 0 !important; padding-left: 0 !important;">
					<h4>Comic Status</h4>
				</div>
			</div>
			<div class="panel-body">
				@foreach($status as $stat)
				<ul class="col-xs-6 col-xs-12 margin-top-5 margin-bottom-5 sidebar">
					<a href="{{url('/comic/status/'.$stat->comic_status)}}">
					<p class="no-pl">{{$stat->comic_status}}</p>
					</a>
				</ul>
				@endforeach
			</div>
		</div>
	</div>

	
	
</main>
@endsection