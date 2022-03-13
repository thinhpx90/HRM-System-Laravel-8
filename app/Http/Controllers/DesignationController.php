<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Company;
use App\Models\Department;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designations = Designation::orderby('id')->get();
        return view('designation.index', ['designations'=>$designations]);
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
        return view('designation.add', ['companies'=>$companies, 'departments'=>$departments]);
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
          'designation_name' => 'required',
          'department_id' => 'required',
          'company_id' => 'required'
        ]);

        $designations = Designation::all();
        foreach ($designations as $value) {
          if ($value->designation_name == $request->designation_name && $value->department_id == $request->department_id && $value->company_id == $request->company_id) {
            $request->session()->flash('error', 'This data is in the list.');
            return redirect('designation/create');
          }
        }

        $companies = Company::find($request->company_id);
        $departments = Department::find($request->department_id);
        $company = $companies->id;
        $department = $departments->company_id;

        if ($department == $company) {
          $designation = new Designation();
          $designation->designation_name = $request->designation_name;
          $designation->department_id = $request->department_id;
          $designation->company_id = $request->company_id;
          $designation->status = 1;
          $designation->save();
          $request->session()->flash('message', 'Designation added successfully.');
          return redirect('designation');
        }else {
          $request->session()->flash('error', 'This company has no such  departments.');
          return redirect('designation/create');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(Designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit(Designation $designation)
    {
      $companies = Company::all();
      $departments = Department::all();
      $designation = Designation::find($designation->id);
      return view('designation.edit', ['designation'=>$designation, 'departments'=>$departments, 'companies'=>$companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Designation $designation)
    {
      $companies = Company::find($request->company_id);
      $departments = Department::find($request->department_id);
      $company = $companies->id;
      $department = $departments->company_id;

      if ($department == $company) {
        $designation = Designation::find($designation->id);
        $designation->designation_name = $request->designation_name;
        $designation->department_id = $request->department_id;
        $designation->company_id = $request->company_id;
        $designation->status = 1;
        $designation->save();
        $request->session()->flash('message', 'Designation added successfully.');
        return redirect('designation');
      }else {
        $request->session()->flash('message', 'This company has no such  departments.');
        return redirect('designation');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designation $designation, $id)
    {
        Designation::find($id)->delete();
        session()->flash('message', 'Designation deleted successfully.');
        return redirect('designation');
    }

    public function status($status, $id)
    {
      $designation = Designation::find($id);
      $designation->status = $status;
      $designation->save();
      return redirect('designation')->with('message','Designation status updated successfully.');
    }
}
