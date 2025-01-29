@extends('landing.layouts.master')
@section('content')

    <!-- ***** Hero Area Start ***** -->
    <div class="hero-area d-flex align-items-center">
        <!-- Hero Thumbnail -->
        <div class="hero-thumbnail equalize bg-img" style="background-image: url(landing/img/bg-img/portfolio.jpg);"></div>
        
        <!-- Hero Content -->
        <div class="hero-content equalize">
            <div class="container-fluid h-100">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-12 col-md-8">
                        <div class="line"></div>
                        <h2>Take a look our Portfolio</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio Menu -->
        <div class="sonar-portfolio-menu">
            <div class="text-center portfolio-menu">
                <button class="btn active" data-filter="*">All</button>
                <button class="btn" data-filter=".landscapes">UGM</button>
                <button class="btn" data-filter=".portraits">UI</button>
                <button class="btn" data-filter=".fashion">UNSOED</button>
                <button class="btn" data-filter=".studio">UII</button>
            </div>
        </div>
    </div>
    <!-- ***** Hero Area End ***** -->

    
    <!-- ****** Gallery Area Start ****** -->
    <section class="sonar-projects-area" id="projects">
        <script src="https://static.elfsight.com/platform/platform.js" async></script>
        <div class="elfsight-app-dc5f5a37-ca7d-42ae-822d-1a7eaa11b541" data-elfsight-app-lazy></div>
        <div class="container-fluid">
            
            <div class="row sonar-portfolio">

                
                <!-- Single gallery Item -->
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item landscapes studio wow fadeInUpBig" data-wow-delay="300ms">
                    <a class="gallery-img" href="landing/img/portfolio-img/1.jpg"><img src="landing/img/portfolio-img/1.jpg" alt=""></a>
                    <!-- Gallery Content -->
                    <div class="gallery-content">
                        <h4>Mountains in the mist</h4>
                        <p>Landscapes</p>
                    </div>
                </div>

                <!-- Single gallery Item -->
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item portraits fashion wow fadeInUpBig" data-wow-delay="500ms">
                    <a class="gallery-img" href="landing/img/portfolio-img/2.jpg"><img src="landing/img/portfolio-img/2.jpg" alt=""></a>
                    <!-- Gallery Content -->
                    <div class="gallery-content">
                        <h4>A beautifull encounter</h4>
                        <p>Portrait</p>
                    </div>
                </div>

                <!-- Single gallery Item -->
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item landscapes studio wow fadeInUpBig" data-wow-delay="700ms">
                    <a class="gallery-img" href="landing/img/portfolio-img/3.jpg"><img src="landing/img/portfolio-img/3.jpg" alt=""></a>
                    <!-- Gallery Content -->
                    <div class="gallery-content">
                        <h4>Mountains in the mist</h4>
                        <p>Landscapes</p>
                    </div>
                </div>

                <!-- Single gallery Item -->
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item portraits studio wow fadeInUpBig" data-wow-delay="900ms">
                    <a class="gallery-img" href="landing/img/portfolio-img/4.jpg"><img src="landing/img/portfolio-img/4.jpg" alt=""></a>
                    <!-- Gallery Content -->
                    <div class="gallery-content">
                        <h4>A beautifull encounter</h4>
                        <p>Portrait</p>
                    </div>
                </div>

                <!-- Single gallery Item -->
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item landscapes fashion wow fadeInUpBig" data-wow-delay="300ms">
                    <a class="gallery-img" href="landing/img/portfolio-img/5.jpg"><img src="landing/img/portfolio-img/5.jpg" alt=""></a>
                    <!-- Gallery Content -->
                    <div class="gallery-content">
                        <h4>Mountains in the mist</h4>
                        <p>Landscapes</p>
                    </div>
                </div>

                <!-- Single gallery Item -->
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item portraits fashion wow fadeInUpBig" data-wow-delay="500ms">
                    <a class="gallery-img" href="landing/img/portfolio-img/6.jpg"><img src="landing/img/portfolio-img/6.jpg" alt=""></a>
                    <!-- Gallery Content -->
                    <div class="gallery-content">
                        <h4>A beautifull encounter</h4>
                        <p>Portrait</p>
                    </div>
                </div>

                <!-- Single gallery Item -->
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item landscapes fashion wow fadeInUpBig" data-wow-delay="700ms">
                    <a class="gallery-img" href="landing/img/portfolio-img/7.jpg"><img src="landing/img/portfolio-img/7.jpg" alt=""></a>
                    <!-- Gallery Content -->
                    <div class="gallery-content">
                        <h4>Mountains in the mist</h4>
                        <p>Landscapes</p>
                    </div>
                </div>

                <!-- Single gallery Item -->
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item portraits studio wow fadeInUpBig" data-wow-delay="900ms">
                    <a class="gallery-img" href="landing/img/portfolio-img/8.jpg"><img src="landing/img/portfolio-img/8.jpg" alt=""></a>
                    <!-- Gallery Content -->
                    <div class="gallery-content">
                        <h4>A beautifull encounter</h4>
                        <p>Portrait</p>
                    </div>
                </div>

                <!-- Single gallery Item -->
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item landscapes studio wow fadeInUpBig" data-wow-delay="300ms">
                    <a class="gallery-img" href="landing/img/portfolio-img/9.jpg"><img src="landing/img/portfolio-img/9.jpg" alt=""></a>
                    <!-- Gallery Content -->
                    <div class="gallery-content">
                        <h4>Mountains in the mist</h4>
                        <p>Landscapes</p>
                    </div>
                </div>

                <!-- Single gallery Item -->
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item portraits wow fadeInUpBig" data-wow-delay="500ms">
                    <a class="gallery-img" href="landing/img/portfolio-img/10.jpg"><img src="landing/img/portfolio-img/10.jpg" alt=""></a>
                    <!-- Gallery Content -->
                    <div class="gallery-content">
                        <h4>A beautifull encounter</h4>
                        <p>Portrait</p>
                    </div>
                </div>

                <!-- Single gallery Item -->
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item landscapes wow fadeInUpBig" data-wow-delay="700ms">
                    <a class="gallery-img" href="landing/img/portfolio-img/11.jpg"><img src="landing/img/portfolio-img/11.jpg" alt=""></a>
                    <!-- Gallery Content -->
                    <div class="gallery-content">
                        <h4>Mountains in the mist</h4>
                        <p>Landscapes</p>
                    </div>
                </div>

                <!-- Single gallery Item -->
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item portraits wow fadeInUpBig" data-wow-delay="900ms">
                    <a class="gallery-img" href="landing/img/portfolio-img/12.jpg"><img src="landing/img/portfolio-img/12.jpg" alt=""></a>
                    <!-- Gallery Content -->
                    <div class="gallery-content">
                        <h4>A beautifull encounter</h4>
                        <p>Portrait</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center">
                    <a href="#" class="btn sonar-btn">Load More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** Gallery Area End ****** -->
@endsection