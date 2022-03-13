@extends('master')
@section('title', 'Edit Department')

@section('content')

<div class="container">
  <div class="row my-4 bg-secondary">
    <div class="col ml-5 h2 text-white">Edit Department</div>
    <div class="col-auto mr-5 my-auto">
      <a href="{{url('department')}}" class="btn btn-primary">Department list</a>
    </div>
  </div>
  <form method="post" action="{{url('department/'.$department->id)}}">
    @csrf
    @method('put')

    <div class="form-group">
      <label>Department Name</label>
      <input type="text" name="department_name" value="{{$department->department_name}}" class="form-control" placeholder="Enter department name">
    </div>

    <div class="form-group">
      <label>Company Name</label>
      <select class="form-control" name="company_id">
        <option value="">Select Company</option>
        @foreach($companies as $company)
          @if($company->id == $department->company_id)
            <option selected value="{{$company->id}}">{{$company->company_name}}</option>
          @else
            <option value="{{$company->id}}">{{$company->company_name}}</option>
          @endif
        @endforeach
      </select>
    </div>

    <input type="submit" class="btn btn-block btn-info" value="Update Department">
  </form>
</div>
@endsection
