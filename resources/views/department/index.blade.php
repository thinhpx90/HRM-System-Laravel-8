@extends('master')
@section('title', 'All Departments')

@section('content')

<div class="container">
  <div class="row my-4 bg-secondary">
    <div class="col ml-5  h2 text-white">Department</div>
    <div class="col-auto mr-5 my-auto">
      <a href="{{url('department/create')}}" class="btn btn-primary">Add Department</a>
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
        <th scope="col"  class="text-center">Department Name</th>
        <th scope="col"  class="text-center">Company Name</th>
        <th scope="col"  class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($departments as $i=>$department)
      <tr>
        <th scope="row">{{++$i}}</th>
        <td  class="text-center">{{$department->department_name}}</td>
        <td  class="text-center">{{$department->company->company_name}}</td>
        <td  class="text-center">
          <a href="{{url('department/'.$department->id.'/edit')}}" class="btn btn-sm btn-warning">Edit</a>
          @if($department->status == 1)
            <a href="{{url('department/status/0/'.$department->id)}}" class="btn btn-sm btn-primary">Active</a>
          @elseif($department->status == 0)
            <a href="{{url('department/status/1/'.$department->id)}}" class="btn btn-sm btn-warning">Deactive</a>
          @endif
          <a href="{{url('department/'.$department->id.'/delete')}}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
