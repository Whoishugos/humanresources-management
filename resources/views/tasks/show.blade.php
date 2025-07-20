@extends('layouts.dashboard')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tasks</h3>
                <p class="text-subtitle text-muted">Handle Employee</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Task</li>
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
                    Task Employee
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="">Title</label>
                    <p>{{ $task->title }}</p>
                </div>
                <div class="mb-3">
                    <label for="">Employees</label>
                    <p>{{ $task->employee->fullname }}</p>
            </div>
            <div class="mb-3">
                <label for="">Due Date</label>
                <p>{{ \Carbon\Carbon::parse($task->due_date)->format('d F Y') }}</p>
        </div>
            <div class="mb-3">
                <label for="">Status</label>
                <p>
                    @if($task->status == 'pending')
                        <span class="text-warning">{{ ucfirst($task->status)}}</span>
                    @else
                        <span class="text-success">{{ ucfirst($task->status)}}</span>
                    @endif
                </p>
            </div>
            <div class="mb-3">
                <label for="">Description</label>
                <p>{{ $task->description }}</p>
            </div>


            <div class="d-flex">
                <a href="{{ route('tasks.index') }}" class="btn btn-primary mb-3 ms-auto">Back to Tasks</a>
            </div>
    </section>
</div>
@endsection
