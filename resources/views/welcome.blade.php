

<!-- <!DOCTYPE html>
<html>
<head>
    <title>Multi Login System</title>
</head>
<body>

    <h2>Select Login Type</h2>

    <a href="{{ url('/login?type=admin') }}">
        <button>Admin</button>
    </a>

    <a href="{{ url('/login?type=manager') }}">
        <button>Manager</button>
    </a>

    <a href="{{ url('/login?type=coordinator') }}">
        <button>Coordinator</button>
    </a>

</body>
</html> -->
@extends('layouts.header') {{-- Or your layout file --}}

@section('title', 'Header List')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Font -->

    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet"> -->

   

    <title>SukhLife</title>
</head>

<body>
    

    <!-- Carousel Image Slidebar -->

    <!-- <section class="main-slide beige">
        <div class="container-fluid photo position-relative mt-5">
            <div id="carouselExampleIndicators" class="carousel slide pt-4 mt-4" data-bs-ride="carousel">

                <!-- Carousel indicators -->
                <!-- <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div> -->

                <!-- Carousel items -->
                <!-- <div class="carousel-inner border border-5 p-0">
                    <div class="carousel-item active">
                        <img src="template/assets/image 2.jpg" class="d-block w-100 main-image" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="template/assets/image 3.jpg" class="d-block w-100 main-image" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="template/assets/image 4.jpg" class="d-block w-100 main-image" alt="...">
                    </div>
                </div> -->

                <!-- Navigation buttons -->
                <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>  -->

