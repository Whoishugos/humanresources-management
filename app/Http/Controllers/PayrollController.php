<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Payroll;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class PayrollController extends Controller
{
    public function index() {
    $user = Auth::user(); // Mendapatkan pengguna yang sedang login
    if ($user && $user->role === 'HR') {
        // Jika pengguna adalah HR, ambil semua payrolls
        $payrolls = Payroll::all();
    } else {
        // Jika bukan HR, ambil payroll yang ditugaskan kepada pengguna yang sedang login
        $payrolls = Payroll::where('employee_id', $user->id)->get();
    }
    return view('payrolls.index', compact('payrolls'));
}


    public function create(){
        $employees = Employee::all();

        return view ('payrolls.create', compact('employees'));
    }
    public function edit ($id) {

       $payroll = Payroll::findOrFail($id); // Fetch the payroll record by ID
        $employees = Employee::all(); // Fetch all employees
    return view('payrolls.edit', compact('payroll', 'employees'));
    }
    public function store(Request $request) {
        $request->validate([
            'employee_id' => 'required',
            'pay_date' => 'required|date',
            'salary' => 'required|numeric',
            'bonuses' => 'required|numeric',
            'deductions' => 'required|numeric',
            'status' => 'required'
        ]);

        $netSalary = $request->input('salary') - $request->input('deductions') + $request->input('bonuses');
        $request->merge(['net_salary' => $netSalary]);

        Payroll::create($request->all());

        return redirect()->route('payrolls.index')->with('success', 'Payroll Created Successfully');
    }

    public function update(Request $request, Payroll $payroll) {

        $request->validate([
            'employee_id' => 'required',
            'pay_date' => 'required|date',
            'salary' => 'required|numeric',
            'bonuses' => 'required|numeric',
            'deductions' => 'required|numeric',
            'status' => 'required'
        ]);


        $netSalary = $request->input('salary') - $request->input('deductions') + $request->input('bonuses');
        $request->merge(['net_salary' => $netSalary]);

        $payroll->update($request->all());
        return redirect()->route('payrolls.index')->with('success', 'Payroll Updated Successfully');
    }
    public function destroy($id)
    {
        // Find the employee and delete it
        $payrolls = Payroll::findOrFail($id);
        $payrolls->delete();

        // Redirect to the employees index with a success message
        return redirect()->route('payrolls.index')->with('success', 'payrolls deleted successfully.');
    }
    public function show (Payroll $payroll) {
        return view ('payrolls.show', compact('payroll'));
    }
}
