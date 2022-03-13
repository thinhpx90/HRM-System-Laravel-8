@extends('master')

@section('title', 'Add Department')

@section('content')

<div class="container">
  <div class="row my-4 bg-secondary">
    <div class="col ml-5 h2 text-white">Add Department</div>
    <div class="col-auto mr-5 my-auto">
      <a href="{{url('department')}}" class="btn btn-primary">Department list</a>
    </div>
  </div>

  @if(Session::has('error'))
    <div class="alert alert-primary mt-4 text-center" role="alert">
      {{session('error')}}
    </div>
  @endif
  
  <form method="post" action="{{url('department')}}">
    @csrf
    <div class="form-group">
      <label>Department Name</label>
      <input type="text" name="department_name" class="form-control" placeholder="Enter department name">
      @error('department_name')
        <div class="alert alert-danger mt-1" role="alert">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="form-group">
      <label>Company Name</label>
      <select class="form-control" name="company_id">
        <option value="">Select Company</option>
        @foreach($companies as $company)
          <option value="{{$company->id}}">{{$company->company_name}}</option>
        @endforeach
      </select>
      @error('company_id')
        <div class="alert alert-danger mt-1" role="alert">
          {{$message}}
        </div>
      @enderror
    </div>

    <input type="submit" class="btn btn-block btn-info" value="Add Department">
  </form>
</div>
@endsection