<section class="main-slide beige">
    <div class="container-fluid photo position-relative mt-5">
        <div id="carouselExampleIndicators" class="carousel slide pt-4 mt-4" data-bs-ride="carousel">

            <!-- Carousel indicators -->
            <div class="carousel-indicators">
                @foreach($sliderImages as $index => $image)
                    <button type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide-to="{{ $index }}"
                        class="{{ $index === 0 ? 'active' : '' }}"
                        aria-current="{{ $index === 0 ? 'true' : '' }}"
                        aria-label="Slide {{ $index + 1 }}"></button>
                @endforeach
            </div>

            <!-- Carousel items -->
            <div class="carousel-inner border border-5 p-0">
                @foreach($sliderImages as $index => $image)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/uploads/' . $image->image) }}" class="d-block w-100 main-image" alt="Slider Image {{ $index + 1 }}">

                    </div>
                @endforeach
            </div>

            <!-- Navigation buttons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>




    <!-- Slider1 -->
    <section>
        <div class="m-5 p-5">
            <div
                class="extra_button-wrapper d-lg-flex d-md-flex d-sm-flex justify-content-lg-center justify-content-md-center justify-content-sm-center">
                <div class="extra_button d-flex gap-3">
                    <div class="btn p-3 d-lg-block d-md-none d-sm-none">
                        <a href="./Landing_Page/Member.html" class="button_item">
                            <i class="fi fi-sr-user px-3"></i>
                            <span class="allPurpose">Member Apply</span>
                        </a>
                    </div>
                    <div class="btn p-3 px-sm-3">
                        <a href="./Landing_Page/Upcoming events/Upcoming.html" class="button_item">
                            <i class="fi fi-sr-calendar px-3"></i>
                            <span class="allPurpose">Upcoming Event</span>
                        </a>
                    </div>
                    <div class="btn p-3">
                        <a href="./Landing_Page/" class="button_item">
                            <i class="fi fi-sr-people-line px-3"></i>
                            <span class="allPurpose">Management Team</span>
                        </a>
                    </div>
                    <div class="btn p-3">
                        <a href="./Landing_Page/Donate.html" class="button_item">
                            <i class="fi fi-rr-usd-circle px-3"></i>
                            <span class="allPurpose">Donate</span>
                        </a>
                    </div>
                    <div class="btn p-3 d-lg-block d-md-none d-sm-none">
                        <a href="./Landing_Page/Important Links/Links.html" class="button_item">
                            <i class="fi fi-sr-megaphone px-3"></i>
                            <span class="allPurpose">Crowd Funding</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About us -->

    <section class="About">
        <h2 class="d-flex justify-content-center mt-5 main_name ">About us</h2>
        <div class=" container-lg about-wrapper d-lg-flex gap-3">

            <div class="card1">
                <div class="card">
                    <div class="card-body">
                        <div class="hero">
                            <img src="{{ asset('storage/uploads/' . $aboutus->image) }}" alt="About Us Image" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="card2">
                <div class="card">
                    <div class="card-body">
                        <div class="about_us_content_main">
                            <div class="about_us_content_div">
                                <p>NGO is a passionate advocate for positive change, dedicated to making a tangible
                                    difference in the world. Since our inception [Year], we have been driven by a
                                    singular mission: to empower individuals and communities to thrive through
                                    sustainable development initiatives, education, healthcare access, and environmental
                                    stewardship.</p>

                                <p><strong>Our Values</strong></p>

                                <p>At NGO, our core values of compassion, integrity, and inclusivity guide everything we
                                    do. We believe in the power of collaboration and collective action to address
                                    pressing global challenges and create lasting impact.</p>
                            </div>
                            <div class="readmore_btn_div">
                                <a href="./Landing_Page/About/About.html">read more</a>
                            </div>
                        </div>
                        <!-- <div class="bottom">
                            <button class="btn">Read more </button>
                        </div> -->
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Members -->

    <!-- <section>
        <div class="container-fluid mt-5 mb-5 pb-5">
            <h3 class="member_div text-center fw-bold text-success display-5">Member</h3>
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <div class="people_border">
                        <div class="People_sub_div">
                            <div class="People_img">
                                <img src="template/assets/icon.jpg" class="img-fluid" alt="Profile">
                            </div>
                            <div class="People_Content pt-2">
                                <span class="Name_content" id="name1"><strong>Vaishnavi Goel</strong></span>
                                <div class="position_member d-flex justify-content-center">(Member)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="people_border">
                        <div class="People_sub_div">
                            <div class="People_img">
                                <img src="./assets/lady_photo.jpg" class="img-fluid" alt="Profile">
                            </div>
                            <div class="People_Content pt-2">
                                <span class="Name_content" id="name1">Vaishnavi Goel</span>
                                <div class="position_member d-flex justify-content-center">(Member)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="people_border">
                        <div class="People_sub_div">
                            <div class="People_img">
                                <img src="./assets/man_phot.jpg" class="img-fluid" alt="Profile">
                            </div>
                            <div class="People_Content pt-2">
                                <span class="Name_content" id="name1">Vaishnavi Goel</span>
                                <div class="position_member d-flex justify-content-center">(Member)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="people_border">
                        <div class="People_sub_div">
                            <div class="People_img">
                                <img src="./assets/lady_photo.jpg" class="img-fluid" alt="Profile">
                            </div>
                            <div class="People_Content pt-2">
                                <span class="Name_content" id="name1">Vaishnavi Goel</span>
                                <div class="position_member d-flex justify-content-center">(Member)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="people_border">
                        <div class="People_sub_div">
                            <div class="People_img">
                                <img src="../assets/image 1.jpg" class="img-fluid" alt="Profile">
                            </div>
                            <div class="People_Content pt-2">
                                <span class="Name_content" id="name1">Vaishnavi Goel</span>
                                <div class="position_member d-flex justify-content-center">(Member)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="people_border">
                        <div class="People_sub_div">
                            <div class="People_img">
                                <img src="../assets/image 1.jpg" class="img-fluid" alt="Profile">
                            </div>
                            <div class="People_Content pt-2">
                                <span class="Name_content" id="name1">Vaishnavi Goel</span>
                                <div class="position_member d-flex justify-content-center">(Member)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="people_border">
                        <div class="People_sub_div">
                            <div class="People_img">
                                <img src="../assets/image 1.jpg" class="img-fluid" alt="Profile">
                            </div>
                            <div class="People_Content pt-2">
                                <span class="Name_content" id="name1">Vaishnavi Goel</span>
                                <div class="position_member d-flex justify-content-center">(Member)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="people_border">
                        <div class="People_sub_div">
                            <div class="People_img">
                                <img src="../assets/image 1.jpg" class="img-fluid" alt="Profile">
                            </div>
                            <div class="People_Content pt-2">
                                <span class="Name_content" id="name1">Vaishnavi Goel</span>
                                <div class="position_member d-flex justify-content-center">(Member)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="people_border">
                        <div class="People_sub_div">
                            <div class="People_img">
                                <img src="../assets/image 1.jpg" class="img-fluid" alt="Profile">
                            </div>
                            <div class="People_Content pt-2">
                                <span class="Name_content" id="name1">Vaishnavi Goel</span>
                                <div class="position_member d-flex justify-content-center">(Member)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="people_border">
                        <div class="People_sub_div">
                            <div class="People_img">
                                <img src="../assets/image 1.jpg" class="img-fluid" alt="Profile">
                            </div>
                            <div class="People_Content pt-2">
                                <span class="Name_content" id="name1">Vaishnavi Goel</span>
                                <div class="position_member d-flex justify-content-center">(Member)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="people_border">
                        <div class="People_sub_div">
                            <div class="People_img">
                                <img src="../assets/image 1.jpg" class="img-fluid" alt="Profile">
                            </div>
                            <div class="People_Content">
                                <span class="Name_content" id="name1">Vaishnavi Goel</span>
                                <div class="position_member d-flex justify-content-center">(Member)</div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section> -->


    <section>
    <div class="container-fluid mt-5 mb-5 pb-5">
        <h3 class="member_div text-center fw-bold text-success display-5">Member</h3>
        <div class="owl-carousel owl-theme">
            @foreach($customers as $customer)
                <div class="item">
                    <div class="people_border">
                        <div class="People_sub_div">
                            <div class="People_img">
                                <img src="{{ asset('storage/uploads/' . $customer->profile_image) }}" class="img-fluid" alt="Profile">
                            </div>
                            <div class="People_Content pt-2">
                                <span class="Name_content" id="name1"><strong>{{ $customer->name }}</strong></span>
                                <div class="position_member d-flex justify-content-center">(Member)</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>




    <!-- Management Team -->

    <!-- <section>
        <div class="container-fluid mb-5 pb-5">
            <h3 class="member_div text-center fw-bold text-success display-5">Management Team</h3>
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <div class="people_border">
                        <div class="People_sub_div">
                            <div class="People_img">
                                <img src="./assets/icon.jpg" class="img-fluid" alt="Profile">
                            </div>
                            <div class="People_Content pt-2">
                                <span class="Name_content" id="name1"><strong>Vaishnavi Goel</strong></span>
                                <div class="position_member d-flex justify-content-center">(Member)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="people_border">
                        <div class="People_sub_div">
                            <div class="People_img">
                                <img src="./assets/lady_photo.jpg" class="img-fluid" alt="Profile">
                            </div>
                            <div class="People_Content pt-2">
                                <span class="Name_content" id="name1">Vaishnavi Goel</span>
                                <div class="position_member d-flex justify-content-center">(Member)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="people_border">
                        <div class="People_sub_div">
                            <div class="People_img">
                                <img src="./assets/man_phot.jpg" class="img-fluid" alt="Profile">
                            </div>
                            <div class="People_Content pt-2">
                                <span class="Name_content" id="name1">Vaishnavi Goel</span>
                                <div class="position_member d-flex justify-content-center">(Member)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="people_border">
                        <div class="People_sub_div">
                            <div class="People_img">
                                <img src="./assets/lady_photo.jpg" class="img-fluid" alt="Profile">
                            </div>
                            <div class="People_Content pt-2">
                                <span class="Name_content" id="name1">Vaishnavi Goel</span>
                                <div class="position_member d-flex justify-content-center">(Member)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="people_border">
                        <div class="People_sub_div">
                            <div class="People_img">
                                <img src="../assets/image 1.jpg" class="img-fluid" alt="Profile">
                            </div>
                            <div class="People_Content pt-2">
                                <span class="Name_content" id="name1">Vaishnavi Goel</span>
                                <div class="position_member d-flex justify-content-center">(Member)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="people_border">
                        <div class="People_sub_div">
                            <div class="People_img">
                                <img src="../assets/image 1.jpg" class="img-fluid" alt="Profile">
                            </div>
                            <div class="People_Content pt-2">
                                <span class="Name_content" id="name1">Vaishnavi Goel</span>
                                <div class="position_member d-flex justify-content-center">(Member)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="people_border">
                        <div class="People_sub_div">
                            <div class="People_img">
                                <img src="../assets/image 1.jpg" class="img-fluid" alt="Profile">
                            </div>
                            <div class="People_Content pt-2">
                                <span class="Name_content" id="name1">Vaishnavi Goel</span>
                                <div class="position_member d-flex justify-content-center">(Member)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="people_border">
                        <div class="People_sub_div">
                            <div class="People_img">
                                <img src="../assets/image 1.jpg" class="img-fluid" alt="Profile">
                            </div>
                            <div class="People_Content pt-2">
                                <span class="Name_content" id="name1">Vaishnavi Goel</span>
                                <div class="position_member d-flex justify-content-center">(Member)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="people_border">
                        <div class="People_sub_div">
                            <div class="People_img">
                                <img src="../assets/image 1.jpg" class="img-fluid" alt="Profile">
                            </div>
                            <div class="People_Content pt-2">
                                <span class="Name_content" id="name1">Vaishnavi Goel</span>
                                <div class="position_member d-flex justify-content-center">(Member)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="people_border">
                        <div class="People_sub_div">
                            <div class="People_img">
                                <img src="../assets/image 1.jpg" class="img-fluid" alt="Profile">
                            </div>
                            <div class="People_Content pt-2">
                                <span class="Name_content" id="name1">Vaishnavi Goel</span>
                                <div class="position_member d-flex justify-content-center">(Member)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="people_border">
                        <div class="People_sub_div">
                            <div class="People_img">
                                <img src="../assets/image 1.jpg" class="img-fluid" alt="Profile">
                            </div>
                            <div class="People_Content">
                                <span class="Name_content" id="name1">Vaishnavi Goel</span>
                                <div class="position_member d-flex justify-content-center">(Member)</div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section> -->


    <section>
    <div class="container-fluid mb-5 pb-5">
        <h3 class="member_div text-center fw-bold text-success display-5">Management Team</h3>
        <div class="owl-carousel owl-theme">
            @foreach($managementTeam as $member)
                <div class="item">
                    <div class="people_border">
                        <div class="People_sub_div">
                            <div class="People_img">
                                <img src="{{ asset('storage/uploads/' . $member->image) }}" class="img-fluid" alt="Profile">
                            </div>
                            <div class="People_Content pt-2">
                                <span class="Name_content"><strong>{{ $member->name }}</strong></span>
                                <div class="position_member d-flex justify-content-center">({{ $member->position }})</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>




    <!-- President Message -->

    <!-- <section class="About">
        <h2 class="d-flex justify-content-center mt-5">President Message</h2>
        <div class=" container-lg about-wrapper d-lg-flex gap-3">

            <div class="card1">
                <div class="card">
                    <div class="card-body">
                        <div class="hero">
                            <img src="template/assets/image 3.jpg" alt="..." />
                        </div>
                    </div>
                </div>
            </div>

            <div class="card2">
                <div class="card">
                    <div class="card-body">
                        <div class="about_us_content_div">
                            <p>Dear Friends,</p>

                            <p>It is with great pride and humility that I address you as the President of Demo. Since
                                our founding 2024, our organization has been driven by a simple yet profound belief:
                                that every individual, regardless of circumstance, deserves the opportunity to thrive.
                            </p>

                            <p>At Demo, we are not just dreamers; we are doers. We roll up our sleeves and work
                                tirelessly to turn our vision of a better world into reality. From providing access to
                                education and healthcare to championing environmental sustainability and social justice,
                                our efforts are guided by a deep commitment to making a meaningful difference in the
                                lives of others.</p>
                            <div class="readmore_btn_div">
                                <a href="./Landing_Page/About/About.html">read more</a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
    </section> -->


    <section class="About">
    <h2 class="d-flex justify-content-center mt-5">President Message</h2>
    <div class="container-lg about-wrapper d-lg-flex gap-3">

        <!-- President Image -->
        <div class="card1">
            <div class="card">
                <div class="card-body">
                    <div class="hero">
                        <img src="{{ asset('storage/uploads/' . $companyProfile->president_image) }}" alt="President Image" />
                    </div>
                </div>
            </div>
        </div>

        <!-- President Message -->
        <div class="card2">
            <div class="card">
                <div class="card-body">
                    <div class="about_us_content_div">
                        {{-- You can limit characters using Str::limit --}}
                        <p>{!! Str::limit($companyProfile->president_message, 600) !!}</p>

                        <div class="readmore_btn_div">
                            <a href="{{ url('/about') }}">read more</a> {{-- Link to detailed page --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



    <!-- Latest Activity -->

    <!-- <section class="latest-activity">
        <div class="container-fluid mt-2 pb-2">
            <h1 class="text-center mb-4">Latest Activity</h1>
            <div class=" latest d-flex flex-wrap justify-content-center gap-4">

                
                <div class="activity-card">
                    <div class="video-wrapper">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                            title="Test Video" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>

                    </div>
                    <div class="activity-body">
                        <h5>NGO संस्था में बेहतर फंडिंग / प्रमोशन के लिए 05 आसान तरीके</h5>
                        <a href="#" class="view-detail">View Detail</a>
                        <p class="date"><i class="fi fi-rr-calendar-clock"></i> March 24, 2025 at 12:24 PM <i class="fi fi-ss-redo ps-5"></i></p>
                    </div>
                </div>

                
                <div class="activity-card">
                    <div class="latest-photo">
                        <img src="template/assets/Gallery12.jpg" alt="Give children education" class="card-img" />
                    </div>
                    <div class="activity-body">
                        <h5>Give children a good education & better life</h5>
                        <a href="#" class="view-detail">View Detail</a>
                        <p class="date"><i class="fi fi-rr-calendar-clock"></i> March 23, 2025 at 6:10 PM <i class="fi fi-ss-redo ps-5"></i></p>
                    </div>
                </div>

               
                <div class="activity-card">
                    <div class="latest-photo">
                        <img src="template/assets/Galley2.jpg" alt="Collect fund" class="card-img img-fluid" />
                    </div>
                    <div class="activity-body">
                        <h5>Collect fund for drinking water & healthy food</h5>
                        <a href="#" class="view-detail">View Detail</a>
                        <p class="date"><i class="fi fi-rr-calendar-clock"></i> March 23, 2025 at 6:08 PM <i class="fi fi-ss-redo ps-5"></i></p>
                    </div>
                </div>

            </div>
        </div>
    </section> -->

    <section class="latest-activity">
    <div class="container-fluid mt-2 pb-2">
        <h1 class="text-center mb-4">Latest Activity</h1>
        <div class="latest d-flex flex-wrap justify-content-center gap-4">

            @foreach($activities as $activity)
                <div class="activity-card" style="width: 300px;">
                    <div class="latest-photo">
                        <img src="{{ asset('storage/uploads/' .$activity->timeline_post) }}" alt="{{ $activity->title }}" class="card-img img-fluid" />

                    </div>
                    <div class="activity-body">
                        <h5>{{ $activity->title }}</h5>
                        <a href="#" class="view-detail">View Detail</a>
                        <p class="date">
                            <i class="fi fi-rr-calendar-clock"></i>
                            <h1>ddd</h1>
                            <h1>dcdsbcusydd</h1>
                            <!-- {{ \Carbon\Carbon::parse($activity->event_start)->format('F d, Y \a\t h:i A') }} -->
                            <i class="fi fi-ss-redo ps-5"></i>
                        </p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>



    <!-- Objectives -->

    <!-- <section>
        <div class="container-fluid bg-light py-3 Objective">
            <h2 class="text-center fw-bold mb-4">Our Objectives</h2>
            <div class="d-flex flex-wrap justify-content-center gap-4 px-3">

                
                <div class="objective-card text-white text-center"
                    onclick="window.location.href='motive.php?motive_id=67e138ba9e61e'">
                    <img src="./assets/objective Social work.jpg" alt="Social Welfare">
                    <div class="overlay-text">SOCIAL WELFARE</div>
                </div>

                <div class="objective-card text-white text-center"
                    onclick="window.location.href='motive.php?motive_id=67e1389c21e4d'">
                    <img src="./assets/Health and Research.jpg" alt="Health & Research">
                    <div class="overlay-text">HEALTH & RESEARCH</div>
                </div>

                <div class="objective-card text-white text-center"
                    onclick="window.location.href='motive.php?motive_id=67e1387747ab7'">
                    <img src="./assets/Education and training.jpg" alt="Education & Training">
                    <div class="overlay-text">EDUCATION & TRAINING</div>
                </div>

                <div class="objective-card text-white text-center"
                    onclick="window.location.href='motive.php?motive_id=67e1385e7f538'">
                    <img src="./assets/Human Rights.jpg" alt="Human Rights">
                    <div class="overlay-text">HUMAN RIGHTS</div>
                </div>

                <div class="objective-card text-white text-center"
                    onclick="window.location.href='motive.php?motive_id=67e1384063e6b'">
                    <img src="./assets/Anti crime.jpg" alt="Anti Crime">
                    <div class="overlay-text">ANTI CRIME</div>
                </div>

            </div>
        </div>
    </section> -->

   <section>
    <div class="container-fluid bg-light py-3 Objective">
        <h2 class="text-center fw-bold mb-4">Our Objectives</h2>
        <div class="d-flex flex-wrap justify-content-center gap-4 px-3">
            @foreach($objectives as $objective)
                <div class="objective-card text-white text-center">
                    <img src="{{ asset('storage/uploads/' . $objective->objective_image) }}" alt="{{ $objective->title }}">
                    <div class="overlay-text">{{ strtoupper($objective->title) }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>



    <!-- Gallery -->

    <!-- <section>
        <div class="container-fluid my-5 py-5">
            <h2 class="text-center mb-4">Gallery</h2>

            
            <div id="galleryBox" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" id="gallery">
                    <div class="carousel-item active">
                        <img src="template/assets/Gallery12.jpg" class="d-block w-100" alt="Image 1" data-bs-toggle="modal"
                            data-bs-target="#imageModal" onclick="showInModal(this)">
                    <img src=>

                    </div>
                    <div class="carousel-item">
                        <img src="template/assets/Galley2.jpg" class="d-block w-100" alt="Image 2" data-bs-toggle="modal"
                            data-bs-target="#imageModal" onclick="showInModal(this)">
                    </div>
                </div>

                
                <button class="carousel-control-prev bg-dark" type="button" data-bs-target="#galleryBox"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next bg-dark" type="button" data-bs-target="#galleryBox"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>

        
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content bg-dark">
                    <div class="modal-body text-center p-0">
                        <img id="modalImage" src="" class="img-fluid rounded" alt="Modal Image">
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section>
    <div class="container-fluid my-5 py-5">
        <h2 class="text-center mb-4">Gallery</h2>

        <div id="galleryBox" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" id="gallery">

                @foreach($activities as $index => $activity)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/uploads/' .$activity->timeline_post) }}" class="d-block w-100"
                             alt="{{ $activity->title }}"
                             data-bs-toggle="modal" data-bs-target="#imageModal"
                             onclick="showInModal(this)">
                    </div>
                @endforeach

            </div>

            <button class="carousel-control-prev bg-dark" type="button" data-bs-target="#galleryBox" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next bg-dark" type="button" data-bs-target="#galleryBox" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>

    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-dark">
                <div class="modal-body text-center p-0">
                    <img id="modalImage" src="" class="img-fluid rounded" alt="Modal Image">
                </div>
            </div>
        </div>
    </div>
</section>



    <!-- Testimonial -->

    <!-- <section class="testimonial-section py-5 ">
        <div class="container-fluid">
            <h2 class="text-center mb-4 text-success fw-bold">Testimonial</h2>

            <div class="testimonial-card bg-white rounded-4 shadow p-4">
                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        
                        <div class="carousel-item active">
                            <div class="row align-items-center">
                                
                                <div class="col-1 d-flex justify-content-center">
                                    <button class="carousel-control-prev testimonial-btn" type="button"
                                        data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                </div>

                                
                                <div class="col-10 text-center">
                                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
                                        class="rounded-circle mb-3" width="80" height="80" alt="Avatar">
                                    <p class="lead px-md-4">
                                        Through your compassionate initiatives and remarkable leadership, you have
                                        demonstrated a steadfast
                                        commitment to [mention specific achievements]. Your organization's contributions
                                        have inspired many.
                                    </p>
                                    <h5 class="mb-0">Anirudh</h5>
                                    <small class="text-muted">Member</small>
                                </div>

                                
                                <div class="col-1 d-flex justify-content-center">
                                    <button class="carousel-control-next testimonial-btn" type="button"
                                        data-bs-target="#testimonialCarousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        
                        <div class="carousel-item">
                            <div class="row align-items-center">
                                <div class="col-1 d-flex justify-content-center">
                                    <button class="carousel-control-prev testimonial-btn" type="button"
                                        data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                </div>
                                <div class="col-10 text-center">
                                    <img src="https://cdn-icons-png.flaticon.com/512/219/219970.png"
                                        class="rounded-circle mb-3" width="80" height="80" alt="Avatar">
                                    <p class="lead px-md-4">
                                        Your dedication to the community has made a positive impact on many lives. Keep
                                        doing the good work!
                                    </p>
                                    <h5 class="mb-0">Priya</h5>
                                    <small class="text-muted">Volunteer</small>
                                </div>
                                <div class="col-1 d-flex justify-content-center">
                                    <button class="carousel-control-next testimonial-btn" type="button"
                                        data-bs-target="#testimonialCarousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->



    <section class="testimonial-section py-5">
    <div class="container-fluid">
        <h2 class="text-center mb-4 text-success fw-bold">Testimonial</h2>

        <div class="testimonial-card bg-white rounded-4 shadow p-4">
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($testimonials as $index => $testimonial)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="row align-items-center">
                                <!-- Left Button -->
                                <div class="col-1 d-flex justify-content-center">
                                    <button class="carousel-control-prev testimonial-btn" type="button"
                                        data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                </div>

                                <!-- Content -->
                                <div class="col-10 text-center">
                                    <img src="{{ asset('storage/uploads/' . $testimonial->image) }}" class="rounded-circle mb-3"
                                         width="80" height="80" alt="Avatar">
                                    <p class="lead px-md-4">{{ $testimonial->message }}</p>
                                    <h5 class="mb-0">{{ $testimonial->name }}</h5>
                                    <small class="text-muted">{{ $testimonial->designation }}</small>
                                </div>

                                <!-- Right Button -->
                                <div class="col-1 d-flex justify-content-center">
                                    <button class="carousel-control-next testimonial-btn" type="button"
                                        data-bs-target="#testimonialCarousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

                            




    
</body>

</html>