@extends('layouts.admin.index')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Appointments</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Appointments</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="datatable table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Doctor Name</th>
                                            <th>Speciality</th>
                                            <th>Patient Name</th>
                                            <th>Appointment Time</th>
                                            <th>Status</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($appointments as $appointment)
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        {{-- Assuming you have a profile route for doctors --}}
                                                        <a href="">
                                                            Dr. {{ $appointment->doctor->user->first_name }}
                                                            {{ $appointment->doctor->user->last_name }}
                                                        </a>
                                                    </h2>
                                                </td>
                                                <td>{{ $appointment->doctor->speciality->name }}</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        {{-- Assuming you have a profile route for patients --}}
                                                        <a href="">
                                                            {{ $appointment->patient->user->first_name }}
                                                            {{ $appointment->patient->user->last_name }}
                                                        </a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    {{ $appointment->appointment_time->format('j M Y') }}
                                                    <span class="text-primary d-block">
                                                        {{ $appointment->appointment_time->format('h:i A') }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status_{{ $appointment->id }}"
                                                            class="check"
                                                            {{ $appointment->status == 'completed' ? 'checked' : '' }}>
                                                        <label for="status_{{ $appointment->id }}"
                                                            class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{-- Fetch the invoice amount if available --}}
                                                    @php
                                                        $invoices = $appointment->invoice;
                                                        $amount = 0;

                                                        if ($invoices->isNotEmpty()) {
                                                            foreach ($invoices as $invoice) {
                                                                $amount += $invoice->total_amount;
                                                            }
                                                        }

                                                        $amount = number_format($amount, 2);
                                                    @endphp
                                                    ksh {{ $amount }}
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
