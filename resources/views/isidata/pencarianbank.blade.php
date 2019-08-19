<div class="m-2">
    <div class="row pt-3">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Bank</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach($dataBank as $dm)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$dm->nama}}</td>
                    <td>{{$dm->alamat}}</td>
                    <td>{{$dm->nohp}}</td>
                    <td>
                        <button class="btn btn-info btn-sm pull-right" onclick="pilihBank('{{$dm->id}}','{{$dm->nama}}')" data-toggle="modal" data-target="#modalBank"> <i class="fa fa-check"> pilih</i> </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function pilihBank(idBank, namaBank) {
        $('#idBank').val(idBank);
        $('#namaBank').val(namaBank);
    }
</script>
