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

                        <form id="fastBookingForm" action="{{ route('store.fastbooking') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="">Nama*</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Anda" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="">Email*</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Anda" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="">No.WA*</label>
                                        <input type="number" class="form-control" id="no_wa" name="no_wa" placeholder="No. WhatsApp" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="">Instagram</label>
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
                                        <label for="">Universitas*</label>
                                        <input type="text" class="form-control" id="universitas" name="universitas" placeholder="Asal Universitas" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="">Area*</label>
                                        <input type="text" class="form-control" id="kota" name="kota" placeholder="Asal Kota" required>
                                        {{-- <select class="form-control" name="kota" id="kota">
                                            <option value="">-- Pilih Area --</option>
                                            @foreach ($wilayah as $item)
                                                <option value="{{ $item->nama_wilayah }}">{{ $item->nama_wilayah }}</option>
                                            @endforeach
                                        </select> --}}
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn sonar-btn" id="submitForm">Kirim</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('submitForm').addEventListener('click', function () {
            // Ambil data dari form
            const nama = document.getElementById('nama').value;
            const email = document.getElementById('email').value;
            const noWa = document.getElementById('no_wa').value;
            const igClient = document.getElementById('ig_client').value || '-';
            const tanggal = document.getElementById('tanggal').value;
            const universitas = document.getElementById('universitas').value;
            const kota = document.getElementById('kota').value;
    
            // Validasi form
            if (!nama || !email || !noWa || !universitas || !kota) {
                alert('Harap lengkapi semua field yang bertanda *');
                return;
            }
    
            // Format pesan WhatsApp
            const message = `Halo kak, saya dengan biodata berikut:

Nama: ${nama}
Email: ${email}
No. WA: ${noWa}
Instagram: ${igClient}
Tanggal Foto: ${tanggal}
Universitas: ${universitas}
Area: ${kota}

Saya ingin meminta price list.
                        `.trim();
    
            // Encode pesan untuk URL
            const encodedMessage = encodeURIComponent(message);
    
            // Nomor tujuan WhatsApp
            const whatsappNumber = '6285878653934';
    
            // Buat URL WhatsApp
            const whatsappUrl = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;
    
            // Redirect ke WhatsApp
            window.open(whatsappUrl, '_blank');
    
            // Submit form ke server
            document.getElementById('fastBookingForm').submit();
        });
    </script>

    <!-- Google Maps -->
    {{-- <div class="map-area">
        <div id="googleMap" class="googleMap"></div>
    </div> --}}

@endsection