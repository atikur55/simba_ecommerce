@extends('layouts.dashboard')
@section('title')
View Category
@endsection
@section('category')
active
@endsection
@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{url('home')}}">Home</a>
 <!--  <a class="breadcrumb-item" href="{{url('category.index')}}">Add Category</a> -->
  <span class="breadcrumb-item active">View Category</span>
</nav>
@endsection
@section('content')
<div class="container">
  <div class="col-lg-6 m-auto">
    <div class="card">
     <!--  @if(session('edit_success'))
        <div class="alert alert-success">
          <strong>{{session('edit_success')}}</strong>
        </div>
      @endif -->
      <div class="card-header">
        <h3 class="text-center text-primary">View Category</h3>
      </div>
      <div class="card-body">
        <table class="table table-striped">
        	<tr>
        		<th>Category Photo</th>
        		<td><img src="{{asset('uploads/category/')}}/{{$category->category_photo}}" alt="" width="100px"></td>
        	</tr>
        	<tr>
        		<th>Category Name</th>
        		<td>{{$category->category_name}}</td>
        	</tr>
        	<tr>
        		<th>Category Photo</th>
        		<td>{{$category->connect_to_users_table->name}}</td>
        	</tr>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection