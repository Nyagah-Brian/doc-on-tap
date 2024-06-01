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


@endsection