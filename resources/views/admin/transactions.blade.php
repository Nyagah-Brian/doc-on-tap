@extends('layouts.admin.index')

@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Transactions</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Transactions</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Invoice ID</th>
                                        <th>Patient Name</th>
                                        <th>Appointment Date</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoices as $invoice)
                                    <tr>
                                        <td>{{ $invoice->id }}</td>
                                        <td>{{ $invoice->patient->user->first_name }} {{ $invoice->patient->user->last_name }}</td>
                                        <td>{{ $invoice->appointment ? $invoice->appointment->appointment_time : 'N/A' }}</td>
                                        <td>{{ $invoice->total_amount }}</td>
                                        <td>{{ $invoice->status }}</td>
                                        <td>
                                            <div class="actions">
                                                {{-- Assuming you have a speciality edit route --}}
                                                <a class="btn btn-sm bg-success-light" data-bs-toggle="modal"
                                                    href=""> 
                                                    <i class="fe fe-pencil"></i> Edit
                                                </a>
                                                {{-- Assuming you have a speciality delete route or can handle this via JavaScript --}}
                                                <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal"
                                                    href="#delete_modal" onclick="confirmDelete('{{ $appointment->id }}')"> 
                                                    <i class="fe fe-trash"></i> Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection