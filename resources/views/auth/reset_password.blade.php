@extends('layouts.auth.index')


@section('content')

<div class="content top-space">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 col-lg-6 login-left">
                            <img src="{{ asset('assets/img/login-banner.png')}}" class="img-fluid" alt="Doccure Login">
                        </div>
                        <div class="col-md-12 col-lg-6 login-right">
                            <div class="login-header">
                                <h3>Reset Password </h3>
                            </div>
                            <form action="{{ route('password.change') }}" method="POST"> 
                                @csrf

                                <input type="hidden" class="form-control h-45px fs-13px @error('token') is-invalid @enderror" name="token" id="token" value="{{ $token }}" placeholder="Token" />

                                @include('layouts.portal.alerts_block')
                            
                                <div class="mb-5 form-focus">
                                    <input type="text" class="form-control floating @error('email') is-invalid @enderror" name="email" placeholder=" " value="{{ $email }}" readonly> 
                                    <label class="focus-label">Email</label>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            
                                <div class="form-focus mb-5">
                                    <input type="password" class="form-control floating @error('password') is-invalid @enderror" name="password" placeholder=" ">
                                    <label class="focus-label">New Password</label>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            

                                <div class="form-focus mb-5">
                                    <input type="password" class="form-control floating @error('confirm_password') is-invalid @enderror" name="confirm_password" placeholder=" ">
                                    <label class="focus-label">Confirm New Password</label>
                                    @error('confirm_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                            
                                <button class="btn btn-primary w-100 btn-lg login-btn" type="submit">Reset Password</button>
                            
                                <div class="text-center dont-have">Return to login? <a href="{{ route('account.login') }}">Login</a></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
   
@endsection


