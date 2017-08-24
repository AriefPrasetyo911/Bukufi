@extends('Front-end/Master-layout/master-home')

@section('push-style')
<style>
	a{
		padding-bottom: 5px;
	}

	#center{
		text-align: center;
	}

	.list-group{
		margin-top: 0;
	}

	.list-group-item{
		padding: 5px 15px;
	}

	#accordion{
		margin-bottom: 0;
	}

	#comic_title{
		font-weight: bold;
	}

	.list-group, .list-group .list-group-item{
		border-color: transparent;
		border-radius: 0;
	}

	.col-md-2, .col-md-10{
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

	.panel-group .panel{
		border-radius: 0;
	}

	.comic-image{
		width: 100%;
	}

	.no-margin-bottom{
		margin-bottom: 0 !important;
	}

	.panel-heading .accordion-toggle:after {
    /* symbol for "opening" panels */
    font-family: 'Glyphicons Halflings';  /* essential for enabling glyphicon */
    content: "\e114";    /* adjust as needed, taken from bootstrap.css */
    float: right;        /* adjust as needed */
    color: grey;         /* adjust as needed */
	}
	.panel-heading .accordion-toggle.collapsed:after {
	    /* symbol for "collapsed" panels */
	    content: "\e080";    /* adjust as needed, taken from bootstrap.css */
	}

	h5#bold, h5#normal{
		padding: 2.5px 15px;
	}

	h5#bold{
		font-weight: bold;
	}

	#link:hover{
		background-color: #ddd;
	}
</style>
@endsection

