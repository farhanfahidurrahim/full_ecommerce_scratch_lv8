@extends('layouts.admin')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Setting</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active">OnPage SEO</li>
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
	                <h3 class="card-title">Your SEO Setting</h3>
	              </div>
	              <!-- /.card-header -->
	              <!-- form start -->
	              <form method="post" action="{{ route('setting.seo.update',$data->id) }}">
	              	@csrf
	                <div class="card-body">
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Meta Title</label>
	                    <input type="text" name="meta_title" value="{{$data->meta_title}}" class="form-control">
	                  </div>
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Meta Author</label>
	                    <input type="text" name="meta_author" value="{{$data->meta_author}}" class="form-control">
	                  </div>
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Meta Tags</label>
	                    <input type="text" name="meta_tag" value="{{$data->meta_tag}}" class="form-control">
	                  </div>
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Meta Keyword</label>
	                    <input type="text" name="meta_keyword" value="{{$data->meta_keyword}}" class="form-control">
	                    <small>Example: ecommerce,shop,online,onlineshop</small>
	                  </div>
	                    <div class="form-group">
	                    <label for="exampleInputEmail1">Meta Description</label>
	                    <textarea name="meta_description" class="form-control">{{$data->meta_description}}</textarea>
	                  </div>

	                  <strong class="text-center text-success">___Others Option___</strong><hr>

	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Alexa Verification</label>
	                    <input type="text" name="alexa_verification" value="{{$data->alexa_verification}}" class="form-control" placeholder="Alexa Verification">
	                    <small>Paste Only Alexa Verification Code</small>
	                  </div>
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Google Verification</label>
	                    <input type="text" name="google_verification" value="{{$data->google_verification}}" class="form-control" placeholder="Google Verification">
	                    <small>Paste Only Google Verification Code</small>
	                  </div>
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Google Analytics</label>
	                    <textarea name="google_analytics" class="form-control" placeholder="Google Analytics">{{$data->google_analytics}}</textarea>
	                  </div>
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Google Adsense</label>
	                    <textarea name="google_adsense" class="form-control" placeholder="Google Adsense">{{$data->google_adsense}}</textarea>
	                  </div>
	                </div>
	                <!-- /.card-body -->
	                <div class="card-footer">
	                  <button type="submit" class="btn btn-primary">Update SEO</button>
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
