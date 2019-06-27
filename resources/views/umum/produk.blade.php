@extends('umum.master')
@section('content')
<section class="newproduk">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-8 text-right" style="font-size: 20px;color: aqua">
            </div>
        </div>
    </div>
    <div id="carouspromo" class="carousel slide" data-ride="carousel" data-interval="5000">
        <!-- The slideshow -->
        <div class="carousel-inner container">
            @foreach($productPromo as $pp)
            @if($loop->first)
            <div class="carousel-item active">
                @else
                <div class="carousel-item">
                    @endif
                    <div class="row">
                        <div class="col-sm-5 text-right">
                            <img id="thumbnailpromo" class="gambarnew img-fluid" src="{{asset ('/foto/'.$pp->urlFoto)}}" alt="{{asset ('/foto/'.$pp->urlFoto)}}">
                        </div>
                        <div class="col-sm-7 text-dark">
                            <h3> {{$pp->namaProduct}}</h3>
                            <p class="mt-4 text-dark">{{$pp->deskripsi}}</p>
                            <h3 class="text-dark font-weight-bold"> {{formatRupiah($pp->hargaJual)}}</h3>
                            <div class="tombolpesan text-right">
                                @if (auth()->check())
                                <button class="btn btn-lg btn-primary" onclick="showModalPromo('{{$pp->kdProduct}}','{{$pp->namaProduct}}', '{{$pp->deskripsi}}', '{{$pp->diskon}}','{{$pp->hargaJual}}','{{asset ('/foto/'.$pp->urlFoto)}}','{{auth()->user()->username}}')">Detail</button>
                                @else
                                <button class="btn btn-lg btn-primary" onclick="showModalPromo('{{$pp->kdProduct}}','{{$pp->namaProduct}}', '{{$pp->deskripsi}}', '{{$pp->diskon}}','{{$pp->hargaJual}}','{{asset ('/foto/'.$pp->urlFoto)}}','')">Detail</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Left and right controls -->
            <a class="carousel-control-prev tombolcarousel" href="#carouspromo" data-slide="prev">
                <span><i class="fa fa-arrow-left" aria-hidden="true" style="color: white"></i></span>
            </a>
            <a class="carousel-control-next tombolcarousel" href="#carouspromo" data-slide="next">
                <span><i class="fa fa-arrow-right" aria-hidden="true" style="color: white"></i></span>
            </a>
        </div>
</section>

<section class="baju pt-5">
    <div class="container ">
        <div class="row mb-1" style="min-height: 70px">

            <div class="col-sm-3 offset-8" style="font-size: 12Px">
                <div class="form-group">
                    <label> Urutkan</label>
                    <select class="form-control">
                        <option value="termurah">Termurah</option>
                        <option value="termahal">Termahal</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-1" style="font-size: 12Px">
                <div class="form-group">
                    <label> <br></label>
                    <button class="form-control btn btn-info"><span><i class="fa fa-search" aria-hidden="true"></i></span></button>
                </div>
            </div>
        </div>
    </div>

    <div class="container" data-ride="carousel">
        <div class="row">
            @foreach($productNonPromo as $pnp)
            <div class="col-md-2 mb-4">
                <div class="kartuproduk">
                    <img id="thumbnailnonpromo" src="{{asset ('/foto/'.$pnp->urlFoto)}}" alt="{{asset ('/foto/'.$pnp->urlFoto) }}">
                    <a class="text-left namaproduk" data-toggle="modal" data-target="#myModal"> {{$pnp->namaProduct}}</a>
                    <div class="hargaproduk">
                        <a> {{formatRupiah($pnp->hargaJual)}}</a>
                    </div>
                    @if (auth()->check())
                    <div class="text-right">
                        <button class="btn btn-sm btn-primary" onclick="showModal('{{$pnp->kdProduct}}','{{$pnp->namaProduct}}', '{{$pnp->deskripsi}}', '{{$pnp->diskon}}','{{$pnp->hargaJual}}','{{asset ('/foto/'.$pnp->urlFoto)}}', '{{auth()->user()->username}}')">Detail</button>
                    </div>
                    @else
                    <div class="text-right">
                        <button class="btn btn-sm btn-primary" onclick="showModal('{{$pnp->kdProduct}}','{{$pnp->namaProduct}}', '{{$pnp->deskripsi}}', '{{$pnp->diskon}}','{{$pnp->hargaJual}}','{{asset ('/foto/'.$pnp->urlFoto)}}', '')">Detail</button>
                    </div>
                    @endif

                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>




<!-- Modal Detail Produk -->
<section>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content modalprodukdialog">
                <!-- Modal body -->
                <div class="modal-body modalprodukbody">
                    <div class="modalproduk">
                        <button style="padding-right: 10px" type="button" class="close text-danger" data-dismiss="modal">&times;</button>
                        <div class="jumbotron  panelmodal">
                            <div class="row">
                                <div class="col-sm-5 text-right">
                                    <img id="gambarnew" class="gambarnew img-fluid" src="" alt="">
                                </div>
                                <div class="col-sm-7">
                                    <h5 class="text-dark font-weight-bold mb-4" id="namaproduct"></h5>
                                    <p class="text-dark" id="deskripsi"></p>

                                    <h2 class="text-dark d-inline mb-5">Rp. </h2>
                                    <h2 class="text-dark d-inline font-weight-bold " id="hargaJual"></h2>
                                    <br>
                                    <p class="text-dark d-inline">off : Rp. </p>
                                    <p class="text-dark d-inline" id="diskon"></p>

                                    <div class="tombolpesan">
                                        <p>
                                        </p>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-light btn-number input-plus" data-type="minus" data-field="quant[2]">
                                                    <span>-</span>
                                                </button>
                                            </span>
                                            <input type="text" id="qty" name="quant[2]" class="input-number text-center" value="1" min="1" max="100" style="width: 50px">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-light btn-number input-min" data-type="plus" data-field="quant[2]">
                                                    <span>+</span>
                                                </button>
                                            </span>
                                        </div>
                                        <p></p>
                                        @if (auth()->check())
                                        <button class="btn btn-primary" id="btnSimpan">Tambah Ke Keranjang</button>
                                        @else
                                        <button class="btn btn-primary" onclick="javascript:alert('Anda Harus Login Dulu!')">Tambah Ke Keranjang</button>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('footer')
<section>
    <footer>
        <div class="footer">
            &copy; Copyright 2019
        </div>
    </footer>
</section>
@endsection


@section('script')
<script src="{{ asset('/js/tampilan/genosstyle.js') }}"></script>
<script src="{{ asset('/js/tampilan/inputnumber.js') }}"></script>
<script src="{{ asset('/js/Transaksi/product.js') }}"></script>

@endsection
