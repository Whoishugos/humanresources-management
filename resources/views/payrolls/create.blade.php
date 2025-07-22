@extends('layouts.dashboard')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>payrolls</h3>
                <p class="text-subtitle text-muted">Handle payrolls Data</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">payrolls</li>
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
                    Create payrolls
                </h5>
            </div>
            <div class="card-body">

                @if(($errors)->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$errors}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('payrolls.store') }}" method="POST">
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
                    <div class="mb-3">
                        <label for="" class="form-label">Pay Date</label>
                        <input type="date" class="form-control date" name="pay_date" required>
                        @error('pay_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">salary</label>
                        <input type="number" class="form-control" name="salary" required>
                        @error('salary')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Bonuses</label>
                        <input type="number" class="form-control" name="bonuses" required>
                        @error('bonuses')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Deductions</label>
                        <input type="number" class="form-control" name="deductions" required>
                        @error('deductions')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="mb-3">
                        <label for="" class="form-label">Net Salary</label>
                        <input type="number" class="form-control" name="net_salary" disabled>
                        @error('net_salary')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    <div class="mb-3">
                        <label for="" class="form-label">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="paid">Paid</option>
                            <option value="unpaid">Unpaid</option>

                        </select>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit payrolls</button>
                    <a href="{{ route('payrolls.index') }}" class="btn btn-secondary">Back to List</a>

                </form>
            </div>
        </div>

    </section>
</div>
@endsection
