<input type="text" hidden value="{{$kreditur->id}}" id="id" name="id">
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Nik</label>
            <input type="number" class="form-control" placeholder="Nik" id="nik" name="nik" value="{{$kreditur->nik}}">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="email" id="email" name="email" value="{{$kreditur->email}}">
        </div>
    </div>
</div>


<div class="form-group">
    <label>Nama</label>
    <input type="text" class="form-control" placeholder="nama" id="nama" name="nama" value="{{$kreditur->nama}}">
</div>

<div class="form-group">
    <label>Alamat </label>
    <textarea class="form-control" rows="3" id="alamat" name="alamat">{{$kreditur->alamat}}</textarea>
</div>

<div class="form-group">
    <label>Tanggal Lahir</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="fa fa-calendar"></i>
            </span>
        </div>
        <input type="text" class="form-control float-right datepicker" name="tgl_lahir" id="tgl_lahir" value="{{$kreditur->tgl_lahir}}">
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>No.Hp</label>
            <input type="text" class="form-control" placeholder="No Hp" id="nohp" name="nohp" value="{{$kreditur->nohp}}">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Foto </label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="urlFoto" name="urlFoto">
                <label class="custom-file-label" for="customFile">Pilih file</label>
            </div>

        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary pull-right mb-3">Daftar</button>

<script src="{{ asset('/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
    $(function() {
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });
