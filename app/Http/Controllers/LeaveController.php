<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    public function index() {
        if (Auth::check() && Auth::user()->role === 'HR') {
            $leaves = Leave::all();
        } else {
            $user = Auth::user();
            $leaves = Leave::where('employee_id', $user->id)->get();
        }
        return view('leaves.index', compact('leaves'));
    }
    public function create() {

        $employees = Employee::all();


        return view('leaves.create', compact('employees'));
    }
   public function store(Request $request) {
    if (Auth::check() && Auth::user()->role === 'HR') {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'leave_type' => 'required|string',
            // Tambahkan status ke dalam validasi jika diperlukan
            // 'status' => 'required|string',
        ]);
    } else {
        $user = Auth::user();
        $request->merge(['employee_id' => $user->id]);
    }
    // Menambahkan status default
    $request->merge(['status' => 'pending']); // Atur status default
    Leave::create($request->all());
    return redirect()->route('leaves.index')->with('success', 'Leave request created successfully.');
}

    public function destroy($id) {
        $leave = Leave::findOrFail($id);
        $leave->delete();

        return redirect()->route('leaves.index')->with('success', 'Leave request deleted successfully.');
    }
    public function approved($id) {
    $leave = Leave::findOrFail($id);
    $leave->status = 'approved';
    $leave->save();
    return redirect()->route('leaves.index')->with('success', 'Leave request approved successfully.');
}
public function reject($id) {
    $leave = Leave::findOrFail($id);
    $leave->status = 'rejected'; // gunakan 'rejected'
    $leave->save();
    return redirect()->route('leaves.index')->with('success', 'Leave request rejected successfully.');
}

    public function edit($id) {
        $leave = Leave::findOrFail($id);
        $employees = Employee::all();

        return view('leaves.edit', compact('leave', 'employees'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            // 'reason' => 'required|string|max:255',
            // 'status' => 'required|string',
            'leave_type' => 'required|string',
        ]);

        $leave = Leave::findOrFail($id);
        $leave->update($request->all());

        return redirect()->route('leaves.index')->with('success', 'Leave request updated successfully.');
    }
}
