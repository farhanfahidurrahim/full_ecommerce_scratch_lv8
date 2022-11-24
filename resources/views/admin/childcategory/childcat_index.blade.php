@extends('layouts.admin')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Childcategory</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">+ Add New</button>
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
                			<h3 class="card-title">DataTable All Childcategory</h3>
              			</div>
              			<!-- /.card-header -->
              			<div class="card-body">
			                <table id="" class="table table-bordered table-striped table-sm ytable">
								<thead>
									<tr>
										<th>SL</th>
										<th>Childcategory Name</th>
										<th>Category Name</th>
										<th>Subcategory Name</th>
										<th>Action</th>
									</tr>
								</thead>
			                </table>
			            <!-- /.card-body -->
              			</div>
          			</div>
      			</div>
  			</div>
		</div>
	</section>
</div>

<!-- Category Add New Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Childcategory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{ route('childcategory.store') }}" method="post" id="add-form">
        	@csrf
	      <div class="modal-body">
	      	  <div class="form-group">
		      	<label for="childcategory_name">Category/Subcategory Name</label>
		      	<select class="form-control" name="subcategory_id" required>
		      		<option selected disabled value="">Select Categeory/Subcategory</option>
		      		@foreach($category as $row)
			      			@php
			      				$subcat=DB::table('subcategories')->where('category_id',$row->id)->get();
			      			@endphp
		      			<option disabled style="color: Red">{{ $row->category_name }}</option>
			      			@foreach($subcat as $row)
			      				<option value="{{ $row->id }}">---{{ $row->subcategory_name }}</option>
			      			@endforeach
		      		@endforeach
		      	</select>

		      </div>

			  <div class="form-group">
			    <label for="childcategory_name">Childcategory Name</label>
			    <input type="text" name="childcategory_name" class="form-control" placeholder="Enter Childcategory Name" required>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
	$(function childcategory(){
		var table=$('.ytable').DataTable({
			processing:true,
			serverSide:true,
			ajax:"{{ route('childcategory.index') }}",
			columns:[
				{data:'DT_RowIndex',name:'DT_RowIndex'},
				{data:'childcategory_name'  ,name:'childcategory_name'},
				{data:'category_name',name:'category_name'},
				{data:'subcategory_name',name:'subcategory_name'},
				{data:'action',name:'action',orderable:true, searchable:true},
			]
		});
	});

</script>


@endsection