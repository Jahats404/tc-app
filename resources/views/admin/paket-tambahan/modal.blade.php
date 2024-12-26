{{-- TAMBAH --}}
<div class="modal fade" id="modalTambah" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Paket Tambahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="jenis_tambahan" class="col-form-label">Jenis Tambahan</label>
                        <input type="text" name="jenis_tambahan" class="form-control" id="jenis_tambahan">
                    </div>
                    <div class="form-group">
                        <label for="harga_tambahan" class="col-form-label">Harga</label>
                        <input type="number" name="harga_tambahan" class="form-control" id="harga_tambahan">
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
                <h5 class="modal-title" id="modalEditLabel">Edit Paket Tambahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="jenis_tambahan" class="col-form-label">Jenis Tambahan</label>
                        <input type="text" name="jenis_tambahan" class="form-control" id="jenis_tambahan">
                    </div>
                    <div class="form-group">
                        <label for="harga_tambahan" class="col-form-label">Harga</label>
                        <input type="number" name="harga_tambahan" class="form-control" id="harga_tambahan">
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