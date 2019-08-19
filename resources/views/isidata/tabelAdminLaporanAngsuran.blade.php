<div class="table-responsive-lg">
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
