<div class="table-responsive-lg">
    <table class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>noKontrak</th>
                <th>namaKreditur</th>
                <th>namaRumah</th>
                <th>namabank</th>
                <th>tanggal</th>
                <th>dp</th>
                <th>angsuran</th>
                <th>top</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @php $i=1; @endphp
            @foreach($kredit as $u)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$u->noKontrak}}</td>
                <td>{{$u->namaKreditur}}</td>
                <td>{{$u->namaRumah}}</td>
                <td>{{$u->namaBank}}</td>
                <td>{{$u->tanggal}}</td>
                <td>{{$u->dp}}</td>
                <td>{{$u->angsuran}}</td>
                <td>{{$u->top}}</td>

                <td style="min-width: 100px">
                    <button class="btn btn-warning btn-sm pull-center" data-toggle="modal" data-target="#modalDataAngsuran" onclick="showDataAngsuran('{{$u->noKontrak}}')"> <i class="fa fa-check" aria-hidden="true"></i> </button>
                </td>
            </tr>
            @endforeach

        </tbody>

    </table>
</div>
