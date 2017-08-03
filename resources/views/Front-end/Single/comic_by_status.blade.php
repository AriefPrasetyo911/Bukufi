@extends('Front-end/Master-layout/master-home')

@section('push-style')
<style>
	.panel-heading{
		display: flex;
		padding-top: 0;
		padding-bottom: 0;
	}

	.panel-alphabet{
		padding-top: 0;
		padding-bottom: 0;
	}

	img{
		width: 100%;
		object-fit: cover;
	}

	h4{
		padding-top: 5px;
		padding-bottom: 5px;
	}

	.media{
		margin-top: 0;
	}

	.alphabet{
		display: flex
	}
	
	.alph{
		padding-right: 10px;
		padding-left: 10px;
	}

	.nav > li > .alph{
		padding: 8px;
	}

	table > tbody > tr{
		line-height: 2em;
	}

	ul.pager{
		margin-top: 10px;
	}

	.main-content .col-sm-3 .col-sm-12
	{
		padding-bottom: 0;
	}

	.main-content .col-md-9{
		padding-left: 0;
		padding-right: 0;
	}

	.main-content .col-md-3{
		padding-right: 0;
	}

	.col-lg-3 .panel-body ul.col-sm-6, ul.col-sm-12{
		padding-left: 0;
	}
</style>
@endsection

@section('main-content')
<main class="main-content col-lg 12 col-sm-12 col-md-12">
	
	<div class="col-xs-12 col-md-9 col-sm-9 col-lg 9">
		<!-- carousel started-->
		<div class="panel panel-default">
			<div class="panel-body">
				<table class="table-responsive table-striped" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Comic Name</th>
							<th>Comic Author</th>
							<th>Comic Status</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;?>
						@foreach($status as $comic)
						<tr>
							<td>{{$no++}}</td>
							<td>
								<a href="{{url('/comic').'/'.$comic->comic_title}}" title="{{str_replace('-', ' ', $comic->comic_title)}}">
									{{str_replace('-', ' ', $comic->comic_title)}}
								</a>
								</td>
							<td>{{str_replace('-', ' ', $comic->comic_author)}}</td>
							<td>{{$comic->comic_status}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{{ $status->links('pagination.custom') }}
			</div>
		</div>
	</div>

	<div class="col-xs-12 col-sm-3 comic-status col-md-3 col-lg-3">
		<!--genre sidebar -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="col-md-6 col-sm-6 col-xs-6">
					<div class="pull-left margin-top-5 margin-bottom-5">
						<h4>Genre</h4>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6">
					<div class="pull-right margin-top-5 margin-bottom-5" style="padding-top: 5px;">
						<a href="{{route('single.genre')}}" class="pull-right">More...</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				@foreach($genres as $genre)
				<ul class="col-sm-6">
					<a href="{{url('/comic-genre/'.$genre->comic_genre)}}"><p>{{$genre->comic_genre}}</p></a>
				</ul>
				@endforeach
			</div>
		</div>

		<!--status sidebar -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="col-sm-12 margin-top-5 margin-bottom-5 no-padding-left no-padding-right">
					<h4>Comic Status</h4>
				</div>
			</div>
			<div class="panel-body">
				@foreach($comic_statuses as $stat)
				<ul class="col-sm-12 margin-top-5 margin-bottom-5 no-pl">
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