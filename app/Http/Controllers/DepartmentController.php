<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Company;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $departments = Department::orderby('company_id')->get();
      return view('department.index', ['departments'=>$departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('department.add', ['companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'department_name' => 'required',
        'company_id' => 'required'
      ]);

      $departments = Department::all();
      foreach ($departments as $value) {
        if ($value->department_name == $request->department_name && $value->company_id == $request->company_id) {
          $request->session()->flash('error', 'This data is in the list.');
          return redirect('department/create');
        }
      }

      $department = new Department();
      $department->department_name = $request->department_name;
      $department->company_id = $request->company_id;
      $department->status = 1;
      $department->save();
      $request->session()->flash('message', 'Department added successfully.');
      return redirect('department');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
      $companies = Company::all();
      $department = Department::find($department->id);
      return view('department.edit', ['department'=>$department, 'companies'=>$companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
      $department = Department::find($department->id);
      $department->department_name = $request->department_name;
      $department->company_id = $request->company_id;
      $department->status = 1;
      $department->save();
      $request->session()->flash('message', 'Department updated successfully.');
      return redirect('department');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::find($id)->delete();
        session()->flash('message', 'Department deleted successfully.');
        return redirect('department');
    }

    public function status($status, $id)
    {
      $department = Department::find($id);
      $department->status = $status;
      $department->save();
      return redirect('department')->with('message','Department status updated successfully.');
    }
}