@section('main-content')
<main class="main-content col-md-12 col-xs-12 book_detail">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<!-- carousel started-->
		<div class="panel panel-default">
			<div class="panel-body">
				<!--show only for lg-->
				<div class="col-lg-12 visible-lg hidden-xs">
					@foreach($single_comic as $detail)
					<div class="col-lg-6 left padding-right-15" style="border-right: 1px solid #ddd;">
						<figure id="author">
							<h4 id="book_author">Author</h4>
							<caption>
								{{str_replace('-', ' ', $detail->comic_author)}}
							</caption>
						</figure>
						<figure id="publisher">
							<h4 id="book_publisher">Genre</h4>
							<caption>
								{{str_replace('-', ' ', $detail->comic_genre)}}
							</caption>
						</figure>
						<figure id="release">
							<h4 id="book_release">Year of Release</h4>
							<caption>
								{{$detail->comic_release}}
							</caption>
						</figure>
						<figure id="description" class="text-justify">
							<h4 id="book_desc">Comic Description</h4>
							<caption>
								{{strip_tags($detail->comic_description)}}
							</caption>
						</figure>
						@if($detail->membership == "Paid")
							<figure id="release">
								<span class="badge badge-paid">
									{{$detail->membership}} Member
								</span>
							</figure>
						@else
							<figure id="release">
								<span class="badge badge-free">
									{{$detail->membership}} Member
								</span>
							</figure>
						@endif
					</div>

						@if (auth()->guard('user')->user())
							@if(auth()->guard('user')->user()->membership == "Paid" and $detail->membership == "Paid")
							<div class="col-lg-6 col-sm-6 right">
								<div class="col-lg-4 col-md-4 " id="outer-thumb">
									<div class="thumbnail">
			                            <img src="{{asset('/storage/comic/comic_cover').'/'.$detail->comic_image}}" alt="{{$detail->comic_image}}">
			                        </div>
								</div>
								<div class="col-lg-8 col-md-8 no-padding-right" id="outer-content">
									<figure id="title">
										<h4 id="comic_title">{{str_replace('-', ' ', $detail->comic_title)}}</h4>
									</figure>

									<div class="comic_chapter">
										<div class="panel-group" id="accordion">
											<div class="panel panel-default no-margin-bottom">
												<div class="panel-heading">
													<h4 class="panel-title">
													<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
													Chapter &nbsp;
													</a>
													</h4>
												</div>
												<div id="collapseOne" class="panel-collapse collapse in">
													<div class="panel-body">
														@if(count($comic_chapter))
															@foreach($comic_chapter as $chapter)
																<a href="{{'/show/comic/'.$chapter->comic_title. '/' .$chapter->comic_chapter}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Chapter {{$chapter->comic_chapter}} : {{$chapter->chapter_title}}</a>
																<br>
															@endforeach
														@else
															<h4 id="center">Sorry, this comic has no chapter yet</h4>
														@endif
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
							@endif

							@if(auth()->guard('user')->user()->membership == "Paid" and $detail->membership == "Free")
							<div class="col-lg-6 col-sm-6 right">
								<div class="col-lg-4 col-md-4 " id="outer-thumb">
									<div class="thumbnail">
			                            <img src="{{asset('/storage/comic/comic_cover').'/'.$detail->comic_image}}" alt="{{$detail->comic_image}}">
			                        </div>
								</div>
								<div class="col-lg-8 col-md-8 no-padding-right" id="outer-content">
									<figure id="title">
										<h4 id="comic_title">{{str_replace('-', ' ', $detail->comic_title)}}</h4>
									</figure>

									<div class="comic_chapter">
										<div class="panel-group" id="accordion">
											<div class="panel panel-default no-margin-bottom">
												<div class="panel-heading">
													<h4 class="panel-title">
													<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
													Chapter &nbsp;
													</a>
													</h4>
												</div>
												<div id="collapseOne" class="panel-collapse collapse in">
													<div class="panel-body">
														@if(count($comic_chapter))
															@foreach($comic_chapter as $chapter)
																<a href="{{'/show/comic/'.$chapter->comic_title. '/' .$chapter->comic_chapter}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Chapter {{$chapter->comic_chapter}} : {{$chapter->chapter_title}}</a>
																<br>
															@endforeach
														@else
															<h4 id="center">Sorry, this comic has no chapter yet</h4>
														@endif
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
							@endif

							@if(auth()->guard('user')->user()->membership == "Free" and $detail->membership == "Paid")
							<div class="col-lg-6 col-sm-6 right">
								<div class="col-lg-4 col-md-4 " id="outer-thumb">
									<div class="thumbnail">
			                            <img src="{{asset('/storage/comic/comic_cover').'/'.$detail->comic_image}}" alt="{{$detail->comic_image}}">
			                        </div>
								</div>
								<div class="col-lg-8 col-md-8 no-padding-right" id="outer-content">
									<figure id="title">
										<h4 id="comic_title">{{str_replace('-', ' ', $detail->comic_title)}}</h4>
									</figure>

									<div class="comic_chapter">
										<div class="panel-group" id="accordion">
											<div class="panel panel-default no-margin-bottom">
												<div class="panel-heading">
													<h4 class="panel-title">
													<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
													Chapter &nbsp;
													</a>
													</h4>
												</div>
												<div id="collapseOne" class="panel-collapse collapse in">
													<div class="panel-body">
														<h4 id="center">Sorry, this comic is for paid member</h4>
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
							@endif

							@if(auth()->guard('user')->user()->membership == "Free" and $detail->membership == "Free")
							<div class="col-lg-6 col-sm-6 right">
								<div class="col-lg-4 col-md-4 " id="outer-thumb">
									<div class="thumbnail">
			                            <img src="{{asset('/storage/comic/comic_cover').'/'.$detail->comic_image}}" alt="{{$detail->comic_image}}">
			                        </div>
								</div>
								<div class="col-lg-8 col-md-8 no-padding-right" id="outer-content">
									<figure id="title">
										<h4 id="comic_title">{{str_replace('-', ' ', $detail->comic_title)}}</h4>
									</figure>

									<div class="comic_chapter">
										<div class="panel-group" id="accordion">
											<div class="panel panel-default no-margin-bottom">
												<div class="panel-heading">
													<h4 class="panel-title">
													<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
													Chapter &nbsp;
													</a>
													</h4>
												</div>
												<div id="collapseOne" class="panel-collapse collapse in">
													<div class="panel-body">
														@if(count($comic_chapter))
															@foreach($comic_chapter as $chapter)
																<a href="{{'/show/comic/'.$chapter->comic_title. '/' .$chapter->comic_chapter}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Chapter {{$chapter->comic_chapter}} : {{$chapter->chapter_title}}</a>
																<br>
															@endforeach
														@else
															<h4 id="center">Sorry, this comic has no chapter yet</h4>
														@endif
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
							@endif

						@else
						<div class="col-lg-6 col-sm-6 right">
							<div class="col-lg-4 col-md-4 " id="outer-thumb">
								<div class="thumbnail">
		                            <img src="{{asset('/storage/comic/comic_cover').'/'.$detail->comic_image}}" alt="{{$detail->comic_image}}">
		                        </div>
							</div>
							<div class="col-lg-8 col-md-8 no-padding-right" id="outer-content">
								<figure id="title">
									<h4 id="comic_title">{{str_replace('-', ' ', $detail->comic_title)}}</h4>
								</figure>

								<div class="comic_chapter">
									<div class="panel-group" id="accordion">
										<div class="panel panel-default no-margin-bottom">
											<div class="panel-heading">
												<h4 class="panel-title">
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
												Chapter &nbsp;
												</a>
												</h4>
											</div>
											<div id="collapseOne" class="panel-collapse collapse in">
												@if($detail->membership == "Free")
												<div class="panel-body">
													@if(count($comic_chapter))
														@foreach($comic_chapter as $chapter)
															<a href="{{'/show/comic/'.$chapter->comic_title. '/' .$chapter->comic_chapter}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Chapter {{$chapter->comic_chapter}} : {{$chapter->chapter_title}}</a>
															<br>
														@endforeach
													@else
														<h4 id="center">Sorry, this comic has no chapter yet</h4>
													@endif
												</div>
												@else
													<div class="panel-body">
														<h4 id="center">Sorry, this comic is for paid member</h4>
													</div>
												@endif
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
						@endif
					@endforeach
				</div>

				<!--show only for md-->
				<div class="col-md-12 visible-md hidden-xs">
					@foreach($single_comic as $detail)
					<div class="col-md-6 left padding-right-15" style="border-right: 1px solid #ddd;">
						<figure id="author">
							<h4 id="book_author">Author</h4>
							<caption>
								{{str_replace('-', ' ', $detail->comic_author)}}
							</caption>
						</figure>
						<figure id="publisher">
							<h4 id="book_publisher">Genre</h4>
							<caption>
								{{str_replace('-', ' ', $detail->comic_genre)}}
							</caption>
						</figure>
						<figure id="release">
							<h4 id="book_release">Year of Release</h4>
							<caption>
								{{$detail->comic_release}}
							</caption>
						</figure>
						<figure id="description" class="text-justify">
							<h4 id="book_desc">Comic Description</h4>
							<caption>
								{{strip_tags($detail->comic_description)}}
							</caption>
						</figure>
						@if($detail->membership == "Paid")
							<figure id="release">
								<span class="badge badge-paid">
									{{$detail->membership}} Member
								</span>
							</figure>
						@else
							<figure id="release">
								<span class="badge badge-free">
									{{$detail->membership}} Member
								</span>
							</figure>
						@endif
					</div>

						@if (auth()->guard('user')->user())
							
							@if(auth()->guard('user')->user()->membership == "Paid" and $detail->membership == "Paid")
							<div class="col-md-6 col-sm-6 right">
								<div class="col-md-4 " id="outer-thumb">
									<div class="thumbnail">
			                            <img src="{{asset('/storage/comic/comic_cover').'/'.$detail->comic_image}}" alt="{{$detail->comic_image}}">
			                        </div>
								</div>
								<div class="col-md-8 no-padding-right" id="outer-content">
									<figure id="title">
										<h4 id="comic_title">{{str_replace('-', ' ', $detail->comic_title)}}</h4>
									</figure>

									<div class="comic_chapter">
										<div class="panel-group" id="accordion">
											<div class="panel panel-default no-margin-bottom">
												<div class="panel-heading">
													<h4 class="panel-title">
													<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
													Chapter &nbsp;
													</a>
													</h4>
												</div>
												<div id="collapseOne" class="panel-collapse collapse in">
													<div class="panel-body">
														@if(count($comic_chapter))
															@foreach($comic_chapter as $chapter)
																<a href="{{'/show/comic/'.$chapter->comic_title. '/' .$chapter->comic_chapter}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Chapter {{$chapter->comic_chapter}} : {{$chapter->chapter_title}}</a>
																<br>
															@endforeach
														@else
															<h4 id="center">Sorry, this comic has no chapter yet</h4>
														@endif
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
							@endif

							@if(auth()->guard('user')->user()->membership == "Paid" and $detail->membership == "Free")
							<div class="col-md-6 col-sm-6 right">
								<div class="col-md-4 " id="outer-thumb">
									<div class="thumbnail">
			                            <img src="{{asset('/storage/comic/comic_cover').'/'.$detail->comic_image}}" alt="{{$detail->comic_image}}">
			                        </div>
								</div>
								<div class="col-md-8 no-padding-right" id="outer-content">
									<figure id="title">
										<h4 id="comic_title">{{str_replace('-', ' ', $detail->comic_title)}}</h4>
									</figure>

									<div class="comic_chapter">
										<div class="panel-group" id="accordion">
											<div class="panel panel-default no-margin-bottom">
												<div class="panel-heading">
													<h4 class="panel-title">
													<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
													Chapter &nbsp;
													</a>
													</h4>
												</div>
												<div id="collapseOne" class="panel-collapse collapse in">
													<div class="panel-body">
														@if(count($comic_chapter))
															@foreach($comic_chapter as $chapter)
																<a href="{{'/show/comic/'.$chapter->comic_title. '/' .$chapter->comic_chapter}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Chapter {{$chapter->comic_chapter}} : {{$chapter->chapter_title}}</a>
																<br>
															@endforeach
														@else
															<h4 id="center">Sorry, this comic has no chapter yet</h4>
														@endif
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
							@endif

							@if(auth()->guard('user')->user()->membership == "Free" and $detail->membership == "Paid")
							<div class="col-md-6 col-sm-6 right">
								<div class="col-md-4 " id="outer-thumb">
									<div class="thumbnail">
			                            <img src="{{asset('/storage/comic/comic_cover').'/'.$detail->comic_image}}" alt="{{$detail->comic_image}}">
			                        </div>
								</div>
								<div class="col-md-8 no-padding-right" id="outer-content">
									<figure id="title">
										<h4 id="comic_title">{{str_replace('-', ' ', $detail->comic_title)}}</h4>
									</figure>

									<div class="comic_chapter">
										<div class="panel-group" id="accordion">
											<div class="panel panel-default no-margin-bottom">
												<div class="panel-heading">
													<h4 class="panel-title">
													<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
													Chapter &nbsp;
													</a>
													</h4>
												</div>
												<div id="collapseOne" class="panel-collapse collapse in">
													<div class="panel-body">
														<h4 id="center">Sorry, this comic is for paid member</h4>
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
							@endif

							@if(auth()->guard('user')->user()->membership == "Free" and $detail->membership == "Free")
							<div class="col-md-6 col-sm-6 right">
								<div class="col-md-4 " id="outer-thumb">
									<div class="thumbnail">
			                            <img src="{{asset('/storage/comic/comic_cover').'/'.$detail->comic_image}}" alt="{{$detail->comic_image}}">
			                        </div>
								</div>
								<div class="col-md-8 no-padding-right" id="outer-content">
									<figure id="title">
										<h4 id="comic_title">{{str_replace('-', ' ', $detail->comic_title)}}</h4>
									</figure>

									<div class="comic_chapter">
										<div class="panel-group" id="accordion">
											<div class="panel panel-default no-margin-bottom">
												<div class="panel-heading">
													<h4 class="panel-title">
													<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
													Chapter &nbsp;
													</a>
													</h4>
												</div>
												<div id="collapseOne" class="panel-collapse collapse in">
													<div class="panel-body">
														@if(count($comic_chapter))
															@foreach($comic_chapter as $chapter)
																<a href="{{'/show/comic/'.$chapter->comic_title. '/' .$chapter->comic_chapter}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Chapter {{$chapter->comic_chapter}} : {{$chapter->chapter_title}}</a>
																<br>
															@endforeach
														@else
															<h4 id="center">Sorry, this comic has no chapter yet</h4>
														@endif
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
							@endif
						@else
						<div class="col-md-6 col-sm-6 right">
							<div class="col-lg-4 col-md-4 " id="outer-thumb">
								<div class="thumbnail">
		                            <img src="{{asset('/storage/comic/comic_cover').'/'.$detail->comic_image}}" alt="{{$detail->comic_image}}">
		                        </div>
							</div>
							<div class="col-lg-8 col-md-8 no-padding-right" id="outer-content">
								<figure id="title">
									<h4 id="comic_title">{{str_replace('-', ' ', $detail->comic_title)}}</h4>
								</figure>

								<div class="comic_chapter">
									<div class="panel-group" id="accordion">
										<div class="panel panel-default no-margin-bottom">
											<div class="panel-heading">
												<h4 class="panel-title">
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
												Chapter &nbsp;
												</a>
												</h4>
											</div>
											<div id="collapseOne" class="panel-collapse collapse in">
												@if($detail->membership == "Free")
												<div class="panel-body">
													@if(count($comic_chapter))
														@foreach($comic_chapter as $chapter)
															<a href="{{'/show/comic/'.$chapter->comic_title. '/' .$chapter->comic_chapter}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Chapter {{$chapter->comic_chapter}} : {{$chapter->chapter_title}}</a>
															<br>
														@endforeach
													@else
														<h4 id="center">Sorry, this comic has no chapter yet</h4>
													@endif
												</div>
												@else
													<div class="panel-body">
														<h4 id="center">Sorry, this comic is for paid member</h4>
													</div>
												@endif
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
						@endif
					@endforeach
				</div>
				
				<!--show only for sm-->
				<div class="col-sm-12 visible-sm hidden-xs">
					@foreach($single_comic as $detail)
						@if (auth()->guard('user')->user())
							
							@if(auth()->guard('user')->user()->membership == "Paid" and $detail->membership == "Paid")
							<div class="col-sm-8 left padding-right-15" style="border-right: 1px solid #ddd;">
								<figure id="description" class="text-justify">
									<h4 id="book_desc">Comic Description</h4>
									<caption>
										{{strip_tags($detail->comic_description)}}
									</caption>
								</figure>

								<div class="comic_chapter">
									<div class="panel-group" id="accordion">
										<div class="panel panel-default no-margin-bottom">
											<div class="panel-heading">
												<h4 class="panel-title">
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
												Chapter &nbsp;
												</a>
												</h4>
											</div>
											<div id="collapseOne" class="panel-collapse collapse in">
												<div class="panel-body">
													@if(count($comic_chapter))
														@foreach($comic_chapter as $chapter)
															<a href="{{'/show/comic/'.$chapter->comic_title. '/' .$chapter->comic_chapter}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Chapter {{$chapter->comic_chapter}} : {{$chapter->chapter_title}}</a>
															<br>
														@endforeach
													@else
														<h4 id="center">Sorry, this comic has no chapter yet</h4>
													@endif
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endif

							@if(auth()->guard('user')->user()->membership == "Paid" and $detail->membership == "Free")
							<div class="col-sm-8 left padding-right-15" style="border-right: 1px solid #ddd;">
								<figure id="description" class="text-justify">
									<h4 id="book_desc">Comic Description</h4>
									<caption>
										{{strip_tags($detail->comic_description)}}
									</caption>
								</figure>

								<div class="comic_chapter">
									<div class="panel-group" id="accordion">
										<div class="panel panel-default no-margin-bottom">
											<div class="panel-heading">
												<h4 class="panel-title">
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
												Chapter &nbsp;
												</a>
												</h4>
											</div>
											<div id="collapseOne" class="panel-collapse collapse in">
												<div class="panel-body">
													@if(count($comic_chapter))
														@foreach($comic_chapter as $chapter)
															<a href="{{'/show/comic/'.$chapter->comic_title. '/' .$chapter->comic_chapter}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Chapter {{$chapter->comic_chapter}} : {{$chapter->chapter_title}}</a>
															<br>
														@endforeach
													@else
														<h4 id="center">Sorry, this comic has no chapter yet</h4>
													@endif
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endif

							@if(auth()->guard('user')->user()->membership == "Free" and $detail->membership == "Paid")
							<div class="col-sm-8 left padding-right-15" style="border-right: 1px solid #ddd;">
								<figure id="description" class="text-justify">
									<h4 id="book_desc">Comic Description</h4>
									<caption>
										{{strip_tags($detail->comic_description)}}
									</caption>
								</figure>

								<div class="comic_chapter">
									<div class="panel-group" id="accordion">
										<div class="panel panel-default no-margin-bottom">
											<div class="panel-heading">
												<h4 class="panel-title">
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
												Chapter &nbsp;
												</a>
												</h4>
											</div>
											<div id="collapseOne" class="panel-collapse collapse in">
												<div class="panel-body">
													<h4 id="center">Sorry, this comic is for paid member</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endif

							@if(auth()->guard('user')->user()->membership == "Free" and $detail->membership == "Free")
							<div class="col-sm-8 left padding-right-15" style="border-right: 1px solid #ddd;">
								<figure id="description" class="text-justify">
									<h4 id="book_desc">Comic Description</h4>
									<caption>
										{{strip_tags($detail->comic_description)}}
									</caption>
								</figure>

								<div class="comic_chapter">
									<div class="panel-group" id="accordion">
										<div class="panel panel-default no-margin-bottom">
											<div class="panel-heading">
												<h4 class="panel-title">
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
												Chapter &nbsp;
												</a>
												</h4>
											</div>
											<div id="collapseOne" class="panel-collapse collapse in">
												<div class="panel-body">
													@if(count($comic_chapter))
														@foreach($comic_chapter as $chapter)
															<a href="{{'/show/comic/'.$chapter->comic_title. '/' .$chapter->comic_chapter}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Chapter {{$chapter->comic_chapter}} : {{$chapter->chapter_title}}</a>
															<br>
														@endforeach
													@else
														<h4 id="center">Sorry, this comic has no chapter yet</h4>
													@endif
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endif

						@else
						<div class="col-sm-8 left padding-right-15" style="border-right: 1px solid #ddd;">
							<figure id="description" class="text-justify">
								<h4 id="book_desc">Comic Description</h4>
								<caption>
									{{strip_tags($detail->comic_description)}}
								</caption>
							</figure>

							<div class="comic_chapter">
								<div class="panel-group" id="accordion">
									<div class="panel panel-default no-margin-bottom">
										<div class="panel-heading">
											<h4 class="panel-title">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
											Chapter &nbsp;
											</a>
											</h4>
										</div>
										<div id="collapseOne" class="panel-collapse collapse in">
											@if($detail->membership == "Free")
											<div class="panel-body">
												@if(count($comic_chapter))
													@foreach($comic_chapter as $chapter)
														<a href="{{'/show/comic/'.$chapter->comic_title. '/' .$chapter->comic_chapter}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Chapter {{$chapter->comic_chapter}} : {{$chapter->chapter_title}}</a>
														<br>
													@endforeach
												@else
													<h4 id="center">Sorry, this comic has no chapter yet</h4>
												@endif
											</div>
											@else
												<div class="panel-body">
													<h4 id="center">Sorry, this comic is for paid member</h4>
												</div>
											@endif
										</div>
									</div>
								</div>
							</div>
						</div>
						@endif

					<div class="col-sm-4 right">
						<div class="col-sm-12 " id="outer-thumb">
							<div class="thumbnail">
	                            <img src="{{asset('/storage/comic/comic_cover').'/'.$detail->comic_image}}" alt="{{$detail->comic_image}}">
	                        </div>
						</div>
						<div class="no-padding-right" id="outer-content">
							<figure id="title">
								<h4 id="comic_title">Title</h4>
								<caption>
									{{str_replace('-', ' ', $detail->comic_title)}}
								</caption>
							</figure>
							<figure id="author">
								<h4 id="book_author">Author</h4>
								<caption>
									{{str_replace('-', ' ', $detail->comic_author)}}
								</caption>
							</figure>
							<figure id="publisher">
								<h4 id="book_publisher">Genre</h4>
								<caption>
									{{str_replace('-', ' ', $detail->comic_genre)}}
								</caption>
							</figure>
							<figure id="release">
								<h4 id="book_release">Year of Release</h4>
								<caption>
									{{$detail->comic_release}}
								</caption>
							</figure>
							@if($detail->membership == "Paid")
								<figure id="release">
									<span class="badge badge-paid">
										{{$detail->membership}} Member
									</span>
								</figure>
							@else
								<figure id="release">
									<span class="badge badge-free">
										{{$detail->membership}} Member
									</span>
								</figure>
							@endif
						</div>
					</div>
					@endforeach
				</div>

				<!--show only for xs-->
				<div class="col-xs-12 visible-xs">
					@foreach($single_comic as $detail)
					<div class="col-xs-12 full padding-right-15">
						<div class="col-xs-5 " id="outer-thumb">
							<div class="thumbnail">
	                            <img src="{{asset('/storage/comic/comic_cover').'/'.$detail->comic_image}}" alt="{{$detail->comic_image}}">
	                        </div>
						</div>
						<div class="col-xs-7">
							<figure id="title">
								<h4 id="comic_title">Title</h4>
								<caption>
									{{str_replace('-', ' ', $detail->comic_title)}}
								</caption>
							</figure>
							<figure id="author">
								<h4 id="comic_author">Author</h4>
								<caption>
									{{str_replace('-', ' ', $detail->comic_author)}}
								</caption>
							</figure>
							<figure id="publisher">
								<h4 id="comic_publisher">Genre</h4>
								<caption>
									{{str_replace('-', ' ', $detail->comic_genre)}}
								</caption>
							</figure>
							<figure id="release">
								<h4 id="comic_release">Year of Release</h4>
								<caption>
									{{$detail->comic_release}}
								</caption>
							</figure>
							@if($detail->membership == "Paid")
								<figure id="release">
									<span class="badge badge-paid">
										{{$detail->membership}} Member
									</span>
								</figure>
							@else
								<figure id="release">
									<span class="badge badge-free">
										{{$detail->membership}} Member
									</span>
								</figure>
							@endif
						</div>

						@if (auth()->guard('user')->user())
							
							@if(auth()->guard('user')->user()->membership == "Paid" and $detail->membership == "Paid")
							<div class="col-xs-12">
								<figure id="description" class="text-justify">
									<h4 id="comic_desc">Comic Description</h4>
									<caption>
										{{strip_tags($detail->comic_description)}}
									</caption>
								</figure>
								<div class="comic_chapter">
									<div class="panel-group" id="accordion">
										<div class="panel panel-default no-margin-bottom">
											<div class="panel-heading">
												<h4 class="panel-title">
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
												Chapter &nbsp;
												</a>
												</h4>
											</div>
											<div id="collapseOne" class="panel-collapse collapse in">
												<div class="panel-body">
													@if(count($comic_chapter))
														@foreach($comic_chapter as $chapter)
															<a href="{{'/show/comic/'.$chapter->comic_title. '/' .$chapter->comic_chapter}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Chapter {{$chapter->comic_chapter}} : {{$chapter->chapter_title}}</a>
															<br>
														@endforeach
													@else
														<h4 id="center">Sorry, this comic has no chapter yet</h4>
													@endif
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endif

							@if(auth()->guard('user')->user()->membership == "Paid" and $detail->membership == "Free")
							<div class="col-xs-12">
								<figure id="description" class="text-justify">
									<h4 id="comic_desc">Comic Description</h4>
									<caption>
										{{strip_tags($detail->comic_description)}}
									</caption>
								</figure>
								<div class="comic_chapter">
									<div class="panel-group" id="accordion">
										<div class="panel panel-default no-margin-bottom">
											<div class="panel-heading">
												<h4 class="panel-title">
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
												Chapter &nbsp;
												</a>
												</h4>
											</div>
											<div id="collapseOne" class="panel-collapse collapse in">
												<div class="panel-body">
													@if(count($comic_chapter))
														@foreach($comic_chapter as $chapter)
															<a href="{{'/show/comic/'.$chapter->comic_title. '/' .$chapter->comic_chapter}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Chapter {{$chapter->comic_chapter}} : {{$chapter->chapter_title}}</a>
															<br>
														@endforeach
													@else
														<h4 id="center">Sorry, this comic has no chapter yet</h4>
													@endif
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endif

							@if(auth()->guard('user')->user()->membership == "Free" and $detail->membership == "Paid")
							<div class="col-xs-12">
								<figure id="description" class="text-justify">
									<h4 id="comic_desc">Comic Description</h4>
									<caption>
										{{strip_tags($detail->comic_description)}}
									</caption>
								</figure>
								<div class="comic_chapter">
									<div class="panel-group" id="accordion">
										<div class="panel panel-default no-margin-bottom">
											<div class="panel-heading">
												<h4 class="panel-title">
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
												Chapter &nbsp;
												</a>
												</h4>
											</div>
											<div id="collapseOne" class="panel-collapse collapse in">
												<div class="panel-body">
													<h4 id="center">Sorry, this comic is for paid member</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endif

							@if(auth()->guard('user')->user()->membership == "Free" and $detail->membership == "Free")
							<div class="col-xs-12">
								<figure id="description" class="text-justify">
									<h4 id="comic_desc">Comic Description</h4>
									<caption>
										{{strip_tags($detail->comic_description)}}
									</caption>
								</figure>
								<div class="comic_chapter">
									<div class="panel-group" id="accordion">
										<div class="panel panel-default no-margin-bottom">
											<div class="panel-heading">
												<h4 class="panel-title">
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
												Chapter &nbsp;
												</a>
												</h4>
											</div>
											<div id="collapseOne" class="panel-collapse collapse in">
												<div class="panel-body">
													@if(count($comic_chapter))
														@foreach($comic_chapter as $chapter)
															<a href="{{'/show/comic/'.$chapter->comic_title. '/' .$chapter->comic_chapter}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Chapter {{$chapter->comic_chapter}} : {{$chapter->chapter_title}}</a>
															<br>
														@endforeach
													@else
														<h4 id="center">Sorry, this comic has no chapter yet</h4>
													@endif
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endif

						@else
						<div class="col-xs-12">
							<figure id="description" class="text-justify">
								<h4 id="comic_desc">Comic Description</h4>
								<caption>
									{{strip_tags($detail->comic_description)}}
								</caption>
							</figure>
							<div class="comic_chapter">
								<div class="panel-group" id="accordion">
									<div class="panel panel-default no-margin-bottom">
										<div class="panel-heading">
											<h4 class="panel-title">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
											Chapter &nbsp;
											</a>
											</h4>
										</div>
										<div id="collapseOne" class="panel-collapse collapse in">
											@if($detail->membership == "Free")
											<div class="panel-body">
												@if(count($comic_chapter))
													@foreach($comic_chapter as $chapter)
														<a href="{{'/show/comic/'.$chapter->comic_title. '/' .$chapter->comic_chapter}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Chapter {{$chapter->comic_chapter}} : {{$chapter->chapter_title}}</a>
														<br>
													@endforeach
												@else
													<h4 id="center">Sorry, this comic has no chapter yet</h4>
												@endif
											</div>
											@else
												<div class="panel-body">
													<h4 id="center">Sorry, this comic is for paid member</h4>
												</div>
											@endif
										</div>
									</div>
								</div>
							</div>
						</div>
						@endif
					</div>
					@endforeach
				</div>
			</div>
		</div>		
	</div>

</main>
@endsection

