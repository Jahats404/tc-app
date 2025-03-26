@extends('layouts.master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">FOTO</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-wrap align-items-center">
            <h6 class="m-0 font-weight-bold text-primary flex-grow-1">Daftar Antrian Foto</h6>
            @php
                $jumlahAntrian = \App\Models\Foto::count();
                $cekAntrian = \App\Models\Foto::where('status_foto','Editing')->orderBy('antrian','asc')->first();
                if ($cekAntrian) {
                    $antrianSekarang = $cekAntrian->antrian;
                } else {
                    $antrianSekarang = $jumlahAntrian;
                }
            @endphp
            <span class="badge badge-dark">Antrian Sekarang : {{ $antrianSekarang . '/' . $jumlahAntrian }}</span>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th class="text-center">NO</th>
                            <th class="text-center">CLIENT</th>
                            <th class="text-center">STATUS FOTO</th>
                            {{-- <th class="text-center">ANTRIAN</th> --}}
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($foto as $item)
                            <tr class="text-center">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item->pesanan->booking->nama }}</td>
                                <td class="text-center">
                                    @php
                                        $statusColors = [
                                            'Sending' => 'secondary',
                                            'Listing' => 'info',
                                            'Editing' => 'primary',
                                            'Complete' => 'success'
                                        ];
                                        $status = $item->status_foto ?? '-'; // Jika null, set default "-"
                                        $badgeClass = $statusColors[$status] ?? 'dark'; // Gunakan 'dark' jika status tidak dikenali
                                    @endphp
                                    @if ($status !== '-')
                                        <span class="badge badge-{{ $badgeClass }}">{{ $status }}</span>
                                    @else
                                        -
                                    @endif
                                </td>
                                {{-- <td>{{ $item->antrian ?? '-' }}</td> --}}
                                <td>
                                    <div class="d-flex justify-content-center">
                                        {{-- <a href="#" class="btn btn-secondary btn-circle btn-sm mr-2" data-toggle="modal" data-target="#modalLink{{ $item->id_foto }}" title="Link">
                                            <i class="fas fa-link"></i>
                                        </a> --}}
                                        <a href="#" class="btn btn-warning btn-circle btn-sm mr-2" data-toggle="modal" data-target="#modalEdit{{ $item->id_foto }}" title="Update">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </a>
                                        <form action="{{ route('admin.delete.foto',$item->id_foto) }}" method="POST" class="delete-form">
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
                            @include('admin.foto.modal',['item' => $item])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@include('validasi.notifikasi')
@include('validasi.notifikasi-error')
@endsection