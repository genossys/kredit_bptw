<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laporan Angsuran</title>
    <!-- Fonts -->

    <!-- Styles -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/bootstrap3.min.css" type="text/css">
</head>

<body>

    <style>
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 0cm;
        }
    </style>

    <div class="row w-100">
        <div class="col-xs-6">
            <h1 style="margin: 0">Kredit BPTW</h1>
            <p style="margin: 0">Jl. ................., Cilacap</p>
            <p style="margin: 0">Telp. (0271) 728872 / 081 667 4239</p>
        </div>

        <div class="col-xs-5 text-right">
            <h3 style="margin: 0">Laporan Angsuran</h3>
            <p style="margin: 0">Periode: {{$daritanggal}} - {{$ketanggal}}</p>
        </div>
    </div>
    <hr>

    <div class="row">
        <table class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>noKontrak</th>
                    <th>namaKreditur</th>
                    <th>angsuran</th>
                    <th>Jatuh Tempo</th>
                    <th>Tanggal</th>
                </tr>
            </thead>

            <tbody>
                @php $i=1; @endphp
                @foreach($angsuran as $u)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$u->noKontrak}}</td>
                    <td>{{$u->nama}}</td>
                    <td>{{$u->angsuran}}</td>
                    <td>{{$u->jatuhTempo}}</td>
                    <td>{{$u->tanggalPembayaran}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <div class="row" style="margin-top: 50px">
        <div class="col-xs-6 offset-2">
            <p class="text-center" style="margin-bottom: 60px">Pimpinan</p>
            <p class="text-center">(...........................)</p>
        </div>

        <div class="col-xs-4">
            <p class="text-center" style="margin-bottom: 60px">Admin</p>
            <p class="text-center">(...........................)</p>
        </div>
    </div>



    <footer class="footer" style="margin-bottom: 10px">
        @php $date = new DateTime("now", new DateTimeZone('Asia/Bangkok') ); @endphp
        <p class="text-right small" style="margin: 0"> di cetak oleh : {{auth()->user()->username}}</p>
        <p class="text-right small" style="margin: 0"> tgl: {{ $date->format('d F Y, H:i:s') }} </p>
    </footer>

    <!-- JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap3.min.js"></script>
</body>

</html>
