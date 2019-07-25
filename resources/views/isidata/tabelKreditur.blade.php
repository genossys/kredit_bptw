<div class="table-responsive-lg">
    <table class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>nik</th>
                <th>Nama</th>
                <th>email</th>
                <th>tanggal lahir</th>
                <th>No Hp</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @php $i=1; @endphp
            @foreach($kreditur as $u)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$u->nik}}</td>
                <td>{{$u->nama}}</td>
                <td>{{$u->email}}</td>
                <td>{{$u->tgl_lahir}}</td>
                <td>{{$u->nohp}}</td>
                <td style="min-width: 100px">
                    <button class="btn btn-info btn-sm pull-center" data-toggle="modal" data-target="#modalEditKreditur" onclick="showModalDetail('{{$u->id}}')"> <i class="fa fa-address-book" aria-hidden="true"></i></button>
                    <button class="btn btn-warning btn-sm pull-center" data-toggle="modal" data-target="#modalEditKreditur" onclick="showModalEdit('{{$u->id}}')"> <i class="fa fa-edit" aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn-sm pull-center" onclick="deleteData('{{$u->id}}')"> <i class="fa fa-close" aria-hidden="true"></i></button>
                </td>
            </tr>
            @endforeach

        </tbody>

    </table>
</div>