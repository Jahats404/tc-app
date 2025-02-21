@extends('layouts.master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">KELOLA BOOKING</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-wrap align-items-center">
            <h6 class="m-0 font-weight-bold text-primary flex-grow-1">Daftar Booking</h6>
            <button type="button" class="btn btn-sm btn-primary shadow-sm mt-2 mt-md-0" data-toggle="modal" data-target="#modalTambah">
                <i class="fas fa-solid fa-folder-plus fa-sm text-white-50"></i> Tambah Booking
            </button>
        </div>

        @include('admin.booking.modal-tambah-booking',['hargaPaket' => $hargaPaket])

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered nowrap" id="booking" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th style="text-align: center">NO</th>
                            <th style="text-align: center">NAMA</th>
                            <th style="text-align: center">EMAIL</th>
                            <th style="text-align: center">NO. WA</th>
                            <th style="text-align: center">EVENT</th>
                            <th style="text-align: center">TANGGAL FOTO</th>
                            <th style="text-align: center">JAM</th>
                            <th style="text-align: center">UNIVERSITAS</th>
                            <th style="text-align: center">FAKULTAS</th>
                            <th style="text-align: center">LOKASI FOTO</th>
                            <th style="text-align: center">PAKET</th>
                            <th style="text-align: center">{{ \App\Models\Booking::$mua }}</th>
                            <th style="text-align: center">IG CLIENT</th>
                            <th style="text-align: center">POST FOTO</th>
                            <th style="text-align: center">JML ANGGOTA</th>
                            <th style="text-align: center">CATATAN</th>
                            <th style="text-align: center">STATUS</th>
                            <th style="text-align: center">HARGA</th>
                            <th style="text-align: center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($booking as $item)
                            <tr class="text-center">
                                <td style="max-width: 200px; width: 100px;">{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->email }}</td>
                                <td style="text-align: left">
                                    <!-- Mengubah nomor WA jika dimulai dengan '0' -->
                                    @php
                                        $waNumber = $item->no_wa;
                                        // Cek apakah nomor WA dimulai dengan '0'
                                        if (substr($waNumber, 0, 1) === '0') {
                                            $waNumber = '62' . substr($waNumber, 1); // Ganti '0' dengan '62'
                                        }
                                    @endphp
                                    
                                    <!-- Menampilkan nomor WA dengan ikon WhatsApp -->
                                    <a href="https://wa.me/{{ $waNumber }}" target="_blank">
                                        <i class="fab fa-whatsapp"></i> {{ $waNumber }}
                                    </a>
                                </td>
                                <td>{{ $item->event }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') ?? '-' }}</td>
                                <td>
                                    @if ($item->jam_selesai)
                                        {{ $item->jam . '-' . $item->jam_selesai }}
                                    @else
                                        {{ $item->jam ?? '-' }}
                                    @endif
                                </td>
                                <td>{{ $item->universitas }}</td>
                                <td>{{ $item->fakultas }}</td>
                                <td>{{ $item->lokasi_foto }}</td>
                                <td>{{ $item->harga_paket?->paket->kategori_paket->nama_kategori . ' ' . $item->harga_paket?->paket->nama_paket }}</td>
                                <td>
                                    <!-- IG Vendor, menghapus '@' jika ada -->
                                    @php
                                        $igVendor = $item->ig_vendor;
                                        if ($igVendor && substr($igVendor, 0, 1) === '@') {
                                            $igVendor = substr($igVendor, 1); // Hapus '@' di depan
                                        }
                                    @endphp
                                    @if ($igVendor)
                                        <a href="https://instagram.com/{{ $igVendor }}" target="_blank">{{ $igVendor }}</a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <!-- IG Client, menghapus '@' jika ada -->
                                    @php
                                        $igClient = $item->ig_client;
                                        if ($igClient && substr($igClient, 0, 1) === '@') {
                                            $igClient = substr($igClient, 1); // Hapus '@' di depan
                                        }
                                    @endphp
                                    @if ($igClient)
                                        <a href="https://instagram.com/{{ $igClient }}" target="_blank">{{ $igClient }}</a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if ($item->post_foto == 'Bersedia')
                                        <span class="badge badge-success">{{ $item->post_foto }}</span>
                                    @elseif ($item->post_foto == 'Tidak Bersedia')
                                        <span class="badge badge-danger">{{ $item->post_foto }}</span>
                                    @else
                                        -
                                    @endif
                                <td style="text-align: center">{{ $item->jumlah_anggota ?? '-' }}</td>
                                <td>{{ $item->req_khusus ?? '-' }}</td>
                                <td>
                                    @if ($item->status_booking == 'Pending')
                                        <span class="badge badge-info">{{ $item->status_booking }}</span>
                                    @elseif ($item->status_booking == 'Accepted')
                                        <span class="badge badge-success">{{ $item->status_booking }}</span>
                                    @elseif ($item->status_booking == 'Rejected')
                                        <span class="badge badge-warning">{{ $item->status_booking }}</span>
                                    @elseif ($item->status_booking == 'Cancelled')
                                        <span class="badge badge-danger">{{ $item->status_booking }}</span>
                                    @endif
                                </td>
                                <td>{{ 'Rp ' . number_format($item->harga_paket?->harga, 0, ',', '.') }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="#" class="btn btn-warning btn-circle btn-sm mr-2" data-toggle="modal" data-target="#modalEdit{{ $item->id_booking }}" title="Update">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </a>
                                        {{-- <form action="{{ route('admin.ubah.status.booking',$item->id_booking) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="status_booking" value="Accepted">
                                            <button class="btn btn-success btn-circle btn-acc btn-sm mr-2" type="submit"><i class="fas fa-solid fa-check"></i></button>
                                        </form> --}}

                                        <form action="{{ route('admin.ubah.status.booking', $item->id_booking) }}" method="post" class="accept-form">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="status_booking" value="Accepted">
                                            <button 
                                                class="btn btn-success btn-circle btn-acc btn-sm mr-2" 
                                                type="button" 
                                                data-phone="{{ $item->no_wa }}"
                                            >
                                                <i class="fas fa-solid fa-check"></i>
                                            </button>
                                        </form>

                                        <form action="{{ route('admin.ubah.status.booking',$item->id_booking) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="status_booking" value="Rejected">
                                            <button class="btn btn-info btn-circle btn-reject btn-sm mr-2" type="submit"><i class="fas fa-times"></i></button>
                                        </form>
                                        <form action="{{ route('admin.delete.booking',$item->id_booking) }}" method="POST" class="delete-form">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-circle btn-sm delete-btn mr-2" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            {{-- SweetAlert Delete --}}
                            
                            {{-- <script>
                                // Pilih semua tombol dengan kelas delete-btn
                                document.querySelectorAll('.btn-acc').forEach(button => {
                                    button.addEventListener('click', function (e) {
                                        e.preventDefault(); // Mencegah pengiriman form langsung
                            
                                        const form = this.closest('form'); // Ambil form terdekat dari tombol yang diklik
                            
                                        Swal.fire({
                                            title: 'Apakah booking ini akan diterima?',
                                            // text: "Data yang dihapus tidak dapat dikembalikan!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#d33',
                                            cancelButtonColor: '#3085d6',
                                            confirmButtonText: 'Ya, Terima',
                                            cancelButtonText: 'Batal'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                form.submit(); // Kirim form jika pengguna mengonfirmasi
                                            }
                                        });
                                    });
                                });
                            </script> --}}

                            {{-- <script>
                                document.querySelectorAll('.btn-acc').forEach(button => {
    button.addEventListener('click', function (e) {
        e.preventDefault(); // Mencegah pengiriman form langsung

        const form = this.closest('form'); // Ambil form terdekat dari tombol yang diklik
        let phoneNumber = this.getAttribute('data-phone'); // Ambil nomor WhatsApp dari atribut data-phone

        // Cek jika nomor telepon dimulai dengan 0 dan ganti menjadi 62
        if (phoneNumber.startsWith('0')) {
            phoneNumber = '62' + phoneNumber.slice(1);
        }

        // Cek jika nomor telepon valid
        console.log('Phone number:', phoneNumber);

        // Popup konfirmasi menggunakan SweetAlert2
        Swal.fire({
            title: 'Apakah booking ini akan diterima?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Terima',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Log untuk memastikan form submit
                console.log('Form will be submitted!');
                form.submit();

                // Format nomor telepon (hilangkan karakter selain angka)
                const formattedPhoneNumber = phoneNumber.replace(/\D/g, '');
                console.log('Formatted phone number:', formattedPhoneNumber);

                // Template pesan WhatsApp yang akan dikirim
                const message = `Terimakasih ka, Dp sudah masuk yah 
Selanjutnya, Kaka akan di hubungi oleh team FG kita di H-2 atau H-1 Wisuda yah ka.
                
*Untuk Pelunasan setelah sesi Foto selesai, dan bukti Transfer untuk syarat akses Link Hasil foto pada hari itu,*

Link foto akan dikirimkan setelah proses Upload ke G-drive selesai yah ka (Malam Hari/Ke-esokan harinya Maksimal H+2)

Proses edit akan berlangsung maksimal 3-10hari,
*Apabila setelah mendapat link dan belum melilih photo sampai selama 3 hari*, pemilihan photo untuk edit akan di serahkan kepada team Tersimpan Cerita yah ka
                
*Penting!!*
Apabila Cancel secara sepihak maka DP akan hangus , untuk Reschedule Tanggal dan Jam dilakukan H-7 (*Dengan catatan Jam yang di inginkan masih kosong, apabila penuh maka sesuai dengan Booking awal*)
                
Terimakasih,
See you on your happy day ka`;

                // Encode pesan untuk URL (karena URL harus aman)
                const encodedMessage = encodeURIComponent(message);

                // Buat URL WhatsApp
                const whatsappUrl = `https://wa.me/${formattedPhoneNumber}?text=${encodedMessage}`;

                // Log untuk mengecek URL WhatsApp
                console.log('WhatsApp URL:', whatsappUrl);

                // Coba menggunakan window.location.href jika window.open tidak bekerja
                window.location.href = whatsappUrl;
                // window.open(whatsappUrl, '_blank');
            }
        });
    });
});
 
                            </script> --}}

                            <script>
                                document.querySelectorAll('.btn-acc').forEach(button => {
                                    button.addEventListener('click', function (e) {
                                        e.preventDefault(); // Mencegah pengiriman form langsung
                            
                                        const form = this.closest('form'); // Ambil form terdekat dari tombol yang diklik
                                        let phoneNumber = this.getAttribute('data-phone'); // Ambil nomor WhatsApp dari atribut data-phone
                            
                                        // Cek jika nomor telepon dimulai dengan 0 dan ganti menjadi 62
                                        if (phoneNumber.startsWith('0')) {
                                            phoneNumber = '62' + phoneNumber.slice(1);
                                        }
                            
                                        // Cek jika nomor telepon valid
                                        console.log('Phone number:', phoneNumber);
                            
                                        // Popup konfirmasi menggunakan SweetAlert2
                                        Swal.fire({
                                            title: 'Apakah booking ini akan diterima?',
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#d33',
                                            cancelButtonColor: '#3085d6',
                                            confirmButtonText: 'Ya, Terima',
                                            cancelButtonText: 'Batal'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                // Log untuk memastikan form submit
                                                console.log('Form will be submitted!');
                                                form.submit();
                            
                                                // Format nomor telepon (hilangkan karakter selain angka)
                                                const formattedPhoneNumber = phoneNumber.replace(/\D/g, '');
                                                console.log('Formatted phone number:', formattedPhoneNumber);
                            
                                                // Template pesan WhatsApp yang akan dikirim
                const message = `Terimakasih ka, Dp sudah masuk yah 
Selanjutnya, Kaka akan di hubungi oleh team FG kita di H-2 atau H-1 Wisuda yah ka.
                
*Untuk Pelunasan setelah sesi Foto selesai, dan bukti Transfer untuk syarat akses Link Hasil foto pada hari itu,*

Link foto akan dikirimkan setelah proses Upload ke G-drive selesai yah ka (Malam Hari/Ke-esokan harinya Maksimal H+2)

Proses edit akan berlangsung maksimal 3-10hari,
*Apabila setelah mendapat link dan belum melilih photo sampai selama 3 hari*, pemilihan photo untuk edit akan di serahkan kepada team Tersimpan Cerita yah ka
                
*Penting!!*
Apabila Cancel secara sepihak maka DP akan hangus , untuk Reschedule Tanggal dan Jam dilakukan H-7 (*Dengan catatan Jam yang di inginkan masih kosong, apabila penuh maka sesuai dengan Booking awal*)
                
Terimakasih,
See you on your happy day ka ✨😍`;
                            
                                                // Encode pesan untuk URL (karena URL harus aman)
                                                const encodedMessage = encodeURIComponent(message);
                            
                                                // Buat URL WhatsApp
                                                const whatsappUrl = `https://wa.me/${formattedPhoneNumber}?text=${encodedMessage}`;
                            
                                                // Log untuk mengecek URL WhatsApp
                                                console.log('WhatsApp URL:', whatsappUrl);
                            
                                                // Buka WhatsApp di jendela/tab baru dengan pengaturan keamanan
                                                window.open(whatsappUrl, '_blank', 'noopener,noreferrer');
                                            }
                                        });
                                    });
                                });
                            </script>
                            
                            <script>
                                // Pilih semua tombol dengan kelas delete-btn
                                document.querySelectorAll('.btn-reject').forEach(button => {
                                    button.addEventListener('click', function (e) {
                                        e.preventDefault(); // Mencegah pengiriman form langsung
                            
                                        const form = this.closest('form'); // Ambil form terdekat dari tombol yang diklik
                            
                                        Swal.fire({
                                            title: 'Apakah booking ini akan ditolak?',
                                            // text: "Data yang dihapus tidak dapat dikembalikan!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#d33',
                                            cancelButtonColor: '#3085d6',
                                            confirmButtonText: 'Ya, Tolak',
                                            cancelButtonText: 'Batal'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                form.submit(); // Kirim form jika pengguna mengonfirmasi
                                            }
                                        });
                                    });
                                });
                            </script>
                            @include('admin.booking.modal',['item' => $item])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Inisialisasi Select2 saat modal ditampilkan
            $('#modalTambah').on('shown.bs.modal', function () {
                $('.js-example-basic-single').select2({
                    dropdownParent: $('#modalTambah') // Pastikan dropdown berada dalam modal
                });
            });
        });
        $(document).ready(function() {
            // Inisialisasi Select2 saat modal dengan ID yang dimulai dengan "modalEdit" ditampilkan
            $('div[id^="modalEdit"]').on('shown.bs.modal', function () {
                $(this).find('.js-example-basic-single-update').select2({
                    dropdownParent: $(this) // Pastikan dropdown berada dalam modal yang benar
                });
            });
        });
    </script>

@include('validasi.notifikasi')
@include('validasi.notifikasi-error')
@endsection