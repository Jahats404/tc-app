<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="name">Paket Name <span class="text-danger">*</span></label>
                            <input 
                                type="text" 
                                name="nama_paket" 
                                value="{{ old('nama_paket') }}" 
                                class="form-control" 
                                id="nama_paket">
                            @error('nama_paket')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <hr>
                    <div class="d-flex">
                        <p class="text-info font-weight-bold">Price </p>
                    </div>

                    <div class="form-row">
                        <!-- harga -->
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">YOGYAKARTA, SOLO, SEMARANG, PURWOKERTO, MALANG <span class="text-danger">*</span></label>
                            <input 
                                type="number" 
                                name="harga1" 
                                value="{{ old('harga1') }}" 
                                class="form-control">
                            @error('harga1')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- harga -->
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">JABODETABEK, BANDUNG, SURABAYA, BALI <span class="text-danger">*</span></label>
                            <input 
                                type="number" 
                                name="harga2" 
                                value="{{ old('harga2') }}" 
                                class="form-control">
                            @error('harga2')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <!-- Graduated -->
                        <div class="form-group col-md-6">
                            <label for="name">For how many graduates? <span class="text-danger">*</span></label>
                            <input 
                                type="text" 
                                name="graduated" 
                                value="{{ old('graduated') }}" 
                                class="form-control" 
                                id="graduated">
                            @error('graduated')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
    
                        <!-- How long is the photo session? -->
                        <div class="form-group col-md-6">
                            <label for="name">How long is the photo session? <span class="text-danger">*</span></label>
                            <input 
                                type="text" 
                                name="time" 
                                value="{{ old('time') }}" 
                                class="form-control" 
                                id="time">
                            @error('time')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <!-- How many photos are edited? -->
                        <div class="form-group col-md-12">
                            <label for="name">How many photos are edited? <span class="text-danger">*</span></label>
                            <input 
                                type="number" 
                                name="edit" 
                                value="{{ old('edit') }}" 
                                class="form-control" 
                                id="edit">
                            @error('edit')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <!-- Expired in G-Drive? -->
                        <div class="form-group col-md-12">
                            <label for="name">Expired in G-Drive? <span class="text-danger">*</span></label>
                            <input 
                                type="number" 
                                name="gdrive" 
                                placeholder=". . . Day"
                                value="{{ old('gdrive') }}" 
                                class="form-control" 
                                id="gdrive">
                            @error('gdrive')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <!-- Location -->
                        <div class="form-group col-md-12">
                            <label for="name">Location <span class="text-danger">*</span></label>
                            <input 
                                type="text" 
                                name="location" 
                                value="{{ old('location') }}" 
                                class="form-control" 
                                id="location">
                            @error('location')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            
        </div>
    </div>
</div>