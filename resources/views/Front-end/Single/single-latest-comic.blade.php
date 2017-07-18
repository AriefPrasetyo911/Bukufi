@extends('Front-end/Master-layout/master-home')

@section('push-style')
<style>
	.panel-heading{
		display: flex;
	}

	.panel-body{
		padding-top: 0;
	}

	.col-md-4{
		margin-top: 15px;
	}
</style>
@endsection

@section('main-content')
<main class="main-content col-md-12">
	
		<div class="col-md-9">
			<!-- carousel started-->
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="col-md-12">
						<div class="col-md-6">
							<h4>Latest Comic</h4>
						</div>
					</div>
				</div>
				<div class="panel-body">
					@foreach($filter as $comic)
					<div class="col-md-12">

						<div class="media col-md-1">
							<figure>
								<img src="/theme/images_cover/{{$comic->comic_image}}" class="comic-image" alt="image 1">
							</figure>
						</div>

						<div class="contents col-md-11">
							<figure class="caption">
								<div class="col-md-6">
									<a href="{{url('/comic').'/'.$comic->id.'/'.$comic->comic_title}}" class="link">
										<figcaption id="posting-title">
											<h4>{{str_replace('-', ' ', $comic->comic_title)}}</h4>
										</figcaption>
									</a>
								</div>
								<div class="col-md-6">
									<div class="pull-right">
										<p>1 minute ago</p>
									</div>
								</div>

								<ul class="list-group">
									<a href="javascript:void" title="Chapter 978">
										<i class="fa fa-caret-right" aria-hidden="true"></i> Ch.
										
									</a>
								</ul>
							</figure>
						</div>
						
					</div>
					@endforeach
				</div>
			</div>
			
		</div>

		<div class="col-md-3">
			<!--genre sidebar -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="pull-left">
						<h4>Genre</h4>
					</div>
					<div class="pull-right">
						<a href="{{route('single.genre')}}">More...</a>
					</div>
				</div>
				<div class="panel-body">
					@foreach($genres as $genre)
					<ul class="col-md-6">
						<a href="#"><p>{{$genre->comic_genre}}</p></a>
					</ul>
					@endforeach
				</div>
			</div>

			<!--third sidebar -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="pull-left">
						<h4>Popular Comics</h4>
					</div>
					<div class="pull-right">
						<a href="#">More...</a>
					</div>
				</div>
				<div class="panel-body">
					<div class="col-md-12">
						<div class="media col-md-4">
							<figure>
								<img src="https://s-media-cache-ak0.pinimg.com/originals/a9/56/f7/a956f76efc384e3caed63c55e1ca3d6e.jpg" class="img img-responsive media-object" alt="image 1">
							</figure>
						</div>
						<div class="teks col-md-8">
							<figure class="caption">
								<figcaption ">
									<h5 class="comic-title">Spider Man</h5>
									<a href="#">Ch. 75</a>
								</figcaption>
							</figure>
						</div>
					</div>

					<div class="col-md-12">
						<div class="media col-md-4">
							<figure>
								<img src="http://comicsalliance.com/files/2011/08/idwtmnteastmancover.jpg" class="img img-responsive media-object" alt="image 1">
							</figure>
						</div>
						<div class="teks col-md-8">
							<figure class="caption">
								<figcaption ">
									<h5 class="comic-title">Teenage Mutant Ninja Turtles</h5>
									<a href="#">Ch. 75</a>
								</figcaption>
							</figure>
						</div>
					</div>
				</div>
			</div>
		</div>
</main>
@endsection