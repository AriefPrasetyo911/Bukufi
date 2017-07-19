<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Comic Genre : Bukufi</title>
    
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
          <ol class="breadcrumb">
            <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Comic Genre</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <?php if(Session::has('notif')): ?>
            <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
              <?php echo e(Session::get('notif')); ?>

            </div>
          <?php endif; ?>

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Comic Genre</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-header with-border">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addgenre"><i class="fa fa-plus"></i> Add New Genre</button>
            </div>
            <div class="box-body">
              <table id="data-admin" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Comic Genre</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <!-- <th>Action</th> -->
                  </tr>
                </thead>
                <?php $no = 1 ?>
                <tbody>
                  <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($no++); ?></td>
                    <td><?php echo e($genre->comic_genre); ?></td>
                    <td><?php echo e($genre->created_at); ?></td>
                    <td><?php echo e($genre->updated_at); ?></td>
                    <!-- <td>
                      <form action="<?php echo e(url('/admin/comic-genre/delete/' .$genre->id)); ?>" class="form-horizontal" method="post">
                        <?php echo e(method_field('delete')); ?>

                        <?php echo e(csrf_field()); ?>

                        <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Are you sure want to delete this data?')">Delete</button>
                      </form>     
                    </td> -->
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!--modal add genre-->
    <div class="modal fade" id="addgenre">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-success">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add New Genre</h4>
          </div>
          <form class="form-horizontal" action="<?php echo e(route('add.genre')); ?>" method="post">
          <?php echo e(csrf_field()); ?>

          <div class="modal-body">
            <div class="form-group">
              <label class="col-sm-3 control-label">Genre Name</label>
              <div class="col-sm-9">
                <input type="text" name="genre" class="form-control" id="Genre" placeholder="Ex: Superhero, Adventure, Comedy">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Add</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    
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

  <script type="text/javascript" src="<?php echo e(asset('theme/js/AdminLTE/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('theme/js/AdminLTE/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
  <script>
    $(function () {
      $('#data-admin').DataTable({
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