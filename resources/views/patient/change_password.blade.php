@extends('layouts.home.index')

@section('content')
    <div class="breadcrumb-bar-two">
        <div class="container">
            <div class="row align-items-center inner-banner">
                <div class="col-md-12 col-12 text-center">
                    <h2 class="breadcrumb-title">My Account</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('patientDashboard') }}">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page">My Account</li>
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
                        <h3>Profile</h3>
                    </div>
                    <form action="{{ route('patientProfileUpdate') }}" method="POST">
                        @csrf
                        @method('PUT')

                        @include('layouts.portal.alerts_block')

                        <div class="card pass-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        {{-- First Name --}}
                                        <div class="input-block input-block-new">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" name="first_name"
                                                value="{{ old('first_name', auth()->user()->first_name) }}">
                                            @error('first_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Last Name --}}
                                        <div class="input-block input-block-new">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" name="last_name"
                                                value="{{ old('last_name', auth()->user()->last_name) }}">
                                            @error('last_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Email --}}
                                        <div class="input-block input-block-new">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ old('email', auth()->user()->email) }}">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Phone Number --}}
                                        <div class="input-block input-block-new mb-0">
                                            <label class="form-label">Phone Number</label>
                                            <input type="tel" class="form-control" name="phone_number"
                                                value="{{ old('phone_number', auth()->user()->phone_number) }}">
                                            @error('phone_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        {{-- Old Password --}}
                                        <div class="input-block input-block-new">
                                            <label class="form-label">Old Password</label>
                                            <input type="password" class="form-control" name="current_password">
                                            @error('current_password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- New Password --}}
                                        <div class="input-block input-block-new">
                                            <label class="form-label">New Password</label>
                                            <div class="pass-group">
                                                <input type="password" class="form-control pass-input" name="password">
                                                <span class="feather-eye-off toggle-password"></span>
                                            </div>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Confirm Password --}}
                                        <div class="input-block input-block-new mb-0">
                                            <label class="form-label">Confirm Password</label>
                                            <div class="pass-group">
                                                <input type="password" class="form-control pass-input-sub"
                                                    name="password_confirmation">
                                                <span class="feather-eye-off toggle-password-sub"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-set-button">
                            <button class="btn btn-light" type="button">Cancel</button>
                            <button class="btn btn-primary" type="submit">Save Changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
