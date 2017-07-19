<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Administrator Panel : Bukufi</title>
    
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

      <!-- Logo -->
      <a href="<?php echo e(route('admin.dashboard')); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>ADM</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Administrator</b></span>
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
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo e(asset('theme/icons/avatar04.png')); ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo e(auth()->guard('admin')->user()->name); ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?php echo e(asset('theme/icons/avatar04.png')); ?>" class="img-circle" alt="User Image">

                  <p>
                    <?php echo e(auth()->guard('admin')->user()->name); ?>

                    <small>Administrator</small>
                  </p>
                </li>
                <!-- Menu Body -->
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo e(url('/admin/profile/id/').'/'.auth()->guard('admin')->user()->id); ?>" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                      <a href="<?php echo e(route('admin.logout')); ?>"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                      <form id="logout-form" action="<?php echo e(route('admin.logout')); ?>" method="POST" style="display: none;">
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
              <p><?php echo e(auth()->guard('admin')->user()->name); ?></p>
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
                <li class="<?php echo e(Request::segment(2) == 'dashboard' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fa fa-angle-double-right"></i> Dashboard</a></li>
              </ul>
            </li>
            <li class="treeview <?php echo e(Request::segment(2) == 'list' ? 'active' : ''); ?>">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Administrator</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo e(Request::segment(2) == 'list' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.list')); ?>"><i class="fa fa-angle-double-right"></i> Administrator List</a></li>
              </ul>
            </li>
            <li class="treeview <?php echo e(Request::segment(2) == 'comic' ? 'active' : ''); ?>">
              <a href="#">
                <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                <span>Comic</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo e(Request::segment(2) == 'comic' ? 'active' : ''); ?>"><a href="<?php echo e(route('comic.list')); ?>"><i class="fa fa-angle-double-right"></i> Comic List</a></li>
              </ul>
            </li>
            <li class="treeview <?php echo e(Request::segment(2) == 'comic-chapter' ? 'active' : ''); ?>">
              <a href="#">
                <i class="fa fa-file-image-o" aria-hidden="true"></i>
                <span>Comic Chapter</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo e(Request::segment(2) == 'comic-chapter' ? 'active' : ''); ?>"><a href="<?php echo e(route('comic.chapter')); ?>"><i class="fa fa-angle-double-right"></i> Comic Chapter</a></li>
              </ul>
            </li>
            <li class="treeview <?php echo e(Request::segment(2) == 'comic-genre' ? 'active' : ''); ?>">
              <a href="#">
               <i class="fa fa-tags" aria-hidden="true"></i>
                <span>Comic Genre</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo e(Request::segment(2) == 'comic-genre' ? 'active' : ''); ?>"><a href="<?php echo e(route('comic.genre')); ?>"><i class="fa fa-angle-double-right"></i> Comic Genre</a></li>
              </ul>
            </li>
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
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-8">
                  <!-- MAP & BOX PANE -->
                  <div class="box box-success">
                    <div class="box-header with-border">
                      <h3 class="box-title">Visitors Report</h3>

                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                      <div class="row">
                        <div class="col-md-9 col-sm-8">
                          <div class="pad">
                            <!-- Map will be created here -->
                            <div id="world-map-markers" style="height: 325px;"></div>
                          </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-4">
                          <div class="pad box-pane-right bg-green" style="min-height: 280px">
                            <div class="description-block margin-bottom">
                              <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                              <h5 class="description-header">8390</h5>
                              <span class="description-text">Visits</span>
                            </div>
                            <!-- /.description-block -->
                            <div class="description-block margin-bottom">
                              <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                              <h5 class="description-header">30%</h5>
                              <span class="description-text">Referrals</span>
                            </div>
                            <!-- /.description-block -->
                            <div class="description-block">
                              <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                              <h5 class="description-header">70%</h5>
                              <span class="description-text">Organic</span>
                            </div>
                            <!-- /.description-block -->
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                  <div class="row">
                    <div class="col-md-12">
                      <!-- USERS LIST -->
                      <div class="box box-danger">
                        <div class="box-header with-border">
                          <h3 class="box-title">Latest Members</h3>

                          <div class="box-tools pull-right">
                            <span class="label label-danger">8 New Members</span>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                          </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                          <ul class="users-list clearfix">
                            <li>
                              <img src="<?php echo e(asset('theme/icons/avatar.png')); ?>" alt="User Image">
                              <a class="users-list-name" href="#">Alexander Pierce</a>
                              <span class="users-list-date">Today</span>
                            </li>
                            <li>
                              <img src="<?php echo e(asset('theme/icons/avatar5.png')); ?>" alt="User Image">
                              <a class="users-list-name" href="#">Norman</a>
                              <span class="users-list-date">Yesterday</span>
                            </li>
                            <li>
                              <img src="<?php echo e(asset('theme/icons/avatar2.png')); ?>" alt="User Image">
                              <a class="users-list-name" href="#">Jane</a>
                              <span class="users-list-date">12 Jan</span>
                            </li>
                            <li>
                              <img src="<?php echo e(asset('theme/icons/avatar5.png')); ?>" alt="User Image">
                              <a class="users-list-name" href="#">John</a>
                              <span class="users-list-date">12 Jan</span>
                            </li>
                            <li>
                              <img src="<?php echo e(asset('theme/icons/avatar5.png')); ?>" alt="User Image">
                              <a class="users-list-name" href="#">Alexander</a>
                              <span class="users-list-date">13 Jan</span>
                            </li>
                            <li>
                              <img src="<?php echo e(asset('theme/icons/avatar2.png')); ?>" alt="User Image">
                              <a class="users-list-name" href="#">Sarah</a>
                              <span class="users-list-date">14 Jan</span>
                            </li>
                            <li>
                              <img src="<?php echo e(asset('theme/icons/avatar3.png')); ?>" alt="User Image">
                              <a class="users-list-name" href="#">Nora</a>
                              <span class="users-list-date">15 Jan</span>
                            </li>
                            <li>
                              <img src="<?php echo e(asset('theme/icons/avatar2.png')); ?>" alt="User Image">
                              <a class="users-list-name" href="#">Nadia</a>
                              <span class="users-list-date">15 Jan</span>
                            </li>
                          </ul>
                          <!-- /.users-list -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                          <a href="javascript:void(0)" class="uppercase">View All Users</a>
                        </div>
                        <!-- /.box-footer -->
                      </div>
                      <!--/.box -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.col -->

                <div class="col-md-4">
                  <!-- Info Boxes Style 2 -->
                  <div class="info-box bg-yellow">
                    <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Inventory</span>
                      <span class="info-box-number">5,200</span>

                      <div class="progress">
                        <div class="progress-bar" style="width: 50%"></div>
                      </div>
                      <span class="progress-description">
                            50% Increase in 30 Days
                          </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                  <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Mentions</span>
                      <span class="info-box-number">92,050</span>

                      <div class="progress">
                        <div class="progress-bar" style="width: 20%"></div>
                      </div>
                      <span class="progress-description">
                            20% Increase in 30 Days
                          </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                  <div class="info-box bg-red">
                    <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Downloads</span>
                      <span class="info-box-number">114,381</span>

                      <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                      </div>
                      <span class="progress-description">
                            70% Increase in 30 Days
                          </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                  <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Direct Messages</span>
                      <span class="info-box-number">163,921</span>

                      <div class="progress">
                        <div class="progress-bar" style="width: 40%"></div>
                      </div>
                      <span class="progress-description">
                            40% Increase in 30 Days
                          </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->

                  <div class="box box-default">
                    <div class="box-header with-border">
                      <h3 class="box-title">Browser Usage</h3>

                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-8">
                          <div class="chart-responsive">
                            <canvas id="pieChart" height="150"></canvas>
                          </div>
                          <!-- ./chart-responsive -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4">
                          <ul class="chart-legend clearfix">
                            <li><i class="fa fa-circle-o text-red"></i> Chrome</li>
                            <li><i class="fa fa-circle-o text-green"></i> IE</li>
                            <li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
                            <li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
                            <li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
                            <li><i class="fa fa-circle-o text-gray"></i> Navigator</li>
                          </ul>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-padding">
                      <ul class="nav nav-pills nav-stacked">
                        <li><a href="#">United States of America
                          <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
                        <li><a href="#">India <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a>
                        </li>
                        <li><a href="#">China
                          <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
                      </ul>
                    </div>
                    <!-- /.footer -->
                  </div>
                  <!-- /.box -->

                </div>
                <!-- /.col -->
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
      <strong>Copyright &copy; 2017 <a href="#">Kaigangames.com</a>.</strong> All rights
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

