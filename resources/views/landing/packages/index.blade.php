@extends('landing.layouts.master')
@section('content')
    <!-- ***** Hero Area Start ***** -->
    <div class="hero-area d-flex align-items-center">
        <!-- Hero Thumbnail -->
        <div class="hero-thumbnail equalize bg-img" style="background-image: url(landing/img/bg-img/serv.jpg);"></div>
        
        <!-- Hero Content -->
        <div class="hero-content equalize">
            <div class="container-fluid h-100">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-12 col-md-8">
                        <div class="line"></div>
                        <h2>I provide top quality packages</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Hero Area End ***** -->

    <style>
    .expired {
        display: block;
        margin-left: 5%;
        font-size: 0.8em;
        color: #888;
    }
    </style>
    <!-- ***** Services Area Start ***** -->
    <div class="sonar-services-area section-padding-100-50">
        <div class="container">
            <div class="row">
                <!-- Single Services Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-services-area wow fadeInUp" data-wow-delay="300ms">
                        <h4>Private I</h4>
                            <li>For 1 Graduated</li>
                            <li>30 Minute Photo Session</li>
                            <li>Unlimited Shots</li>
                            <li>15 Photo Edited</li>
                            <li>All File on G-Drive <span class="expired">*Expired 14 Day</span></li>
                            <li>Location on Campus <span class="expired">*If outside campus, additional fees apply</span></li>
                    </div>
                </div>
                <!-- Single Services Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-services-area wow fadeInUp" data-wow-delay="300ms">
                        <h4>Couple or Partner</h4>
                            <li>For 2 Graduated</li>
                            <li>1 Hours Photo Session</li>
                            <li>Unlimited Shots</li>
                            <li>30 Photo Edited</li>
                            <li>Included Self Potrait <span class="expired">*in last 15 minutes of the photoshoot session</span></li>
                            <li>All File on G-Drive <span class="expired">*Expired 14 Day</span></li>
                            <li>Location on Campus <span class="expired">*If outside campus, additional fees apply</span></li>
                    </div>
                </div>
                <!-- Single Services Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-services-area wow fadeInUp" data-wow-delay="300ms">
                        <h4>Group I</h4>
                            <li>For 3-5 Graduated</li>
                            <li>1 Hours Photo Session</li>
                            <li>Unlimited Shots</li>
                            <li>30 Photo Edited</li>
                            <li>Group Photo Only</li>
                            <li>All File on G-Drive <span class="expired">*Expired 14 Day</span></li>
                            <li>Location on Campus <span class="expired">*If outside campus, additional fees apply</span></li>
                    </div>
                </div>
                <div class="col-12">
                    <div class="call-to-action-content">
                        <a href="{{ route('fastbooking') }}" class="btn sonar-btn ">More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Services Area End ***** -->

    <div class="sonar-testimonials-area bg-img" style="background-image: url(img/bg-img/tes.jpg);">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-10 col-lg-7">
                    <div class="testimonial-content bg-white">
                        <div class="section-heading text-left">
                            <div class="line"></div>
                            <h2>Testimonials</h2>
                        </div>

                        <div class="testimonial-slides owl-carousel">

                            <div class="single-tes-slide">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Suspendisse sit amet laoreet neque. Fusce sagittis suscipit sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Suspendisse sit amet laoreet neque.</p>
                                <h6>Maria Smith, Bride</h6>
                            </div>

                            <div class="single-tes-slide">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Suspendisse sit amet laoreet neque. Fusce sagittis suscipit sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Suspendisse sit amet laoreet neque.</p>
                                <h6>Maria Smith, Bride</h6>
                            </div>

                            <div class="single-tes-slide">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Suspendisse sit amet laoreet neque. Fusce sagittis suscipit sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Suspendisse sit amet laoreet neque.</p>
                                <h6>Maria Smith, Bride</h6>
                            </div>

                            <div class="single-tes-slide">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Suspendisse sit amet laoreet neque. Fusce sagittis suscipit sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Suspendisse sit amet laoreet neque.</p>
                                <h6>Maria Smith, Bride</h6>
                            </div>

                            <div class="single-tes-slide">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Suspendisse sit amet laoreet neque. Fusce sagittis suscipit sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Suspendisse sit amet laoreet neque.</p>
                                <h6>Maria Smith, Bride</h6>
                            </div>

                            <div class="single-tes-slide">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Suspendisse sit amet laoreet neque. Fusce sagittis suscipit sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Suspendisse sit amet laoreet neque.</p>
                                <h6>Maria Smith, Bride</h6>
                            </div>

                            <div class="single-tes-slide">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Suspendisse sit amet laoreet neque. Fusce sagittis suscipit sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Suspendisse sit amet laoreet neque.</p>
                                <h6>Maria Smith, Bride</h6>
                            </div>

                            <div class="single-tes-slide">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Suspendisse sit amet laoreet neque. Fusce sagittis suscipit sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Suspendisse sit amet laoreet neque.</p>
                                <h6>Maria Smith, Bride</h6>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="cool-facts-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Cool Fact-->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-fact-area text-center mb-100 wow fadeInUpBig" data-wow-delay="250ms">
                        <img src="landing/img/core-img/golden-ratio.png" alt="">
                        <h2><span class="counter">149</span></h2>
                        <p>Happy Brides</p>
                    </div>
                </div>
                <!-- Single Cool Fact-->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-fact-area text-center mb-100 wow fadeInUpBig" data-wow-delay="500ms">
                        <img src="landing/img/core-img/canvas.png" alt="">
                        <h2><span class="counter">2391</span></h2>
                        <p>Landscape Photos</p>
                    </div>
                </div>
                <!-- Single Cool Fact-->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-fact-area text-center mb-100 wow fadeInUpBig" data-wow-delay="750ms">
                        <img src="landing/img/core-img/mouse.png" alt="">
                        <h2><span class="counter">245</span></h2>
                        <p>Airbrushed Photos</p>
                    </div>
                </div>
                <!-- Single Cool Fact-->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-fact-area text-center mb-100 wow fadeInUpBig" data-wow-delay="1000ms">
                        <img src="landing/img/core-img/coffee.png" alt="">
                        <h2><span class="counter">128</span></h2>
                        <p>Coffes a month</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Call to Action Area Start ***** -->
    <div class="sonar-call-to-action-area bg-gray section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="call-to-action-content">
                        <h2>We are experienced photographer</h2>
                        <h5>Let’s fast booking now</h5>
                        <a href="{{ route('fastbooking') }}" class="btn sonar-btn mt-100">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Call to Action Area End ***** -->
@endsection