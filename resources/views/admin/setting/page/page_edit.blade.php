@extends('layouts.admin')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Page Setting</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active">Page Create</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
        	<div class="col-6">
	        	<div class="card card-primary">
	              <div class="card-header">
	                <h3 class="card-title">Edit a new Page</h3>
	              </div>
	              <!-- /.card-header -->
	              <!-- form start -->
	              <form method="post" action="{{ route('page.update',$page->id) }}">
	              	@csrf
	                <div class="card-body">
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Page Position</label>
	                    <select class="form-control" name="page_position" required>
	                    	<option value="1" @if($page->page_position==1) selected @endif>Line One</option>
	                    	<option value="2" @if($page->page_position==2) selected @endif>Line Two</option>
	                    </select>
	                  </div>
	                  <div class="form-group">
	                    <label for="exampleInputPassword1">Page Name</label>
	                    <input type="text" name="page_name" class="form-control" id="exampleInputPassword1" value="{{ $page->page_name }}" required>
	                  </div>
	                  <div class="form-group">
	                    <label for="exampleInputPassword1">Page Title</label>
	                    <input type="text" name="page_title" class="form-control" id="exampleInputPassword1" value="{{ $page->page_title }}" required>
	                  </div>
	                  <div class="form-group">
	                    <label for="exampleInputPassword1">Page Description</label>
	                    <textarea class="form-control textarea" name="page_description" required>{{$page->page_description}}</textarea>
	                  </div>
	                </div>
	                <!-- /.card-body -->

	                <div class="card-footer">
	                  <button type="submit" class="btn btn-primary">Update Page</button>
	                  <a href="{{ route('page.index') }}" class="btn btn-info">Back</a>
	                </div>
	              </form>
	            </div>
        	</div>
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
