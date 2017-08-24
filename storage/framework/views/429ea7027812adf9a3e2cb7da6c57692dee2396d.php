<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <title>User Panel : Bukufi</title>
    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('theme/css/Custom/css/style.css')); ?>">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('theme/css/Bootstrap/bootstrap.min.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('theme/css/Font-awesome/css/font-awesome.min.css')); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('theme/css/AdminLTE/Ionicons/css/ionicons.min.css')); ?>">
  <!-- jvectormap -->
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('theme/css/AdminLTE/jvectormap/jquery-jvectormap.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('theme/css/AdminLTE/dist/AdminLTE.min.css')); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('theme/css/AdminLTE/dist/skins/_all-skins.min.css')); ?>">

  <style type="text/css">
    .users-list>li
    {
        width: 20%;
    }
  </style>

  <script type="text/javascript">
    window.setTimeout("waktu()",1000);

    function waktu() {
        var tanggal = new Date();
        setTimeout("waktu()",1000);
        document.getElementById("jam").innerHTML   = tanggal.getHours();
        document.getElementById("menit").innerHTML = tanggal.getMinutes();
        document.getElementById("detik").innerHTML = tanggal.getSeconds();
    }
  </script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini" onload="waktu()">
  <div class="wrapper">

    <header class="main-header">

      <!-- Logo -->
      <a href="<?php echo e(route('user.dashboard')); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>USER</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>User Dashboard</b></span>
      </a>

      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li id="jam-digital">
              <a href="#">
                <span>Current Time :</span>
                <span><?php echo e($date_now); ?> : </span>
                <span id="hours"><span id="jam"></span></span>
                <span id="minute"><span id="menit"></span></span>
                <span id="second"><span id="detik"></span></span>
              </a>
            </li> 
            <?php if($membership_type == "Paid"): ?>
            <li>
              <a href="javascript:void(0)" title="<?php echo e($membership_type); ?>" target="_blank">
                <span class="badge badge-paid"> <?php echo e($membership_type); ?> Membership</span>
              </a>
            </li>
            <?php else: ?>
            <li>
              <a href="javascript:void(0)" title="<?php echo e($membership_type); ?>" target="_blank">
                <span class="badge badge-paid"> <?php echo e($membership_type); ?> Membership</span>
              </a>
            </li>
            <?php endif; ?>
            <li>
              <a href="<?php echo e(route('home.index')); ?>" title="Read Comic" target="_blank">
                <i class="fa fa-book" aria-hidden="true"></i> 
                <span class="hidden-xs"> Read Comic </span>
              </a>
            </li>
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo e(asset('theme/icons/avatar04.png')); ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo e(auth()->guard('user')->user()->name); ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?php echo e(asset('theme/icons/avatar04.png')); ?>" class="img-circle" alt="User Image">

                  <p>
                    <?php echo e(auth()->guard('user')->user()->name); ?> <br>
                    Created <?php echo e(auth()->guard('user')->user()->created_at->diffForHumans()); ?>

                  </p>
                </li>
                <!-- Menu Body -->
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo e(route('user.logout')); ?>"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                    <form id="logout-form" action="<?php echo e(route('user.logout')); ?>" method="POST" style="display: none;">
                          <?php echo e(csrf_field()); ?>

                    </form>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>

      </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo e(asset('theme/icons/avatar04.png')); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo e(auth()->guard('user')->user()->name); ?></p>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview <?php echo e(Request::segment(2) == 'dashboard' ? 'active' : ''); ?>">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo e(Request::segment(2) == 'dashboard' ? 'active' : ''); ?>"><a href="<?php echo e(route('user.dashboard')); ?>"><i class="fa fa-angle-double-right"></i> Dashboard</a></li>
              </ul>
            </li>
            <li class="treeview <?php echo e(Request::segment(2) == 'comic-bookmark' ? 'active' : ''); ?>">
              <a href="#">
                <i class="fa fa-bookmark" aria-hidden="true"></i>
                <span>Bookmark</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo e(Request::segment(2) == 'comic-bookmark' ? 'active' : ''); ?>"><a href="<?php echo e(route('user.bookmark.list', auth()->guard('user')->user()->id)); ?>"><i class="fa fa-angle-double-right"></i> Bookmark List</a></li>
              </ul>
            </li>
            <!-- <li class="treeview <?php echo e(Request::segment(2) == 'comic' ? 'active' : ''); ?>">
              <a href="#">
                <i class="fa fa-history" aria-hidden="true"></i>
                <span>Reading History</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo e(Request::segment(2) == 'comic' ? 'active' : ''); ?>"><a href="<?php echo e(route('comic.list')); ?>"><i class="fa fa-angle-double-right"></i> History List</a></li>
              </ul>
            </li> -->
          </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Version 1.0</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo e(route('user.dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-12 col-xs-12">
                  <!-- MAP & BOX PANE -->
                  <div class="box box-success">
                    <div class="box-header with-border">
                      <h3 class="box-title">Hi, <?php echo e(auth()->guard('user')->user()->name); ?></h3>

                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                      <div class="row">
                        <div class="col-md-12 col-xs-12">
                          <div class="pad">
                            <h4>Welcome to User Dashboard</h4>
                          </div>
                        </div>
                      </div>
                      <!-- /.row -->
                    </div><!-- /.box-body -->
                  </div><!-- /.box -->
                </div><!-- /.col -->

                <div class="col-md-12 col-xs-12">

                  <?php if($message = Session::get('success')): ?>
                  <div class="custom-alerts alert alert-success fade in">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                      <?php echo $message; ?>

                  </div>
                  <?php Session::forget('success');?>
                  <?php endif; ?>

                  <?php if($message = Session::get('error')): ?>
                  <div class="custom-alerts alert alert-danger fade in">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                      <?php echo $message; ?>

                  </div>
                  <?php Session::forget('error');?>
                  <?php endif; ?>

                  <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Membership Plan</h3>

                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <div class="box-body">
                      
                      <?php $__currentLoopData = $check_membership; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($member->membership == 'Free'): ?>
                          <div class="col-md-4 col-xs-12">
                            <div class="panel panel-primary">
                              <div class="panel-heading">
                                  <h3 class="panel-title">
                                    FREE
                                  </h3>
                              </div>
                              <div class="panel-body">
                                  <div class="the-price">
                                      <h1>$0</h1>
                                  </div>
                                  <table class="table">
                                      <tr>
                                          <td>
                                              Have Advertisements
                                          </td>
                                      </tr>
                                      <tr class="active">
                                          <td>
                                              Limited Access for Books and Comic
                                          </td>
                                      </tr>
                                  </table>
                              </div>
                              <div class="panel-footer">
                                  Now you are in this plan
                              </div>
                            </div>
                          </div>

                          <div class="col-md-4 col-xs-12">
                            <div class="panel panel-success">
                              <div class="cnrflash">
                                <div class="cnrflash-inner">
                                    <span class="cnrflash-label">MOST
                                    <br>
                                    POPULAR</span>
                                </div>
                              </div>
                              <div class="panel-heading">
                                  <h3 class="panel-title">
                                    PAID
                                  </h3>
                              </div>
                              <div class="panel-body">
                                  <div class="the-price">
                                      <h1>$10</h1>
                                  </div>
                                  <table class="table">
                                      <tr>
                                          <td>
                                              No Advertisements
                                          </td>
                                      </tr>
                                      <tr class="active">
                                          <td>
                                              Unlimited Access for Books and Comic
                                          </td>
                                      </tr>
                                  </table>
                              </div>
                              <div class="panel-footer" style="display: flex;">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                  
                                  <form class="form-horizontal" method="POST" id="payment-form" role="form" action="<?php echo URL::route('paypal.paypal'); ?>" >
                                    <?php echo e(csrf_field()); ?>

                                    
                                    <!--for user id-->
                                    <input id="name" type="hidden" class="form-control" name="user_id" value="<?php echo e(auth()->guard('user')->user()->id); ?>">

                                    <!--for name-->
                                    <input id="name" type="hidden" class="form-control" name="name" value="Bukufi Paid Membership Subcription">

                                    <!--for quantity-->
                                    <input id="quantity" type="hidden" class="form-control" name="quantity" value="1">

                                    <!--for amount-->
                                    <input id="amount" type="hidden" class="form-control" name="amount" value="10">
                                    
                                    <div class="form-group" style="margin-bottom: 0;">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Pay with Paypal
                                        </button>
                                    </div>
                                  </form>

                                </div>

                              </div>
                            </div>
                          </div>

                          <div class="col-md-4 col-xs-12">
                            <div class="panel">
                              <div class="panel-heading">
                                <p class="text-center text-info bold">Information</p>
                              </div>
                              <div class="panel-body">
                                <p class="text-justify">If you get "Http response code 500" after sending payment, dont worry and don't panic, your money still save in your account and not yet transferred to bukufi account. Please repeat the transaction again from start if you want.</p>
                                <p class="text-justify">If you are in doubt, you can check to your paypal account.</p>
                                <p class="text-right">Best regards Bukufi</p>
                              </div>
                            </div>
                          </div>
                        <?php else: ?>
                          <div class="col-md-4 col-xs-12">
                            <div class="panel panel-primary">
                              <div class="panel-heading">
                                  <h3 class="panel-title">
                                    FREE
                                  </h3>
                              </div>
                              <div class="panel-body">
                                  <div class="the-price">
                                      <h1>$0</h1>
                                  </div>
                                  <table class="table">
                                      <tr>
                                          <td>
                                              Have Advertisements
                                          </td>
                                      </tr>
                                      <tr class="active">
                                          <td>
                                              Limited Access for Books and Comic
                                          </td>
                                      </tr>
                                  </table>
                              </div>
                              <div class="panel-footer">
                                  Free membership
                              </div>
                            </div>
                          </div>

                          <div class="col-md-4 col-xs-12">
                            <div class="panel panel-success">
                              <div class="cnrflash">
                                <div class="cnrflash-inner">
                                    <span class="cnrflash-label">MOST
                                    <br>
                                    POPULAR</span>
                                </div>
                              </div>
                              <div class="panel-heading">
                                  <h3 class="panel-title">
                                    PAID
                                  </h3>
                              </div>
                              <div class="panel-body">
                                  <div class="the-price">
                                      <h1>$10</h1>
                                  </div>
                                  <table class="table">
                                      <tr>
                                          <td>
                                              No Advertisements
                                          </td>
                                      </tr>
                                      <tr class="active">
                                          <td>
                                              Unlimited Access for Books and Comic
                                          </td>
                                      </tr>
                                  </table>
                              </div>
                              <div class="panel-footer panel-success" style="display: flow-root;">
                                <p class="no-padding-top no-padding-bottom no-margin-bottom">Now you are in this plan</p>
                                <p class="no-padding-top no-padding-bottom no-margin-bottom">Subscription Left :</p>
                                <div class="col-md-6 col-sm-6 col-xs-12" style="padding-left: 0; padding-right: 0;">
                                  <p class="no-padding-top no-padding-bottom no-margin-bottom">In Days :  <?php echo e($remaining_days); ?> Days</p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12" style="padding-left: 0; padding-right: 0;">
                                  <p class="no-padding-top no-padding-bottom no-margin-bottom">In Hours :  <?php echo e($remaining_hours); ?> Hours </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                  </div>
                </div>
                  
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
      </div>
      <strong>Copyright &copy; 2017 <a href="#">Bukufi</a>.</strong> All rights
      reserved.
    </footer>

  </div>
</body>
  <script type="text/javascript" src="<?php echo e(asset('theme/js/Bootstrap/jquery-3.2.1.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('theme/js/Bootstrap/bootstrap.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('theme/js/AdminLTE/fastclick/lib/fastclick.js')); ?>"></script>

  <script type="text/javascript" src="<?php echo e(asset('theme/js/AdminLTE/dist/adminlte.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('theme/js/AdminLTE/jquery-sparkline/dist/jquery.sparkline.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('theme/js/AdminLTE/jquery-slimscroll/jquery.slimscroll.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('theme/js/AdminLTE/jvectormap/jquery-jvectormap-1.2.2.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('theme/js/AdminLTE/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('theme/js/AdminLTE/Chart.js/Chart.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('theme/js/AdminLTE/dist/pages/dashboard2.js')); ?>"></script>
</html>