@extends('admin.master')

@section('judul')
Data Rumah
@endsection

@section('content')


<!-- Button to Open the Modal -->
<div>
    <button id="tambahModal" style="margin-bottom: 10px; margin-top: 20px" type="button" class="btn btn-primary box-tools pull-right" data-toggle="modal" data-target="#modaltambahRumah">
        Tambah Data Rumah
    </button>

</div>

<div class="table-responsive-lg">
    <table id="example2" class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Rumah</th>
                <th>Nama Rumah</th>
                <th>Harga</th>
                <th>Alamat</th>
                <th>Dekripsi</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

<!--Srart Modal -->
<div class="modal fade" id="modaltambahRumah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Rumah</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="" method="POST" id="formSimpanRumah" class="form">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="alert alert-success" style="display:none"></div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label id="labelIdRumah">ID Rumah </label>
                                <input type="text" class="form-control" placeholder="ID" id="txtIdRumah" name="txtIdRumah">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="labelNamaRumah">Nama Rumah </label>
                                <input type="text" class="form-control" placeholder="Nama" id="txtNamaRumah" name="txtNamaRumah">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="labelHargaRumah">Harga Rumah</label>
                                <input type="number" class="form-control" placeholder="Harga" id="txtHargaRumah" name="txtHargaRumah">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Alamat </label>
                        <input type="text" class="form-control" placeholder="Alamat" id="txtAlamat" name="txtAlamat">
                    </div>


                    <div class="form-group">
                        <label id="labelKetRumah">Ket. Rumah </label>
                        <textarea class="form-control" rows="2" id="txtKetRumah" name="txtKetRumah"></textarea>
                    </div>

                    <div class="form-group">
                        <label id="labelGambarSnack">Gambar Snack </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="fileGambarRumah" name="fileGambarRumah">
                            <label class="custom-file-label" for="customFile">Pilih file</label>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Latitude </label>
                                <input type="text" class="form-control" placeholder="Nama" id="txtLat" name="txtLat">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Longitude</label>
                                <input type="text" class="form-control" placeholder="Longitude" id="txtLng" name="txtLng">
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <button id="btnSimpan" class="btn btn-primary"></button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- EndModal -->

@endsection



@section('script')
<script src="{{ asset('/js/tampilan/fileinput.js') }}"></script>
<script src="{{ asset('/js/tampilan/changemodal.js') }}"></script>

@endsection
