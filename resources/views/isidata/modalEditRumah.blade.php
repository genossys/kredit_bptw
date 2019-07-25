<div class="alert alert-danger" style="display:none"></div>
<div class="alert alert-success" style="display:none"></div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Kode Rumah</label>
            <input type="text" class="form-control" hidden placeholder="Nama Rumah" id="idRumah" name="idRumah" value='{{$rumah->idRumah}}'>
            <input type="text" class="form-control" disabled placeholder="Nama Rumah" id="idRumahshow" value='{{$rumah->idRumah}}'>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Nama Rumah</label>
            <input type="text" class="form-control" placeholder="Nama Rumah" id="namaRumah" name="namaRumah" value='{{$rumah->namaRumah}}'>
        </div>
    </div>
</div>

<div class="form-group">
    <label>Harga Jual</label>
    <input type="number" class="form-control" placeholder="Harga Jual" id="hargaJual" name="hargaJual" value='{{$rumah->hargaJual}}'>
</div>

<div class="form-group">
    <label>Alamat / Lokasi</label>
    <input type="text" class="form-control" placeholder="Alamat" id="lokasi" name="lokasi" value='{{$rumah->lokasi}}'>
</div>

<div class="form-group">
    <label>Deskripsi </label>
    <textarea class="form-control" rows="3" id="deskripsi" name="deskripsi">{{$rumah->deskripsi}}</textarea>
</div>

<div class="form-group">
    <label>Gambar Rumah </label>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="file" name="file">
        <label class="custom-file-label" for="customFile">Pilih file</label>
    </div>

</div>

<!-- <input id="btnSimpan" class="btn btn-primary" type="submit">Simpan <i id="iconbtn" class="fa fa-floppy-o" aria-hidden="true"></i></inp> -->
<button name="btnSimpan" id="btnSimpan" class="btn btn-primary">Simpan</button>
</div>


<script src="{{ asset('/js/tampilan/fileinput.js') }}"></script>
