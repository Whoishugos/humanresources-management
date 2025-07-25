<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Employee;


class TaskController extends Controller
{
    public function index()

    {
        if (sesssion('role') == 'HR') {
            $tasks = Task::all();
        } else {
            $tasks = Task::where('assigned_to', session('employee_id'))->get();
        }

        return view('tasks.index', compact('tasks'));
    }
    public function create()
    {

        $employees = Employee::all();
        return view('tasks.create', compact('employees'));
    }
    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'assigned_to' => 'required|exists:employees,id',
            'due_date' => 'nullable|date',
            'status' => 'required|string',
        ]);

        Task::create($validated);


        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }
    public function edit(Task $task)
    {
        $employees = Employee::all();
        return view('tasks.edit', compact('task', 'employees'));
    }

    public function show (Task $task){

        return view('tasks.show', compact('task'));

        return redirect()->route('tasks.index');
    }

    public function update(Request $request, Task $task)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'assigned_to' => 'required|exists:employees,id',
            'due_date' => 'nullable|date',
            'status' => 'required|string',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }
    public function done(int $id){
        $task = Task::find($id);
        $task->update(['status' => 'done']);

        return redirect()->route('tasks.index')->with('success', 'Task marked as done.');
    }
    public function pending(int $id){
        $task = Task::find($id);
        $task->update(['status' => 'pending']);

        return redirect()->route('tasks.index')->with('success', 'Task marked as pending.');
    }
    public function destroy(Task $task)
    {

        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
