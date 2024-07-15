<footer class="footer">
    <div class="footer-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="footer-widget footer-about text-center">
                        <div class="footer-logo">
                            <img src="{{ asset('assets/img/logo.png')}}" height="130px" alt="logo" />
                        </div>
                        <div class="footer-about-content">
                            <p>DocOnTap is a user-friendly platform designed to streamline the process of booking appointments with healthcare providers.
                            </p>
                            <div class="social-icon">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fab fa-dribbble"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container-fluid">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="copyright-text text-center">
                            <p class="mb-0">
                                &copy; 2024 DocOnTap. All rights reserved.
                            </p>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="mouse-cursor cursor-outer"></div>
<div class="mouse-cursor cursor-inner"></div>
</div>

<div class="progress-wrap active-progress">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
            style="
    transition: stroke-dashoffset 10ms linear 0s;
    stroke-dasharray: 307.919px, 307.919px;
    stroke-dashoffset: 228.265px;
  ">
        </path>
    </svg>
</div>


{{-- Modals  --}}

@yield('modals')

<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/js/slick.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/js/backToTop.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/js/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/js/aos.js') }}" type="text/javascript"></script>

@yield('js')

<script src="{{ asset('assets/js/script.js') }}" type="text/javascript"></script>

</body>

<!-- Mirrored from doccure.dreamstechnologies.com/html/template/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 06:51:47 GMT -->

</html>
