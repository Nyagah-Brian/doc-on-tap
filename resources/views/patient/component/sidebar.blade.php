<div class="col-lg-4 col-xl-3 theiaStickySidebar">

    <div class="profile-sidebar patient-sidebar profile-sidebar-new">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="{{ route('patientDashboard')}}" class="booking-doc-img">
                    {!! Avatar::create(Auth::user()->first_name . ' ' . Auth::user()->last_name)->setFontSize(30)->setDimension(90)->toSvg() !!}
                </a>
                <div class="profile-det-info">
                    <h3><a href="{{ route('patientDashboard')}}">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</a></h3>
                    {{-- <div class="patient-details">
                        <h5 class="mb-0">Patient ID : PT254654</h5>
                    </div>
                    <span>Female </span> --}}
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li class="{{ request()->is('patient') ? 'active' : '' }}">
                        <a href="{{ route('patientDashboard')}}">
                            <i class="fa-solid fa-shapes"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('patient/appointments*') ? 'active' : '' }}">
                        <a href="{{ route('patientAppointments')}}">
                            <i class="fa-solid fa-calendar-days"></i>
                            <span>My Appointments</span>
                        </a>
                    </li>
                    
                    
                    
                    <li class="{{ request()->is('patient/invoices*') ? 'active' : '' }}">
                        <a href="{{ route('patientInvoices')}}">
                            <i class="fa-solid fa-file-lines"></i>
                            <span>Invoices</span>
                        </a>
                    </li>

                    {{-- <li class="{{ request()->is('patient/profile_settings*') ? 'active' : '' }}">
                        <a href="{{ route('patientProfile')}}">
                            <i class="fa-solid fa-user-pen"></i>
                            <span>Profile Settings</span>
                        </a>
                    </li>
                     --}}
                    <li class="{{ request()->is('patient/change_password*') ? 'active' : '' }}">
                        <a href="{{ route('patientChangePassword')}}">
                            <i class="fa-solid fa-key"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    
                </ul>
            </nav>
        </div>
    </div>

</div>