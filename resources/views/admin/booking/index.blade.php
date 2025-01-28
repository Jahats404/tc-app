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
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>EMAIL</th>
                            <th>NO. WA</th>
                            <th>EVENT</th>
                            <th>TANGGAL</th>
                            <th>JAM</th>
                            <th>UNIVERSITAS</th>
                            <th>FAKULTAS</th>
                            <th>LOKASI FOTO</th>
                            <th>PAKET</th>
                            <th>IG VENDOR</th>
                            <th>IG CLIENT</th>
                            <th>POST FOTO</th>
                            <th>JML ANGGOTA</th>
                            <th>REQ KHUSUS</th>
                            <th>STATUS</th>
                            <th>HARGA</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($booking as $item)
                            <tr class="text-center">
                                <td style="max-width: 200px; width: 100px;">{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->no_wa }}</td>
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
                                <td>{{ $item->ig_vendor ?? '-' }}</td>
                                <td>{{ $item->ig_client ?? '-' }}</td>
                                <td>
                                    @if ($item->post_foto == 'yes')
                                        <span class="badge badge-success">{{ $item->post_foto }}</span>
                                    @elseif ($item->post_foto == 'no')
                                        <span class="badge badge-danger">{{ $item->post_foto }}</span>
                                    @endif
                                <td>{{ $item->jumlah_anggota }}</td>
                                <td>{{ $item->req_khusus ?? '-' }}</td>
                                <td>
                                    @if ($item->status_booking == 'Pending')
                                        <span class="badge badge-info">{{ $item->status_booking }}</span>
                                    @elseif ($item->status_booking == 'Accepted')
                                        <span class="badge badge-success">{{ $item->status_booking }}</span>
                                    @elseif ($item->status_booking == 'Rejected')
                                        <span class="badge badge-danger">{{ $item->status_booking }}</span>
                                    @elseif ($item->status_booking == 'Cancelled')
                                        <span class="badge badge-warning">{{ $item->status_booking }}</span>
                                    @endif
                                </td>
                                <td>{{ 'Rp ' . number_format($item->harga_paket?->harga, 0, ',', '.') }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="#" class="btn btn-warning btn-circle btn-sm mr-2" data-toggle="modal" data-target="#modalEdit{{ $item->id_booking }}" title="Update">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </a>
                                        <form action="{{ route('admin.ubah.status.booking',$item->id_booking) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="status_booking" value="Accepted">
                                            <button class="btn btn-success btn-circle btn-acc btn-sm mr-2" type="submit"><i class="fas fa-solid fa-check"></i></button>
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
                            
                            <script>
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
@include('validasi.notifikasi')
@include('validasi.notifikasi-error')
@endsection