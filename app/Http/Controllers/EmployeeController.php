<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Validator;
use Session;

class EmployeeController extends Controller
{
    /**
    * GET
    *
    * @return \Illuminate\Http\Response
    */
    public function employees()
    {
        return view('employees')->with('employees_for_dropdown', Employee::getForDropdown());
    }

    /**
    * POST
    *
    * @return \Illuminate\Http\Response
    */
    public function edit_delete_employee(Request $request)
    {
        $this->validate($request, [
            'employee' => 'required',
        ]);

        $employee = Employee::find($request->employee);

        if ($request->button == 'edit') {
            return redirect('/employees/edit/' . $employee->id);
        }
        else {
            return redirect('/employees/delete/' . $employee->id);
        }
    }

    /**
    * GET
    *
    * @return \Illuminate\Http\Response
    */
    public function edit_employee(Request $request, $employee_id)
    {
        return view('edit_employee')->with('employee', Employee::find($employee_id));
    }

    /**
    * POST
    *
    * @return \Illuminate\Http\Response
    */
    public function add_employee(Request $request)
    {
        $firstName = $request->first_name;
        $lastName = $request->last_name;

        $validationRule = ['first_name' => 'required', 'last_name'=>'required'];
        $validationMsg = ['first_name.required' => 'The first name field is required.', 'last_name.required' => 'The last name field is required.'];

        $validation = Validator::make(['first_name' => $firstName, 'last_name' => $lastName], $validationRule, $validationMsg);

        $validation->after(function ($validation) use ($firstName, $lastName) {
            $checkName = Employee::where('first_name', $firstName)->where('last_name', $lastName)->get();
            if (count($checkName) > 0) {
                $validation->errors()->add('first_name', 'This name already exists in the database.');
            }
        });

        $validation->validate();

        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->save();

        Session::flash('flash_message', $employee->first_name.' '.$employee->last_name.' has been added.');

        return redirect('/employees');
    }

    /**
    * POST
    *
    * @return \Illuminate\Http\Response
    */
    public function submit_employee_edit(Request $request, $employee_id)
    {
        $employee = Employee::find($employee_id);

        $firstName = $request->first_name;
        $lastName = $request->last_name;

        $validationRule = ['first_name' => 'required', 'last_name'=>'required'];
        $validationMsg = ['first_name.required' => 'The first name field is required.', 'last_name.required' => 'The last name field is required.'];

        $validation = Validator::make(['first_name' => $firstName, 'last_name' => $lastName], $validationRule, $validationMsg);

        $validation->after(function ($validation) use ($firstName, $lastName, $employee) {
            $checkName = Employee::where('first_name', $firstName)->where('last_name', $lastName)->get();
            if (count($checkName) > 0 && ($firstName.' '.$lastName != $employee->first_name.' '.$employee->last_name)) {
                $validation->errors()->add('first_name', 'This name already exists in the database.');
            }
        });

        $validation->validate();

        $old_name = $employee->first_name.' '.$employee->last_name;

        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->save();

        Session::flash('flash_message', $old_name.'\'s name has been changed to '.$employee->first_name.' '.$employee->last_name.'.');

        return redirect('/employees');
    }

    /**
    * GET
    *
    * @return \Illuminate\Http\Response
    */
    public function delete_employee(Request $request, $employee_id)
    {
        return view('delete_employee')->with('employee', Employee::find($employee_id));
    }

    /**
    * POST
    *
    * @return \Illuminate\Http\Response
    */
    public function submit_employee_delete(Request $request, $employee_id)
    {

        $employee = Employee::find($employee_id);
        $employee->evaluations()->delete();
        $employee->skillevals()->delete();
        $employee->delete();

        Session::flash('flash_message', $employee->first_name.' '.$employee->last_name.' has been deleted.');

        return redirect('/employees');
    }

}
