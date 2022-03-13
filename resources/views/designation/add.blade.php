@extends('master')
@section('title', 'Add Designation')

@section('content')

<div class="container">
  <div class="row my-4 bg-secondary">
    <div class="col ml-5 h2 text-white">Add Designation</div>
    <div class="col-auto mr-5 my-auto">
      <a href="{{url('designation')}}" class="btn btn-primary">Designation list</a>
    </div>
  </div>

  @if(Session::has('error'))
    <div class="alert alert-primary mt-4 text-center" role="alert">
      {{session('error')}}
    </div>
  @endif

  <form method="post" action="{{url('designation')}}">
    @csrf
    <div class="form-group">
      <label>Designation Name</label>
      <input type="text" name="designation_name" class="form-control" placeholder="Enter designation name">
      @error('designation_name')
        <div class="alert alert-danger mt-1" role="alert">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="form-group">
      <label>Department Name</label>
      <select class="form-control" name="department_id">
        <option value="">Select Department</option>
        @foreach($departments as $department)
          <option value="{{$department->id}}">{{$department->department_name}}</option>
        @endforeach
      </select>
      @error('department_id')
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

    <input type="submit" class="btn btn-block btn-info" value="Add Designation">
  </form>
</div>
@endsection
