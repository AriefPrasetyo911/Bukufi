<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Slider : Bukufi</title>
  
  <link rel="stylesheet" type="text/css" href="{{asset('theme/css/Custom/css/style.css')}}">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" type="text/css" href="{{asset('theme/css/Bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('theme/css/Font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" type="text/css" href="{{asset('theme/css/AdminLTE/Ionicons/css/ionicons.min.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" type="text/css" href="{{asset('theme/css/AdminLTE/jvectormap/jquery-jvectormap.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" type="text/css" href="{{asset('theme/css/AdminLTE/dist/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" type="text/css" href="{{asset('theme/css/AdminLTE/dist/skins/_all-skins.min.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('theme/js/AdminLTE/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

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
      <a href="{{route('admin.dashboard')}}" class="logo">
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
                <img src="{{asset('theme/icons/avatar04.png')}}" class="user-image" alt="User Image">
                <span class="hidden-xs">{{ auth()->guard('admin')->user()->name }}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="{{asset('theme/icons/avatar04.png')}}" class="img-circle" alt="User Image">

                  <p>
                    {{ auth()->guard('admin')->user()->name }}
                    <small>Administrator</small>
                  </p>
                </li>
                <!-- Menu Body -->
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="{{url('/admin/profile/id/').'/'.auth()->guard('admin')->user()->id}}" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                      <a href="{{route('admin.logout')}}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                      <form id="logout-form" action="{{route('admin.logout')}}" method="POST" style="display: none;">
                            {{ csrf_field() }}
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
              <img src="{{asset('theme/icons/avatar04.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ auth()->guard('admin')->user()->name }}</p>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview {{Request::segment(2) == 'dashboard' ? 'active' : ''}}">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ Request::segment(2) == 'dashboard' ? 'active' : '' }}"><a href="{{route('admin.dashboard')}}"><i class="fa fa-angle-double-right"></i> Dashboard</a></li>
              </ul>
            </li>
            <!--=============================-->
            <li class="treeview {{Request::segment(2) == 'list' ? 'active' : ''}}">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Administrator</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ Request::segment(2) == 'list' ? 'active' : '' }}"><a href="{{route('admin.list')}}"><i class="fa fa-angle-double-right"></i> Administrator List</a></li>
              </ul>
            </li>
            <!--=============================-->
            <li class="treeview {{Request::segment(2) == 'book' ? 'active' : ''}}">
              <a href="#">
                <i class="fa fa-book" aria-hidden="true"></i>
                <span>Book</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ Request::segment(2) == 'book' ? 'active' : '' }}"><a href="{{route('list.book')}}"><i class="fa fa-angle-double-right"></i> Books List</a></li>
              </ul>
            </li>
            <!--=============================-->
            <li class="treeview {{Request::segment(2) == 'comic' ? 'active' : ''}}">
              <a href="#">
                <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                <span>Comic</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ Request::segment(2) == 'comic' ? 'active' : '' }}"><a href="{{route('comic.list')}}"><i class="fa fa-angle-double-right"></i> Comic List</a></li>
              </ul>
            </li>
            <!--=============================-->
            <li class="treeview {{Request::segment(2) == 'comic-chapter' ? 'active' : ''}}">
              <a href="#">
                <i class="fa fa-file-image-o" aria-hidden="true"></i>
                <span>Comic Chapter</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ Request::segment(2) == 'comic-chapter' ? 'active' : '' }}"><a href="{{route('comic.chapter')}}"><i class="fa fa-angle-double-right"></i> Comic Chapter</a></li>
              </ul>
            </li>
            <!--=============================-->
            <li class="treeview {{Request::segment(2) == 'comic-genre' ? 'active' : ''}}">
              <a href="#">
               <i class="fa fa-tags" aria-hidden="true"></i>
                <span>Comic Genre</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ Request::segment(2) == 'comic-genre' ? 'active' : '' }}"><a href="{{route('comic.genre')}}"><i class="fa fa-angle-double-right"></i> Comic Genre</a></li>
              </ul>
            </li>
            <!--=============================-->
            <li class="treeview {{Request::segment(2) == 'slider' ? 'active' : ''}}">
              <a href="#">
               <i class="fa fa-slideshare" aria-hidden="true"></i>
                <span>Slider Carousel</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ Request::segment(2) == 'slider' ? 'active' : '' }}"><a href="{{route('slider')}}"><i class="fa fa-angle-double-right"></i> Slider Carousel</a></li>
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
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Book List</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          @if (Session::has('notif'))
            <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
              {{ Session::get('notif') }}
            </div>
          @endif

          <div class="alert alert-info">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
              Slider only display 3 last image
          </div>

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Book List</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-header">
              <div class="col-md-12 add">
                <div class="pull-left">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addslider">
                    <i class="fa fa-plus"></i> Add New Slide
                  </button>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data-admin" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <?php $no = 1 ?>
                <tbody>
                  @foreach($carousel as $slider)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$slider->slider_image}}</td>
                      <td>
                        <form action="{{route('slider.delete', $slider->id)}}" class="form-horizontal" method="post">
                          {{ method_field('delete')}}
                          {{ csrf_field() }}
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this data?')">Delete</button>
                        </form>    
                      </td>
                    </tr>
                  @endforeach
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

    <!-- Modal -->
    <div class="modal fade" id="addslider" tabindex="-1" role="dialog" aria-labelledby="addslider">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Slider</h4>
          </div>
          <div class="modal-body">

            <form class="form-horizontal" action="{{route('slider.insert')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label col-md-3">Slider Image</label>
                    <div class="col-md-9">
                      <input type="file" name="slider_image" id="slider_image" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right submit">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>

          </div>
        </div>
      </div>
    </div>
    <!--end-modal-->

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
      </div>
      <strong>Copyright &copy; 2017 <a href="#">Bukufi</a>.</strong> All rights
      reserved.
    </footer>

</div>
</body>
  <script type="text/javascript" src="{{asset('theme/js/Bootstrap/jquery-3.2.1.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('theme/js/Bootstrap/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('theme/js/AdminLTE/fastclick/lib/fastclick.js')}}"></script>

  <script type="text/javascript" src="{{asset('theme/js/AdminLTE/dist/adminlte.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('theme/js/AdminLTE/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('theme/js/AdminLTE/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('theme/js/AdminLTE/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('theme/js/AdminLTE/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
  <script type="text/javascript" src="{{asset('theme/js/AdminLTE/Chart.js/Chart.js')}}"></script>
  <script type="text/javascript" src="{{asset('theme/js/AdminLTE/dist/pages/dashboard2.js')}}"></script>

  <script type="text/javascript" src="{{asset('theme/js/AdminLTE/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('theme/js/AdminLTE/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
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