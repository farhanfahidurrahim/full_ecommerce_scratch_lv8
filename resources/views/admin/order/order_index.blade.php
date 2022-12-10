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
              				<div class="form-group col-2">
              					<label>Status Search</label>
              					<select class="form-control submitable" name="status" id="status">
              						<option >All</option>
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

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Order Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div id="modal_body">
        
     </div> 
    </div>
  </div>
</div>
<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div id="view_modal_body">
        
     </div> 
    </div>
  </div>
</div>
<!-- End Modal -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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

	//order edit
	$('body').on('click','.edit', function(){
	    var id=$(this).data('id');
		var url = "{{ url('orders/admin/edit') }}/"+id;
		$.ajax({
			url:url,
			type:'get',
			success:function(data){  
	         $("#modal_body").html(data);
	      }
	  });
    });

	//filter search : class="submitable" call for every change
	$(document).on('change','.submitable', function(){
		$('.ytable').DataTable().ajax.reload();
	});

	//filter search : class="submitable_input" call for Date
	$(document).on('blur','.submitable_input', function(){
		$('.ytable').DataTable().ajax.reload();
	});


</script>

@endsection