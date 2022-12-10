@extends('layouts.admin')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Orders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="{{ route('product.create') }}" class="btn btn-primary">+ Add New Product</a>
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
                			<h3 class="card-title">Customers Order List Here</h3>
              			</div>
              			<div class="row p-3">
              				{{-- <div class="form-group col-2">
              					<label>Catgory</label>
              					<select class="form-control submitable" name="category_id" id="category_id">
              						<option value="">All</option>
              						@foreach($category as $row)
              						<option value="{{ $row->id }}">{{ $row->category_name }}</option>
              						@endforeach
              					</select>
              				</div>
              				<div class="form-group col-2">
              					<label>Brand</label>
              					<select class="form-control submitable" name="brand_id" id="brand_id">
              						<option value="">All</option>
              						@foreach($brand as $row)
              						<option value="{{ $row->id }}">{{ $row->brand_name }}</option>
              						@endforeach
              					</select>
              				</div>
              				<div class="form-group col-2">
              					<label>Warehouse</label>
              					<select class="form-control submitable" name="warehouse" id="warehouse">
              						<option value="">All</option>
              						@foreach($warehouse as $row)
              						<option value="{{ $row->warehouse_name }}">{{ $row->warehouse_name }}</option>
              						@endforeach
              					</select>
              				</div> --}}
              				<div class="form-group col-2">
              					<label>Status Search</label>
              					<select class="form-control submitable" name="status" id="status">
	              						<option value="0">Pending</option>
	              						<option value="1">Received</option>
	              						<option value="2">Shipped</option>
	              						<option value="3">Completed</option>
	              						<option value="4">Return</option>
	              						<option value="5">Cancel</option>
              					</select>
              				</div>
              				<div class="form-group col-2">
              					<label>Payment Type Search</label>
              					<select class="form-control submitable" name="payment_type" id="payment_type">
              						<option disabled selected>All</option>
	              						<option value="Hand Cash">Handcash</option>
	              						<option value="Aamarpay">Online</option>
	              						<option value="Paypal">Paypal</option>
              					</select>
              				</div>
              				<div class="form-group col-2">
              					<label>Date Search</label>
              					<input type="date" name="date" id="date" class="form-control submitable_input">
              				</div>
              			</div>
              			<!-- /.card-header -->
              			<div class="card-body">
			                <table id="" class="table table-bordered table-striped table-sm ytable">
								<thead>
									<tr>
										<th>SL</th>
										<th>Name</th>
										<th>Phone</th>
										<th>Email</th>
										<th>Total</th>
										<th>Payment Type</th>
										<th>Date</th>
										<th>Status</th>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
	//Without Filter
	// $(function products(){
	// 	table=$('.ytable').DataTable({
	// 		processing:true,
	// 		serverSide:true,
			//ajax:"{ { route('product.index') }}",
	// 		columns:[
	// 			{data:'DT_RowIndex', name:'DT_RowIndex'},
	// 			{data:'thumbnail', name:'thumbnail'},
	// 			{data:'name', name:'name'},
	// 			{data:'code', name:'code'},
	// 			{data:'category_name', name:'category_name'},
	// 			{data:'subcategory_name', name:'subcategory_name'},
	// 			{data:'brand_name', name:'brand_name'},
	// 			{data:'featured', name:'featured'},
	// 			{data:'today_deal', name:'today_deal'},
	// 			{data:'status', name:'status'},
	// 			{data:'action', name:'action', orderable:true, searchable:true},
	// 		]
	// 	});
	// });

	//With Filter
	$(function products(){
		table=$('.ytable').DataTable({
			"processing":true,
      		"serverSide":true,
      		"searching":true,
      		"ajax":{
        		"url": "{{ route('admin.order.index') }}", 
        		"data":function(e) {
          			e.status =$("#status").val();
          			e.date =$("#date").val();
          			e.payment_type =$("#payment_type").val();
        		}
      		},
			columns:[
				{data:'DT_RowIndex',name:'DT_RowIndex'},
				{data:'c_name'  ,name:'c_name'},
				{data:'c_phone'  ,name:'c_phone'},
				{data:'c_email'  ,name:'c_email'},
				// {data:'subtotal',name:'subtotal'},
				{data:'total',name:'total'},
				{data:'payment_type',name:'payment_type'},
				{data:'date',name:'date'},
				{data:'status',name:'status'},
				{data:'action',name:'action',orderable:true, searchable:true},
			]
		});
	});

	//filter search : class="submitable" call for Status
	$(document).on('change','.submitable', function(){
		$('.ytable').DataTable().ajax.reload();
	});

	//filter search : class="submitable" call for Payment Type
	$(document).on('change','.submitable', function(){
		$('.ytable').DataTable().ajax.reload();
	});

	//filter search : class="submitable_input" call for Date
	$(document).on('blur','.submitable_input', function(){
		$('.ytable').DataTable().ajax.reload();
	});

    //deactive Status
	$('body').on('click','.deactive_status', function(){
	    var id=$(this).data('id');
		var url = "{{ url('product/not-status') }}/"+id;
		$.ajax({
			url:url,
			type:'get',
			success:function(data){  
	        toastr.success(data);
	        table.ajax.reload();
	      }
	  	});
    });
    //active Status
	$('body').on('click','.active_status', function(){
	    var id=$(this).data('id');
		var url = "{{ url('product/yes-status') }}/"+id;
		$.ajax({
			url:url,
			type:'get',
			success:function(data){  
	        toastr.success(data);
	        table.ajax.reload();
	      }
	  	});
    });

</script>

@endsection