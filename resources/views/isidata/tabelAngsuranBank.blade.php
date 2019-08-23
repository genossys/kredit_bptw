<div class="table-responsive-lg">
    <table class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>noKontrak</th>
                <th>namaKreditur</th>
                <th>angsuran</th>
                <th>Jatuh Tempo</th>
                <th>status</th>
                <th>Tanggal</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @php $i=1; @endphp
            @php $next=0; @endphp
            @foreach($angsuran as $u)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$u->noKontrak}}</td>
                <td>{{$u->nama}}</td>
                <td>{{$u->angsuran}}</td>
                <td>{{$u->jatuhTempo}}</td>

                @if($u->statusBayar == 'belum')
                <td class='text-danger'>{{$u->statusBayar}}</td>
                @if($next == '1')
                @php $next=0; @endphp
                @endif
                @else
                <td class='text-success'>{{$u->statusBayar}}</td>
                @php $next=1; @endphp
                @endif
                <td>{{$u->tanggalPembayaran}}</td>
                <td style="min-width: 130px">
                    <button class="btn btn-info btn-sm pull-center" @if($next=='1' || $next=='2' || $u->jatuhTempo > batasPembayaran() ) disabled @endif onclick="bayarAngsuran('{{$u->idAngsuran}}')"> bayar </button>
                    @if($u->statusBayar == 'belum')
                    @php $next=2; @endphp
                    @else
                    @php $next=1; @endphp
                    @endif

                    <a class="btn btn-warning btn-sm pull-center" target="_blank" href="/admin/cetak/adminCetakNotaAngsuran/{{$u->idAngsuran}}" @if($u->statusBayar == 'belum') hidden @endif > cetak </button>

                </td>


            </tr>
            @endforeach

        </tbody>

    </table>
</div>
