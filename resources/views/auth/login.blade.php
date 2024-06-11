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
                                <h3>Login <span>Doccure</span></h3>
                            </div>
                            <form action="{{ route('login.user') }}" method="POST"> 
                                @csrf
                                @include('layouts.portal.alerts_block')
                            
                                <div class="mb-5 form-focus">
                                    <input type="text" class="form-control floating @error('email') is-invalid @enderror" name="email" placeholder=" " value="{{ old('email')}}"> 
                                    <label class="focus-label">Email</label>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            
                                <div class="form-focus">
                                    <input type="password" class="form-control floating @error('password') is-invalid @enderror" name="password" placeholder=" ">
                                    <label class="focus-label">Password</label>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            
                                <div class="text-end">
                                    <a class="forgot-link" href="{{ route('account.forgotPassword') }}">Forgot Password ?</a>
                                </div>
                            
                                <button class="btn btn-primary w-100 btn-lg login-btn" type="submit">Login</button>
                            
                                <div class="text-center dont-have">Don’t have an account? <a href="{{ route('account.register') }}">Register</a></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
   
@endsection


