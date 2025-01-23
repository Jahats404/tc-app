@extends('landing.layouts.master')
@section('content')

    <!-- ***** Hero Area Start ***** -->
    <div class="hero-area d-flex align-items-center">
        <!-- Hero Thumbnail -->
        <div class="hero-thumbnail equalize bg-img" style="background-image: url(landing/img/bg-img/contact.jpg);"></div>
        
        <!-- Hero Content -->
        <div class="hero-content equalize">
            <div class="container-fluid h-100">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-12 col-md-8">
                        <div class="line"></div>
                        <h2>Fast Booking</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui.</p>
                        <a href="#fastbooking" class="btn sonar-btn white-btn">Book Now <span class="fa fa-arrow-down"></span> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Hero Area End ***** -->

    <section class="sonar-contact-area section-padding-100">
        <!-- back end content -->
        <div class="backEnd-content">
            <img class="dots" src="img/core-img/dots.png" alt="">
        </div>
        
        <div id="fastbooking" class="container">
            <div class="row">
                <!-- Contact Form Area -->
                <div class="col-12">
                    <div class="contact-form text-center">

                        <h2>Fast Book Now</h2>

                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="">Nama *</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Anda">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="">Email *</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Anda">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="">No.WA *</label>
                                        <input type="number" class="form-control" id="no_wa" name="no_wa" placeholder="No. WhatsApp">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="">Instagram *</label>
                                        <input type="text" class="form-control" id="ig_client" name="ig_client" placeholder="Instagram Anda">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="">Tanggal Foto</label>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="">Universitas *</label>
                                        <input type="text" class="form-control" id="universitas" name="universitas" placeholder="Asal Universitas">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="">Area *</label>
                                        <input type="text" class="form-control" id="wilayah" name="wilayah" placeholder="Asal Kota">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn sonar-btn">Kirim</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Maps -->
    {{-- <div class="map-area">
        <div id="googleMap" class="googleMap"></div>
    </div> --}}

@endsection