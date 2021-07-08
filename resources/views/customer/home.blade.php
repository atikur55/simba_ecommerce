@extends('layouts.dashboard')
@section('title')
Custome Home
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
          <h5 class="text-center text-primary" style="font-size:40px; margin-top:20px">Welcome to Customer Dashboard</h5>
        </div>
        <div class="col-lg-10">
          <table class="table table-striped">
            <tr>
              <th>SL</th>
              <th>Name</th>
              <th>Email</th>
              <th>Order Date</th>
              <th>Action</th>
            </tr>
            @foreach($customer_orders as $customer_order)
            <tr>
              <td>{{$customer_order->id}}</td>
              <td>{{$customer_order->fname}}</td>
              <td>{{$customer_order->email}}</td>
              <td>{{$customer_order->created_at->format('d-m-Y')}}</td>
              <td>
                <a href="{{url('order/download')}}/{{$customer_order->id}}" class="btn btn-success">Download</a>
                <a href="{{url('send/sms')}}/{{$customer_order->id}}" class="btn btn-info">Sent SMS</a>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
    </div>
</div>


@endsection
