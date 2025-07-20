<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index() {

        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }
    public function create(){
        return view ('roles.create');
    }
    public function store(Request $request){
          // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create a new Role
        Role::create($request->all());

        // Redirect to the Roles index with a success message
        return redirect()->route('roles.index')->with('success', 'Roles created successfully');
    }
    public function edit ($id) {
        $role = role::findOrFail($id);

        return view('roles.edit', compact('role'));
    }
    public function update (Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $role = Role::findOrFail($id);
        $role->update($request->all());

        return redirect()->route('roles.index')->with('success', 'role updated successfully.');
    }
    public function destroy(Role $role){
         $role->delete();
        return redirect()->route('roles.index')->with('success', 'role deleted successfully.');
    }

}
