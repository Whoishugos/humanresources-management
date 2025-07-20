<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Role;

class EmployeeController extends Controller
{
    public function index()
    {

        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()

    {

        $departments = Department::all();
        $roles = Role::all();
        return view('employees.create', compact('departments', 'roles'));
    }
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'address' => 'nullable|string',
            'phone_number' => 'required|string|max:15',
            'birth_date' => 'required|date',
            'hire_date' => 'required|date',
            'department_id' => 'required|exists:departments,id',
            'role_id' => 'required|exists:roles,id',
            'status' => 'required|string|max:50',
            'salary' => 'required|numeric|min:0'
        ]);

        // Create a new employee
        Employee::create($request->all());

        // Redirect to the employees index with a success message
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }
    public function edit($id)
    {

        $employee = Employee::findOrFail($id);
        $departments = Department::all();
        $roles = Role::all();
        return view('employees.edit', compact('employee', 'departments', 'roles'));
    }
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $id,
            'address' => 'nullable|string',
            'phone_number' => 'required|string|max:15',
            'birth_date' => 'required|date',
            'hire_date' => 'required|date',
            'department_id' => 'required|exists:departments,id',
            'role_id' => 'required|exists:roles,id',
            'status' => 'required|string|max:50',
            'salary' => 'required|numeric|min:0',
        ]);

        // Find the employee and update it
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        // Redirect to the employees index with a success message
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }
    public function destroy($id)
    {
        // Find the employee and delete it
        $employee = Employee::findOrFail($id);
        $employee->delete();

        // Redirect to the employees index with a success message
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
