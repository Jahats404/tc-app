{{-- TAMBAH --}}
<div class="modal fade" id="modalTambah" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nama_paket" class="col-form-label">Nama Paket</label>
                        <input type="text" name="nama_paket" class="form-control" id="nama_paket">
                    </div>
                    <div class="form-group">
                        <label for="kategori_paket_id" class="col-form-label">Kategori Paket</label>
                        <select id="inputState" name="kategori_paket_id" class="form-control">
                            <option selected>Private</option>
                            <option>Group</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fitur" class="col-form-label">Fitur Paket</label>
                        <textarea class="form-control" name="fitur" id="fitur" cols="30" rows="10"></textarea>
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
                <h5 class="modal-title" id="modalEditLabel">Edit Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nama_paket" class="col-form-label">Nama Paket</label>
                        <input type="text" name="nama_paket" class="form-control" id="nama_paket">
                    </div>
                    <div class="form-group">
                        <label for="kategori_paket_id" class="col-form-label">Kategori Paket</label>
                        <select id="inputState" name="kategori_paket_id" class="form-control">
                            <option selected>Private</option>
                            <option>Group</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fitur" class="col-form-label">Fitur Paket</label>
                        <textarea class="form-control" name="fitur" id="fitur" cols="30" rows="10"></textarea>
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