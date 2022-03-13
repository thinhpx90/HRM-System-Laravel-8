@extends('master')
@section('title', 'All Companies')

@section('content')

<div class="container">
  <div class="row my-4 bg-secondary">
    <div class="col ml-5  h2 text-white">Company</div>
    <div class="col-auto mr-5 my-auto">
      <a href="{{url('company/create')}}" class="btn btn-primary">Add Company</a>
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
        <th scope="col"  class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($companies as $i=>$company)
      <tr>
        <th scope="row">{{++$i}}</th>
        <td  class="text-center">{{$company->company_name}}</td>
        <td  class="text-center">
          <a href="{{url('company/'.$company->id.'/edit')}}" class="btn btn-sm btn-warning">Edit</a>
          <a href="{{url('company/'.$company->id.'/delete')}}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
