@extends('layouts.auth.index')


@section('content')
    <div class="content top-space">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{ asset('assets/img/login-banner.png')}}" class="img-fluid" alt="Doccure Register">
                            </div>
                            <div class="col-md-12 col-lg-6 login-right">
                                <div class="login-header">
                                    <h3>Account Creation</h3>
                                </div>

                                <form action="{{ route('account.registerUser') }}" method="POST">
                                    @csrf  
                                    @include('layouts.portal.alerts_block') {{-- Include your alert block here --}}
                                    
                                    <div class="mb-5 form-focus">
                                        <input type="text" class="form-control floating @error('first_name') is-invalid @enderror" name="first_name" placeholder=" " value="{{ old('first_name') }}">
                                        <label class="focus-label">First Name</label>
                                        @error('first_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-5 form-focus">
                                        <input type="text" class="form-control floating @error('last_name') is-invalid @enderror" name="last_name" placeholder=" " value="{{ old('last_name') }}">
                                        <label class="focus-label">Last Name</label>
                                        @error('last_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                
                                    <div class="mb-5 form-focus">
                                        <input type="tel" class="form-control floating @error('phone_number') is-invalid @enderror" name="phone_number" placeholder=" " value="{{ old('phone_number') }}">
                                        <label class="focus-label">Mobile Number</label>
                                        @error('phone_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                
                                    <div class="mb-5 form-focus">
                                        <input type="email" class="form-control floating @error('email') is-invalid @enderror" name="email" placeholder=" " value="{{ old('email') }}">
                                        <label class="focus-label">Email</label>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-5 form-focus">
                                        <input type="password" class="form-control floating @error('password') is-invalid @enderror" name="password" placeholder=" ">
                                        <label class="focus-label">Create Password</label>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                            
                                
                                    <div class="text-end">
                                        <a class="forgot-link" href="{{ route('account.login') }}">Already have an account?</a>
                                    </div>
                                
                                    <button class="btn btn-primary w-100 btn-lg login-btn" type="submit">Signup</button>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
