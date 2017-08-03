@extends('Front-end/Master-layout/master-home')

@section('push-style')
<style>
	.panel-heading{
		display: flex;
	}

	.media{
		padding-right: 0;
	}

	#search_result{
		padding-bottom: 5px;
	}

	#title_search{
		text-align: center;
	}

	#not-found
	{
		text-align: center;
		line-height: 1.5em;
	}

	.col-md-12{
		padding-left: 0;
		padding-right: 0;
	}	

	.padding-left-15
	{
		padding-left: 15px !important;
	}

	.bold{
		font-weight: bold;
	}
</style>
@endsection

@section('main-content')
<main class="main-content col-md-12 col-lg-12 col-sm-12 col-xs-12 search">
	<div class="col-md-12 col-lg-12 col-xs-12">
		<!-- carousel started-->
		<div class="panel panel-default search">
			<div class="panel-heading">
				<div class="col-md-12">
					<h4 id="title_search">You're search : {{$search_now}}</h4>
				</div>
			</div>
			<div class="panel-body visible-lg visible-md hidden-xs">
				<div class="col-md-12 col-lg-12">
				@if(count($query))
					@foreach($query as $result)
					<div class="col-md-6 col-lg-4">
						<a href="{{url('/comic').'/'.$result->comic_title}}" class="link">
							<div class="media col-md-3 col-lg-4 no-padding-left">
								<figure>
									<img src="/theme/images_cover/{{$result->comic_image}}" class="comic-image" alt="image 1">
								</figure>
							</div>

							<div class="contents col-md-9 col-lg-8 padding-left-15 search-content">
								<figure class="caption">
									<figcaption id="posting-title">
										<div id="search_result">
											<h5 class="bold">Comic Title :</h5>
											<h4>{{str_replace('-', ' ', $result->comic_title)}}</h4>	
										</div>
										<div id="search_result">
											<h5 class="bold">Comic Creator: </h5>
											<h4>{{$result->comic_author}}</h4>
										</div>
										<div id="search_result">
											<h5 class="bold">Comic Genre :</h5>
											<h4>{{$result->comic_genre}}</h4>
										</div>
										<div id="search_result">
											<h5 class="bold">Year of Release :</h5>
											<h4>{{$result->comic_release}}</h4>
										</div>
									</figcaption>
								</figure>
							</div>
						</a>
					</div>
					@endforeach
				
				@else
					<h3 id="not-found">Sorry, what you are looking for can not be found </h3>
					<h4 id="not-found">Please search using other word</h4>
				@endif
				</div>
				{{ $query->appends(Request::only('search'))->links('pagination.custom') }}
			</div>

			<div class="panel-body visible-sm">
				<div class="col-sm-12">
				@if(count($query_sm))
					@foreach($query_sm as $result)
					<div class="col-sm-6">
						<a href="{{url('/comic').'/'.$result->comic_title}}" class="link">
							<div class="media col-sm-4 no-padding-left">
								<figure>
									<img src="/theme/images_cover/{{$result->comic_image}}" class="comic-image" alt="image 1">
								</figure>
							</div>

							<div class="contents col-sm-8 padding-left-15 search-content">
								<figure class="caption">
									<figcaption id="posting-title">
										<div id="search_result">
											<h5 class="bold">Comic Title :</h5>
											<h5>{{str_replace('-', ' ', $result->comic_title)}}</h5>	
										</div>
										<div id="search_result">
											<h5 class="bold">Comic Creator: </h5>
											<h5>{{$result->comic_author}}</h5>
										</div>
										<div id="search_result">
											<h5 class="bold">Comic Genre :</h5>
											<h5>{{$result->comic_genre}}</h5>
										</div>
										<div id="search_result">
											<h5 class="bold">Year of Release :</h5>
											<h5>{{$result->comic_release}}</h5>
										</div>
									</figcaption>
								</figure>
							</div>
						</a>
					</div>
					@endforeach
				
				@else
					<h4 id="not-found">Sorry, what you are looking for can not be found </h4>
					<h4 id="not-found">Please search using other word</h4>
				@endif
				</div>
				{{ $query_sm->appends(Request::only('search'))->links('pagination.custom') }}
			</div>

			<div class="panel-body visible-xs">
				<div class="col-xs-12">
				@if(count($query_xs))
					@foreach($query_xs as $result)
					<div class="col-xs-6">
						<a href="{{url('/comic').'/'.$result->comic_title}}" class="link">
							<div class="media col-xs-12 no-padding-left">
								<figure>
									<img src="/theme/images_cover/{{$result->comic_image}}" class="comic-image" alt="image 1">
								</figure>
							</div>

							<div class="contents col-xs-12 padding-left-15 search-content">
								<figure class="caption">
									<figcaption id="posting-title">
										<div id="search_result">
											<h5 class="bold">Comic Title :</h5>
											<h5>{{str_replace('-', ' ', $result->comic_title)}}</h5>	
										</div>
										<div id="search_result">
											<h5 class="bold">Comic Creator: </h5>
											<h5>{{$result->comic_author}}</h5>
										</div>
										<div id="search_result">
											<h5 class="bold">Comic Genre :</h5>
											<h5>{{$result->comic_genre}}</h5>
										</div>
										<div id="search_result">
											<h5 class="bold">Year of Release :</h5>
											<h5>{{$result->comic_release}}</h5>
										</div>
									</figcaption>
								</figure>
							</div>
						</a>
					</div>
					@endforeach
				
				@else
					<h4 id="not-found">Sorry, what you are looking for can not be found </h4>
					<h4 id="not-found">Please search using other word</h4>
				@endif
				</div>
				{{ $query_xs->appends(Request::only('search'))->links('pagination.custom') }}
			</div>
		</div>
		
	</div>
</main>
@endsection
