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
</style>
@endsection

@section('main-content')
<main class="main-content col-md-12">
		<div class="col-md-12">
			<!-- carousel started-->
			<div class="panel panel-default">
				<div class="panel-heading">
					@foreach($authors as $author)
						<h4>Comic by Author : {{$author->comic_author}}</h4>
					@endforeach
				</div>
				<div class="panel-body">

					<div class="row">
						<div class="col-sm-6 col-md-2">
							<div class="thumbnail">
								@foreach($authors as $author)
								<img src="/theme/images_cover/{{$author->comic_image}}" alt="...">
								
								<div class="caption">
									<h4>{{$author->comic_title}}</h4>
								</div>
								@endforeach
							</div>
						</div>
					</div>

				</div>
			</div>
			
		</div>
</main>
@endsection

