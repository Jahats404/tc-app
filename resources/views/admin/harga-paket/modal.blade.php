{{-- TAMBAH --}}
<div class="modal fade" id="modalTambah" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Harga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="paket_id" class="col-form-label">Nama Paket</label>
                        <select id="inputState" name="paket_id" class="form-control">
                            <option selected disabled value="">--Pilih Paket--</option>
                            <option value="Private 1">Private 1</option>
                            <option value="Private 2">Private 2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="golongan" class="col-form-label">Golongan Wilayah</label>
                        <select id="inputState" name="golongan" class="form-control">
                            <option selected disabled value="">--Pilih--</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga" class="col-form-label">Harga Paket</label>
                        <input type="number" name="harga" class="form-control" id="harga">
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
                <h5 class="modal-title" id="modalEditLabel">Edit Harga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="paket_id" class="col-form-label">Nama Paket</label>
                        <select id="inputState" name="paket_id" class="form-control">
                            <option selected disabled value="">--Pilih--</option>
                            <option value="Private 1">Private 1</option>
                            <option value="Private 2">Private 2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="golongan" class="col-form-label">Golongan Wilayah</label>
                        <select id="inputState" name="golongan" class="form-control">
                            <option selected disabled value="">--Pilih--</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga" class="col-form-label">Harga Paket</label>
                        <input type="number" name="harga" class="form-control" id="harga">
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

{{-- DETAIL --}}
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="DetailLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailLabel">Detail Harga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="userName" class="form-label">Nama Paket: Private 1</label>
                </div>
                <div class="mb-3">
                    <label for="userEmail" class="form-label">Fitur: 
                        <li>For 1 Graduation</li>
                        <li>Unlimited Shoot</li>
                    </label>
                </div>
                <div class="mb-3">
                    <label for="userLevel" class="form-label">Harga: 
                        <li>Rp. 500.000 (Surabaya, Bandung)</li>
                        <li>Rp. 700.000 (Jakarta, Bali)</li>
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>