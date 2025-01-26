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
@endforeach
