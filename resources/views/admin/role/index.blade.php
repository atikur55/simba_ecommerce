@extends('layouts.dashboard')
@section('title')
Role Management
@endsection
@section('Role Management')
active
@endsection
@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{url('home')}}">Home</a>
  <a class="breadcrumb-item" href="{{url('category.index')}}">Add Category</a>
  <!-- <span class="breadcrumb-item active">Blank Page</span> -->
</nav>
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h3>Category Table</h3>
        </div>
        <div class="card-body">
          @if(session('category_success'))
          <div class="alert alert-success">
            {{session('category_success')}}
          </div>
          @endif
          <table class="table table-striped">
            <tr>
              <th>Category Name</th>
              <th>Added By</th>
              <th>Photo</th>
              <th>Created_at</th>
              <th>Updated_at</th>
              <th>Action</th>
            </tr>
           
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
          <h3>Add Category</h3>
        </div>
        <div class="card-body">
          <form action="#" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Add Category Name</label>
              <input type="text" name="category_name" class="form-control" value="{{old('category_name')}}">
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
</div>
@endsection
