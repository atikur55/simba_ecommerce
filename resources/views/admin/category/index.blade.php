@extends('layouts.dashboard')
@section('title')
Add Category
@endsection
@section('category')
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
            @forelse($categories as $category)
            <tr>
              <td>{{$category->category_name}}</td>
              <td>{{$category->connect_to_users_table->name}}</td>
              <td><img src="{{asset('uploads/category/')}}/{{$category->category_photo}}" alt="" width="50px"></td>
              <td>
                @if(isset($category->created_at))
                {{$category->created_at->format('d/m/y h:i:s A')}}
                @else
                -
                @endif
              </td>
              <td>
                @if(isset($category->updated_at))
                {{$category->updated_at->diffForHumans()}}
                @else
                -
                @endif
              </td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{route('category.edit',$category->id)}}" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                  <a href="{{route('category.show',$category->id)}}" class="btn btn-dark"><i class="fa fa-eye" aria-hidden="true"></i></a>
                  <form action="{{route('category.destroy',$category->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                  </form>
                </div>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="2" class="text-center">No Data Available</td>
            </tr>
            @endforelse
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
          <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
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
