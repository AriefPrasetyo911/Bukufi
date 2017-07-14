@extends('Back-end.Master-Layout.master-admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Chapter for Comic : {{$comics->comic_title}}
      </h1>
      
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add New Comic Chapter</li>
      </ol>
    </section>
    

    <!-- Main content -->
    <section class="content">
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
        <!-- /.box-header -->
        <form class="form-horizontal" action="{{url('/admin/comic/'.$comics->id. '/chapter')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="box-body">
          <div class="col-md-12">
            <input type="hidden" name="comic_id" value="{{$comics->id}}">
            
            <div class="form-group">
              <label class="control-label col-md-2">Comic Title</label>
              <div class="col-md-10">
                <input type="text" name="comic_title" id="comic_title" class="form-control" value="{{$comics->comic_title}}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2">Comic Chapter</label>
              <div class="col-md-10">
                <input type="number" name="comic_chapter" id="comic_chapter" class="form-control" placeholder="Ex: 1, 2, 3 (only number)">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2">Comic Image</label>
              <div class="col-md-10">
                <input type="file" name="comic_image[]" multiple id="comic_image" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2">Chapter Title</label>
              <div class="col-md-10">
                <input type="text" name="chapter_title" id="chapter_title" class="form-control" placeholder="Ex. Spider Man : Chapter One.">
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