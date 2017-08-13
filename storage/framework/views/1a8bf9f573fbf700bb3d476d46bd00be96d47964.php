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
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('theme/js/AdminLTE/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
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
            <!--=============================-->
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
            <!--=============================-->
            <li class="treeview <?php echo e(Request::segment(2) == 'book' ? 'active' : ''); ?>">
              <a href="#">
                <i class="fa fa-book" aria-hidden="true"></i>
                <span>Book</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo e(Request::segment(2) == 'book' ? 'active' : ''); ?>"><a href="<?php echo e(route('list.book')); ?>"><i class="fa fa-angle-double-right"></i> Books List</a></li>
              </ul>
            </li>
            <!--=============================-->
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
            <!--=============================-->
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
            <!--=============================-->
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
            <!--=============================-->
            <li class="treeview <?php echo e(Request::segment(2) == 'slider' ? 'active' : ''); ?>">
              <a href="#">
               <i class="fa fa-slideshare" aria-hidden="true"></i>
                <span>Slider Carousel</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo e(Request::segment(2) == 'slider' ? 'active' : ''); ?>"><a href="<?php echo e(route('slider')); ?>"><i class="fa fa-angle-double-right"></i> Slider Carousel</a></li>
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
            
            <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                  <div class="inner">
                    <h3><?php echo e($sum_visitor_today); ?></h3>

                    <p>Visitor Today</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3><?php echo e($sum_visitor_weekly); ?></h3>

                    <p>Visitor This Week</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-ios-people"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3><?php echo e($sum_visitor_monthly); ?></h3>

                    <p>Visitor This Month</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-ios-timer"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3><?php echo e($sum_all_visitor); ?></h3>

                    <p>All Visitors</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-ios-world"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->
            </div>
            <!-- /.row -->

            <!-- Main row -->
            <div class="row">
              <div class="col-md-12">
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
                  <div class="box-body">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#today" aria-controls="home" role="tab" data-toggle="tab">Today</a></li>
                      <li role="presentation"><a href="#week" aria-controls="profile" role="tab" data-toggle="tab">Last Week</a></li>
                      <li role="presentation"><a href="#month" aria-controls="messages" role="tab" data-toggle="tab">Last Month</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content" style="padding: 15px;">
                      <div role="tabpanel" class="tab-pane active" id="today">
                        
                        <table class="table table-responsive table-striped" id="table-log" width="100%">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>IP Address</th>
                              <th>Browser</th>
                              <th>Created at</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no=1;?>
                            <?php $__currentLoopData = $visitor_today; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $today): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                              <td><?php echo e($no++); ?></td>
                              <td><?php echo e($today->ip_address); ?></td>
                              <td><?php echo e($today->browser); ?></td>
                              <td><?php echo e($today->created_at); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                        </table>
                      </div>

                      <div role="tabpanel" class="tab-pane" id="week">
                        
                        <table class="table table-responsive table-striped" id="table-log2" width="100%">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>IP Address</th>
                              <th>Browser</th>
                              <th>Created at</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no=1;?>
                            <?php $__currentLoopData = $visitor_mingguan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weekly): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                              <td><?php echo e($no++); ?></td>
                              <td><?php echo e($weekly->ip_address); ?></td>
                              <td><?php echo e($weekly->browser); ?></td>
                              <td><?php echo e($weekly->created_at); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                        </table>
                      </div>

                      <div role="tabpanel" class="tab-pane" id="month">
                        
                        <table class="table table-responsive table-striped" id="table-log3" width="100%">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>IP Address</th>
                              <th>Browser</th>
                              <th>Created at</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no=1;?>
                            <?php $__currentLoopData = $visitor_bulanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $monthly): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                              <td><?php echo e($no++); ?></td>
                              <td><?php echo e($monthly->ip_address); ?></td>
                              <td><?php echo e($monthly->browser); ?></td>
                              <td><?php echo e($monthly->created_at); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                        </table>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
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
  <script type="text/javascript" src="<?php echo e(asset('theme/js/AdminLTE/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('theme/js/AdminLTE/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
  <script>
    $(document).ready(function() {
      $('#table-log').DataTable({
          'paging'      : true,
          'lengthChange': true,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : true
      });
      $('#table-log2').DataTable({
          'paging'      : true,
          'lengthChange': true,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : true
      });
      $('#table-log3').DataTable({
          'paging'      : true,
          'lengthChange': true,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : true
      });
    });
  </script>
</html>

