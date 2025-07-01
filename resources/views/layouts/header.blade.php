<!DOCTYPE html>
<html lang="en">
<head>
    @php
        use Illuminate\Support\Facades\DB;
        $company = DB::table('company_profile')->first();
    @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>{{ $company->brand_name }}</title>

 <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/fontawesome.min.css"
        integrity="sha384-NvKbDTEnL+A8F/AA5Tc5kmMLSJHUO868P+lDtTpJIeQdGYaUIuLr4lVGOEA1OcMy" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-brands/css/uicons-brands.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/3.0.0/uicons-bold-straight/css/uicons-bold-straight.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <!-- <link rel="stylesheet" href="http://127.0.0.1:8000/template/color.css"> -->
    <link rel="stylesheet" href="{{ asset('template/color.css') }}">
    <link rel="stylesheet" href="{{ asset('template/style.css') }}">

    <!-- <link rel="stylesheet" href="http://127.0.0.1:8000/template/style.css"> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- OWL CARAOUSEL MIN.CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Other styles -->
</head>
<style>
    /* Reduce logo and font size on small screens */
@media (max-width: 768px) {
    #Logo_Image {
        max-height: 60px;
        width: auto;
    }

    .brand-name {
        font-size: 1.5rem; 
        line-height: 1.2;
    }

    .logo-container {
        flex-shrink: 0;
    }
    .navbar-toggler-icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    vertical-align: middle;
    background-repeat: no-repeat;
    background-position: center;
    background-size: 100%;
}
}
  .goog-te-banner-frame.skiptranslate {
    display: none !important;
  }
  body {
    top: 0px !important; 
  }
  .goog-logo-link {
    display: none !important;
  }
  .goog-te-gadget {
    color: transparent !important;
  }

  .footer{
    background-color: #fff!important;
  }

</style>
<body>
<header class="fixed-top bg-white mb-5 pt-1">
        <div class="container-fluid">
            <div class="row align-items-center">
      <div class="col-12 col-lg-8 d-flex align-items-center gap-3">
    <!-- Logo -->
    <div class="logo-container">
        <img src="{{ asset('storage/uploads/' . $company->website_logo) }}" class="img-fluid" id="Logo_Image">
    </div>
    
    <!-- Brand Name -->
    <div class="main_name brand-name mb-0">
        {{ $company->brand_name }}
    </div>
            </div>
                <div class="col-12 col-lg-4 d-flex justify-content-space-between gap-3 mt-lg-0">
                    <!-- Members Only Box -->
                    <div class="icon-box d-flex align-items-center px-3 py-2 gap-3 d-lg-block d-none"
                        id="Members_Apply">
                        <a href="{{ url('/member-apply') }}" class="link-box">
                            <i class="fi fi-rr-fingerprint-identification"></i>
                            <span>Members Apply</span>
                        </a>
                    </div>

                    <!-- Donate Box -->
                    <div class="icon-box align-items-center justify-content-center px-3 py-2 d-lg-block d-none"
                        id="Donate_Header">
                        <a href="{{ url('/donate-website') }}" class="link-box gap-2 text-decoration-none text-white">
                            <i class="fi fi-bs-indian-rupee-sign"></i>
                            <span>Donate</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-top border-dark "></div>
        <div class="navbar-container p-1">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand d-lg-none" href="#">Menu</a> 

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/member-apply') }}">Members Apply</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/id-card') }}">ID Card Download</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/upcoming-event-website') }}">Upcoming Events</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/donate-website') }}">Donate</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/list-of-donors') }}">List Of Donors</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/contact-us-website') }}">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/contact-us-website') }}">Contact Us</a></li>

                <!-- About Us Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="aboutDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        About Us
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                        <li><a class="dropdown-item" href="{{ url('/about-us-website') }}">About Us</a></li>
                        <li><a class="dropdown-item" href="{{ url('/management-team-website') }}">Management Team</a></li>
                        <li><a class="dropdown-item" href="{{ url('/team-member-website') }}">Our Team</a></li>
                        <li><a class="dropdown-item" href="{{ url('/achievement-website') }}">Achievements</a></li>
                        <li><a class="dropdown-item" href="{{ url('/certification-website') }}">Certifications</a></li>
                    </ul>
                </li>

                <!-- Important Links Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="importantDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Important Links
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="importantDropdown">
                        <li><a class="dropdown-item" href="{{ url('/crowdfunding-website') }}">CrowdFunding</a></li>
                        <li><a class="dropdown-item" href="{{ url('/our-solution-website') }}">Our Solution</a></li>
                        <li><a class="dropdown-item" href="{{ url('/your-problem-website') }}">Your Problem</a></li>
                        <li><a class="dropdown-item" href="{{ url('/our-project-website') }}">Our Project</a></li>
                    </ul>
                </li>

                <!-- Login Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="loginDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Login
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="loginDropdown">
                        <li><a class="dropdown-item" href="{{ url('/login?type=coordinator') }}">
                            <i class="fi fi-ss-sign-in-alt px-2 d-none d-lg-inline"></i>Coordinator Login</a></li>
                        <li><a class="dropdown-item" href="{{ url('/login?type=manager') }}">
                            <i class="fi fi-ss-sign-in-alt px-2 d-none d-lg-inline"></i>Manager Login</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

        </div>
    </header>


  <!-- <div class="container-fluid mt-4"> -->
         @yield('header')
        <div style="background-color: #f0f0f0; min-height: 100vh; padding-top: 20px; padding-bottom: 20px;">
    @yield('content')
