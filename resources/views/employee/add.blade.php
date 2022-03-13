@extends('master')
@section('title', 'Add employee')
@section('content')

<div class="container">
  <div class="row my-4 bg-secondary">
    <div class="col ml-5 h2 text-white">Add Employee</div>
    <div class="col-auto mr-5 my-auto">
      <a href="{{url('employee')}}" class="btn btn-primary">Employee list</a>
    </div>
  </div>

  @if(Session::has('error'))
    <div class="alert alert-primary mt-4 text-center" role="alert">
      {{session('error')}}
    </div>
  @endif

  <form method="post" action="{{url('employee')}}">
    @csrf
    <div class="form-group">
      <label>Employee Name</label>
      <input type="text" name="employee_name" class="form-control" placeholder="Enter employee name">
      @error('employee_name')
        <div class="alert alert-danger mt-1" role="alert">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="form-group">
      <label>Designation Name</label>
      <select class="form-control" name="designation_id">
        <option value="">Select Designation</option>
        @foreach($designations as $designation)
          <option value="{{$designation->id}}">{{$designation->designation_name}}</option>
        @endforeach
      </select>
      @error('designation_id')
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
    <div class="form-group">
      <label>Salary</label>
      <input type="text" name="salary" class="form-control" placeholder="Enter employee's salary">
      @error('salary')
        <div class="alert alert-danger mt-1" role="alert">
          {{$message}}
        </div>
      @enderror
    </div>

    <input type="submit" class="btn btn-block btn-info" value="Add Employee">
  </form>
</div>
@endsection
