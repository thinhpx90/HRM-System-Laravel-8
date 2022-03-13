@extends('master')

@section('title', 'Edit employee')

@section('content')

<div class="container">
  <div class="row my-4 bg-secondary">
    <div class="col ml-5 h2 text-white">Edit Employee</div>
    <div class="col-auto mr-5 my-auto">
      <a href="{{url('employee')}}" class="btn btn-primary">Employee list</a>
    </div>
  </div>
  <form method="post" action="{{url('employee/'.$employee->id)}}">
    @csrf
    @method('put')

    <div class="form-group">
      <label>Employee Name</label>
      <input type="text" name="employee_name" value="{{$employee->employee_name}}" class="form-control" placeholder="Enter employee name">
    </div>

    <div class="form-group">
      <label>Designation Name</label>
      <select class="form-control" name="designation_id">
        <option value="">Select Designation</option>
        @foreach($designations as $designation)
          @if($designation->id == $employee->designation_id)
            <option selected value="{{$designation->id}}">{{$designation->designation_name}}</option>
          @else
            <option value="{{$designation->id}}">{{$designation->designation_name}}</option>
          @endif
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label>Department Name</label>
      <select class="form-control" name="department_id">
        <option value="">Select Department</option>
        @foreach($departments as $department)
          @if($department->id == $employee->department_id)
            <option selected value="{{$department->id}}">{{$department->department_name}}</option>
          @else
            <option value="{{$department->id}}">{{$department->department_name}}</option>
          @endif
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label>Company Name</label>
      <select class="form-control" name="company_id">
        <option value="">Select Company</option>
        @foreach($companies as $company)
          @if($company->id == $employee->company_id)
            <option selected value="{{$company->id}}">{{$company->company_name}}</option>
          @else
            <option value="{{$company->id}}">{{$company->company_name}}</option>
          @endif
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label>Salary</label>
      <input type="text" name="salary" value="{{$employee->salary}}" class="form-control" placeholder="Enter employee's salary">
    </div>

    <input type="submit" class="btn btn-block btn-info" value="Update Employee">
  </form>
</div>
@endsection
