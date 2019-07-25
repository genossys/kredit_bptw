<div class="alert alert-danger" style="display:none"></div>
<div class="alert alert-success" style="display:none"></div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Email Bank" id="email" name="email" value='{{$bank->email}}'>
            <input class="form-control" hidden id="id" name="id" value='{{$bank->id}}'>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Nama Bank</label>
            <input type="text" class="form-control" placeholder="Nama Bank" id="nama" name="nama" value='{{$bank->nama}}'>
        </div>
    </div>
</div>



<div class="form-group">
    <label>Alamat</label>
    <input type="text" class="form-control" placeholder="Alamat" id="alamat" name="alamat" value='{{$bank->alamat}}'>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Contact</label>
            <input type="text" class="form-control" placeholder="Nama Contact" id="contact" name="contact" value='{{$bank->contact}}'>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Nomor Telp Bank</label>
            <input type="text" class="form-control" placeholder="Telp. Bank" id="nohp" name="nohp" value='{{$bank->nohp}}'>
        </div>
    </div>
</div>


<!-- <input id="btnSimpan" class="btn btn-primary" type="submit">Simpan <i id="iconbtn" class="fa fa-floppy-o" aria-hidden="true"></i></inp> -->
<button name="btnSimpan" id="btnSimpan" class="btn btn-primary">Simpan</button>
