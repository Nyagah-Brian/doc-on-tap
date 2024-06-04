@extends('layouts.auth.index')


@section('content')
    <div class="content top-space">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7 col-lg-6 login-left">
                                <img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Register">
                            </div>
                            <div class="col-md-12 col-lg-6 login-right">
                                <div class="login-header">
                                    <h3>Account Creation</h3>
                                </div>

                                <form
                                    action="https://doccure.dreamstechnologies.com/html/template/patient-register-step1.html">
                                    <div class="mb-3 form-focus">
                                        <input type="text" class="form-control floating">
                                        <label class="focus-label">Name</label>
                                    </div>
                                    <div class="mb-3 form-focus">
                                        <input type="text" class="form-control floating">
                                        <label class="focus-label">Mobile Number</label>
                                    </div>
                                    <div class="mb-3 form-focus">
                                        <input type="password" class="form-control floating">
                                        <label class="focus-label">Create Password</label>
                                    </div>
                                    <div class="text-end">
                                        <a class="forgot-link" href="{{ route('login')}}">Already have an account?</a>
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
