@extends('layouts.dashboard')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Employee</h3>
                <p class="text-subtitle text-muted">Show Data Employee</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Employee</li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Data Detail Employee
                </h5>
            </div>

            <div class="card-body">
                <div class="mb-3">
                    <label for="">Full Name</label>
                    <p>{{ $employee->fullname }}</p>
                </div>

                <div class="mb-3">
                    <label for="">Email</label>
                    <p>{{ $employee->email }}</p>

                </div>
                    <div class="mb-3">
                        <label for="">Birth Date</label>
                        <p>{{ $employee->birth_date }}</p>
                </div>
                    <div class="mb-3">
                        <label for="">Role</label>
                        <p>{{ $employee->role->title }}</p>
                </div>

                <div class="mb-3">
                    <label for="">Department</label>
                    <p>{{ $employee->department->name }}</p>
                </div>

                <div class="mb-3">
                    <label for="">Hire Date</label>
                    <p>{{ $employee->hire_date }}</p>
                </div>

            <div class="mb-3">
                <label for="">Status</label>
                <p>
                    @if($employee->status == 'inactive')
                        <span class="text-danger">{{ ucfirst($employee->status)}}</span>
                    @else
                        <span class="text-success">{{ ucfirst($employee->status)}}</span>
                    @endif
                </p>
            </div>

            <div class="mb-3">
                <label for="">Salary</label>
                <p>{{ number_format($employee->salary) }}</p>
            </div>

            <div class="d-flex">
                <a href="{{ route('employees.index') }}" class="btn btn-primary mb-3 ms-auto">Back to Employees</a>
            </div>
    </section>
</div>
@endsection
