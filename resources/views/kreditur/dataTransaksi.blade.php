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
                        <th>Action</th>

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
                        <td>
                        <button class="btn btn-warning btn-sm pull-center" data-toggle="modal" data-target="#modalDataAngsuran" onclick="showDataAngsuran('{{$u->noKontrak}}')">Cek Angsuran </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</section>

<!--Srart Modal -->
<div class="modal fade" id="modalDataAngsuran">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Angsuran</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="dataModalAngsuran">
            </div>
        </div>
    </div>
</div>
<!-- EndModal -->
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
<script>
    function showDataAngsuran(noKontrak) {

        $.ajax({
            type: 'GET',
            url: '/kreditur/angsuran/showAngsuranKreditur',
            data: {
                noKontrak: noKontrak,
            },
            success: function(response) {

                $("#dataModalAngsuran").html(response.html);
            },
            error: function(response) {
                alert('gagal \n' + response.responseText);
            }
        });
    }
</script>
@endsection
