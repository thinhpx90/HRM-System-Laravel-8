@extends('master')
@section('title', 'Edit Designation')
@section('content')

<div class="container">
  <div class="row my-4 bg-secondary">
    <div class="col ml-5 h2 text-white">Edit Designation</div>
    <div class="col-auto mr-5 my-auto">
      <a href="{{url('designation')}}" class="btn btn-primary">Designation list</a>
    </div>
  </div>
  <form method="post" action="{{url('designation/'.$designation->id)}}">
    @csrf
    @method('put')

    <div class="form-group">
      <label>Designation Name</label>
      <input type="text" name="designation_name" value="{{$designation->designation_name}}" class="form-control" placeholder="Enter designation name">
    </div>

    <div class="form-group">
      <label>Department Name</label>
      <select class="form-control" name="department_id">
        <option value="">Select Department</option>
        @foreach($departments as $department)
          @if($department->id == $designation->department_id)
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
          @if($company->id == $designation->company_id)
            <option selected value="{{$company->id}}">{{$company->company_name}}</option>
          @else
            <option value="{{$company->id}}">{{$company->company_name}}</option>
          @endif
        @endforeach
      </select>
    </div>

    <input type="submit" class="btn btn-block btn-info" value="Update Designation">
  </form>
</div>
@endsection
