@extends('Front-end/Master-layout/master-home')

@section('push-style')
<style>
	.panel-heading{
		display: flex;
	}

	#comic_title{
		text-align: center;
	}

	.list-group, .list-group .list-group-item{
		border-color: transparent;
		border-radius: 0;
	}

	.col-md-2, .col-md-10, .col-md-12{
		padding-left: 0;
		padding-right: 0;
	}

	hr{
		margin-top: 5px;
		margin-bottom: 5px;
	}

	.sumarry{
		padding-top: 15px;
	}

	#comic_desc{
		text-align: justify;
		line-height: 1.5em;
	}

	.comic_chapter{
		margin-top: 15px;
	}

	.input-group{
		margin-left: 15px;
	}

	.panel-group .panel{
		border-radius: 0;
	}

	.comic-image{
		width: 100%;
	}

	.comic{
		padding-top: 15px;
		padding-bottom: 15px;
	}

	.read{
		width: 100%;
		object-fit: cover;
	}

	.col-md-5{
		padding-left: 0;
	}

	.center{
		text-align: center;
	}

	.pager{
		margin-bottom: 15px;
	}

	#ScrollToTop{
		text-align:center; 
		position:fixed; 
		bottom:50px; 
		right:10px; 
		cursor:pointer;
		display:none
	}
</style>
@endsection

@section('main-content')
<main class="main-content col-md-12">
	<div class="col-md-12">
		<!-- carousel started-->
		<div class="panel panel-default">
			<div class="panel-body">
				@if (Session::has('notif'))
		            <div class="alert alert-success">
		            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
		              {{ Session::get('notif') }}
		            </div>
		        @endif
		        @if (Session::has('error'))
		            <div class="alert alert-danger">
		            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
		              {{ Session::get('error') }}
		            </div>
		        @endif


		        <input type="hidden" name="valuez" id="valuez" value="{{$curr_page}}">
		        
				<div class="col-md-12">
					<div class="col-md-6">
						<div class="pull-left">
							<select name="comic_chapter" class="form-control pick-chapter" onchange="pickone(this.value)">
								@foreach($shows as $show)
									<option value="{{$show->comic_chapter}}" id="com_chapter" {{ $show->comic_chapter == Request::segment(4) ? "selected":"" }}>Chapter {{$show->comic_chapter}} : {{$show->chapter_title}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-6">
						@if(auth()->guard('user')->user())
							
							<form action="{{url('bookmark/user/add'.'/'.auth()->guard('user')->user()->id)}}" method="post" class="form-horizontal">
								@foreach($shows as $show)
								{{ csrf_field() }}
								<input type="hidden" name="id_user" value="{{auth()->guard('user')->user()->id}}">
								<input type="hidden" name="comic_title" value="{{$show->comic_title}}">
								<input type="hidden" name="comic_chapter" value="{{$show->comic_chapter}}">
								<input type="hidden" name="chapter_title" value="{{$show->chapter_title}}">
								@endforeach
								<button type="submit" class="btn btn-primary add-fav pull-right">Add to Favourite</button>
							</form>
							
						@else
							<a href="#" class="btn btn-primary add-fav pull-right nologin"> Add to Favourite</a>
						@endif
					</div>
				</div>
				<div class="col-md-12"><hr></div>

				<div class="col-md-8 col-md-offset-2 comic">
					<!-- <div class="well">
						@foreach($shows as $show)
							<h4 class="center">{{str_replace('-', ' ', $show->comic_title)}} chapter {{$show->comic_chapter}} : {{$show->chapter_title}}</h4>
							<p class="center">Now you read <b>{{$show->comic_title}} chapter {{$show->comic_chapter}} : {{$show->chapter_title}}</b> at Bukufi.com </p> 
						@endforeach
					</div> -->
					@foreach($shows2 as $show)
						<img src="/theme/images_comic/{{$show->comic_image}}" alt="Comic" class="read">
						<input type="hidden" name="comic_title" id="com_title" value="{{$show->comic_title}}">
					@endforeach
				</div>
				
			</div>

			@if(auth()->guard('user')->user())

				<div class="login-user">
					{{ $shows2->appends(Request::except('page'))->links('pagination.custom') }}
				</div>
			@else
				<div class="nologin-user">
					{{ $shows2->appends(Request::except('page'))->links('pagination.custom') }}
				</div>
			@endif
		</div>		
	</div>

</main>
<div id='ScrollToTop'><img alt='Back to top' src='http://2.bp.blogspot.com/-MFhU3vLp5ho/UiaBZeA1McI/AAAAAAAAAQs/MrzW2ljP5mA/s1600/arrow-up_basic_blue.png' title="Back to Top" /></div>
@endsection

@section('push-script')
<script type="text/javascript">
	//scroll on top function
	$(function() { $(window).scroll(function() { 
		if($(this).scrollTop()>100) { 
			$('#ScrollToTop').fadeIn()
		} else { 
			$('#ScrollToTop').fadeOut();}
		});

	$('#ScrollToTop').click(function(){$('html,body').animate({scrollTop:0},1000);return false})});

	//bookmark function
	function pickone(value){
		var com_title	= $('#com_title').val();

		window.location = "/show/comic/" + com_title + "/" + value;
	}

	//check login function. to limit page for unlogin user
	var loggedIn = {{ auth()->guard('user')->check() ? 'true' : 'false' }};

	if (loggedIn){
	    //user already login. no need do anything :)
	}
	else{

		if($('#valuez').val() > 10)
		{
			$('.nologin-user').addClass('disabled');
			$('.nologin-user .pager').addClass('disabled');
			$('.nologin-user .pager li').addClass('disabled');

			$('.nologin-user .pager li a').bind('click', function(e){
			    e.preventDefault();
			});

			swal("Info!", "You must login first to continue reading", "info");
		}
	}

	//to protect add bookmark button
	$('.nologin').on('click', function() {
		swal("Error!", "You must login first to use this menu", "error");
	});
	

	/*$(document).ready(function() {
		$('.pick-chapter').on('change', function() {
			
			var com_title	= $('#com_title').val();
			var com_chapter = $('.pick-chapter').val();
			
			$.ajax({
				url: "/show/comic"+'/'+ com_title + '/' + com_chapter,
				type: 'GET',
				dataType: 'json',
				data: function(d) {
            	}
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		});
	});*/
</script>
@endsection