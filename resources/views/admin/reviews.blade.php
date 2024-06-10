@extends('layouts.admin.index')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Reviews</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Reviews</li>
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
                                            <th>Patient Name</th>
                                            <th>Doctor Name</th>
                                            <th>Rating</th>
                                            <th>Comment</th>
                                            <th>Appointment Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reviews as $review)
                                            <tr>
                                                <td>{{ $review->appointment->patient->user->first_name }}
                                                    {{ $review->appointment->patient->user->last_name }}</td>
                                                <td>{{ $review->appointment->doctor->user->first_name }}
                                                    {{ $review->appointment->doctor->user->last_name }}</td>
                                                <td>{{ $review->rating }}</td>
                                                <td>{{ $review->comment }}</td>
                                                <td>
                                                    {{ $review->appointment->appointment_time->format('j M Y') }}
                                                    <span class="text-primary d-block">
                                                        {{ $review->appointment->appointment_time->format('h:i A') }}
                                                    </span>
                                                </td>
                                                <td>
                                                    {{-- Add your action buttons/links here (e.g., View, Delete) --}}
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
