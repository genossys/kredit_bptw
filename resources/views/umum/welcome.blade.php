<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kredit BPTW</title>
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset ('adminlte/plugins/font-awesome/css/font-awesome.min.css')}}">

    <!-- Styles -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/genosstyle.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/animate.css') }}" rel="stylesheet" />


</head>

<body class="bodypolos">


    <nav class="navbar navbarfont navbar-expand-lg navbar-inverse navbar-dark fixed-top home">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span id="toggler"><i class="fa fa-bars" aria-hidden="true"></i></span>
        </button>
        <a class="navbar-brand" href="#">
            <!-- <img src="{{ asset('/assets/gambar/logo2.png') }} " alt="logo" /> -->
        </a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-sms-0  ">
                <li class="nav-item mr-5">
                    <a id="home" class="nav-link" href="/">Home </a>
                </li>

                <li class="nav-item mr-5 ">
                    <a class="nav-link" href="/produk">Produk</a>
                </li>

                <li class="nav-item mr-5">
                    <a class="nav-link" href="#">Kontak</a>
                </li>

                @if (auth()->check())

                @if (auth()->user()->hakAkses == 'admin' || auth()->user()->hakAkses == 'pimpinan')
                <li class="nav-item mr-5">
                    <a class="nav-link" href="{{route('admin')}}">Dashboard</a>
                </li>
                @endif

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        {{auth()->user()->nama}}
                        <i class="fa fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <a href="{{route('logout')}}" class="dropdown-item dropdown-footer">History Transaksi</a>
                        <a href="{{route('logout')}}" class="dropdown-item dropdown-footer">Cek Angsuran</a>
                        <hr>
                        <a href="{{route('logout')}}" class="dropdown-item dropdown-footer">Logout</a>
                    </div>
                </li>
                @else
                <li class="nav-item mr-5">
                    <a class="nav-link" href="/login">
                        Login
                        <i class="fa fa-user"></i>
                    </a>
                </li>
                @endif

            </ul>
        </div>
    </nav>

    <section class="gambarfullhome">

        <div class="bgtekshome">

            <div class="tekshome">
                <h1 class="judulhome anJudul">
                    Kredit BPTW
                </h1>

                <p class="isihome anIsi">
                    cek angsuran kredit rumah secara online
                </p>

                <button class="btn btn-lg anBtn btn-depan">Lihat Produk</button>
            </div>
        </div>
    </section>

    <!-- JS -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/tampilan/genosstyle.js') }}"></script>
</body>

</html>
