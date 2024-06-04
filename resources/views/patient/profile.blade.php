@extends('layouts.home.index')

@section('content')

<div class="breadcrumb-bar-two">
    <div class="container">
        <div class="row align-items-center inner-banner">
            <div class="col-md-12 col-12 text-center">
                <h2 class="breadcrumb-title">My Profile</h2>
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('patientDashboard')}}">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">My Profile</li>
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
                    <h3>My Profile</h3>
                </div>
                <div class="row">
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection