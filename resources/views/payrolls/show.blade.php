@extends('layouts.dashboard')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Payrolls</h3>
                <p class="text-subtitle text-muted">Handle Payrolls Data</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Payrolls</li>
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
                    Detail Payrolls
                </h5>
            </div>
            <div class="card-body">

                <div id="print-area">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><strong>Employees</strong></label>
                                <p>{{optional($payroll->employee)->fullname}}</p>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label"><strong>Salary</strong></label>
                                <p>{{number_format($payroll->salary)}}</p>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label"><strong>Bonuses</strong></label>
                                <p>{{number_format($payroll->bonuses)}}</p>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label"><strong>Deductions</strong></label>
                                <p>{{number_format($payroll->deductions)}}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><strong>Pay Date</strong></label>
                                <p>{{\Carbon\Carbon::parse($payroll->pay_date)->format('d F Y')}}</p>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label"><strong>Net Salary</strong></label>
                                <p>{{number_format($payroll->net_salary)}}</p>
                            </div>
                        </div>
                    </div>

                </div>

                <a href="{{ route('payrolls.index') }}" class="btn btn-secondary">Back to List</a>
                <button type="button" id="btn-print" class="btn btn-primary"><span class="bi bi-printer"></span> Print</button>
            </div>
        </div>

    </section>
</div>

<script>
    document.getElementById('btn-print').addEventListener('click', function() {
        let printContent = document.getElementById('print-area').innerHTML;

        // Store the original content
        let originalContent = document.body.innerHTML;

        // Replace the body content with the print content
        document.body.innerHTML = printContent;

        // Trigger the print dialog
        window.print();

        // Restore the original content after printing
        document.body.innerHTML = originalContent;
    });
</script>

@endsection
