<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Designation;
use App\Models\Department;
use App\Models\Company;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderby('id')->get();
        return view('employee.index', ['employees'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $companies = Company::all();
      $departments = Department::all();
      $designations = Designation::all();
      return view('employee.add', ['companies'=>$companies, 'departments'=>$departments, 'designations'=>$designations]);
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
          'employee_name' => 'required',
          'salary' => 'required',
          'designation_id' => 'required',
          'department_id' => 'required',
          'company_id' => 'required'
        ]);

        $employees = Employee::all();
        foreach ($employees as $value) {
          if ($value->employee_name == $request->employee_name && $value->designation_id == $request->designation_id && $value->department_id == $request->department_id && $value->company_id == $request->company_id) {
            $request->session()->flash('error', 'This data is in the list.');
            return redirect('employee/create');
          }
        }

        $companies = Company::find($request->company_id);
        $departments = Department::find($request->department_id);
        $designations = Designation::find($request->designation_id);
        $company = $companies->id;
        $department = $departments->company_id;
        $designation = $designations->company_id;

        // $companies = Company::all();
        // $departments = Department::all();
        // $designations = Designation::all();
        // $company = $companies[$request->company_id-1]->id;
        // $department = $departments[$request->department_id-1]->company_id;
        // $designation = $designations[$request->designation_id-1]->company_id;

        if ($department == $company && $company == $designation) {
          $employee = new Employee();
          $employee->employee_name = $request->employee_name;
          $employee->designation_id = $request->designation_id;
          $employee->department_id = $request->department_id;
          $employee->company_id = $request->company_id;
          $employee->salary = $request->salary;
          $employee->status = 1;
          $employee->save();
          $request->session()->flash('message', 'Employee added successfully.');
          return redirect('employee');
        }else {
          $request->session()->flash('error', 'This company has no such  departments or designations.');
          return redirect('employee/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all();
        $departments = Department::all();
        $designations = Designation::all();
        $employee = Employee::find($employee->id);
        return view('employee.edit', ['employee'=>$employee, 'designations'=>$designations, 'departments'=>$departments, 'companies'=>$companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
      $companies = Company::find($request->company_id);
      $departments = Department::find($request->department_id);
      $designations = Designation::find($request->designation_id);
      $company = $companies->id;
      $department = $departments->company_id;
      $designation = $designations->company_id;

        // $companies = Company::all();
        // $departments = Department::all();
        // $designations = Designation::all();
        // $company = $companies[$request->company_id-1]->id;
        // $department = $departments[$request->department_id-1]->company_id;
        // $designation = $designations[$request->designation_id-1]->company_id;

        if ($department == $company && $company == $designation) {
          $employee = Employee::find($employee->id);
          $employee->employee_name = $request->employee_name;
          $employee->designation_id = $request->designation_id;
          $employee->department_id = $request->department_id;
          $employee->company_id = $request->company_id;
          $employee->salary = $request->salary;
          $employee->status = 1;
          $employee->save();
          $request->session()->flash('message', 'Employee updated successfully.');
          return redirect('employee');
        }else {
          $request->session()->flash('message', 'This company has no such  departments or designations.');
          return redirect('employee');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();
        session()->flash('message', 'Employee deleted successfully.');
        return redirect('employee');
    }

    public function status($status, $id)
    {
      $employee = Employee::find($id);
      $employee->status = $status;
      $employee->save();
      return redirect('employee')->with('message','Employee status updated successfully.');
    }
}
