@extends('layouts.admin')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product</h1>
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
                			<h3 class="card-title">All Product List Here</h3>
              			</div>
              			<div class="row p-3">
              				<div class="form-group col-2">
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
              				</div>
              			</div>
              			<!-- /.card-header -->
              			<div class="card-body">
			                <table id="" class="table table-bordered table-striped table-sm ytable">
								<thead>
									<tr>
										<th>SL</th>
										<th>Thumbnail</th>
										<th>Name</th>
										<th>Code</th>
										<th>Category</th>
										<th>Subcategory</th>
										<th>Brand</th>
										<th>Featured</th>
										<th>Today Deal</th>
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
        		"url": "{{ route('product.index') }}", 
        		"data":function(e) {
          			e.category_id =$("#category_id").val();
          			e.brand_id =$("#brand_id").val();
          			e.warehouse =$("#warehouse").val();
        		}
      		},
			columns:[
				{data:'DT_RowIndex',name:'DT_RowIndex'},
				{data:'thumbnail'  ,name:'thumbnail'},
				{data:'name'  ,name:'name'},
				{data:'code'  ,name:'code'},
				{data:'category_name',name:'category_name'},
				{data:'subcategory_name',name:'subcategory_name'},
				{data:'brand_name',name:'brand_name'},
				{data:'featured',name:'featured'},
				{data:'today_deal',name:'today_deal'},
				{data:'status',name:'status'},
				{data:'action',name:'action',orderable:true, searchable:true},
			]
		});
	});

	//filter search : submitable class call  
	$(document).on('change','.submitable', function(){
		$('.ytable').DataTable().ajax.reload();
	});

	//deactive featured
	$('body').on('click','.deactive_featured', function(){
	    var id=$(this).data('id');
		var url = "{{ url('product/not-featured') }}/"+id;
		$.ajax({
			url:url,
			type:'get',
			success:function(data){  
	        toastr.success(data);
	        table.ajax.reload();
	      }
	  	});
    });
    //active featured
	$('body').on('click','.active_featured', function(){
	    var id=$(this).data('id');
		var url = "{{ url('product/yes-featured') }}/"+id;
		$.ajax({
			url:url,
			type:'get',
			success:function(data){  
	        toastr.success(data);
	        table.ajax.reload();
	      }
	  	});
    });

    //deactive Today Deal
	$('body').on('click','.deactive_deal', function(){
	    var id=$(this).data('id');
		var url = "{{ url('product/not-deal') }}/"+id;
		$.ajax({
			url:url,
			type:'get',
			success:function(data){  
	        toastr.success(data);
	        table.ajax.reload();
	      }
	  	});
    });
    //active Today Deal
	$('body').on('click','.active_deal', function(){
	    var id=$(this).data('id');
		var url = "{{ url('product/yes-deal') }}/"+id;
		$.ajax({
			url:url,
			type:'get',
			success:function(data){  
	        toastr.success(data);
	        table.ajax.reload();
	      }
	  	});
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