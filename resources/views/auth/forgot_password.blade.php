@extends('layouts.auth.index')


@section('content')
    <div class="content top-space">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{ asset('assets/img/login-banner.png')}}" class="img-fluid" alt="Login Banner">
                            </div>
                            <div class="col-md-12 col-lg-6 login-right">
                                <div class="login-header">
                                    <h3>Forgot Password?</h3>
                                    <p class="small text-muted">Enter your email to get a password reset link</p>
                                </div>

                                <form action="{{ route('account.sendResetPasswordLink') }}" method="POST"> 
                                    @csrf 
                                
                                    @include('layouts.portal.alerts_block') {{-- Include your alert block here --}}
                                
                                    <div class="mb-3 form-focus">
                                        <input type="email" class="form-control floating @error('email') is-invalid @enderror" name="email" placeholder=" " value="{{ old('email') }}">
                                        <label class="focus-label">Email</label>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                
                                    <div class="text-end">
                                        <a class="forgot-link" href="{{ route('account.login') }}">Remember your password?</a>
                                    </div>
                                
                                    <button class="btn btn-primary w-100 btn-lg login-btn" type="submit">Reset Password</button>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
