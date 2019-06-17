@extends('umum.master')
@section('content')

<section class="promo">
    <div class="container">
        <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner" style="height: 400px;width: 100%">
                <div class="carousel-item active">
                    <img src="{{ asset('/assets/gambar/slide1.png')}}" alt="slide 1" class="img-fluid">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/assets/gambar/slide2.jpg')}}" alt="slide 2" class="img-fluid">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/assets/gambar/slide3.jpg')}}" alt="slide 3" class="img-fluid">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>
    </div>
</section>


<section class="produkkami">
    <div class="container">
        <div class="row mt-5">
            <div class="text-left col-sm-7">
                <a style="font-size: 30px"> Perumahan yang tersedia</a>
            </div>

            <div class="col-sm-2 text-right">
                <a class="align-self-center"> Sort: </a>
            </div>

            <div class="text-right col-sm-3">
                <form>

                    <div class="form-group">
                        <select class="form-control">
                            <option value="Hargarendah">Harga Terendah</option>
                            <option value="Hargatinggi">Harga Tertinggi</option>
                        </select>
                    </div>

                </form>
            </div>
        </div>
        <hr>
        <div class="row">


            <div class="col-md-3">
                <div class="kartuproduk">
                    <img src="{{asset ('/assets/gambar/slide2.jpg')}}" alt="" data-toggle="modal" data-target="#myModal">
                    <h3 data-toggle="modal" data-target="#myModal"> Perumahan 1 </h3>

                    <div class="tombolpesankecil text-left">
                        <h4> Rp 145jt</h4>
                    </div>
                    <div class="tombolpesankecil text-right">

                        <button class="btn-detail btn btn-outline-primary">Detail</button>
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
@endsection
