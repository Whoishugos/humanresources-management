@extends('layouts.dashboard')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Leave Request</h3>
                <p class="text-subtitle text-muted">Handle Leave Request</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Leave Request</li>
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
                    Leave Request Employee
                </h5>
            </div>
            <div class="card-body">
                <div class="d-flex">
                    <a href="{{ route ('leaves.create')}}" class="btn btn-primary mb-3 ms-auto">New leaves</a>
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
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Leave Type</th>
                            {{-- <th>Reason</th> --}}
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leaves as $leave)
                        <tr>
                            <td>{{ optional($leave->employee)->fullname }}</td>
                            <td>{{ $leave->start_date }}</td>
                            <td>{{ $leave->end_date }}</td>
                            {{-- <td>{{ $leave->reason }}</td> --}}

                            <td>
                                @if($leave->leave_type == 'vacation_leave')
                                <span class="text-warning">Vacation Leave</span>
                                @elseif($leave->leave_type == 'sick_leave')
                                <span class="text-warning">Sick Leave</span>
                                @elseif($leave->leave_type == 'parental_leave')
                                <span class="text-warning">Parental Leave</span>
                                @else
                                <span class="text-info">{{ $leave->leave_type }}</span>
                                @endif
                            </td>
                            <td>
                               @if($leave->status == 'review')
                                <span class="text-warning">Review</span>
                                @elseif($leave->status == 'approved')
                                <span class="text-success">Approved</span>
                                @elseif($leave->status == 'rejected')
                                <span class="text-danger">Rejected</span>
                                @else
                                <span class="textsecondary">{{ $leave->status }}</span>
                                @endif
                            </td>
                            <td>
    @if ($leave->status == 'review')
        <a href="{{ route('leaves.approved', $leave->id)}}" class="btn btn-success btn-sm">Approved</a>
        <a href="{{ route('leaves.reject', $leave->id)}}" class="btn btn-danger btn-sm">Reject</a>
    @elseif ($leave->status == 'approved')
        <a href="{{ route('leaves.reject', $leave->id)}}" class="btn btn-danger btn-sm">Reject</a>
    @elseif ($leave->status == 'rejected')
        <a href="{{ route('leaves.approved', $leave->id)}}" class="btn btn-success btn-sm">Approved</a>
    @endif

    <a href="{{ route('leaves.edit', $leave->id)}}" class="btn btn-warning btn-sm">Edit</a>

    <form action="{{ route('leaves.destroy', $leave->id) }}" method="POST" style="display:inline">
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






