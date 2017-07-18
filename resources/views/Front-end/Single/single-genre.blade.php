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
</style>
@endsection

@section('main-content')
<main class="main-content col-md-12">
		<div class="col-md-12">
			<!-- carousel started-->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Comic Genre List</h4>
				</div>
				<div class="panel-body">
						
					@foreach($genres as $genre)
						<ul class="col-md-6">
							<i class="fa fa-caret-right" aria-hidden="true"></i> <a href="{{url('/comic-genre/'.$genre->comic_genre)}}">{{$genre->comic_genre}}</a>
						</ul>
					@endforeach
					
				</div>
			</div>
			
		</div>
</main>
@endsection

