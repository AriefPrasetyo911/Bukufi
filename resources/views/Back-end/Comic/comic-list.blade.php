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
        <li class="active">Comic List</li>
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
          <h3 class="box-title">Comic List</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-header">
          <div class="col-md-12 add">
            <div class="pull-left">
              <a href="{{route('comic.add')}}" type="button" title="Add Comic" class="btn btn-success"><i class="fa fa-plus"></i> Add Comic</a>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="data-admin" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Comic Title</th>
                <th>Comic Description</th>                  
                <th>Comic Author</th>
                <th>Comic Genre</th>
                <th>Comic Release</th>
                <!-- <th>Created at</th>
                <th>Updated at</th> -->
                <th>Action</th>
              </tr>
            </thead>
            <?php $no = 1 ?>
            <tbody>
              @foreach($comics as $comic)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$comic->comic_title}}</td>
                <td>{{substr(strip_tags($comic->comic_description), 0, 450)}}</td>
                <td>{{$comic->comic_author}}</td>
                <td>{{$comic->comic_genre}}</td>
                <td>{{$comic->comic_release}}</td>
                <!-- <td>{{$comic->created_at}}</td>
                <td>{{$comic->updated_at}}</td> -->
                <td>
                  <a href="{{url('/admin/comic-chapter/' .$comic->id)}}" class="btn btn-primary btn-block">Add Chapter</a>
                  <a href="{{url('/admin/comic/' .$comic->id. '/edit')}}" class="btn btn-info btn-block">Edit</a>
                  <form action="{{url('/admin/comic/' .$comic->id)}}" class="form-horizontal" method="post">
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