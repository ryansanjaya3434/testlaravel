<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Requests\StoreEmployee;
use App\Models\Comp;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('nama','ASC')->paginate(5);
        return view('employee.index', compact('employees'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function show(Employee $employee)
    {
        return view('employee.show',compact('employee'));
    }

    public function create()
    {   
        $company = Comp::all();
        return view('employee.create', compact('company'));
    }

    public function store(StoreEmployee $request)
    {
        $input = $request->all();   
        Employee::create($input);
        return redirect()->route('employee.index')
                        ->with('success','Employee Created Successfully.');
    }

    public function edit(Employee $employee)
    {   
        $company = Comp::all();
        return view('employee.edit',compact('employee', 'company'));
    }

    public function update(StoreEmployee $request, Employee $employee)
    {
        $input = $request->all();
           
        $employee->update($input);
    
        return redirect()->route('employee.index')
                        ->with('success','Employee updated successfully');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
     
        return redirect()->route('employee.index')
                        ->with('success','Deleted successfully');
    }
}
