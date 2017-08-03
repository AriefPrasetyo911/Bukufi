@extends('Front-end/Master-layout/master-home')

@section('push-style')
<style>
	.col-md-12{
		padding-left: 0;
		padding-right: 0;
	}
	h4{
		text-align: center;
	}
	.input-group{
		margin-left: 15px;
	}

	.thumbnail{
		padding: 0;
		margin-bottom: 0;
		border-radius: 0;
	}

	.thumbnail a>img, .thumbnail>img{
		height: 235px;
		width: 100%;
	}
</style>
@endsection

@section('main-content')
<main class="main-content col-md-12 author">
	<div class="col-md-12">
		<!-- carousel started-->
		<div class="panel panel-default">
			<div class="panel-heading">
				@foreach($s_auth as $author)
				<h4>Comic by Author : {{str_replace('-', ' ', $author->comic_author)}}</h4>
				@endforeach
			</div>
			<div class="panel-body">
			<div class="col-md-12">
				<div class="row">
					@foreach($authors as $author)
					<div class="col-sm-3 col-md-2">
						<a href="{{url('/comic').'/'.$author->comic_title}}" class="link">
						<div class="thumbnail">
							<img src="/theme/images_cover/{{$author->comic_image}}" alt="comic image">
							<div class="caption">
								<h4>{{str_replace('-', ' ', $author->comic_title)}}</h4>
							</div>
						</div>
						</a>
					</div>
					@endforeach
				</div>
			</div>
			</div>
		</div>
		
	</div>
</main>
@endsection

