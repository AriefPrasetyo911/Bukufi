@extends('Back-end.Master-Layout.master-admin')

@section('push-style')
<link rel="stylesheet" type="text/css" href="{{asset('theme/js/AdminLTE/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Comic Genre</li>
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
                <th>Action</th>
              </tr>
            </thead>
            <?php $no = 1 ?>
            <tbody>
              @foreach($genres as $genre)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$genre->comic_genre}}</td>
                <td>{{$genre->created_at}}</td>
                <td>{{$genre->updated_at}}</td>
                <td>
                  <form action="{{url('/admin/comic-genre/delete/' .$genre->id)}}" class="form-horizontal" method="post">
                    {{ method_field('delete')}}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Are you sure want to delete this data?')">Delete</button>
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
<!--modal add genre-->
<div class="modal fade" id="addgenre">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add New Genre</h4>
      </div>
      <form class="form-horizontal" action="{{route('add.genre')}}" method="post">
      {{csrf_field()}}
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
      'autoWidth'   : true
    });
  });
</script>
@endsection