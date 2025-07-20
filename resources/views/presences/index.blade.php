@extends('layouts.dashboard')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Presences</h3>
                <p class="text-subtitle text-muted">Handle Presences</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Presences</li>
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
                    Presences Employee
                </h5>
            </div>
            <div class="card-body">
                <div class="d-flex">
                    <a href="{{ route ('presences.create')}}" class="btn btn-primary mb-3 ms-auto">New Presences</a>
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
                            <th>Attendance</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($presences as $presence)
                        <tr>
                            <td>{{ optional($presence->employee)->fullname }}</td>
                            <td>{{ $presence->date }}</td>
                            <td>{{ $presence->check_in }}</td>
                            <td>{{ $presence->check_out }}</td>

                            <td>
                                @if($presence->status == 'present')
                                <span class="text-success">Present</span>
                                @else
                                <span class="text-danger">{{ ucfirst($presence->status) }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="" class="btn btn-warning btn-sm">Edit</a>

                                <form action="" method="POST" style="display:inline">
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

{{-- {{ route('presences.destroy', $presences->id) }} --}}

{{-- {{ route('presences.edit', $presences->id)}} --}}

