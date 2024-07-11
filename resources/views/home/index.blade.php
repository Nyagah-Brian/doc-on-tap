@extends('layouts.home.index')

@section('content')
    <section class="section section-search">
        <div class="container-fluid">
            <div class="banner-wrapper">
                <div class="banner-header text-center aos" data-aos="fade-up">
                    <h1>Search Doctor, Make an Appointment</h1>
                    <p>
                        Discover the best doctors, clinic & hospital the city nearest to
                        you.
                    </p>
                </div>

                <div class="search-box">
                    <form action="https://doccure.dreamstechnologies.com/html/template/search.html">
                        <div class="mb-3 search-location aos" data-aos="fade-up">
                            <input type="text" class="form-control" placeholder="Search Location" />
                            <span class="form-text">Based on your Location</span>
                        </div>
                        <div class="mb-3 search-info aos" data-aos="fade-up">
                            <input type="text" class="form-control"
                                placeholder="Search Doctors, Clinics, Hospitals, Diseases Etc" />
                            <span class="form-text">Ex : Dental or Sugar Check up etc</span>
                        </div>
                        <button type="submit" class="btn btn-primary search-btn mt-0 aos" data-aos="fade-up">
                            <i class="fas fa-search"></i> <span>Search</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

   
    <section class="section section-doctor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 aos" data-aos="fade-up">
                    <div class="section-header">
                        <h2>Schedule Your Appointment</h2>
                        <p>Find the perfect doctor and time for you.</p>
                    </div>
                    <div class="about-content">
                        <p>
                            Easily book an appointment with one of our qualified doctors. 
                            We offer a variety of specialties and convenient appointment times 
                            to fit your busy schedule. 
                        </p>
                        <p>
                            Get started by searching for a doctor by specialty or browsing 
                            available appointment slots. 
                        </p>
                    </div>
                </div>
                <div class="col-lg-8 aos" data-aos="fade-up">
                    <div class="doctor-slider slider">

                        @foreach ($doctors as $doctor)
                            <div class="profile-widget">
                                
                                <div class="pro-content">
                                    <h3 class="title">
                                        <a
                                            href="doctor-profile.html">{{ $doctor->user->first_name . ' ' . $doctor->user->last_name }}</a>
                                        <i class="fas fa-check-circle verified"></i>
                                    </h3>
                                    <p class="speciality">
                                        {{ $doctor->speciality->name}}
                                    </p>
                                    <div class="rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <span class="d-inline-block average-rating">(17)</span>
                                    </div>
                                    <ul class="available-info">
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i> {{ $doctor->user->address}}
                                        </li>
                                        <li>
                                            <i class="far fa-clock"></i> Available on Fri, 22 Mar
                                        </li>
                                        <li>
                                            <i class="far fa-money-bill-alt"></i> $300 - $1000
                                            <i class="fas fa-info-circle" data-bs-toggle="tooltip" title="Lorem Ipsum"></i>
                                        </li>
                                    </ul>
                                    <div class="row row-sm">
                                        <div class="col-6">
                                            <a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                                        </div>
                                        <div class="col-6">
                                            <a href="booking.html" class="btn book-btn">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
