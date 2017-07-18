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
	#com_auth{
		font-size: 16px;
	}
</style>
@endsection

@section('main-content')
<main class="main-content col-md-12">
		<div class="col-md-12">
			<!-- carousel started-->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Comic Author List</h4>
				</div>
				<div class="panel-body">
						
					@foreach($authors as $author)
						<ul class="col-md-6">
							<i class="fa fa-caret-right" aria-hidden="true"></i> 
							<a href="{{'/comic/comic-author/name/'.$author->comic_author}}" id="com_auth">{{$author->comic_author}}</a>
						</ul>
					@endforeach
					
				</div>
			</div>
			
		</div>
</main>
@endsection

