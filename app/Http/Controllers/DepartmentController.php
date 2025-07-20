<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class DepartmentController extends Controller
{

    public function index()
    {
        // Retrieve all departments from the database
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }
    public function create()
    {
        return view('departments.create');
    }


    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|max:50',
        ]);

        // Create a new department
        Department::create($request->all());

        // Redirect to the departments index with a success message
        return redirect()->route('departments.index')->with('success', 'Department created successfully');
    }
    public function edit ($id) {
        $department = Department::findOrFail($id);

        return view('departments.edit', compact('department'));
    }
    public function update (Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $department = Department::findOrFail($id);
        $department->update($request->all());

        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }
    public function destroy(Department $department){
         $department->delete();
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }
}
