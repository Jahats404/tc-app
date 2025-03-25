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
                        <h2>Get in Touch with Us!</h2>
                        <p>Have questions or need more information? Contact us now! We're here to help you capture your special graduation moments.</p>
                        <a href="https://api.whatsapp.com/send/?phone=6285156272866&text&type=phone_number&app_absent=0" target="_blank" class="btn sonar-btn white-btn">contact me</a>
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
        
        <div class="container">
            <div class="row">
                <!-- Contact Form Area -->
                <div class="col-12">
                    <div class="contact-form text-center">

                        <h2>I am an experienced photographer</h2>
                        <h4>Let’s talk</h4>

                        <form id="contactForm">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="contact-name" placeholder="Your Name" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="contact-email" placeholder="Your Email" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="contact-subject" placeholder="Subject" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="message" cols="30" rows="5" placeholder="Message" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="button" class="btn sonar-btn" id="sendMessage">Contact Me</button>
                                </div>
                            </div>
                        </form>
                        
                        <script>
                            document.getElementById('sendMessage').addEventListener('click', function () {
                                // Ambil nilai dari input
                                const name = document.getElementById('contact-name').value;
                                const email = document.getElementById('contact-email').value;
                                const subject = document.getElementById('contact-subject').value;
                                const message = document.getElementById('message').value;
                        
                                // Validasi input
                                if (!name || !email || !subject || !message) {
                                    alert('Please fill in all fields.');
                                    return;
                                }
                        
                                // Format pesan WhatsApp
                                const whatsappMessage = `Hello, I would like to inquire:\n\n` +
                                                        `*Name:* ${name}\n` +
                                                        `*Email:* ${email}\n` +
                                                        `*Subject:* ${subject}\n` +
                                                        `*Message:* ${message}\n\n` +
                                                        `Thank you!`;
                        
                                // Encode pesan untuk URL
                                const encodedMessage = encodeURIComponent(whatsappMessage);
                        
                                // Nomor tujuan WhatsApp
                                const whatsappNumber = '6285156272866';
                        
                                // Buat URL WhatsApp
                                const whatsappUrl = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;
                        
                                // Redirect ke WhatsApp
                                window.open(whatsappUrl, '_blank');
                            });
                        </script>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Maps -->
    <div class="map-area">
        <div id="googleMap" class="googleMap"></div>
    </div>

@endsection