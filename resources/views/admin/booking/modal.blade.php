{{-- TAMBAH --}}
<div class="modal fade" id="modalTambah" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nama" class="col-form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="no_wa" class="col-form-label">No. WA</label>
                        <input type="number" name="no_wa" class="form-control" id="no_wa">
                    </div>
                    <div class="form-group">
                        <label for="event" class="col-form-label">Event</label>
                        <input type="text" name="event" class="form-control" id="event">
                    </div>
                    <div class="form-group">
                        <label for="tanggal" class="col-form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal">
                    </div>
                    <div class="form-group">
                        <label for="jam" class="col-form-label">Jam</label>
                        <input type="time" name="jam" class="form-control" id="jam">
                    </div>
                    <div class="form-group">
                        <label for="universitas" class="col-form-label">Universitas</label>
                        <input type="text" name="universitas" class="form-control" id="universitas">
                    </div>
                    <div class="form-group">
                        <label for="fakultas" class="col-form-label">Fakultas</label>
                        <input type="text" name="fakultas" class="form-control" id="fakultas">
                    </div>
                    <div class="form-group">
                        <label for="lokasi_foto" class="col-form-label">Lokasi Foto</label>
                        <input type="text" name="lokasi_foto" class="form-control" id="lokasi_foto">
                    </div>
                    <div class="form-group">
                        <label for="harga_paket_id" class="col-form-label">Paket</label>
                        <select id="inputState" name="harga_paket_id" class="form-control">
                            <option selected disabled value="">--Pilih Paket--</option>
                            <option value="Private 1">Private 1</option>
                            <option value="Private 2">Private 2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ig_vendor" class="col-form-label">IG Vendor</label>
                        <input type="text" name="ig_vendor" class="form-control" id="ig_vendor">
                    </div>
                    <div class="form-group">
                        <label for="ig_client" class="col-form-label">IG Client</label>
                        <input type="text" name="ig_client" class="form-control" id="ig_client">
                    </div>
                    <div class="form-group">
                        <label for="post_foto" class="col-form-label">Post Foto</label>
                        <select id="inputState" name="post_foto" class="form-control">
                            <option selected disabled value="">--Pilih--</option>
                            <option value="yes">yes</option>
                            <option value="no">no</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jml_anggota" class="col-form-label">Jumlah Anggota</label>
                        <input type="text" name="jml_anggota" class="form-control" id="jml_anggota">
                    </div>
                    <div class="form-group">
                        <label for="req_khusus" class="col-form-label">Req Khusus</label>
                        <textarea class="form-control" name="req_khusus" id="req_khusus" cols="10" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-form-label">Status</label>
                        <select id="inputState" name="status" class="form-control">
                            <option selected value="Pendding">Pendding</option>
                            <option value="Diterima">Diterima</option>
                            <option value="Ditolak">Ditolak</option>
                            <option value="Dibatalkan">Dibatalkan</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary">Tambah</button>
            </div>
        </div>
    </div>
</div>

{{-- EDIT --}}
<div class="modal fade" id="modalEdit" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Edit Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nama" class="col-form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="no_wa" class="col-form-label">No. WA</label>
                        <input type="number" name="no_wa" class="form-control" id="no_wa">
                    </div>
                    <div class="form-group">
                        <label for="event" class="col-form-label">Event</label>
                        <input type="text" name="event" class="form-control" id="event">
                    </div>
                    <div class="form-group">
                        <label for="tanggal" class="col-form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal">
                    </div>
                    <div class="form-group">
                        <label for="jam" class="col-form-label">Jam</label>
                        <input type="time" name="jam" class="form-control" id="jam">
                    </div>
                    <div class="form-group">
                        <label for="universitas" class="col-form-label">Universitas</label>
                        <input type="text" name="universitas" class="form-control" id="universitas">
                    </div>
                    <div class="form-group">
                        <label for="fakultas" class="col-form-label">Fakultas</label>
                        <input type="text" name="fakultas" class="form-control" id="fakultas">
                    </div>
                    <div class="form-group">
                        <label for="lokasi_foto" class="col-form-label">Lokasi Foto</label>
                        <input type="text" name="lokasi_foto" class="form-control" id="lokasi_foto">
                    </div>
                    <div class="form-group">
                        <label for="harga_paket_id" class="col-form-label">Paket</label>
                        <select id="inputState" name="harga_paket_id" class="form-control">
                            <option selected disabled value="">--Pilih Paket--</option>
                            <option value="Private 1">Private 1</option>
                            <option value="Private 2">Private 2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ig_vendor" class="col-form-label">IG Vendor</label>
                        <input type="text" name="ig_vendor" class="form-control" id="ig_vendor">
                    </div>
                    <div class="form-group">
                        <label for="ig_client" class="col-form-label">IG Client</label>
                        <input type="text" name="ig_client" class="form-control" id="ig_client">
                    </div>
                    <div class="form-group">
                        <label for="post_foto" class="col-form-label">Post Foto</label>
                        <select id="inputState" name="post_foto" class="form-control">
                            <option selected disabled value="">--Pilih--</option>
                            <option value="yes">yes</option>
                            <option value="no">no</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jml_anggota" class="col-form-label">Jumlah Anggota</label>
                        <input type="text" name="jml_anggota" class="form-control" id="jml_anggota">
                    </div>
                    <div class="form-group">
                        <label for="req_khusus" class="col-form-label">Req Khusus</label>
                        <textarea class="form-control" name="req_khusus" id="req_khusus" cols="10" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-form-label">Status</label>
                        <select id="inputState" name="status" class="form-control">
                            <option selected value="Pendding">Pendding</option>
                            <option value="Diterima">Diterima</option>
                            <option value="Ditolak">Ditolak</option>
                            <option value="Dibatalkan">Dibatalkan</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>