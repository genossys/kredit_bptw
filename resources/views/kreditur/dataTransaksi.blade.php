@extends('umum.master')
@section('content')
<section class="history container" style="min-height: 500px; padding-top: 100px">
    <h5 class="text-left text-info pt-3"> Berikut adalah daftar transaksi anda </h5>
    <div id="tampilanhistorytransaksi">
        <div class="table-responsive-lg">
            <table class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nomor Kontrak</th>
                        <th>Rumah</th>
                        <th>Bank</th>
                        <th>Tanggal</th>
                        <th>Dp</th>
                        <th>Angsuran</th>
                        <th>Top</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @php $i=1; @endphp
                    @foreach($kredit as $u)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$u->noKontrak}}</td>
                        <td>{{$u->idRumah}}</td>
                        <td>{{$u->idBank}}</td>
                        <td>{{$u->tanggal}}</td>
                        <td>{{$u->dp}}</td>
                        <td>{{$u->angsuran}}</td>
                        <td>{{$u->top}}</td>
                        @if($u->status == 'proses')
                        <td class="text-warning">{{$u->status}}</td>
                        @elseif($u->status == 'diterima')
                        <td class="text-success">{{$u->status}}</td>
                        @else
                        <td class="text-danger">{{$u->status}}</td>
                        @endif
                    </tr>
                    @endforeach

                </tbody>

            </table>
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

@endsection
