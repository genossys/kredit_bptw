<div class="p-3">
    <div class="row">
        <div class="col-md-4">
            <img src="{{asset ('/foto/'.$kreditur->urlFoto)}}" alt="" class="img-thumbnail" style="object-fit: cover; width: 300px; height: 300px">
        </div>
        <div class="col-md-1">
            <p class="">Nik</p>
            <p class="">Nama</p>
            <p class="">Email</p>
            <p class="">Tgl.lahir</p>
            <p class="">No. Hp</p>
            <p class="">Alamat</p>
            <button name="btnSimpan" id="btnSimpan" class="btn btn-warning"><i class="fa fa-print" aria-hidden="true"></i>&nbsp; Cetak</button>
        </div>
        <div class="col-md-4">
            <p class="">: {{$kreditur->nik}}</p>
            <p class="">: {{$kreditur->nama}}</p>
            <p class="">: {{$kreditur->email}}</p>
            <p class="">: {{formatDateToSurat($kreditur->tgl_lahir)}}</p>
            <p class="">: {{$kreditur->nohp}}</p>
            <p class="">: {{$kreditur->alamat}}</p>

        </div>
    </div>
</div>



</div>
