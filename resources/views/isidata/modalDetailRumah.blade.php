<div class="jumbotron">
    <div class="row">
        <div class="col-sm-5 text-right">
            <img id="gambarnew" class="gambarnew img-fluid" src="{{asset('/foto/'.$rumah->urlFoto)}}" alt="">
        </div>
        <div class="col-sm-7">
            <h5 class="text-dark font-weight-bold mb-4" id="namaproduct">{{$rumah->namaRumah}}</h5>
            <p class="text-dark" id="lokasi">alamat: {{$rumah->lokasi}}</p>
            <p class="text-dark" id="deskripsi">deskripsi: {{$rumah->deskripsi}}</p>

            <h2 class="tFext-dark d-inline mb-5">{{formatrupiah($rumah->hargaJual)}} </h2>
            <h2 class="text-dark d-inline font-weight-bold " id="hargaJual"></h2>
            <br>
            <br>
            <br>

            <div class="w-25">

                <div class="form-group">
                    <label>Pilih TOP</label>
                    <select class="form-control" id="cBoxHakAkses">
                        <option value="6">6 bulan</option>
                        <option value="12">12 bulan</option>
                        <option value="24">24 bulan</option>
                        <option value="36">36 bulan</option>
                        <option value="48">48 bulan</option>
                        <option value="60">60 bulan</option>
                    </select>
                </div>
            </div>

            @if (auth()->check())
            <button class="btn btn-primary" id="btnSimpan">Pesan Rumah Sekarang!</button>
            @else
            <button class="btn btn-primary" onclick="javascript:alert('Anda Harus Login Dulu!')">Pesan Rumah Sekarang!</button>
            @endif

        </div>
    </div>

</div>
</div>

<script src="{{ asset('/js/tampilan/inputnumber.js')}}"></script>
