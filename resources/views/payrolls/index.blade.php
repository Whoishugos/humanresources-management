@extends('layouts.dashboard')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Payrolls</h3>
                <p class="text-subtitle text-muted">Manage Payrolls Employee</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Payrolls</li>
                        <li class="breadcrumb-item active" aria-current="page">Show</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Payrolls Employee
                </h5>
            </div>
            <div class="card-body">
                <div class="d-flex">
                    <a href="{{ route ('payrolls.create')}}" class="btn btn-primary mb-3 ms-auto">New Payrolls</a>
                </div>

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Employee</th>
                            <th>Pay date</th>
                            <th>Salary</th>
                            <th>Bonuses</th>
                            <th>Deductions</th>
                            <th>Net Salary</th>
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payrolls as $payroll)
                        <tr>
                            <td>{{ optional($payroll->employee)->fullname }}</td>
                            <td>{{ $payroll->pay_date }}</td>
                            <td>{{ number_format($payroll->salary) }}</td>
                            <td>{{ number_format($payroll->bonuses) }}</td>
                            <td>{{ number_format($payroll->deductions) }}</td>
                            <td>{{ number_format($payroll->net_salary) }}</td>

                            <td>
                                @if($payroll->status == 'paid')
                                <span class="text-success">Paid</span>
                                @else
                                <span class="text-danger">{{ ucfirst($payroll->status) }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('payrolls.show', $payroll->id)}}" class="btn btn-info btn-sm">Salary Slip</a>
                                <a href="{{ route('payrolls.edit', $payroll->id)}}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('payrolls.destroy', $payroll->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection






