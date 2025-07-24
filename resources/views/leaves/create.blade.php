@extends('layouts.dashboard')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Leave Request</h3>
                <p class="text-subtitle text-muted">Handle Employee Data</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Leave Request</li>
                        <li class="breadcrumb-item active" aria-current="page">New</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Create Leave Request
                </h5>
            </div>

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                 <div class="card-body">
                <form action="{{ route('leaves.store') }}" method="POST">
                    @csrf
                   <div class="mb-2">
                        <label for="" class="form-label">Employees</label>
                        <select name="employee_id" class="form-control @error('employee_id') is-invalid @enderror" required>
                            @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->fullname }}</option>
                            @endforeach
                        </select>
                        @error('employee_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Leave Type</label>
                        <select class="form-control @error('leave_type') is-invalid @enderror" id="leave_type" name="leave_type" required>
                            <option value="vacation_leave">Vacation Leave</option>
                            <option value="sick_leave">Sick Leave</option>
                            <option value="parental_leave">Parental Leave</option>
                        </select>
                        @error('leave_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Start Date</label>
                        <input type="date" class="form-control date @error('start_date') is invalid @enderror" value="{{ @old('start_date')}}" name="start_date" required>
                        @error('start_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">End Date</label>
                        <input type="date" class="form-control date @error('end_date') is invalid @enderror" value="{{ @old('end_date')}}" name="end_date" required>
                        @error('end_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="mb-3">
                        <label for="" class="form-label">reason</label>
                        <textarea name="reason" id="reason" class="form-control @error('reason') is-invalid @enderror" rows="3" required>{{ old('reason') }}</textarea>
                        @error('reason')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> --}}

                    <button type="submit" class="btn btn-primary">Create Leaves</button>
                    <a href="{{ route('leaves.index') }}" class="btn btn-secondary">Back to List</a>

                </form>
            </div>
        </div>

    </section>
</div>
@endsection
