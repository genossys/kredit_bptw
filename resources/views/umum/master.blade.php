<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kredit Bptw</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset ('adminlte/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/genosstyle.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/sweetalert2.min.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/sweetalert2.min.js') }}"></script>

</head>

<body>

    <nav class="navbar navbarfont navbar-expand-lg navbar-inverse navbar-dark  home" style="height: 100px">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span id="toggler"><i class="fa fa-bars" aria-hidden="true"></i></span>
        </button>
        <a class="navbar-brand" href="#">
            <!-- <img src="{{ asset('/assets/gambar/logo2.png') }} " alt="logo" /> -->
        </a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav ml-auto mt-2 mt-sms-0  ">
                <li class="nav-item ">
                    <a id="home" class="nav-link" href="/">Home </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link ml-5" href="/produk">Perumahan</a>
                </li>

                <!-- <li class="nav-item ">
                    <a class="nav-link ml-5 mr-5" href="#">Kontak</a>
                </li> -->

                @if (auth()->check())

                @if (auth()->user()->hakAkses == 'admin' || auth()->user()->hakAkses == 'pimpinan')
                <li class="nav-item ml-5">
                    <a class="nav-link" href="{{route('admin')}}">Dashboard</a>
                </li>
                @endif

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        {{auth()->user()->nama}}
                        <i class="fa fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <a href="{{route('historyTransaksiKreditur')}}" class="dropdown-item dropdown-footer">History Transaksi</a>
                        <hr>
                        <a href="{{route('logout')}}" class="dropdown-item dropdown-footer">Logout</a>
                    </div>
                </li>
                @else
                <li class="nav-item ml-5">
                    <a class="nav-link" href="/login">
                        Login
                        <i class="fa fa-user"></i>
                    </a>
                </li>
                @endif


            </ul>
        </div>
    </nav>

    @yield('content')
    @yield('footer')

    <!-- JS -->



    <!-- jQuery -->
    <script src="{{ asset ('/adminlte/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap 4 -->
    <script src=" {{asset ('/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @yield('script')

</body>

</html>
