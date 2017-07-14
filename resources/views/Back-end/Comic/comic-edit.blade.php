@extends('Back-end.Master-Layout.master-admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Comic
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Comic</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div>
      @endif
      <div class="box">
        <!-- /.box-header -->
        <form class="form-horizontal" action="{{url('/admin/comic/').'/'.$item->id}}" method="post" enctype="multipart/form-data">
        {{ method_field('patch')}}
        {{ csrf_field() }}
        <div class="box-body">
          <div class="col-md-12">
            <div class="form-group">
              <label class="control-label col-md-2">Comic Title</label>
              <div class="col-md-10">
                <input type="text" name="comic_title" id="comic_title" class="form-control" value="{{$item->comic_title}}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2">Comic Image</label>
              <div class="col-md-10">
                <input type="file" name="comic_image" id="comic_image" class="form-control" value="{{$item->comic_image}}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2">Comic Description</label>
              <div class="col-md-10">
                <textarea name="comic_description" id="comic_description" rows="10" cols="60">{{$item->comic_description}}</textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2">Comic Author</label>
              <div class="col-md-10">
                <input type="text" name="comic_author" id="comic_author" class="form-control" value="{{$item->comic_author}}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2">Comic Genre</label>
              <div class="col-md-10">
                <input type="text" name="comic_genre" id="comic_genre" class="form-control" value="{{$item->comic_genre}}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2">Comic Release</label>
              <div class="col-md-10">
                <input type="text" name="comic_release" id="comic_release" class="form-control" value="{{$item->comic_release}}">
              </div>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary pull-right submit">Submit</button>
        </div>
        <!-- /.box-footer -->
        </form>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('push-script')
<script type="text/javascript" src="{{asset('theme/js/AdminLTE/ckeditor/ckeditor.js')}}"></script>
<script>
  // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'comic_description' );
</script>
@endsection