@extends('layouts.dashboard')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Presences</h3>
                <p class="text-subtitle text-muted">Edit Presences Data</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Presences</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Edit presences
                </h5>
            </div>
            <div class="card-body">

                <form action="{{ route('presences.update', $presence->id) }}" method="POST">
                    @csrf

                    @method ('PUT')
                    <div class="mb-2">
                        <label for="" class="form-label">Employees</label>
                        <select name="employee_id" class="form-control">
                            @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ ($employee->id == $presence->employee_id) ? 'selected' : ''}}>{{ $employee->fullname }}</option>
                            @endforeach
                        </select>
                        @error('employee_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Attendance Date</label>
                        <input type="date" class="form-control" name="date" value="{{old('date', $presence->date)}}" required>
                        @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Check In</label>
                        <input type="time" class="form-control" name="check_in" value="{{old('check_in', $presence->check_in)}}" required>
                        @error('check_in')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Check Out</label>
                        <input type="time" class="form-control" name="check_out" value="{{old('check_out', $presence->check_out)}}" required>
                        @error('check_out')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="present" {{ ($presence->status == 'present') ? 'selected' : '' }}>Present</option>
                            <option value="absent" {{ ($presence->status == 'absent') ? 'selected' : '' }}>Absent</option>
                            <option value="leave_request" {{ ($presence->status == 'leave_request') ? 'selected' : '' }} >Leave Request</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update Presences</button>
                    <a href="{{ route('presences.index') }}" class="btn btn-secondary">Back to List</a>

                </form>
            </div>
        </div>

    </section>
</div>
@endsection
