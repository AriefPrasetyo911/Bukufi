@extends('Front-end/Master-layout/master-home')

@section('push-style')
<style>
	<style>
	.panel-heading{
		display: flex;
	}

	.col-md-4{
		margin-top: 15px;
	}

	img{
		width: 100%;
	}

	.caption{
		padding-top: 5px;
		text-align: center;
	}

	.col-md-12{
		padding-right: 0;
		padding-left: 0;
	}

	#not-found
	{
		text-align: center;
		line-height: 1.5em;
	}

	.col-md-2{
		padding-bottom: 15px;
		padding-top: 15px;
	}

</style>
@endsection

@section('main-content')
<main class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12 genre-select">
	<div class="col-md-12">
		<!-- carousel started-->
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						@if(count($selected))
							@foreach($selected as $comic)
							<a href="{{url('/comic').'/'.$comic->comic_title}}" class="link">
							<div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
								<div class="media col-md-12">
									<figure>
										<img src="/theme/images_cover/{{$comic->comic_image}}" class="comic-image" alt="image 1">
									</figure>
									<figure class="caption">
										<figcaption id="posting-title">
											<h5>{{str_replace('-', ' ', $comic->comic_title)}}</h5>
										</figcaption>
									</figure>
								</div>
							</div>
							</a>
							@endforeach
						@else
							<h3 id="not-found">Sorry, comic in this genre can not be found </h3>
						@endif
					</div>
				</div>
			</div>
			{{ $selected->appends(Request::only('comic_genre'))->links('pagination.custom') }}
		</div>
	</div>
</main>
@endsection

