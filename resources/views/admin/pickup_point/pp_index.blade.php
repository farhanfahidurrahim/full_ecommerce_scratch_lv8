@extends('layouts.admin')

@section('admin_content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pickup Point</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <button class="btn btn-primary" data-toggle="modal" data-target="#addModal"> + Add New</button>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pickup-Point list </h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table  class="table table-bordered table-striped table-sm ytable">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Pickup Point Name</th>
                      <th>Pickup Point Address</th>
                      <th>Pickup Point Phone</th>
                      <th>Pickup Point Phone(Two)</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

  
                    </tbody>
                  </table>
                </div>
	          </div>
	      </div>
	  </div>
	</div>
</section>
</div>

{{-- Add Modal --}}
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Coupon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form action="{{ route('coupon.store') }}"  method="Post" id="add_form">
      @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="coupon_code">Coupon Code</label>
            <input type="text" class="form-control"  name="coupon_code" required="" placeholder="Coupon Code">
          </div>     
          <div class="form-group">
            <label for="type">Coupon Type</label>
            <select class="form-control" name="type" required>
            	<option selected disabled value="">Please Select Type</option>
            	<option value="1">Fixed</option>
            	<option value="2">Percentage</option>
            </select>
          </div>
          <div class="form-group">
            <label for="coupon_amount">Coupon Amount</label>
            <input type="text" class="form-control"  name="coupon_amount" required="" placeholder="Coupon Amount">
          </div>
          <div class="form-group">
            <label for="valid_date">Valid Date</label>
            <input type="date" class="form-control"  name="valid_date" required="">
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status">
            	<option value="Active">Active</option>
            	<option value="Inactive">Inactive</option>
            </select>
          </div> 
      </div>
       <div class="modal-footer">
        <button type="Submit" class="btn btn-primary"><span class="loading d-none">Loading....</span>Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

{{-- edit modal --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Warehouse</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div id="modal_body">
     		
     </div>	
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
			ajax:"{{ route('pickuppoint.index') }}",
			columns:[
				{data:'DT_RowIndex', name:'DT_RowIndex'},
				{data:'pickup_point_name', name:'pickup_point_name'},
				{data:'pickup_point_address', name:'pickup_point_addres'},
				{data:'pickup_point_phone', name:'pickup_point_phone'},
				{data:'pickup_point_phone_two', name:'pickup_point_phone_two'},
				{data:'action', name:'action', orderable:true, searchable:true},
			]
		});
	});

	//Store Add New with Ajax Call
	$('#add_form').submit(function(e){
		e.preventDefault();
		$('.loading').removeClass('d-none');
		var url = $(this).attr('action');
		var request =$(this).serialize();
		$.ajax({
		  url:url,
		  type:'post',
		  async:false,
		  data:request,
		  success:function(data){
		    toastr.success(data);
		    $('#add_form')[0].reset();
		    $('.loading').addClass('d-none');
		    $('#addModal').modal('hide');
		    table.ajax.reload();
		  }
		});
	});

</script>

@endsection