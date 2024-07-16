<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
               

                @role('Administrator')
                <li class="{{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                    <li class="{{ request()->is('admin/appointments*') ? 'active' : '' }}">
                        <a href="{{ route('admin.appointments') }}"><i class="fe fe-layout"></i>
                            <span>Appointments</span></a>
                    </li>
                    <li class="{{ request()->is('admin/specialities*') ? 'active' : '' }}">
                        <a href="{{ route('admin.specialities') }}"><i class="fe fe-users"></i>
                            <span>Specialities</span></a>
                    </li>
                    <li class="{{ request()->is('admin/doctors*') ? 'active' : '' }}">
                        <a href="{{ route('admin.doctors') }}"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
                    </li>
                    <li class="{{ request()->is('admin/patients*') ? 'active' : '' }}">
                        <a href="{{ route('admin.patients') }}"><i class="fe fe-user"></i> <span>Patients</span></a>
                    </li>
                    <li class="{{ request()->is('admin/reviews*') ? 'active' : '' }}">
                        <a href="{{ route('admin.reviews') }}"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
                    </li>
                    <li class="{{ request()->is('admin/transactions*') ? 'active' : '' }}">
                        <a href="{{ route('admin.transactions') }}"><i class="fe fe-activity"></i>
                            <span>Transactions</span></a>
                    </li>
                @endrole

                @role('Doctor')

                <li class="{{ request()->is('doctor/dashboard*') ? 'active' : '' }}">
                    <a href="{{ route('doctorDashboard') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>

                    <li class="{{ request()->is('doctor/appointments*') ? 'active' : '' }}">
                        <a href="{{ route('doctor.appointments') }}"><i class="fe fe-layout"></i>
                            <span>Appointments</span></a>
                    </li>
                   
                   
                    
                    <li class="{{ request()->is('doctor/reviews*') ? 'active' : '' }}">
                        <a href="{{ route('doctor.reviews') }}"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
                    </li>
                    
                @endrole





            </ul>
        </div>
    </div>
</div>
