@extends('layouts.dashboard')
@section('title')
Add Product
@endsection
@section('product')
active
@endsection
@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{url('home')}}">Home</a>
  <!-- <a class="breadcrumb-item" href="{{url('addfaq')}}">A</a> -->
  <span class="breadcrumb-item active">Add Product</span>
</nav>
@endsection
@section('content')

<div class="div">
  <div class="row">
    <div class="col-lg-9">
      <div class="card">
        <div class="card-header">
          <h3>Product</h3>
        </div>
        <div class="card-body">
          @if(session('trash_success'))
          <div class="alert alert-success">
            {{session('trash_success')}}
          </div>
          @endif
          <table class="table table-striped">
            <tr>
              <th>Product Name</th>
              <th>Product Price</th>
              <!-- <th>Product Short Description</th>
              <th>Product Long Description</th> -->
            <!--   <th>Category</th> -->
              <th>Product Thumbnail</th>
              <!-- <th>Product Multiple</th> -->
              <th>Created_at</th>
              <th>Updated_at</th>
              <th>Action</th>
            </tr>
            @foreach($products as $product)
              <tr>
                <td>{{$product->product_name}}</td>
                <td>{{$product->product_price}}</td>
                <!-- <td>{{$product->product_short_description}}</td>
                <td>{{$product->product_long_description}}</td> -->
                <!-- <td>{{$product->connect_category_name->category_name}}</td> -->
                <td> <img src="{{asset('uploads/product/')}}/{{$product->product_thumbnail_photo}}" alt="" width="100px" height="100px"><br>
                  <div class="row">
                    @foreach($product->get_multiple_photo as $multiple)
                    <div class="col-md-4 my-1">
                      <img src="{{asset('uploads/product/product-details')}}/{{$multiple->product_multiple_photo_name}}" alt="" width="50px">
                    </div>
                    @endforeach
                  </div>
                 </td>
                <!-- <td>
                  @foreach($product->get_multiple_photo as $multiple)
                  <img src="{{asset('uploads/product/product-details')}}/{{$multiple->product_multiple_photo_name}}" alt="" width="50px"><br>
                  @endforeach
                </td> -->
                <td>
                  @if(isset($product->created_at))
                    {{$product->created_at->format('d/m/y h:i:s A')}}
                  @else
                  -
                  @endif
                </td>
                <td>
                  @if(isset($product->created_at))
                    {{$product->created_at->format('d/m/y h:i:s A')}}
                  @else
                  -
                  @endif
                </td>
                <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="#" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a href="{{route('product.create',$product->id)}}" class="btn btn-dark"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    <a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                  </div>
                </td>
              </tr>
            @endforeach

          </table>
        </div>
      </div>

      <div class="card mt-5">
        <div class="card-header">
          <h3>Trashed FAQ</h3>
        </div>
        <div class="card-body">
          @if(session('delete_success'))
          <div class="alert alert-success">
            {{session('delete_success')}}
          </div>
          @endif
          <table class="table table-striped">
            <tr>
              <th>FAQ Question</th>
              <th>FAQ Answer</th>
              <th>Created_at</th>
              <th>Updated_at</th>
              <th>Action</th>
            </tr>

          </table>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="card">
        @if(session('product_success'))
        <div class="alert alert-success">
          {{session('product_success')}}
        </div>
        @endif
        <!-- @if($errors->all())
          <div class="alert">
            @foreach($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </div>
        @endif -->
        <div class="card-header">
          <h3>Add Product</h3>
        </div>
        <div class="card-body">
          <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Product Category Name</label>
              <select class="form-control" name="category_id">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
              </select>
              @error('faq_question')
              <div class="alert alert-danger">
                <small>{{$message}}</small>
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label>Add Product Name</label>
              <input type="text" name="product_name" class="form-control" value="{{old('product_name')}}">
              @error('product_name')
              <div class="alert alert-danger">
                <small>{{$message}}</small>
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label>Add Product Price</label>
              <input type="text" name="product_price" class="form-control" value="{{old('product_price')}}">
              @error('product_price')
              <div class="alert alert-danger">
                <small>{{$message}}</small>
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label>Add Product Short Description</label>
              <!-- <input type="text" name="product_price" class="form-control" value="{{old('product_price')}}"> -->
              <textarea name="product_short_description" rows="3" cols="10" class="form-control" value ="{{old('product_short_description')}}"></textarea>
              @error('product_short_description')
              <div class="alert alert-danger">
                <small>{{$message}}</small>
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label>Add Product Long Description</label>
              <!-- <input type="text" name="product_price" class="form-control" value="{{old('product_price')}}"> -->
              <textarea name="product_long_description" rows="4" cols="12" class="form-control" value ="{{old('product_long_description')}}"></textarea>
              @error('product_long_description')
              <div class="alert alert-danger">
                <small>{{$message}}</small>
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label>Product Quantity</label>
              <input type="text" name="quantity" class="form-control" value="{{old('quantity')}}">
              
              @error('quantity')
              <div class="alert alert-danger">
                <small>{{$message}}</small>
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label>Add Product Thumbnail Photo</label>
              <input type="file" name="product_thumbnail_photo" class="form-control" value="{{old('product_thumbnail_photo')}}">
              @error('product_thumbnail_photo')
              <div class="alert alert-danger">
                <small>{{$message}}</small>
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label>Add Product Multiple Photo</label>
              <input type="file" name="product_multiple_photo[]" class="form-control" value="{{old('product_thumbnail_photo')}}" multiple>
              @error('product_multiple_photo')
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
