@extends('layouts.master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">KELOLA PESANAN</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between flex-wrap">
            <!-- Title -->
            <h6 class="m-0 font-weight-bold text-primary">Neraca</h6>

            <!-- Actions -->
            <div class="d-flex align-items-center flex-wrap">
                <!-- Tanggal Keberangkatan Input -->
                <form action="" method="GET" class="d-flex align-items-center mr-3">
                    <div class="form-group d-flex mb-0 align-items-center">
                        <input type="month" name="bulan" value="{{ request()->get('bulan') }}" id="filterTanggal"
                            class="form-control form-control-sm mr-2" placeholder="Pilih bulan">
                        <button type="submit" class="btn btn-sm btn-primary shadow-sm d-flex align-items-center">
                            <i class="fas fa-file-export fa-sm text-white-50 mr-1"></i> Export
                        </button>
                    </div>
                </form>

            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive" style="overflow-x: auto; white-space: nowrap;">
                <table class="table table-bordered" id="pesanan" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th style="min-width: 150px;">NO</th>
                            <th style="min-width: 150px;">TANGGAL</th>
                            <th style="min-width: 150px;">NEGARA</th>
                            <th style="min-width: 150px;">KOTA</th>
                            <th style="min-width: 150px;">UNIV</th>
                            <th style="min-width: 150px;">NAMA</th>
                            <th style="min-width: 150px;">WAKTU</th>
                            <th style="min-width: 150px;">PAKET</th>
                            <th style="min-width: 150px;">FG</th>
                            <th style="min-width: 150px;">FAKULTAS</th>
                            <th style="min-width: 150px;">LOKASI FOTO</th>
                            <th style="min-width: 150px;">UPLOAD IG</th>
                            <th style="min-width: 150px;">KETERANGAN</th>
                            <th style="min-width: 150px;">STATUS FOTO</th>
                            <th style="min-width: 150px;">HARGA</th>
                            <th style="min-width: 150px;">TOTAL PAKET TAMBAHAN</th>
                            <th style="min-width: 150px;">DP</th>
                            <th style="min-width: 150px;">KEKURANGAN</th>
                            <th style="min-width: 150px;">PELUNASAN</th>
                            <th style="min-width: 150px;">TOTAL</th>
                            <th style="min-width: 150px;">FREELANCE</th>
                            <th style="min-width: 150px;">NOMOR WA</th>
                            <th style="min-width: 150px;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $cek = 0;
                        @endphp
                        @foreach ($pesanan as $item)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->booking->tanggal)->translatedFormat('d F Y') ?? '-' }}</td>
                                <td>{{ $item->booking->negara ?? 'Indonesia' }}</td>
                                <td>{{ $item->booking->kota ?? '-' }}</td>
                                <td>{{ $item->booking->universitas ?? '-' }}</td>
                                <td>{{ $item->booking->nama ?? '-' }}</td>
                                <td>{{ $item->booking->jam . '-' . $item->booking->jam_selesai ?? '-' }}</td>
                                <td>{{ $item->booking->harga_paket->paket->kategori_paket->nama_kategori . ' ' . $item->booking->harga_paket->paket->nama_paket }}</td>
                                <td>{{ $item->fotografer->nama ?? '-' }}</td>
                                <td>{{ $item->booking->fakultas ?? '-' }}</td>
                                <td>{{ $item->booking->lokasi_foto ?? '-' }}</td>
                                <td>{{ $item->booking->post_foto ?? '-' }}</td>
                                <td>{{ $item->keterangan ?? '-' }}</td>

                                <td>{{ $item->foto->status_foto ?? '-' }}</td>
                                <td>{{ 'Rp ' . number_format($item->booking->harga_paket->harga, 0, ',', '.') ?? '-' }}</td>
                                <td>{{ 'Rp ' . number_format($item->harga_paket_tambahan, 0, ',', '.') ?? '-' }}</td>
                                <td>{{ 'Rp ' . number_format($item->booking->dp, 0, ',', '.') ?? '-' }}</td>
                                <td>{{ 'Rp ' . number_format($item->kekurangan, 0, ',', '.') ?? '-' }}</td>
                                <td>{{ 'Rp ' . number_format($item->pelunasan, 0, ',', '.') ?? '-' }}</td>
                                <td>{{ 'Rp ' . number_format($item->total, 0, ',', '.') ?? '-' }}</td>
                                <td>{{ 'Rp ' . number_format($item->freelance, 0, ',', '.') ?? '-' }}</td>
                                <td>{{ $item->booking->no_wa ?? '-' }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="" class="btn btn-info btn-circle btn-sm mr-2" data-toggle="modal" data-target="#modalDP{{ $item->id_pesanan }}" title="Update">
                                            <i class="fas fa-file-image"></i>
                                        </a>
                                        <a href="#" class="btn btn-warning btn-circle btn-sm mr-2" data-toggle="modal" data-target="#modalEdit{{ $item->id_pesanan }}" title="Update">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </a>
                                        <form action="" method="POST" class="delete-form">
                                            <button type="submit" class="btn btn-danger btn-circle btn-sm delete-btn mr-2" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        
                            <!-- Modal file -->
                            <div class="modal fade" id="modalDP{{ $item->id_pesanan }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel{{ $item->id_booking }}">Bukti DP <span class="font-weight-bold">{{ $item->booking->nama }}</span> </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @if ($item->booking->file_dp)
                                                <span class="text-muted text-center">Bukti DP</span> <br>
                                                <img src="{{ asset('storage/' . $item->booking->file_dp) }}" class="card-img-top" alt="...">
                                            @else
                                                <p class="text-muted text-center">Bukti DP Tidak ditemukan!</p>
                                            @endif
                                            <hr>
                                            @if ($item->booking->file_pelunasan)
                                                <span class="text-muted text-center">Bukti Pelunasan</span> <br>
                                                <img src="{{ asset('storage/' . $item->booking->file_pelunasan) }}" class="card-img-top" alt="...">
                                            @else
                                                <p class="text-muted text-center">Bukti Pelunasan Tidak ditemukan!</p>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- SweetAlert Delete --}}
                            <script>
                                // Pilih semua tombol dengan kelas delete-btn
                                document.querySelectorAll('.delete-btn').forEach(button => {
                                    button.addEventListener('click', function (e) {
                                        e.preventDefault(); // Mencegah pengiriman form langsung
                            
                                        const form = this.closest('form'); // Ambil form terdekat dari tombol yang diklik
                            
                                        Swal.fire({
                                            title: 'Apakah data ini akan dihapus?',
                                            text: "Data yang dihapus tidak dapat dikembalikan!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#d33',
                                            cancelButtonColor: '#3085d6',
                                            confirmButtonText: 'Ya, hapus!',
                                            cancelButtonText: 'Batal'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                form.submit(); // Kirim form jika pengguna mengonfirmasi
                                            }
                                        });
                                    });
                                });
                            </script>
                            @include('admin.pesanan.modal',['item' => $item])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Saat nilai bulan berubah, kirimkan data bulan dengan AJAX
        document.getElementById('filterTanggal').addEventListener('change', function () {
            let bulan = this.value;
            
            // Jika bulan dipilih, kirimkan filter ke server
            if (bulan) {
                fetchPesananByBulan(bulan);
            }
        });
    
        // Fungsi untuk mengirim permintaan AJAX dan memperbarui data pesanan
        function fetchPesananByBulan(bulan) {
            // Kirimkan permintaan ke server
            $.ajax({
                url: window.location.href, // Menggunakan URL yang sama untuk permintaan
                method: 'GET',
                data: {
                    bulan: bulan
                },
                success: function(response) {
                    // Perbarui tabel dengan data baru
                    $('#pesanan tbody').html(response);
                }
            });
        }
    </script>
    {{-- <style>
        .table-responsive {
            overflow-x: scroll !important;
            white-space: nowrap;
        }

        #pesanan {
            min-width: 1500px; /* Sesuaikan dengan kebutuhan */
        }
    </style> --}}
    
@include('validasi.notifikasi')
@include('validasi.notifikasi-error')
@endsection