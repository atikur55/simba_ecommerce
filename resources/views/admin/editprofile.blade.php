@extends('layouts.dashboard')
@section('title')
Edit Profile
@endsection
@section('breadcrumb')
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{url('home')}}">Home</a>
    <a class="breadcrumb-item" href="{{url('editprofile')}}">Edit Profile</a>

    <!-- <span class="breadcrumb-item active">Blank Page</span> -->
  </nav>
@endsection
@section('content')


<div class="container">
  <div class="row">

    <div class="col-md-6 m-auto">
      <div class="card">
        @if(session('editerror'))
        <div class="alert alert-danger">
          {{session('editerror')}}
        </div>
        @endif
        @if(session('editsuccess'))
        <div class="alert alert-success">
          {{session('editsuccess')}}
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
          <h3> Edit Profile</h3>
        </div>
        <div class="card-body">
          <form action="{{url('editprofilepost')}}" method="post">
            @csrf
            <div class="form-group">
              <label>Old Password</label>
              <input type="password" name="old_password" class="form-control">
              @error('old_password')
              <div class="alert alert-danger">
                <small>{{$message}}</small>
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label>New Password</label>
              <input type="password" name="password" class="form-control">
              @error('password')
              <div class="alert alert-danger">
                <small>{{$message}}</small>
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label>Confirm New Password</label>
              <input type="password" name="password_confirmation" class="form-control">
              @error('password_confirmation')
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
