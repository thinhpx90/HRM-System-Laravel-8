@extends('master')
@section('title', 'Edit Company')

@section('content')

<div class="container">
  <div class="row my-4 bg-secondary">
    <div class="col ml-5 h2 text-white">Edit Company</div>
    <div class="col-auto mr-5 my-auto">
      <a href="{{url('company')}}" class="btn btn-primary">Company list</a>
    </div>
  </div>
  <form method="post" action="{{url('company/'.$company->id)}}">
    @csrf
    @method('put')
    <div class="form-group">
      <label>Company Name</label>
      <input type="text" name="company_name" value="{{$company->company_name}}" class="form-control" placeholder="Enter company name">
    </div>

    <input type="submit" class="btn btn-block btn-info" value="Update Company">
  </form>
</div>
@endsection
