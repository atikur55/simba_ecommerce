@extends('layouts.dashboard')
@section('title')
Edit Category
@endsection
@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{url('home')}}">Home</a>
  <a class="breadcrumb-item" href="{{route('category.index')}}">Add Category</a>
  <span class="breadcrumb-item active">Edit Category</span>
</nav>
@endsection
@section('content')
<div class="container">
  <div class="col-lg-6 m-auto">
    <div class="card">
      @if(session('edit_success'))
        <div class="alert alert-success">
          <strong>{{session('edit_success')}}</strong>
        </div>
      @endif
      <div class="card-header">
        <h3 class="text-center text-primary">Edit Category</h3>
      </div>
      <div class="card-body">
        <form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
          {{method_field('PUT')}}
          @csrf
          <div class="form-group">
            <label>Add Category Name</label>
            <input type="text" name="category_name" class="form-control"
            value="{{$category->category_name}}">
            @error('category_name')
            <div class="alert alert-danger">
              <small>{{$message}}</small>
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label>Add Category Photo</label>
            <input type="file" name="category_photo" class="form-control">
            @error('category_photo')
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
@endsection
