@extends('master')

@section('title', 'All employees')

@section('content')

<div class="container">
  <div class="row my-4 bg-secondary">
    <div class="col ml-5  h2 text-white">Employee</div>
    <div class="col-auto mr-5 my-auto">
      <a href="{{url('employee/create')}}" class="btn btn-primary">Add Employee</a>
    </div>
  </div>

  @if(Session::has('message'))
    <div class="alert alert-primary mt-4 text-center" role="alert">
      {{session('message')}}
    </div>
  @endif

  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Serial no.</th>
        <th scope="col"  class="text-center">Company Name</th>
        <th scope="col"  class="text-center">Department Name</th>
        <th scope="col"  class="text-center">Designation Name</th>
        <th scope="col"  class="text-center">Employee Name</th>
        <th scope="col"  class="text-center">Salary</th>
        <th scope="col"  class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($employees as $i=>$employee)
      <tr>
        <th scope="row">{{++$i}}</th>
        <td  class="text-center"><a href="{{url('company/'.$employee->company_id.'/employee')}}">{{$employee->company->company_name}}</a></td>
        <td  class="text-center"><a href="{{url('department/'.$employee->department_id.'/employee')}}">{{$employee->department->department_name}}</a></td>
        <td  class="text-center"><a href="{{url('designation/'.$employee->designation_id.'/employee')}}">{{$employee->designation->designation_name}}</a></td>
        <td  class="text-center">{{$employee->employee_name}}</td>
        <td  class="text-center">{{$employee->salary}}</td>
        <td  class="text-center">
          <a href="{{url('employee/'.$employee->id.'/edit')}}" class="btn btn-sm btn-warning">Edit</a>
          @if($employee->status == 1)
            <a href="{{url('employee/status/0/'.$employee->id)}}" class="btn btn-sm btn-primary">Active</a>
          @elseif($employee->status == 0)
            <a href="{{url('employee/status/1/'.$employee->id)}}" class="btn btn-sm btn-warning">Deactive</a>
          @endif
          <a href="{{url('employee/'.$employee->id.'/delete')}}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
