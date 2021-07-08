@extends('layouts.dashboard')
@section('title')
Add Coupon
@endsection
@section('coupon')
active
@endsection
@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{url('home')}}">Home</a>
  <!-- <a class="breadcrumb-item" href="{{url('category.index')}}">Add Category</a> -->
  <span class="breadcrumb-item active">Add Coupon</span>
</nav>
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h3>Coupon Table</h3>
        </div>
        <div class="card-body">
          @if(session('category_success'))
          <div class="alert alert-success">
            {{session('category_success')}}
          </div>
          @endif
          <table class="table table-striped">
            <tr>
              <th>Coupon Name</th>
              <th>Discount</th>
              <th>Validity Date</th>
              <th>Status</th>
              <th>Validity Days</th>
              <th>Created_at</th>
              <th>Updated_at</th>
              <th>Action</th>
            </tr>
            @foreach($all_coupons as $coupon)
            	<tr>
            		<td>{{$coupon->coupon_name}}</td>
            		<td>{{$coupon->discount_amount}}</td>
            		<td>{{$coupon->validity_date}}</td>
            		<td>
            			@if($coupon->validity_date >= \Carbon\Carbon::now()->format('Y-m-d'))
            			<span class="badge badge-success">Active</span>
            			@else
            			<span class="badge badge-secondary">Expired</span>
            			@endif
            		</td>
                <td>
                  @if($coupon->validity_date >= \Carbon\Carbon::now()->format('Y-m-d'))
                    {{\Carbon\Carbon::parse($coupon->validity_date)->diffInDays(\Carbon\Carbon::now()->format('Y-m-d'))}} Days Left
                  @else
                  Expired {{\Carbon\Carbon::parse($coupon->validity_date)->diffInDays(\Carbon\Carbon::now()->format('Y-m-d'))}} Days ago
                  @endif
                </td>
            		<td>
            			@if(isset($coupon->created_at))
            			{{$coupon->created_at->format('d-m-y')}}
            			@endif
            		</td>
            		<td>
            			@if(isset($coupon->updated_at))
            			{{$coupon->updated_at->diffForHumans()}}
            			@endif
            		</td>
            		<td>
            			 <div class="btn-group" role="group" aria-label="Basic example">
                  			<a href="#" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
		                  <a href="#" class="btn btn-dark"><i class="fa fa-eye" aria-hidden="true"></i></a>
		                  <a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
		                </div>
            		</td>
            	</tr>
            @endforeach
            
          </table>
        </div>
      </div>


    </div>
    <div class="col-md-4">
      <div class="card">
        @if(session('success'))
        <div class="alert alert-success">
          <strong>{{session('success')}}</strong>
        </div>
        @endif
        <div class="card-header">
          <h3>Add Coupon</h3>
        </div>
        <div class="card-body">
          <form action="{{route('coupon.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Add Coupon Name</label>
              <input type="text" name="coupon_name" class="form-control" value="{{old('coupon_name')}}">
              @error('coupon_name')
              <div class="alert alert-danger">
                <small>{{$message}}</small>
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label>Discount %</label>
              <input type="text" name="discount_amount" class="form-control" value="{{old('discount_amount')}}">
              @error('discount_amount')
              <div class="alert alert-danger">
                <small>{{$message}}</small>
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label>Discount Validity Date</label>
              <input type="date" name="validity_date" class="form-control" value="{{old('validity_date')}}">
              @error('validity_date')
              <div class="alert alert-danger">
                <small>{{$message}}</small>
              </div>
              @enderror
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection