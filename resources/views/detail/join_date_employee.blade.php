@extends('master')

@section('title', 'Employee details by date')
@section('content')

<div class="container">
  <div class="row my-4 bg-secondary">
    <div class="col ml-5  h2 text-white">Employee by Date</div>
    <div class="col-auto mr-5 my-auto">
      <a href="{{url('employee')}}" class="btn btn-primary">All employee</a>
    </div>
  </div>

  <div class="mb-4">
    <form class="form-inline" action="{{url('date/filter/employee')}}" method="get">
      <label>From: </label>
      <input type="date" name="from" class="form-control mx-2">
      <label class="ml-3">To: </label>
      <input type="date" name="to" class="form-control mx-2">
      <input type="submit" class="btn btn-info" value="Search">
    </form>
  </div>


  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Serial no.</th>
        <th scope="col"  class="text-center">Company Name</th>
        <th scope="col"  class="text-center">Department Name</th>
        <th scope="col"  class="text-center">Designation Name</th>
        <th scope="col"  class="text-center">Employee Name</th>
        <th scope="col"  class="text-center">Salary</th>
        <th scope="col"  class="text-center">Join Date</th>
        <th scope="col"  class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($employees as $i=>$employee)
      <tr>
        <th scope="row">{{++$i}}</th>
        <td  class="text-center">{{$employee->company->company_name}}</td>
        <td  class="text-center">{{$employee->department->department_name}}</td>
        <td  class="text-center">{{$employee->designation->designation_name}}</td>
        <td  class="text-center">{{$employee->employee_name}}</td>
        <td  class="text-center">{{$employee->salary}}</td>
        <td  class="text-center">{{$employee->created_at->isoFormat('DD-MM-Y')}}</td>
        <td  class="text-center">
          <a href="{{url('employee/'.$employee->id.'/edit')}}" class="btn btn-sm btn-warning">Edit</a>
          <a href="{{url('employee/'.$employee->id.'/delete')}}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
