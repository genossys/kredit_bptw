<div class="table-responsive-lg">
    <table class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>angsuran</th>
                <th>Jatuh Tempo</th>
                <th>status</th>
                <th>Tanggal</th>
                <th>Nama Petugas</th>
            </tr>
        </thead>

        <tbody>
            @php $i=1; @endphp
            @foreach($angsuran as $u)
            <tr>
                <td>{{$i++}}</td>
                <td>{{formatRupiah($u->angsuran)}}</td>
                <td>{{$u->jatuhTempo}}</td>

                @if($u->statusBayar == 'belum')
                <td class='text-danger'>{{$u->statusBayar}}</td>
                @else
                <td class='text-success'>{{$u->statusBayar}}</td>
                @endif
                <td>{{formatDateToSurat($u->tanggalPembayaran)}}</td>
                <td>{{$u->namaPetugas}}</td>

            </tr>
            @endforeach

        </tbody>

    </table>
</div>
