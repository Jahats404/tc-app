{{-- EDIT --}}
<div class="modal fade" id="modalEdit{{ $item->id_booking }}" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Edit Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.update.booking',$item->id_booking) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama" class="col-form-label">Nama</label>
                        <input type="text" value="{{ old('nama',$item->nama) }}" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email</label>
                        <input type="email" value="{{ old('email',$item->email) }}" name="email" class="form-control @error('email') is-invalid @enderror" id="email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_wa" class="col-form-label">No. WA</label>
                        <input type="text" value="{{ old('no_wa',$item->no_wa) }}" name="no_wa" class="form-control @error('no_wa') is-invalid @enderror" id="no_wa">
                        @error('no_wa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="event" class="col-form-label">Event</label>
                        <input type="text" value="{{ old('event',$item->event) }}" name="event" class="form-control @error('event') is-invalid @enderror" id="event">
                        @error('event')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal" class="col-form-label">Tanggal</label>
                        <input type="date" value="{{ old('tanggal',$item->tanggal) }}" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal">
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jam_selesai" class="col-form-label">Jam</label>
                        <input type="time" value="{{ old('jam',$item->jam) }}" name="jam" class="form-control @error('jam') is-invalid @enderror" id="jam">
                        @error('jam')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jam_selesai" class="col-form-label">Jam Selesai</label>
                        <input type="time" value="{{ old('jam_selesai',$item->jam_selesai) }}" name="jam_selesai" class="form-control @error('jam_selesai') is-invalid @enderror" id="jam_selesai">
                        @error('jam_selesai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="universitas" class="col-form-label">Universitas</label>
                        <input type="text" value="{{ old('universitas',$item->universitas) }}" name="universitas" class="form-control @error('universitas') is-invalid @enderror" id="universitas">
                        @error('universitas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fakultas" class="col-form-label">Fakultas</label>
                        <input type="text" value="{{ old('fakultas',$item->fakultas) }}" name="fakultas" class="form-control @error('fakultas') is-invalid @enderror" id="fakultas">
                        @error('fakultas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lokasi_foto" class="col-form-label">Lokasi Foto</label>
                        <input type="text" value="{{ old('lokasi_foto',$item->lokasi_foto) }}" name="lokasi_foto" class="form-control @error('lokasi_foto') is-invalid @enderror" id="lokasi_foto">
                        @error('lokasi_foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga_paket_id" class="col-form-label">Paket</label>
                        <select id="harga_paket_id" name="harga_paket_id" class="form-control @error('harga_paket_id') is-invalid @enderror">
                            <option selected disabled value="">--Pilih Paket--</option>
                            @foreach ($hargaPaket as $harga)
                                <option value="{{ $harga->id_harga_paket }}" {{ old('harga_paket_id',$item->harga_paket_id) == $harga->id_harga_paket ? 'selected' : '' }}>{{ $harga->paket->kategori_paket->nama_kategori . ' ' . $harga->paket->nama_paket }}, {{ $harga->golongan == 'W1' ? 'Wilayah 1' : 'Wilayah 2' }}</option>
                            @endforeach
                        </select>
                        @error('harga_paket_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="ig_vendor" class="col-form-label">IG Vendor</label>
                        <input type="text" value="{{ old('ig_vendor',$item->ig_vendor) }}" name="ig_vendor" class="form-control @error('ig_vendor') is-invalid @enderror" id="ig_vendor">
                        @error('ig_vendor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="ig_client" class="col-form-label">IG Client</label>
                        <input type="text" value="{{ old('ig_client',$item->ig_client) }}" name="ig_client" class="form-control @error('ig_client') is-invalid @enderror" id="ig_client">
                        @error('ig_client')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="post_foto" class="col-form-label">Post Foto</label>
                        <select id="post_foto" name="post_foto" class="form-control @error('post_foto') is-invalid @enderror">
                            <option selected disabled value="">--Pilih--</option>
                            <option value="yes" {{ old('post_foto',$item->post_foto) == 'yes' ? 'selected' : '' }}>yes</option>
                            <option value="no" {{ old('post_foto',$item->post_foto) == 'no' ? 'selected' : '' }}>no</option>
                        </select>
                        @error('post_foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah_anggota" class="col-form-label">Jumlah Anggota</label>
                        <input type="text" value="{{ old('jumlah_anggota',$item->jumlah_anggota) }}" name="jumlah_anggota" class="form-control @error('jumlah_anggota') is-invalid @enderror" id="jumlah_anggota">
                        @error('jumlah_anggota')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="req_khusus" class="col-form-label">Req Khusus</label>
                        <textarea name="req_khusus" class="form-control @error('req_khusus') is-invalid @enderror" id="req_khusus" rows="3">{{ old('req_khusus',$item->req_khusus) }}</textarea>
                        @error('req_khusus')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="status_booking" class="col-form-label">Status Booking</label>
                        <select id="status_booking" name="status_booking" class="form-control @error('status_booking') is-invalid @enderror">
                            <option value="Pending" {{ old('status_booking',$item->status_booking) == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Diterima" {{ old('status_booking',$item->status_booking) == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                            <option value="Ditolak" {{ old('status_booking',$item->status_booking) == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                            <option value="Dibatalkan" {{ old('status_booking',$item->status_booking) == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                        @error('status_booking')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="dp" class="col-form-label">DP</label>
                        <input type="number" value="{{ old('dp',$item->dp) }}" name="dp" min="0" class="form-control @error('dp') is-invalid @enderror" id="dp">
                        @error('dp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="file_dp">Upload Bukti DP </label>
                        <input 
                            type="file" 
                            name="file_dp" 
                            id="file_dp" 
                            class="form-control @error('file_dp') is-invalid @enderror">
                        @if($item->file_dp)
                            <small class="form-text text-muted">
                                File DP saat ini: 
                                <a href="{{ asset('storage/' . $item->file_dp) }}">Lihat DP</a>.
                                Biarkan kosong jika tidak ingin mengganti.
                            </small>
                        @endif
                        @error('file_dp')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>