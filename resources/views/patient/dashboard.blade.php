@extends('layouts.home.index')

@section('content')
    <div class="breadcrumb-bar-two">
        <div class="container">
            <div class="row align-items-center inner-banner">
                <div class="col-md-12 col-12 text-center">
                    <h2 class="breadcrumb-title">Patient Dashboard</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('patientDashboard') }}">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page">Patient Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">

                @include('patient.component.sidebar')

                <div class="col-lg-8 col-xl-9">
                    <div class="dashboard-header">
                        <h3>Dashboard</h3>
                    </div>
                    <div class="row">




                        <div class="col-xl-12 d-flex">
                            <div class="dashboard-card w-100">

                                <div class="dashboard-card-body">
                                    <div class="account-detail-table">

                                        <nav class="patient-dash-tab border-0 pb-0 mb-3 mt-3">
                                            <ul class="nav nav-tabs-bottom">
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#appoint-tab"
                                                        data-bs-toggle="tab">Appointments</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" href="#invoice-tab"
                                                        data-bs-toggle="tab">Invoices</a>
                                                </li>
                                            </ul>
                                        </nav>


                                        <div class="tab-content pt-0">

                                            <div id="appoint-tab" class="tab-pane fade show active">
                                                <div class="custom-new-table">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-center mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Doctor Name</th>
                                                                    <th>Appointment Date</th>
                                                                    <th>Booked on</th>
                                                                    <th>Status</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse ($appointments as $appointment)
                                                                    <tr>
                                                                        <td>
                                                                            <h2 class="table-avatar">
                                                                                <a href="">
                                                                                    Dr. {{ $appointment->doctor->user->first_name }} {{ $appointment->doctor->user->last_name }}
                                                                                </a>
                                                                            </h2>
                                                                        </td>
                                                                        <td>{{ $appointment->appointment_time->format('j M Y') }} 
                                                                            <span class="text-primary d-block">
                                                                                {{ $appointment->appointment_time->format('h:i A') }} 
                                                                            </span>
                                                                        </td>
                                                                        <td>{{ $appointment->created_at->format('j M Y') }}</td>
                                                                        <td>
                                                                            <div class="status-toggle">
                                                                                <input type="checkbox" id="status_{{ $appointment->id }}" class="check" {{ $appointment->status == 'completed' ? 'checked' : '' }}>
                                                                                <label for="status_{{ $appointment->id }}" class="checktoggle">checkbox</label>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="d-flex align-items-center">
                                                                                <a href="#" class="account-action me-2"><i class="fa-solid fa-prescription"></i></a>
                                                                                <a href="#" class="account-action"><i class="fa-solid fa-file-invoice-dollar"></i></a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @empty
                                                                    <tr>
                                                                        <td colspan="5">No appointments found.</td> 
                                                                    </tr>
                                                                @endforelse
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="tab-pane fade" id="invoice-tab">
                                                <div class="custom-table">
                                                    <div class="table-responsive">
                                                        <table class="table table-center mb-0">
                                                            <thead>
                                                                <tr>
                                                                    {{-- <th>ID</th> --}}
                                                                    <th>Doctor</th>
                                                                    <th>Appointment Date</th>
                                                                    <th>Booked on</th>
                                                                    <th>Amount</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse ($invoices as $invoice)
                                                                <tr>
                                                                    {{-- <td class="text-blue-600">
                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#invoice_view">
                                                                            #Inv-{{ $invoice->id }} 
                                                                        </a>
                                                                    </td> --}}
                                                                    <td>
                                                                        <h2 class="table-avatar">
                                                                            {{-- Assuming you have a route for the doctor's profile --}}
                                                                           
                                                                            <a href="">
                                                                                Dr. {{ $invoice->appointment->doctor->user->first_name }} {{ $invoice->appointment->doctor->user->last_name }}
                                                                            </a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>{{ $invoice->appointment->appointment_time->format('j M Y') }}</td> 
                                                                    <td>{{ $invoice->created_at->format('j M Y') }}</td> 
                                                                    <td>Ksh {{ number_format($invoice->total_amount, 2) }}</td> 
                                                                    <td>
                                                                        <div class="action-item">
                                                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#invoice_view">
                                                                                <i class="fa-solid fa-link"></i> 
                                                                            </a>
                                                                            <a href="javascript:void(0);"><i class="fa-solid fa-print"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                @empty
                                                                    <tr>
                                                                        <td colspan="6">No invoices found.</td>
                                                                    </tr>
                                                                @endforelse 
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
