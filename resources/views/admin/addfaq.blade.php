@extends('layouts.dashboard')
@section('title')
Add Faq
@endsection
@section('addfaq')
active
@endsection
@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{url('home')}}">Home</a>
  <a class="breadcrumb-item" href="{{url('addfaq')}}">Addfaq</a>
  <!-- <span class="breadcrumb-item active">Blank Page</span> -->
</nav>
@endsection
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h3>FAQ</h3>
        </div>
        <div class="card-body">
          @if(session('trash_success'))
          <div class="alert alert-success">
            {{session('trash_success')}}
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
            @forelse($faqs as $faq)
            <tr>
              <td>{{$faq->faq_question}}</td>
              @php
              $value = $faq->faq_answer;
              @endphp
              <td>{{\Illuminate\Support\str::limit($value,30,'....')}}</td>
              <td>{{$faq->created_at->format('d/m/y h:i:s A')}}</td>
              <td>
                @if(isset($faq->updated_at))
                {{$faq->updated_at->diffForHumans()}}
                @else
                -
                @endif
              </td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{url('faq_edit')}}/{{$faq->id}}" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                  <a href="{{url('faq_delete')}}/{{$faq->id}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
            @forelse($trashed_faqs as $faq)
            <tr>
              <td>{{$faq->faq_question}}</td>
              @php
              $value = $faq->faq_answer;
              @endphp
              <td>{{\Illuminate\Support\str::limit($value,30,'....')}}</td>
              <td>{{$faq->created_at->format('d/m/y h:i:s A')}}</td>
              <td>
                @if(isset($faq->updated_at))
                {{$faq->updated_at->diffForHumans()}}
                @else
                -
                @endif
              </td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{url('faq_restore')}}/{{$faq->id}}" class="btn btn-secondary"><i class="fa fa-undo" aria-hidden="true"></i></a>
                  <a href="{{url('faq_force_delete')}}/{{$faq->id}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
          {{session('success')}}
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
          <h3>FAQ Question</h3>
        </div>
        <div class="card-body">
          <form action="{{url('addfaqpost')}}" method="post">
            @csrf
            <div class="form-group">
              <label>Add Faq Question</label>
              <input type="text" name="faq_question" class="form-control" value="{{old('faq_question')}}">
              @error('faq_question')
              <div class="alert alert-danger">
                <small>{{$message}}</small>
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label>Add Faq Answer</label>
              <input type="text" name="faq_answer" class="form-control" value="{{old('faq_answer')}}">
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
