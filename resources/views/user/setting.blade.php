@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('user.sidebar')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Dashboard') }}
                    <a href="#" style="float:right;"><i class="fas fa-pencil-alt"></i> Write a review</a>
                </div>

                <div class="card-body">
                   <h4>Change Your Password</h4><br>
                   <div>
                   	  <form action="{{ route('customer.passwordchange') }}" method="post">
                   	  	@csrf
                   	    <div class="form-group">
                   	      <label for="exampleInputEmail1">Old Password</label>
                   	      <input type="password" class="form-control" name="old_password" placeholder="Type Current Password" required>
                   	    </div>
                   	    <div class="form-group">
                   	      <label for="exampleInputPassword1">New Password</label>
                   	      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Type New Password" required>
                   	      	@error('password')
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $message }}</strong>
		                    </span>
		                	@enderror
                   	    </div>
                   	    <div>
                   	    	<label for="exampleInputPassword1">Confirm Password</label>
                   	    	<input type="password" class="form-control" name="password_confirmation" placeholder="Re-type Password" required>
                   	    </div><br>
                   	    <button type="submit" class="btn btn-primary">Change Password</button>
                   	  </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div><hr>
@endsection