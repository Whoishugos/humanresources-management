@extends('layouts.dashboard')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Presences</h3>
                <p class="text-subtitle text-muted">Handle Presences Data</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Presences</li>
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
                    Create Presences
                </h5>
            </div>
            <div class="card-body">

                @if(session('role') == 'HR')

                <form action="{{ route('presences.store') }}" method="POST">
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
                        <label for="" class="form-label">Attendance Date</label>
                        <input type="date" class="form-control" name="date" required>
                        @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Check In</label>
                        <input type="time" class="form-control" name="check_in" required>
                        @error('check_in')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Check Out</label>
                        <input type="time" class="form-control" name="check_out" required>
                        @error('check_out')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="present">Present</option>
                            <option value="absent">Absent</option>
                            <option value="leave_request">Leave Request</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit Presences</button>
                    <a href="{{ route('presences.index') }}" class="btn btn-secondary">Back to List</a>

                </form>

                @else

                <form action="{{ route('presences.store') }}" method="POST">
                    @csrf
                    <div class="mb-3"><b>Note</b> : Mohon izinkan akses lokasi, supaya kami dapat mencatat kehadiran Anda.</div>
                    <div class="mb-3">
                        <label for="" class="form-label">Latitude</label>
                        <input type="time" class="form-control" name="latitude" id="latitude" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Longitude</label>
                        <input type="time" class="form-control" name="longitude" id="longitude" required>
                    </div>
                    <div class="mb-3">
                        <iframe width="500" height="300" frameboder="0" scrolling="no" marginheight="0" marginwidth="0" src=""></iframe>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btn-present" disable>Present</button>
                </form>
                @endif
            </div>
        </div>

    </section>
</div>
<script>
    const iframe = document.querySelector('iframe');

    const officeLat = -6.200000; // Replace with your office latitude
    const officeLon = 106.816666; // Replace with your office longitude
    const threshold = 0.01; // Adjust this value to set the acceptable distance from the office

    navigator.geolocation.getCurrentPosition(function(position) {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;
        iframe.src = `https://maps.google.com/maps?q=${latitude},${longitude}&hl=en&z=14&output=embed`;
    });
    document.addEventListener('DOMContentLoaded', () => {
        const iframe = document.querySelector('iframe');
        const btnPresent = document.getElementById('btn-present');
        const officeLat = -6.200000;
        const officeLon = 106.816666;
        const threshold = 0.01;

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                iframe.src = `https://maps.google.com/maps?q=${latitude},${longitude}&hl=en&z=14&output=embed`;

                // Hitung jarak
                const distance = Math.sqrt(Math.pow(latitude - officeLat, 2) + Math.pow(longitude - officeLon, 2));

                if (distance <= threshold) {
                    alert('You are within the acceptable distance from the office. You can proceed with marking your presence.');
                    btnPresent.removeAttribute('disabled');
                } else {
                    alert('You are not within the acceptable distance from the office.');
                    btnPresent.setAttribute('disabled', 'disabled');
                }
            });
        }
    });
</script>
@endsection
