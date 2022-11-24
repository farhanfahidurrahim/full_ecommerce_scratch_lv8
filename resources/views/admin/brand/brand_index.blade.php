@extends('layouts.admin')
@section('admin_content')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">BRAND</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">+ Add New Brand</button>
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
                			<h3 class="card-title">All Brand List Here</h3>
              			</div>
              			<!-- /.card-header -->
              			<div class="card-body">
			                <table id="" class="table table-bordered table-striped table-sm ytable">
								<thead>
									<tr>
										<th>SL</th>
										<th>Brand Name</th>
										<th>Brand Slug</th>
										<th>Brand Logo</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									
								</tbody>
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

      <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data" id="add-form">
        	@csrf
	      <div class="modal-body">

			  <div class="form-group">
			    <label for="brand_name">Brand Name</label>
			    <input type="text" name="brand_name" class="form-control" placeholder="Enter Brand Name" required>
			  </div>
			  <div class="form-group">
			    <label for="brand_name">Brand Logo</label>
			    <input type="file" name="brand_logo" class="dropify" required>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>

<script type="text/javascript">
	$('.dropify').dropify();

</script>

<script type="text/javascript">
	$(function childcategory(){
		var table=$('.ytable').DataTable({
			processing:true,
			serverSide:true,
			ajax:"{{ route('brand.index') }}",
			columns:[
				{data:'DT_RowIndex', name:'DT_RowIndex'},
				{data:'brand_name', name:'brand_name'},
				{data:'brand_slug', name:'brand_slug'},
				{data:'brand_logo', name:'brand_logo', render: function(data,type,full,meta){
					return "<img src=\"" +data+ "\"  height=\"40\" alt='No-image found' />";
				}},
				{data:'action',name:'action',orderable:true, searchable:true},
			]
		});
	});
</script>


@endsection