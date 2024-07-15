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
                                        {{ $doctor->speciality->name }}
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
                                            <i class="fas fa-map-marker-alt"></i> {{ $doctor->user->address }}
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
                                            <a href="javascript:void(0)" class="btn book-btn"
                                                data-doctor-id="{{ $doctor->id }}">Book Now</a>
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


@section('modals')
    <div class="modal fade custom-modals" id="add_appointment" tabindex="-1" aria-labelledby="addAppointmentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="addAppointmentModalLabel">Add Appointment</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="{{ route('appointments.store') }}" method="POST" id="addAppointmentForm">
                    @csrf
                    <div class="add-appointment">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-wrap">
                                        <label class="col-form-label">Doctor</label>
                                        <input type="text" class="form-control" id="doctor_name" readonly>
                                        <input type="hidden" name="doctor_id" id="doctor_id">
                                    </div>
                                </div>

                                <input type="hidden" name="patient_id" id="patient_id">
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="col-form-label">Appointment Time <span
                                                class="text-danger">*</span></label>
                                        <div class="form-icon">
                                            <select class="form-control" id="appointment_time" name="appointment_time"
                                                required></select>
                                            <span class="icon"><i class="fa-regular fa-calendar-days"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="col-form-label">Reason for Appointment</label>
                                        <textarea class="form-control" name="reason_for_appointment" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="modal-btn text-end">
                            <a href="#" class="btn btn-gray" data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>





    


@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const bookButtons = document.querySelectorAll('.book-btn');

        bookButtons.forEach(button => {
            button.addEventListener('click', function() {
                const doctorId = this.getAttribute('data-doctor-id');
                const doctorName = this.closest('.profile-widget').querySelector('.title a').innerText;

                @if (auth()->check())
                    console.log('User is logged in');

                    // Fetch available appointment times
                    fetch(`/patient/doctor/${doctorId}/available-times`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            const appointmentTimeSelect = document.getElementById('appointment_time');
                            appointmentTimeSelect.innerHTML = '';

                            data.forEach(time => {
                                const option = document.createElement('option');
                                option.value = `${time.date} ${time.start_time}`;
                                option.textContent = `${time.date} ${time.start_time} - ${time.end_time}`;
                                appointmentTimeSelect.appendChild(option);
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching available appointment times:', error);
                            alert('Failed to fetch available appointment times. Please try again later.');
                        });

                    // Set doctor info and show modal
                    document.getElementById('doctor_id').value = doctorId;
                    document.getElementById('doctor_name').value = doctorName;
                    new bootstrap.Modal(document.getElementById('add_appointment')).show();
                @else
                    console.log('User is not logged in');
                    window.location.href = '{{ route('account.login') }}';
                @endif
            });
        });

        // Handle form submission
        document.getElementById('addAppointmentForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const actionUrl = this.getAttribute('action');

            console.log('Submitting form to:', actionUrl);
            fetch(actionUrl, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                }
            })
            .then(response => {
                console.log(response);
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                alert(data.message);
                if (data.redirectUrl) {
                    window.location.href = data.redirectUrl;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to add appointment.');
            });
        });
    });
</script>



@endsection
