@extends('Back-end.Master-Layout.master-admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Administrator Profile</li>
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

      @if ($errors->any())
        <div class="alert alert-danger">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div>
      @endif

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Administrator Profile</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal" action="{{url('/admin/profile/edit/' .$item->id)}}" method="post">
        {{csrf_field()}}
        <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">Name</label>
              <div class="col-sm-8">
                <input type="text" name="name" class="form-control" id="name" value="{{$item->name}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Email</label>
              <div class="col-sm-8">
                <input type="email" name="email" class="form-control" id="email" value="{{$item->email}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Password</label>
              <div class="col-sm-8">
                <input type="password" name="password" class="form-control" id="password" placeholder="Fill new password" ">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Confirm Password</label>
              <div class="col-sm-8">
                <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm the password" ">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Current Password</label>
              <div class="col-sm-8">
                <input type="password" name="current_password" class="form-control" id="current_password" placeholder="Enter current password" ">
              </div>
            </div>

        </div>
        <div class="box-footer">
          <div class="form-group">
            <label class="col-sm-2"></label>
            <div class="col-sm-8" style="padding-left: 0;">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>

        </form>
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
