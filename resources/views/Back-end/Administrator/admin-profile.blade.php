@extends('Back-end.Master-Layout.master-admin')

@section('push-style')
<link rel="stylesheet" type="text/css" href="{{asset('theme/js/AdminLTE/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrator Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Administrator Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @if (Session::has('notif'))
        <div class="alert alert-info">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          {{ Session::get('notif') }}
        </div>
      @endif

      @if (Session::has('notif-fail'))
        <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          {{ Session::get('notif-fail') }}
        </div>
      @endif

      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
          <table id="data-admin" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>               
              </tr>
            </thead>
            <?php $no = 1 ?>
            <tbody>
              @foreach($admins as $adm)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$adm->name}}</td>
                <td>{{$adm->email}}</td>
                <td>
                  <a href="{{url('/admin/profile/edit/'. $adm->id)}}" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
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

<!--modal add admin-->
<div class="modal fade" id="add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add New Administrator</h4>
      </div>
      <form class="form-horizontal" action="{{route('add.admin')}}" method="post">
      {{csrf_field()}}
      <div class="modal-body">
        <div class="form-group">
          <label class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
            <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Email</label>
          <div class="col-sm-9">
            <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Password</label>
          <div class="col-sm-9">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
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
@endsection

@section('push-script')
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
      'autoWidth'   : false
    });
  })
</script>
@endsection