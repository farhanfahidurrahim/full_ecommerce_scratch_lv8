@extends('layouts.admin')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Subcategory</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <button class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">+ Add New</button>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      	<div class="container-fluid">
        	<div class="row">
          		<div class="col-12">
            		<div class="card">
              			<div class="card-header">
                			<h3 class="card-title">DataTable All Subcategory</h3>
              			</div>
              			<!-- /.card-header -->
              			<div class="card-body">
              				<div class="card">
				                <table id="example1" class="table table-bordered table-striped table-sm">
									<thead>
										<tr>
											<th>SL</th>
											<th>Subcategory Name</th>
											<th>Category Name</th>
											<th>Subcategory Slug</th>
											<th>Action</th>
										</tr>
									</thead>
									@foreach($data as $key=>$row)
									<tbody>
										<tr>
											<td>{{ ++$key }}</td>
											<td>{{ $row->subcategory_name }}</td>
											<td>{{ $row->category_name }}</td>
											<td>{{ $row->subcat_slug }}</td>
											<td>
												<a href="{{ route('subcategory.edit',$row->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
												<a href="{{ route('subcategory.destroy',$row->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>
											</td>
										</tr>
									</tbody>
									@endforeach
				                </table>
			              	</div>
			              	<!-- /.card-body -->
              			</div>
          			</div>
      			</div>
  			</div>
		</div>
	</section>
</div>

<!-- Category Add New Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Subcategory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{ route('subcategory.store') }}" method="post">
        	@csrf
	      <div class="modal-body">
	      	  <div class="form-group">
		      	<label for="exampleInputEmail1">Category Name</label>
		      	<select class="form-control" name="category_id" required>
		      		<option disabled selected value="">Select Catgeory</option>
		      		@foreach($category as $row)
		      			<option value="{{$row->id}}">{{ $row->category_name }}</option>
		      		@endforeach
		      	</select>
		      </div> 

			  <div class="form-group">
			    <label for="exampleInputEmail1">Subcategory Name</label>
			    <input type="text" name="subcategory_name" class="form-control" id="category_name" placeholder="Enter Subcategory Name" required>
			  </div>
	      </div>

	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Submit</button>
	      </div>
      </form>
    </div>
  </div>
</div>

@endsection