@extends('Front-end/Master-layout/master-home')

@section('push-style')
<style>
	.col-md-12{
		padding-left: 0;
		padding-right: 0;
	}
	
	#author{
		text-align: center;
	}
	
	#com_auth{
		font-size: 16px;
	}

	.col-md-6{
		padding-bottom: 10px;
	}

	.pager{
		margin-bottom: 15px;
	}
</style>
@endsection

@section('main-content')
<main class="main-content col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<!-- carousel started-->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 id="author">Comic Author List</h4>
				</div>
				<div class="panel-body">
						
					@foreach($authors as $author)
						<ul class="col-md-6 col-sm-6">
							<i class="fa fa-caret-right" aria-hidden="true"></i> 
							<a href="{{'/comic/comic-author/name/'.$author->comic_author}}" id="com_auth">{{str_replace('-', ' ', $author->comic_author)}}</a>
						</ul>
					@endforeach
				</div>
				{{ $authors->links('pagination.custom') }}
			</div>
			
		</div>
</main>
@endsection

