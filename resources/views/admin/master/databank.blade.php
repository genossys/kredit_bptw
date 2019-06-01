@extends('admin.master')

@section('judul')
Data Bank
@endsection

@section('content')


<!-- Button to Open the Modal -->
<div>
    <button id="tambahModal" style="margin-bottom: 10px; margin-top: 20px" type="button" class="btn btn-primary box-tools pull-right" data-toggle="modal" data-target="#modaltambahBank">
        Tambah Data Bank
    </button>

</div>

<div class="table-responsive-lg">
    <table id="example2" class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Bank</th>
                <th>Nama Bank</th>
                <th>Alamat</th>
                <th>Tgl. Lahir</th>
                <th>Contact Person</th>
                <th>No. Telp</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

<!--Srart Modal -->
<div class="modal fade" id="modaltambahBank">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Bank</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="" method="POST" id="formSimpanBank" class="form">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="alert alert-success" style="display:none"></div>

                    <div class="form-group">
                        <label>ID Bank </label>
                        <input type="text" class="form-control" placeholder="ID" id="txtIdBank" name="txtIdBank">
                    </div>

                    <div class="form-group">
                        <label>Nama Bank </label>
                        <input type="text" class="form-control" placeholder="Nama" id="txtNamaBank" name="txtNamaBank">
                    </div>

                    <div class="form-group">
                        <label>Alamat </label>
                        <input type="text" class="form-control" placeholder="Alamat" id="txtAlamatBank" name="txtAlamatBank">
                    </div>

                    <div class="form-group">
                        <label>Contact Person </label>
                        <input type="text" class="form-control" placeholder="Contact Person" id="txtContactPerson" name="txtContactPerson">
                    </div>


                    <div class="form-group">
                        <label>No. Telp </label>
                        <input type="text" class="form-control" placeholder="No. Telp" id="txtNoTelp" name="txtNoTelp">
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="labelpassword">Password</label>
                                <input type="password" class="form-control" placeholder="Password" id="txtPasswordUser" name="txtPasswordUser">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="labelpassword">Konfirmasi Password</label>
                                <input type="password" class="form-control" placeholder="Masukan Ulang Password" id="txtConPasswordUser" name="txtConPasswordUser">
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

@section('css')
<link rel="stylesheet" href="{{ asset('/css/bootstrap-datepicker.min.css')}}">
<link rel="stylesheet" href="{{ asset('/css/autotext.css')}}">
@endsection


@section('script')
<script src="{{ asset('/js/tampilan/fileinput.js') }}"></script>
<script src="{{ asset('/js/tampilan/changemodal.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('/js/tampilan/autotextidlelang.js') }}"></script>
<script type="text/javascript">
    $(function() {
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });
</script>

@endsection
