@extends('layouts.master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">KELOLA PESANAN</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between flex-wrap">
            <!-- Title -->
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pesanan</h6>

            <!-- Actions -->
            <div class="d-flex align-items-center flex-wrap">
                <!-- Tanggal Keberangkatan Input -->
                <form action="{{ route('admin.export.pesanan') }}" method="GET" class="d-flex align-items-center mr-3">
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
            <div class="table-responsive">
                <table class="table table-bordered nowrap" id="pesanan" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th style="text-align: center;">NO</th>
                            <th style="text-align: center;">TANGGAL</th>
                            <th style="text-align: center;">NEGARA</th>
                            <th style="text-align: center;">KOTA</th>
                            <th style="text-align: center;">UNIV</th>
                            <th style="text-align: center;">NAMA</th>
                            <th style="text-align: center;">NOMOR WA</th>
                            <th style="text-align: center;">WAKTU</th>
                            <th style="text-align: center;">PAKET</th>
                            <th style="text-align: center;">FG</th>
                            <th style="text-align: center;">FAKULTAS</th>
                            <th style="text-align: center;">LOKASI FOTO</th>
                            <th style="text-align: center;">UPLOAD IG</th>
                            <th style="text-align: center;">KETERANGAN</th>
                            <th style="text-align: center;">STATUS FOTO</th>
                            <th style="text-align: center;">HARGA</th>
                            <th style="text-align: center;">TOTAL PAKET TAMBAHAN</th>
                            <th style="text-align: center;">DP</th>
                            <th style="text-align: center;">KEKURANGAN</th>
                            <th style="text-align: center;">PELUNASAN</th>
                            <th style="text-align: center;">TOTAL</th>
                            <th style="text-align: center;">FREELANCE</th>
                            <th style="text-align: center;">AKSI</th>
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
                                <td style="text-align: left">
                                    @php
                                        // Mendapatkan nomor WA
                                        $waNumber = $item->booking->no_wa ?? '-';
                            
                                        // Cek jika nomor WA dimulai dengan '0', ubah menjadi '62'
                                        if ($waNumber !== '-' && substr($waNumber, 0, 1) === '0') {
                                            $waNumber = '62' . substr($waNumber, 1);
                                        }
                                    @endphp
                                    
                                    @if ($waNumber !== '-')
                                        <!-- Membuat link WhatsApp yang dapat diklik -->
                                        <a href="https://wa.me/{{ $waNumber }}" target="_blank">
                                            <i class="fab fa-whatsapp"></i> {{ $waNumber }}
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>
                                @php
                                    $jamMulai = $item->booking->jam ? Carbon\Carbon::parse($item->booking->jam)->format('H:i') : null;
                                @endphp
                                <td>{{ $jamMulai . '-' . $item->booking->jam_selesai ?? '-' }}</td>
                                <td>{{ $item->booking->harga_paket->paket->kategori_paket->nama_kategori . ' ' . $item->booking->harga_paket->paket->nama_paket }}</td>
                                <td>{{ $item->fotografer->nama ?? '-' }}</td>
                                <td>{{ $item->booking->fakultas ?? '-' }}</td>
                                <td>{{ $item->booking->lokasi_foto ?? '-' }}</td>
                                <td>
                                    @if ($item->booking->post_foto == 'Bersedia')
                                        <span class="badge badge-success">{{ $item->booking->post_foto }}</span>
                                    @elseif ($item->booking->post_foto == 'Tidak Bersedia')
                                        <span class="badge badge-danger">{{ $item->booking->post_foto }}</span>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $item->keterangan ?? '-' }}</td>

                                {{-- STATUS FOTO --}}
                                <td>
                                    @if ($item->foto)
                                        @php
                                            $statusColors = [
                                                'Sending' => 'secondary',
                                                'Listing' => 'info',
                                                'Editing' => 'primary',
                                                'Complete' => 'success'
                                            ];
                                            $status = $item->foto->status_foto ?? '-'; // Jika null, set default "-"
                                            $badgeClass = $statusColors[$status] ?? 'dark'; // Gunakan 'dark' jika status tidak dikenali
                                        @endphp
                                        @if ($status !== '-')
                                            <span class="badge badge-{{ $badgeClass }}">{{ $status }}</span>
                                        @else
                                            -
                                        @endif
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ 'Rp ' . number_format($item->booking->harga_paket->harga, 0, ',', '.') ?? '-' }}</td>
                                <td>{{ 'Rp ' . number_format($item->harga_paket_tambahan, 0, ',', '.') ?? '-' }}</td>
                                <td>{{ 'Rp ' . number_format($item->booking->dp, 0, ',', '.') ?? '-' }}</td>
                                <td>{{ 'Rp ' . number_format($item->kekurangan, 0, ',', '.') ?? '-' }}</td>
                                <td>{{ 'Rp ' . number_format($item->pelunasan, 0, ',', '.') ?? '-' }}</td>
                                <td>{{ 'Rp ' . number_format($item->total, 0, ',', '.') ?? '-' }}</td>
                                <td>{{ 'Rp ' . number_format($item->freelance, 0, ',', '.') ?? '-' }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        {{-- <a href="" class="btn btn-info btn-circle btn-sm mr-2" data-toggle="modal" data-target="#modalDP{{ $item->id_pesanan }}" title="Bukti TF">
                                            <i class="fas fa-file-image"></i>
                                        </a> --}}
                                        <a href="{{ route('admin.export.faktur',$item->id_pesanan) }}" target="_blank" class="btn btn-info btn-circle btn-sm mr-2 {{ $item->booking?->dp ? '' : 'disabled' }}" title="Faktur">
                                            <i class="fas fa-file"></i>
                                        </a>
                                        <a href="" class="btn btn-success btn-circle btn-sm mr-2" data-toggle="modal" data-target="#modalPelunasan{{ $item->id_pesanan }}" title="Bukti Pesanan">
                                            <i class="fas fa-money-bill"></i>
                                        </a>
                                        <a href="#" class="btn btn-warning btn-circle btn-sm mr-2" data-toggle="modal" data-target="#modalEdit{{ $item->id_pesanan }}" title="Update">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </a>
                                        {{-- <form action="{{ route('admin.delete.pesanan',$item->id_pesanan) }}" method="POST" class="delete-form">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-circle btn-sm delete-btn mr-2" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form> --}}
                                    </div>
                                </td>
                            </tr>
                        
                            <!-- Modal file Pelunasan -->
                            <div class="modal fade" id="modalPelunasan{{ $item->id_pesanan }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel{{ $item->id_pesanan }}">Pelunasan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('admin.add.pelunasan',$item->id_pesanan) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="pelunasan" class="col-form-label">Jumlah Pelunasan</label>
                                                    <input id="pelunasan" 
                                                    oninput="formatNumberr(this)" 
                                                    type="text" 
                                                    value="{{ old('pelunasan',number_format($item->pelunasan ?? 0, 0, ',', '.')) }}" name="pelunasan" min="0" class="form-control @error('pelunasan') is-invalid @enderror" id="pelunasan">
                                                    @error('pelunasan')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="file_dp">Upload Bukti Pelunasan </label>
                                                    <input 
                                                        type="file" 
                                                        name="file_pelunasan" 
                                                        id="file_pelunasan" 
                                                        class="form-control @error('file_pelunasan') is-invalid @enderror">
                                                    @if($item->file_pelunasan)
                                                        <small class="form-text text-muted">
                                                            File Pelunasan saat ini: 
                                                            <a href="{{ asset('storage/' . $item->file_pelunasan) }}">Lihat DP</a>.
                                                            Biarkan kosong jika tidak ingin mengganti.
                                                        </small>
                                                    @endif
                                                    @error('file_pelunasan')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- <!-- Modal file -->
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
                            </div> --}}
                            
                            @include('admin.pesanan.modal',['item' => $item])
                        @endforeach
                    </tbody>
                </table>
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
    
@include('validasi.notifikasi')
@include('validasi.notifikasi-error')
@endsection