<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use DateTime;

use Illuminate\Http\Request;

class EmployeeDetailController extends Controller
{
    //
    public function company_employee($company_id){
      $employees = Employee::where('company_id', $company_id)->where('status',1)->get();
      return view('detail.company_employee', ['employees'=>$employees]);
    }

    public function department_employee($department_id){
      $employees = Employee::where('department_id', $department_id)->where('status',1)->get();
      return view('detail.company_employee', ['employees'=>$employees]);
    }

    public function designation_employee($designation_id){
      $employees = Employee::where('designation_id', $designation_id)->where('status',1)->get();
      return view('detail.company_employee', ['employees'=>$employees]);
    }

    public function date_employee(Request $request){
      $from = $request->from;
      $to = $request->to;
      if (isset($from)) {
        if (isset($to)) {
          if ($from > $to) {
            $temp = $from;
            $from = $to;
            $to = $temp;
          }
          $employees = Employee::whereBetween('created_at', [$from, $to])->where('status',1)->orderBy('created_at','desc')->get();
        }else {
          $to = new DateTime();
          $employees = Employee::whereBetween('created_at', [$from, $to])->where('status',1)->orderBy('created_at','desc')->get();
        }
      }else {
        $employees = Employee::orderBy('created_at','desc')->get();
      }
      return view('detail.join_date_employee', ['employees'=>$employees]);
    }

    public function salary_employee(Request $request){
      $from = $request->from;
      $to = $request->to;
      if (isset($from)) {
        if (isset($to)) {
          if ($from > $to) {
            $temp = $from;
            $from = $to;
            $to = $temp;
          }
          $employees = Employee::whereBetween('salary', [$from, $to])->where('status',1)->orderBy('salary','desc')->get();
        }else {
          $to = 2000000;
          $employees = Employee::whereBetween('salary', [$from, $to])->where('status',1)->orderBy('salary','desc')->get();
        }
      }else {
        $employees = Employee::where('status',1)->orderBy('salary','desc')->get();
      }
      return view('detail.salary_employee', ['employees'=>$employees]);
    }
}
