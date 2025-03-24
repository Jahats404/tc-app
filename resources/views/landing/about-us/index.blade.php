@extends('landing.layouts.master')
@section('content')
    <!-- ***** Hero Area Start ***** -->
    <div class="hero-area d-flex align-items-center">
        <!-- Back End Content -->
        <div class="backEnd-content">
            <img class="dots" src="img/core-img/dots.png" alt="">
        </div>

        <!-- Hero Thumbnail -->
        <div class="hero-thumbnail aboutUs equalize bg-img" style="background-image: url(landing/img/bg-img/about1.jpg);"></div>
        
        <!-- Hero Content -->
        <div class="hero-content aboutUs equalize">
            <div class="container-fluid h-100">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-12 col-md-10">
                        <div class="line"></div>
                        <h2>Do you know about us?</h2>
                        <p>We are Tersimpan Cerita, a premier provider of photographic services. With a reputation for excellence and delivering high-quality images, we specialize in Graduation, Wedding, engagement, Couple Session Servic.</p>
                        <a href="{{ route('fastbooking') }}" class="btn sonar-btn white-btn">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Hero Area End ***** -->

    <div class="sonar-about-us-area bg-img" style="background-image: url(landing/img/bg-img/1.jpg);">
        <!-- Back End Content -->
        <div class="backEnd-content">
            <h2>Dream</h2>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-10 col-lg-7">
                    <div class="about-us-content bg-white">
                        <div class="section-heading text-left wow fadeInUp" data-wow-delay="300ms">
                            <div class="line"></div>
                            <h2>Look at our qualities</h2>
                        </div>
                        <p style="color: black">Our team is dedicated to capturing moments with precision and creativity, ensuring that each project meets the highest standards of quality. We pride ourselves on being a reliable partner, committed to bringing your vision to life through our photography.</p>
                        <!-- Progress Bar Content Area -->
                        <div class="services-progress-bar mt-50 wow fadeInUp" data-wow-delay="900ms">
                            <!-- Single Progress Bar -->
                            <div class="single_progress_bar">
                                <div id="bar1" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span class="fill" data-percentage="80"></span>
                                </div>
                                <p>Pacience</p>
                            </div>
                            <!-- Single Progress Bar -->
                            <div class="single_progress_bar">
                                <div id="bar2" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span class="fill" data-percentage="90"></span>
                                </div>
                                <p>Creativity</p>
                            </div>
                            <!-- Single Progress Bar -->
                            <div class="single_progress_bar">
                                <div id="bar3" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span class="fill" data-percentage="100"></span>
                                </div>
                                <p>Commited</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
@endsection