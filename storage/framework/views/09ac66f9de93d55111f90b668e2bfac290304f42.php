<?php $__env->startSection('push-style'); ?>
<style>
	.panel-heading{
		display: flex;
		padding-top: 0;
		padding-bottom: 0;
	}

	.panel-alphabet{
		padding-top: 0;
		padding-bottom: 0;
		border-bottom-style: hidden;
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

	.main-content .col-md-9 .alphabet{
		display: flex;
		padding-top: 0;
		padding-bottom: 0;
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

	.pull-right2{
		padding-top: 5px;
	}

	.filter{
		padding-top: 0;
	}

	ul.col-sm-6{
		padding-left: 0;
		margin-bottom: 5px;
	}

	.list-smartphone-heading{
		height: 40px;
		padding-top: 3px;
	}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<main class="main-content col-md-12 col-sm-12 col-xs-12">
	
	<div class="col-lg-9 col-sm-9 col-md-9 col-xs-12">
		<!--  started-->
		<div class="panel panel-default visible-lg visible-md visible-sm hidden-xs">
			<!--show only on lg-->
			<div class="panel-heading panel-alphabet2 visible-lg hidden-xs">
				<ul class="nav nav-pills nav-justified">
					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'1'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-1').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">#</h4>
						</a>
						<form id="alph-1" action="<?php echo e(url('comic/list').'/'.'1'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>

					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'a'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-a').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">A</h4>
						</a>
						<form id="alph-a" action="<?php echo e(url('comic/list').'/'.'a'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>

					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'b'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-b').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">B</h4>
						</a>
						<form id="alph-b" action="<?php echo e(url('comic/list').'/'.'b'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>

					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'c'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-c').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">C</h4>
						</a>
						<form id="alph-c" action="<?php echo e(url('comic/list').'/'.'c'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>

					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'d'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-d').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">D</h4>
						</a>
						<form id="alph-d" action="<?php echo e(url('comic/list').'/'.'d'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>

					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'e'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-e').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">E</h4>
						</a>
						<form id="alph-e" action="<?php echo e(url('comic/list').'/'.'e'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>

					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'f'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-f').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">F</h4>
						</a>
						<form id="alph-f" action="<?php echo e(url('comic/list').'/'.'f'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>

					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'g'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-g').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">G</h4>
						</a>
						<form id="alph-g" action="<?php echo e(url('comic/list').'/'.'g'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>

					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'h'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-h').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">H</h4>
						</a>
						<form id="alph-h" action="<?php echo e(url('comic/list').'/'.'h'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>

					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'i'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-i').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">I</h4>
						</a>
						<form id="alph-i" action="<?php echo e(url('comic/list').'/'.'i'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>

					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'j'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-j').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">J</h4>
						</a>
						<form id="alph-j" action="<?php echo e(url('comic/list').'/'.'j'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>

					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'k'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-k').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">K</h4>
						</a>
						<form id="alph-k" action="<?php echo e(url('comic/list').'/'.'k'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>

					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'l'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-l').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">L</h4>
						</a>
						<form id="alph-l" action="<?php echo e(url('comic/list').'/'.'l'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>

					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'m'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-m').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">M</h4>
						</a>
						<form id="alph-m" action="<?php echo e(url('comic/list').'/'.'m'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>
					
					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'n'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-n').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">N</h4>
						</a>
						<form id="alph-n" action="<?php echo e(url('comic/list').'/'.'n'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>

					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'o'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-o').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">O</h4>
						</a>
						<form id="alph-o" action="<?php echo e(url('comic/list').'/'.'o'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>

					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'p'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-p').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">P</h4>
						</a>
						<form id="alph-p" action="<?php echo e(url('comic/list').'/'.'p'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>

					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'q'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-q').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">Q</h4>
						</a>
						<form id="alph-q" action="<?php echo e(url('comic/list').'/'.'q'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>

					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'r'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-r').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">R</h4>
						</a>
						<form id="alph-r" action="<?php echo e(url('comic/list').'/'.'r'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>

					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'s'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-s').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">S</h4>
						</a>
						<form id="alph-s" action="<?php echo e(url('comic/list').'/'.'s'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>

					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'t'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-t').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">T</h4>
						</a>
						<form id="alph-t" action="<?php echo e(url('comic/list').'/'.'t'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>

					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'u'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-u').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">U</h4>
						</a>
						<form id="alph-u" action="<?php echo e(url('comic/list').'/'.'u'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>

					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'v'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-v').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">V</h4>
						</a>
						<form id="alph-v" action="<?php echo e(url('comic/list').'/'.'v'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>

					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'w'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-w').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">W</h4>
						</a>
						<form id="alph-w" action="<?php echo e(url('comic/list').'/'.'w'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>

					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'x'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-x').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">X</h4>
						</a>
						<form id="alph-x" action="<?php echo e(url('comic/list').'/'.'x'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>

					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'y'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-y').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">Y</h4>
						</a>
						<form id="alph-y" action="<?php echo e(url('comic/list').'/'.'y'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>

					<li role="presentation">
						<a href="<?php echo e(url('comic/list').'/'.'z'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-z').submit();"> 
							<h4 class="no-padding-top no-padding-bottom">Z</h4>
						</a>
						<form id="alph-z" action="<?php echo e(url('comic/list').'/'.'z'); ?>" method="POST" style="display: none;">
	                        <?php echo e(csrf_field()); ?>

	                    </form>
					</li>
				</ul>
			</div>

			<!--show on mid-->
			<div class="panel-heading visible-md hidden-xs panel-alphabet">
				<div class="col-md-12">
					<ul class="nav nav-pills nav-justified">
						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'1'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-1').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">#</h4>
							</a>
							<form id="alph-1" action="<?php echo e(url('comic/list').'/'.'1'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>

						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'a'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-a').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">A</h4>
							</a>
							<form id="alph-a" action="<?php echo e(url('comic/list').'/'.'a'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>

						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'b'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-b').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">B</h4>
							</a>
							<form id="alph-b" action="<?php echo e(url('comic/list').'/'.'b'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>

						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'c'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-c').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">C</h4>
							</a>
							<form id="alph-c" action="<?php echo e(url('comic/list').'/'.'c'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>

						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'d'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-d').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">D</h4>
							</a>
							<form id="alph-d" action="<?php echo e(url('comic/list').'/'.'d'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>

						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'e'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-e').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">E</h4>
							</a>
							<form id="alph-e" action="<?php echo e(url('comic/list').'/'.'e'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>

						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'f'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-f').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">F</h4>
							</a>
							<form id="alph-f" action="<?php echo e(url('comic/list').'/'.'f'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>

						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'g'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-g').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">G</h4>
							</a>
							<form id="alph-g" action="<?php echo e(url('comic/list').'/'.'g'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>

						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'h'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-h').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">H</h4>
							</a>
							<form id="alph-h" action="<?php echo e(url('comic/list').'/'.'h'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>

						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'i'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-i').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">I</h4>
							</a>
							<form id="alph-i" action="<?php echo e(url('comic/list').'/'.'i'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>

						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'j'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-j').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">J</h4>
							</a>
							<form id="alph-j" action="<?php echo e(url('comic/list').'/'.'j'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>

						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'k'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-k').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">K</h4>
							</a>
							<form id="alph-k" action="<?php echo e(url('comic/list').'/'.'k'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>

						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'l'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-l').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">L</h4>
							</a>
							<form id="alph-l" action="<?php echo e(url('comic/list').'/'.'l'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>

						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'m'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-m').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">M</h4>
							</a>
							<form id="alph-m" action="<?php echo e(url('comic/list').'/'.'m'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>
						
						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'n'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-n').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">N</h4>
							</a>
							<form id="alph-n" action="<?php echo e(url('comic/list').'/'.'n'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>

						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'o'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-o').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">O</h4>
							</a>
							<form id="alph-o" action="<?php echo e(url('comic/list').'/'.'o'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>
					</ul>
				</div>
			</div>

			<div class="panel-heading visible-md hidden-xs panel-alphabet">
				<div class="col-md-12">
					<ul class="nav nav-pills nav-justified">
						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'p'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-p').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">P</h4>
							</a>
							<form id="alph-p" action="<?php echo e(url('comic/list').'/'.'p'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>

						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'q'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-q').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">Q</h4>
							</a>
							<form id="alph-q" action="<?php echo e(url('comic/list').'/'.'q'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>

						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'r'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-r').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">R</h4>
							</a>
							<form id="alph-r" action="<?php echo e(url('comic/list').'/'.'r'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>

						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'s'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-s').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">S</h4>
							</a>
							<form id="alph-s" action="<?php echo e(url('comic/list').'/'.'s'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>

						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'t'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-t').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">T</h4>
							</a>
							<form id="alph-t" action="<?php echo e(url('comic/list').'/'.'t'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>

						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'u'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-u').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">U</h4>
							</a>
							<form id="alph-u" action="<?php echo e(url('comic/list').'/'.'u'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>

						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'v'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-v').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">V</h4>
							</a>
							<form id="alph-v" action="<?php echo e(url('comic/list').'/'.'v'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>

						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'w'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-w').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">W</h4>
							</a>
							<form id="alph-w" action="<?php echo e(url('comic/list').'/'.'w'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>

						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'x'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-x').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">X</h4>
							</a>
							<form id="alph-x" action="<?php echo e(url('comic/list').'/'.'x'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>

						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'y'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-y').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">Y</h4>
							</a>
							<form id="alph-y" action="<?php echo e(url('comic/list').'/'.'y'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>

						<li role="presentation">
							<a href="<?php echo e(url('comic/list').'/'.'z'); ?>" class="alph" onclick="event.preventDefault(); document.getElementById('alph-z').submit();"> 
								<h4 class="no-padding-top no-padding-bottom">Z</h4>
							</a>
							<form id="alph-z" action="<?php echo e(url('comic/list').'/'.'z'); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
						</li>
					</ul>
				</div>
			</div>

			<!--only in smartphone and small device-->
			<div class="panel-heading list-smartphone-heading visible-sm">
				<div class="col-sm-12 visible-sm no-padding-left no-padding-right">
					<div class="col-sm-6 pull-left no-padding-left">
						<h4>List Filter</h4>
					</div>
					<div class="col-sm-6 pull-right no-padding-right">
						<div class="pull-right filter">
							<div class="input-group">
								<select name="filter" class="form-control" onchange="pickone(this.value)">
									<option selected>-Select One Alphabet-</option>}
									<option value="a">A</option>
									<option value="b">B</option>
									<option value="c">C</option>
									<option value="d">D</option>
									<option value="e">E</option>
									<option value="f">F</option>
									<option value="g">G</option>
									<option value="h">H</option>
									<option value="i">I</option>
									<option value="j">J</option>
									<option value="k">K</option>
									<option value="l">L</option>
									<option value="m">M</option>
									<option value="n">N</option>
									<option value="o">O</option>
									<option value="p">P</option>
									<option value="q">Q</option>
									<option value="r">R</option>
									<option value="s">S</option>
									<option value="t">T</option>
									<option value="u">U</option>
									<option value="v">V</option>
									<option value="w">W</option>
									<option value="x">X</option>
									<option value="y">Y</option>
									<option value="z">Z</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>

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
						<?php $__currentLoopData = $comics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($no++); ?></td>
							<td>
								<a href="<?php echo e(url('/comic').'/'.$comic->comic_title); ?>" title="<?php echo e(str_replace('-', ' ', $comic->comic_title)); ?>">
									<?php echo e(str_replace('-', ' ', $comic->comic_title)); ?>

								</a>
								</td>
							<td><?php echo e(str_replace('-', ' ', $comic->comic_author)); ?></td>
							<td><?php echo e($comic->comic_status); ?></td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
				<?php echo e($comics->links('pagination.custom')); ?>

			</div>
		</div>

		<div class="panel panel-default list-smartphone visible-xs">
			<div class="panel-heading list-smartphone-heading visible-xs">
				<div class="col-xs-12 visible-xs list-filter">
					<div class="col-xs-6 left pull-left">
						<h4>List Filter</h4>
					</div>
					<div class="col-xs-6 right pull-right">
						<div class="input-group">
							<select name="filter" class="form-control" onchange="pickone(this.value)">
								<option selected>-Select One Alphabet-</option>}
								<option value="a">A</option>
								<option value="b">B</option>
								<option value="c">C</option>
								<option value="d">D</option>
								<option value="e">E</option>
								<option value="f">F</option>
								<option value="g">G</option>
								<option value="h">H</option>
								<option value="i">I</option>
								<option value="j">J</option>
								<option value="k">K</option>
								<option value="l">L</option>
								<option value="m">M</option>
								<option value="n">N</option>
								<option value="o">O</option>
								<option value="p">P</option>
								<option value="q">Q</option>
								<option value="r">R</option>
								<option value="s">S</option>
								<option value="t">T</option>
								<option value="u">U</option>
								<option value="v">V</option>
								<option value="w">W</option>
								<option value="x">X</option>
								<option value="y">Y</option>
								<option value="z">Z</option>
							</select>
						</div>
					</div>
						
				</div>
			</div>

			<div class="panel-body list-smartphone-body">
				<div style="overflow-x:auto;">
				<table class="table table-striped" width="100%">
					<thead>
						<tr>
							<th>Comic Name</th>
							<th>Comic Author</th>
							<th>Comic Status</th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $comics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td>
								<a href="<?php echo e(url('/comic').'/'.$comic->comic_title); ?>" title="<?php echo e(str_replace('-', ' ', $comic->comic_title)); ?>">
									<?php echo e(str_replace('-', ' ', $comic->comic_title)); ?>

								</a>
								</td>
							<td><?php echo e(str_replace('-', ' ', $comic->comic_author)); ?></td>
							<td><?php echo e($comic->comic_status); ?></td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
				</div>
				<?php echo e($comics->links('pagination.custom')); ?>

			</div>
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<!--genre sidebar -->
		<div class="panel panel-default hidden-xs">
			<div class="panel-heading">
				<div class="pull-left margin-top-5 margin-bottom-5">
					<h4>Genre</h4>
				</div>
				<div class="pull-right2 pull-right margin-top-5 margin-bottom-5">
					<a href="<?php echo e(route('single.genre')); ?>">More...</a>
				</div>
			</div>
			<div class="panel-body-15 panel-body">
				<?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<ul class="col-sm-6">
					<a href="<?php echo e(url('/comic-genre/'.$genre->comic_genre)); ?>"><p><?php echo e($genre->comic_genre); ?></p></a>
				</ul>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>

		<div class="panel panel-default visible-xs">
			<div class="panel-heading">
				<div class="pull-left no-padding-left col-xs-6 margin-top-5 margin-bottom-5">
					<h4>Genre</h4>
				</div>
				<div class="pull-right2 col-xs-6 pull-right margin-top-5 margin-bottom-5">
					<a href="<?php echo e(route('single.genre')); ?>" class="pull-right">More...</a>
				</div>
			</div>
			<div class="panel-body-15 panel-body">
				<?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<ul class="col-sm-6">
					<a href="<?php echo e(url('/comic-genre/'.$genre->comic_genre)); ?>"><p><?php echo e($genre->comic_genre); ?></p></a>
				</ul>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>

		<!--status sidebar -->
		<div class="panel panel-default no-margin-bottom ">
			<div class="panel-heading">
				<div class="col-md-12 col-sm-12 col-xs-12 margin-top-5 margin-bottom-5">
					<h4>Comic Status</h4>
				</div>
			</div>
			<div class="panel-body-15 panel-body">
				<?php $__currentLoopData = $comic_statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<ul class="col-md-12 col-sm-12 col-xs-12 margin-bottom-5 no-pl">
					<a href="<?php echo e(url('/comic/status/'.$stat->comic_status)); ?>">
					<p class="no-pl"><?php echo e($stat->comic_status); ?></p>
					</a>
				</ul>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</div>
</main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('push-script'); ?>
	<script>
		function pickone(value){			
			window.location = "/mobile/comic/list/" + value;
		}
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Front-end/Master-layout/master-home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>