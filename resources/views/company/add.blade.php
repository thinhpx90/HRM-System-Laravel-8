@extends('master')

@section('title', 'Add Company')

@section('content')

<div class="container">
  <div class="row my-4 bg-secondary">
    <div class="col ml-5 h2 text-white">Add Company</div>
    <div class="col-auto mr-5 my-auto">
      <a href="{{url('company')}}" class="btn btn-primary">Company list</a>
    </div>
  </div>
  <form method="post" action="{{url('company')}}">
    @csrf
    <div class="form-group">
      <label>Company Name</label>
      <input type="text" name="company_name" class="form-control" placeholder="Enter company name">
      @error('company_name')
        <div class="alert alert-danger mt-1" role="alert">
          {{$message}}
        </div>
      @enderror
    </div>

    <input type="submit" class="btn btn-block btn-info" value="Add Company">
  </form>
</div>
@endsection
