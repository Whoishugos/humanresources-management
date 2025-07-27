<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Role;
use App\Models\Task;
use App\Models\Payroll;
use App\Models\Leave;
use App\Models\Presence;

class DashboardController extends Controller
{
    public function index()
    {
        $employee = Employee::count();
        $department = Department::count();
        $role = Role::count();
        $task = Task::count();
        $payroll = Payroll::count();
        $leave = Leave::count();
        $presence = Presence::count();

        $tasks = Task::all();


        return view('dashboard.index', compact(
            'employee',
            'department',
            'role',
            'task',
            'payroll',
            'leave',
            'presence',
            'tasks'
        ));
    }
}
