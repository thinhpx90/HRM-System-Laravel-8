@extends('master')
@section('title', 'All Designations')

@section('content')

<div class="container">
  <div class="row my-4 bg-secondary">
    <div class="col ml-5  h2 text-white">Designation</div>
    <div class="col-auto mr-5 my-auto">
      <a href="{{url('designation/create')}}" class="btn btn-primary">Add Designation</a>
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
        <th scope="col"  class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($designations as $i=>$designation)
      <tr>
        <th scope="row">{{++$i}}</th>
        <td  class="text-center">{{$designation->company->company_name}}</td>
        <td  class="text-center">{{$designation->department->department_name}}</td>
        <td  class="text-center">{{$designation->designation_name}}</td>
        <td  class="text-center">
          <a href="{{url('designation/'.$designation->id.'/edit')}}" class="btn btn-sm btn-warning">Edit</a>
          @if($designation->status == 1)
            <a href="{{url('designation/status/0/'.$designation->id)}}" class="btn btn-sm btn-primary">Active</a>
          @elseif($designation->status == 0)
            <a href="{{url('designation/status/1/'.$designation->id)}}" class="btn btn-sm btn-warning">Deactive</a>
          @endif
          <a href="{{url('designation/'.$designation->id.'/delete')}}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
