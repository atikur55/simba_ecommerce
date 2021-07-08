@extends('layouts.dashboard')
@section('title')
Home
@endsection
@section('home')
active
@endsection
@section('breadcrumb')
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{url('home')}}">Home</a>
    <!-- <a class="breadcrumb-item" href="{{url('addfaq')}}">Add Faq</a>
    <a class="breadcrumb-item" href="{{url('faq_edit')}}">Faq Edit</a>
    <span class="breadcrumb-item active">Blank Page</span> -->
  </nav>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
          <h5 class="text-center text-primary" style="font-size:40px; margin-top:20px">Welcome to Admin Panel</h5>
          <h6 class="text-center text-success" style="font-size:25px">Congratulations! {{$logged_user->name}}</h6>            
        </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header user">
            <h3>Total Users</h3>
          </div>
          <div class="card-body count">
            <p>{{$total_user}}</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card">
          <div class="card-header user">
            <h3>Total Category</h3>
          </div>
          <div class="card-body count">
            <p>{{$categories}}</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card">
          <div class="card-header user">
            <h3>Total Post</h3>
          </div>
          <div class="card-body count">
            <p>{{$products}}</p>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
@section('css_code')
<style type="text/css">
  .user{
    background-color: #2B333E;
  }
  .user h3{
    font-size: 18px;
    text-align: center;
    font-family: sans-serif;
    color: #fff;
    margin: 3px  0 0 0;
  }
  .count{
    background-color: #FEE;
  }
  .count p{
    text-align: center;
    font-size: 25px;
    color: #2B333E;
    margin: 0px;
    padding:0px;
  }
</style>
@endsection