</div>
    <!-- </div>  -->

       <!-- Footer -->


    <div class="footer mb-5">
        <div class="container-lg">
            <hr class="success">
            <div class="row justify-content-center text-center">
                <div class="col-12 col-lg-4 mb-4">
                    <span><i class="fi fi-rr-land-layer-location"></i> Address - </span>
                    <span>{{ $company->address }}</span>
                </div>
                <div class="col-12 col-lg-4 mb-4">
                    <span><i class="fi fi-rr-phone-call"></i> Call us - </span>
                    <span>{{ $company->mobile }}</span>
                </div>
                <div class="col-12 col-lg-4 mb-4">
                    <span><i class="fi fi-rr-envelope"></i> Email - </span>
                    <span>{{ $company->email }}</span>
                </div>
            </div>
            <!-- <div class="d-flex justify-content-center">
                <div class=" main-logo">
                    <img class="img-fluid" src="./Shiba1.png">
                </div>
            </div> -->


            <div class="line"></div>
            <div class="row justify-content-center text-center pt-2">
                <div class="col-12 col-lg-4 mb-4 my-3 " id="follow_page">
                    <div class="justify-content-md-start pb-5">
                                <img src="{{ asset('storage/uploads/' . $company->website_logo) }}" class="img-fluid" id="Logo_Image">

                    </div>
                    <h5>Follow Us</h5>
                    <div class="brand-logo pt-3">
                        <a href="{{ $company->facebook_link }}" class="facebook-bg"><i class="fi fi-brands-facebook facebook-bg"></i></a>
                        <a href="{{ $company->instagram_link }}" class="insta-bg"><i class="fi fi-brands-instagram"></i></a>
                        <a href="{{ $company->twitter_link }}" class="twitter-bg"><i class="fi fi-brands-twitter-alt-circle"></i></a>
                        <a href="{{ $company->youtube_link }}" class="youtube-bg"><i class="fi fi-brands-youtube"></i></a>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4 d-lg-block d-md-none d-sm-none">
                    <div class="footer-hero my-3">
                        <div class="footer-hero-heading">
                            <h4>Useful Links</h4>
                            <hr>
                        </div>
               
                        <ul class="row d-flex justify-content-start">
                            <li class="col-12 col-lg-6 col-md-6 col-sm-12 text-start"><a href="{{ route('home') }}">Home</a></li>
                            <li class="col-12 col-lg-6 col-md-6 col-sm-12 text-start"><a
                                    href="{{ url('/upcoming-event-website') }}">Latest
                                    Event</a></li>
                            <li class="col-12 col-lg-6 col-md-6 col-sm-12 text-start"><a
                                    href="{{ url('/member-apply') }}">Member
                                    Apply</a></li>
                            <li class="col-12 col-lg-6 col-md-6 col-sm-12 text-start"><a
                                    href="{{ route('donate.php') }}">Donation</a></li>
                            <li class="col-12 col-lg-6 col-md-6 col-sm-12 text-start"><a
                                    href="{{ url('/team-member-website') }}">Team&nbsp;Member</a>
                            </li>
                            <li class="col-12 col-lg-6 col-md-6 col-sm-12 text-start"><a href=" gallery.php">Gallery</a>
                            </li>
                            <li class="col-12 col-lg-6 col-md-6 col-sm-12 text-start"><a href="{{ url('/list-of-donors') }}">List of
                                    Donors</a>
                            </li>
                            <li class="col-12 col-lg-6 col-md-6 col-sm-12 text-start"><a
                                    href=" {{ url('/management-team-website') }}">Management&nbsp;Team</a>
                            </li>
                            <li class="col-12 col-lg-6 col-md-6 col-sm-12 text-start"><a
                                    href="{{ url('/contact-us-website') }}">Contact&nbsp;Us</a>
                            </li>
                            <li class="col-12 col-lg-6 col-md-6 col-sm-12 text-start"><a href=" {{ url('/id-card') }}">ID
                                    Card
                                    Download</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4 my-3 d-lg-block d-md-none d-sm-none">
                    <div class="box">
                        the box
                    </div>
                </div>
            </div>
            <div class="copyright-area">
                <div class="container mb-0">
                    <div class="row w-100 align-items-center">
                        <div class="col-xl-6 col-lg-6 text-lg-left d-lg-block d-md-none d-sm-none">
                            <div class="Copyright-claim">
                                <p>Copyright © 2025, All Right Reserved <a href="index.php">{{ $company->brand_name }}</a></p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6  text-center ">
                            <div class="footer-menu ">
                                <ul class="d-flex gap-3 justify-content-center">
                                    <li><a href="{{ url('/tnc-website') }}">Terms &amp; Condition</a></li>
                                    <li><a href="{{ url('/privacy-policy-website') }}">Privacy Policy</a></li>
                                    <li><a href="{{ url('/desclaimer-website') }}">Disclaimer</a></li>
                                    <li><a href="{{ url('/refund-policy-website') }}">Refund Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Google Translate -->
<div id="google_translate_element" class="translate-fixed"></div>

<style>
  .translate-fixed {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 9999;
    background: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    box-shadow: 0 0 8px rgba(0,0,0,0.2);
  }

  .goog-te-banner-frame.skiptranslate {
    display: none !important;
  }
  body {
    top: 0px !important; 
  }
  .goog-logo-link {
    display: none !important;
  }
</style>

<script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement(
      {pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE},
      'google_translate_element'
    );
  }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    </body>
    
    </html> 
<!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- OWL CAROUSEL MIN.JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="template/App.js"></script>