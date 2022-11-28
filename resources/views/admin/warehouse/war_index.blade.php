@extends('layouts.admin')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Warehouse</h1>
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
                			<h3 class="card-title">DataTable All Warehouse</h3>
              			</div>
              			<!-- /.card-header -->
              			<div class="card-body">
			                <table class="table table-bordered table-striped table-sm ytable">
								<thead>
									<tr>
										<th>SL</th>
										<th>Warehouse Name</th>
										<th>Warehouse Address</th>
										<th>Warehouse Phone</th>
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

<!-- Warehouse Add New Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Warehouse</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{ route('warehouse.store') }}" method="post" id="add-form">
        	@csrf
	      <div class="modal-body">
			  <div class="form-group">
			    <label for="childcategory_name">Warehouse Name</label>
			    <input type="text" name="warehouse_name" class="form-control" placeholder="Enter Warehouse Name" required>
			  </div>
			  <div class="form-group">
			    <label for="childcategory_name">Warehouse Address</label>
			    <input type="text" name="warehouse_address" class="form-control" placeholder="Enter Warehouse Address" required>
			  </div>
			  <div class="form-group">
			    <label for="childcategory_name">Warehouse Phone</label>
			    <input type="text" name="warehouse_phone" class="form-control" placeholder="Enter Warehouse Phone" required>
			  </div>
	      </div>

	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary"><span class="d-none loader">Loader...</span><span class="submit_btn">Submit</span></button>
	      </div>
      </form>
    </div>
  </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
	//Yajra DataTable
	$(function childcategory(){
		var table=$('.ytable').DataTable({
			processing:true,
			serverSide:true,
			ajax:"{{ route('warehouse.index') }}",
			columns:[
				{data:'DT_RowIndex',name:'DT_RowIndex'},
				{data:'warehouse_name'  ,name:'warehouse_name'},
				{data:'warehouse_address',name:'warehouse_address'},
				{data:'warehouse_phone',name:'warehouse_phone'},
				{data:'action',name:'action',orderable:true, searchable:true},
			]
		});
	});

	//form submit
	$('#add-form').on('submit',function(){
	  $('.loader').removeClass('d-none');
	  $('.submit_btn').addClass('d-none');
	});

</script>


@endsection