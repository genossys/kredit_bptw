<div class="table-responsive-lg">
    <table class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>idRumah</th>
                <th>Nama Rumah</th>
                <th>hargaJual</th>
                <th>lokasi</th>
                <th>deskripsi</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @php $i=1; @endphp
            @foreach($rumah as $u)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$u->idRumah}}</td>
                <td>{{$u->namaRumah}}</td>
                <td>{{$u->hargaJual}}</td>
                <td>{{$u->lokasi}}</td>
                <td>{{$u->deskripsi}}</td>
                <td style="min-width: 100px"> <button class="btn btn-warning btn-sm pull-center" data-toggle="modal" data-target="#modalEditRumah" onclick="showModalEdit('{{$u->idRumah}}')"> <i class="fa fa-edit" aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn-sm pull-center" onclick="deleteData('{{$u->idRumah}}')"> <i class="fa fa-close" aria-hidden="true"></i></button>
                </td>
            </tr>
            @endforeach

        </tbody>

    </table>
</div>
