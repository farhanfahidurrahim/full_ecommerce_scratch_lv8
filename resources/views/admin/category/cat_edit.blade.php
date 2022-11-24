@extends('layouts.admin')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="{{ route('category.index') }}" class="btn btn-info">All Category</a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      	<div class="container">
        	<div class="row justify-content-center">
          		<div class="col-8">
            		<div class="card">
              			<div class="card-header">
                			<h3 class="card-title">Edit Category</h3>
              			</div>
              			<!-- /.card-header -->
              			<div class="card-body">
              				<div class="card">
              					<form method="post" action="{{ route('category.update',$data->id) }}">
              						@csrf
								  <div class="form-group">
								    <label>Category Name</label>
								    <input type="text" value="{{$data->category_name}}" name="category_name" class="form-control">
								  </div>
								  <button type="submit" class="btn btn-primary">Update</button>
								</form>
			              	</div>
			              	<!-- /.card-body -->
              			</div>
          			</div>
      			</div>
  			</div>
		</div>
	</section>
</div>

@endsection