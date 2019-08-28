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
                <th>status</th>
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
                @if($u->status == 'proses')
                <td class='text-warning'>{{$u->status}}</td>

                @elseif($u->status == 'diterima')
                <td class='text-success'>{{$u->status}}</td>

                @else
                <td class='text-danger'>{{$u->status}}</td>
                @endif
                <td style="min-width: 100px">

                    <button class="btn btn-warning btn-sm pull-center" @if($u->status == 'diterima' || $u->status == 'ditolak') disabled @endif data-toggle="modal" data-target="#modalEditKredit" onclick="showModalEdit('{{$u->id}}')"> <i class="fa fa-edit" aria-hidden="true"></i></button>
                    @if($u->status == 'ditolak')
                    <button class="btn btn-danger btn-sm pull-center" data-toggle="modal" data-target="#modalAlasan" onclick="showModalAlasan('{{$u->id}}')"> <i class="fa fa-bell" aria-hidden="true"></i></button>
                    @endif
                </td>
            </tr>
            @endforeach

        </tbody>

    </table>
</div>
