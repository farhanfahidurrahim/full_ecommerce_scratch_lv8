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
              <li class="breadcrumb-item active">Website Setting</li>
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
	                <h3 class="card-title">Your Website Details</h3>
	              </div>
	              <!-- /.card-header -->
	              <!-- form start -->
	              <form method="post" action="{{ route('setting.website.update',$data->id) }}" enctype="multipart/form-data">
	              	@csrf
	                <div class="card-body">
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Currency Icon</label>
	                    <select name="currency_icon" class="form-control">
	                    	<option disabled selected>Select Currency</option>
	                    	<option value="৳" @if($data->currency_icon=='৳') selected @endif>Taka (৳)</option>
	                    	<option value="$" @if($data->currency_icon=='$') selected @endif>USD ($)</option>
	                    </select>
	                  </div>
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Phone One</label>
	                    <input type="text" name="phone_one" value="{{$data->phone_one}}" class="form-control">
	                  </div>
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Phone Two</label>
	                    <input type="text" name="phone_two" value="{{$data->phone_two}}" class="form-control">
	                  </div>
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Main Email</label>
	                    <input type="email" name="main_email" value="{{$data->main_email}}" class="form-control">
	                  </div>
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Support Email</label>
	                    <input type="email" name="support_email" value="{{$data->support_email}}" class="form-control">
	                  </div>
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Main Logo</label>
	                    <input type="file" name="logo" class="form-control">
	                    <input type="hidden" name="old_logo" value="{{$data->logo}}">
	                  </div>
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Favicon</label>
	                    <input type="file" name="favicon" class="form-control">
	                    <input type="hidden" name="old_favicon" value="{{$data->favicon}}">
	                  </div>
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Address</label>
	                    <textarea name="address" class="form-control">{{$data->address}}</textarea>
	                  </div>

	                  <strong class="text-success">Social Link:</strong><br>

	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Facebook</label>
	                    <input type="text" name="facebook" value="{{$data->facebook}}" class="form-control">
	                  </div>
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Instagram</label>
	                    <input type="text" name="instagram" value="{{$data->instagram}}" class="form-control">
	                  </div>
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Youtube</label>
	                    <input type="text" name="youtube" value="{{$data->youtube}}" class="form-control">
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
