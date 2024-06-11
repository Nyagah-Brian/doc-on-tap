@extends('layouts.home.index')

@section('content')

<div class="breadcrumb-bar-two">
    <div class="container">
        <div class="row align-items-center inner-banner">
            <div class="col-md-12 col-12 text-center">
                <h2 class="breadcrumb-title">My Appointments</h2>
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('patientDashboard')}}">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">My Appointments</li>
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
                    <h3>My Appointments</h3>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        
                        
                        <div class="tab-content appointment-tab-content">
                            <div class="tab-pane fade show active" id="pills-upcoming" role="tabpanel"
                                aria-labelledby="pills-upcoming-tab">
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
    </div>
</div>

@endsection