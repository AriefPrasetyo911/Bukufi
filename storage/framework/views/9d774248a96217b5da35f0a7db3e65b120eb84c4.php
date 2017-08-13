<?php $__env->startSection('push-style'); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<main class="main-content col-lg-12 col-md-12 col-xs-12 readbook">
	<div class="ol-lg-12 col-md-12 col-xs-12">
		<!-- carousel started-->
		<div class="panel panel-default">
			<div class="panel-body">

		        <script src="<?php echo e(asset('theme/js/Plugins/epub/epub.js')); ?>"></script>
		        <script src="<?php echo e(asset('theme/js/Plugins/epub/zip.min.js')); ?>"></script>
				<script>
					"use strict";
					
            		var Book 	= ePub("<?php echo e(asset('theme/book/book_files/').'/'.$epubs); ?>", { restore: false });
				</script>

		        <div id="main">
					<div id="prev" onclick="Book.prevPage();" class="arrow">‹</div>
					<div id="area"></div>
					<div id="next" onclick="Book.nextPage();" class="arrow">›</div>
					<div id="loader" class="hidden-xs"><img src="<?php echo e(asset('theme/icons/loader.gif')); ?>"></div>
					<select id="toc"></select>
				</div>

		        <script>

		            Book.getMetadata().then(function(meta){

		                document.title = meta.bookTitle+" – "+meta.creator;

		            });

		            Book.getToc().then(function(toc){

		              var $select = document.getElementById("toc"),
		                  docfrag = document.createDocumentFragment();

		              toc.forEach(function(chapter) {
		                var option = document.createElement("option");
		                option.textContent = chapter.label;
		                option.ref = chapter.href;

		                docfrag.appendChild(option);
		              });

		              $select.appendChild(docfrag);

		              $select.onchange = function(){
		                  var index = $select.selectedIndex,
		                      url = $select.options[index].ref;

		                  Book.goto(url);
		                  return false;
		              }

		            });

		            Book.ready.all.then(function(){
		              document.getElementById("loader").style.display = "none";
		            });

		            Book.renderTo("area");

		        </script>

			</div>
		</div>		
	</div>

</main>
<div id='ScrollToTop'><img alt='Back to top' src='http://2.bp.blogspot.com/-MFhU3vLp5ho/UiaBZeA1McI/AAAAAAAAAQs/MrzW2ljP5mA/s1600/arrow-up_basic_blue.png' title="Back to Top" /></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('push-script'); ?>
<script type="text/javascript">
	//scroll on top function
	$(function() { $(window).scroll(function() { 
		if($(this).scrollTop()>100) { 
			$('#ScrollToTop').fadeIn()
		} else { 
			$('#ScrollToTop').fadeOut();}
		});

	$('#ScrollToTop').click(function(){$('html,body').animate({scrollTop:0},1000);return false})});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Front-end/Master-layout/master-home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>