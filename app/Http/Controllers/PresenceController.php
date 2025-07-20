<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presence;
use App\Models\Employee;

class PresenceController extends Controller
{
    public function index() {
        $presences = Presence::all();

        return view('presences.index', compact('presences'));
    }
    public function create() {

        $employees = Employee::all();

        return view('presences.create', compact('employees'));

    }
    public function store (Request $request) {
        $request->validate([
            'employee_id' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'date' => 'required|date',
            'status' => 'required',
        ]);
        Presence::create($request->all());
        return redirect()->route('presences.index')->with('success', 'Submit Presences Successfully');
    }
    public function edit(Presence $presence) {

        $employees = Employee::all();

        return view ('presences.edit', compact('presence', 'employees'));

    }
}
