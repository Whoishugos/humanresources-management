@extends('layouts.dashboard')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Employees</h3>
                <p class="text-subtitle text-muted">Handle Employee Data</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Employees</li>
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
                    Edit Employees
                </h5>
            </div>
            <div class="card-body">

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-b">
                        <label for="" class="form-label">Fullname</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" value="{{ old('fullname', $employee->fullname) }}" required>
                        @error('fullname')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-b">
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $employee->email) }}" required>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-b">
                        <label for="" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $employee->phone_number) }}" required>
                        @error('phone_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-b">
                        <label for="" class="form-label">Address</label>
                        <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" rows="3" required>{{ old('address') }}</textarea>
                        @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-b">
                        <label for="" class="form-label">Birth Date</label>
                        <input type="date" class="form-control date" id="birth_date" name="birth_date" value="{{ old('birth_date', $employee->birth_date) }}" required>
                        @error('birth_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-b">
                        <label for="" class="form-label">Hire Date</label>
                        <input type="date" class="form-control date" id="hire_date" name="hire_date"  value="{{ old('hire_date', $employee->hire_date) }}" required>
                        @error('hire_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                   <div class="mb-b">
                        <label for="" class="form-label">Department</label>
                        <select name="department_id" class="form-control @error('department_id') is-invalid @enderror" required>
                            <option value="">Select an department</option>
                            @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    <div class="mb-b">
                        <label for="" class="form-label">Role</label>
                        <select name="role_id" class="form-control @error('role_id') is-invalid @enderror" required>
                            <option value="">Select an Role</option>
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}" @if(old('role_id, $employee->role_id') == $role->id ) selected @endif>{{ $role->title }}</option>
                            @endforeach
                        </select>
                            <option value="done">Done</option>

                        </select>
                        @error('role_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-b">
                        <label for="" class="form-label">status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                            <option value="">Select an status</option>
                            <option value="inactive" {{ $employee->status == 'active' ? 'selected' : ''}}>Inactive</option>
                            <option value="active" {{ $employee->status == 'inactive' ? 'selected' : ''}} >active</option>
                        </select>
                            <option value="done">Done</option>

                        </select>
                        @error('status_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-b">
                        <label for="" class="form-label">Salary</label>
                        <input type="number" class="form-control date" name="salary" value="{{ old('salary', $employee->salary) }}" required>
                        @error('salary')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update Employees</button>
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back to List</a>

                </form>
            </div>
        </div>

    </section>
</div>
@endsection
