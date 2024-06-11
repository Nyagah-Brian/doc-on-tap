@extends('layouts.home.index')

@section('content')

<div class="breadcrumb-bar-two">
    <div class="container">
        <div class="row align-items-center inner-banner">
            <div class="col-md-12 col-12 text-center">
                <h2 class="breadcrumb-title">My Invoices</h2>
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('patientDashboard')}}">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">My Invoices</li>
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
                    <h3>My Invoices</h3>
                </div>
                <div class="row">

                    


                    <div class="col-lg-12 col-xl-12">
                        
                        <div class="search-header">
                            <div class="search-field">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                            </div>
                        </div>
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

                        {{-- <div class="pagination dashboard-pagination">
                            <ul>
                                <li>
                                    <a href="#" class="page-link"><i class="fa-solid fa-chevron-left"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li>
                                    <a href="#" class="page-link active">2</a>
                                </li>
                                <li>
                                    <a href="#" class="page-link">3</a>
                                </li>
                                <li>
                                    <a href="#" class="page-link">4</a>
                                </li>
                                <li>
                                    <a href="#" class="page-link">...</a>
                                </li>
                                <li>
                                    <a href="#" class="page-link"><i class="fa-solid fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </div> --}}

                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection