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
                    Task Employee
                </h5>
            </div>
            <div class="card-body">

                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-2">
                        <label for="title" class="form-label">Task Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $task->title) }}"   required>
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Due Date</label>
                        <input type="datetime-local" class="form-control date @error('due_date', $task->due_date) is invalid @enderror" value="{{ @old('due_date')}}" name="due_date" required>
                        @error('due_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="" class="form-label">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="pending" @if(old('status', $task->status) == 'done') selected @endif>Done</option>
                            <option value="pending" @if(old('status', $task->status) == 'pending') selected @endif>Pending</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-2">
                        <label for="" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="3" required >{{ old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="" class="form-label">Employees</label>
                        <select name="assigned_to" class="form-control @error('assigned_to') is-invalid @enderror" required>
                            <option value="">Select an Employee</option>
                            @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" @if(old('assigned_to, $task->assigned_to') == $employee->id) selected @endif>{{ $employee->fullname }}</option>
                            @endforeach
                        </select>

                        </select>
                        @error('assigned_to')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update Tasks</button>
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to List</a>

                </form>
            </div>
        </div>

    </section>
</div>
@endsection
