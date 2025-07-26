<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presence;
use App\Models\Employee;
use Carbon\Carbon;

class PresenceController extends Controller
{
    public function index() {
    if (session('role') == 'HR') {
        $presences = Presence::all();
    } else {
        $presences = Presence::where('employee_id', session('employee_id'))->get();
    }
        return view('presences.index', compact('presences'));
    }
    public function create() {

        $employees = Employee::all();

        return view('presences.create', compact('employees'));

    }
    public function store (Request $request) {

        if (session('role') != 'HR') {

        $request->validate([
            'employee_id' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'date' => 'required|date',
            'status' => 'required',
        ]);
        Presence::create($request->all());
    } else {
        Presence::create([
            'employee_id' => $request->employee_id,
            'check_in' => Carbon::now()->format('Y-m-d H:i:s'),
            'date' => Carbon::now()->format('Y-m-d'),
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'status' => 'present',
        ]);
    }
        return redirect()->route('presences.index')->with('success', 'Presences Recorded Successfully');
    }
    public function edit(Presence $presence) {

        $employees = Employee::all();

        return view ('presences.edit', compact('presence', 'employees'));
    }

    public function update(Request $request, Presence $presence) {
        $request->validate([
            'employee_id' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'date' => 'required|date',
            'status' => 'required',
        ]);


        $presence->update($request->all());
        return redirect()->route('presences.index')->with('success', 'Submit Presences Successfully');
    }

    public function destroy(Presence $presence) {

        $presence->delete();

        return redirect()->route('presences.index')->with('success', 'Delete Presences Successfully');
    }
}
