<div class="row">
    @foreach($rumah as $r)
    <div class="col-md-2 mb-4">
        <div class="kartuproduk">
            <img id="thumbnailnonpromo" src="{{asset ('/foto/'.$r->urlFoto)}}" alt="{{asset ('/foto/'.$r->urlFoto) }}">
            <a class="text-left namaproduk" data-toggle="modal" data-target="#myModal"> {{$r->namaRumah}}</a>
            <div class="hargaproduk">
                <a> {{formatRupiah($r->hargaJual)}}</a>
            </div>

            <div class="text-right">
                @if($r->statusJual == 'belum')
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal" onclick="showModalDetail('{{$r->idRumah}}')">Detail</button>
                @else
                <button class="btn btn-sm btn-danger" disabled >Terjual</button>
                @endif
            </div>



        </div>
    </div>
    @endforeach
</div>
