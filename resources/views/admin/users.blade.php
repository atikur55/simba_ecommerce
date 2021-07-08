@extends('layouts.dashboard')
@section('title')
All Users
@endsection
@section('users')
active
@endsection
@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{url('home')}}">Home</a>
  <a class="breadcrumb-item" href="{{url('users')}}">All Users</a>
</nav>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">
                <div class="card-header bg-secondary text-white">Welcome , {{$logged_user->name}}<span class="float-right">Total User: {{$total_user}}</span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                      <tr class="table-primary">
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Create_at</th>
                      </tr>
                      @foreach($users as $index => $user)
                      <tr class="table-secondary">
                        <td>{{$users->firstitem() + $index}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                          @if($user->role != 2)
                            Admin
                            @else
                            Customer
                          @endif
                        </td>
                        <td>{{$user->created_at->format('d-M-y h:i:s A')}}</td>
                      </tr>
                      @endforeach
                    </table>
                    <div class="float-right">
                      {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
