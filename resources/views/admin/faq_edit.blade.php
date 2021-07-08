@extends('layouts.dashboard')
@section('title')
Faq Edit
@endsection
@section('breadcrumb')
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{url('home')}}">Home</a>
    <a class="breadcrumb-item" href="{{url('addfaq')}}">Add Faq</a>
    <a class="breadcrumb-item" href="{{url('faq_edit')}}">Faq Edit</a>
    <!-- <span class="breadcrumb-item active">Blank Page</span> -->
  </nav>
@endsection

@section('content')


<div class="container">
  <div class="row">

    <div class="col-md-6 m-auto">
      <div class="card">
        @if(session('update_success'))
        <div class="alert alert-success">
          {{session('update_success')}}
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
          <h3> Edit FAQ Page</h3>
        </div>
        <div class="card-body">
          <form action="{{url('faq_edit_post')}}" method="post">
            @csrf
            <div class="form-group">
              <label>Add Faq Question</label>
              <input type="hidden" name="faq_id" class="form-control" value="{{$faq_edit->id}}">
              <input type="text" name="faq_question" class="form-control" value="{{$faq_edit->faq_question}}">
              @error('faq_question')
              <div class="alert alert-danger">
                <small>{{$message}}</small>
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label>Add Faq Answer</label>
              <input type="text" name="faq_answer" class="form-control" value="{{$faq_edit->faq_answer}}">
              @error('faq_answer')
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
