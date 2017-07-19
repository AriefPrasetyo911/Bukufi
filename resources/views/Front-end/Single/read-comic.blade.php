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
				
				<div class="col-md-12">
					
					<div class="pull-right">
						<select name="comic_chapter" class="form-control pick-chapter" onchange="pickone(this.value)">
							@foreach($shows as $show)
								<option value="{{$show->comic_chapter}}" id="com_chapter" {{ $show->comic_chapter == Request::segment(4) ? "selected":"" }}>Chapter {{$show->comic_chapter}} : {{$show->chapter_title}}</option>
							@endforeach
						</select>
					</div>
						
				</div>

				<div class="col-md-8 col-md-offset-2 comic">
					<!-- <div class="well">
						@foreach($shows as $show)
							<h4 class="center">{{str_replace('-', ' ', $show->comic_title)}} chapter {{$show->comic_chapter}} : {{$show->chapter_title}}</h4>
							<p class="center">Now you read <b>{{$show->comic_title}} chapter {{$show->comic_chapter}} : {{$show->chapter_title}}</b> at Bukufi.com </p> 
						@endforeach
					</div> -->
					<hr>
					@foreach($shows2 as $show)
						<img src="/theme/images_comic/{{$show->comic_image}}" alt="Comic" class="read">
						<input type="hidden" name="comic_title" id="com_title" value="{{$show->comic_title}}">
					@endforeach
				</div>
				
			</div>
			{{ $shows2->links('pagination.custom') }}
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

	function pickone(value){
		var com_title	= $('#com_title').val();

		window.location = "/show/comic/" + com_title + "/" + value;
	}
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