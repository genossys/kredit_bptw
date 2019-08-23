@extends('admin.master')

@section('judul')
Data Kreditur
@endsection

@section('content')



<!-- Button to Open the Modal -->
<section class="mb-5">
    <div class="pt-3">
        <button id="btnTambah" type="button" class="btn btn-primary btn box-tools pull-left" data-toggle="modal" data-target="#modalTambahKreditur">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
        </button>
        <div class="pull-right">
            <input id="caridata" type="text" class="form-control" name='caridata' onkeyup="showData()" />
        </div>
        <label class="pull-right mt-2"> Cari &nbsp;</label>
    </div>

</section>

<div id="tabelDisini"></div>

</div>

<!--Srart Modal -->
<div class="modal fade" id="modalTambahKreditur">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Data Kreditur</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form method="POST" id="insertform" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nik</label>
                                <input type="number" class="form-control" placeholder="Nik" id="nik" name="nik">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="email" id="email" name="email">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="nama" id="nama" name="nama">
                    </div>

                    <div class="form-group">
                        <label>Alamat </label>
                        <textarea class="form-control" rows="3" id="alamat" name="alamat"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control float-right datepicker" name="tgl_lahir" id="tgl_lahir">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No.Hp</label>
                                <input type="text" class="form-control" placeholder="No Hp" id="nohp" name="nohp">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Foto </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="urlFoto" name="urlFoto">
                                    <label class="custom-file-label" for="customFile">Pilih file</label>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="password" id="password" name="password">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input type="password" class="form-control" placeholder="password" id="passwordkonf" name="passwordkonf">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary pull-right mb-3">Daftar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- EndModal -->

<!--Srart Modal -->
<div class="modal fade" id="modalEditKreditur">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Data Kreditur</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form method="post" id="editform" enctype="multipart/form-data">
                <div class="modal-body" id="dataModalEdit">

                </div>
            </form>
        </div>
    </div>
</div>
<!-- EndModal -->

@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('/css/bootstrap-datepicker.min.css')}}">
@endsection


@section('script')
<script src="{{ asset('/js/tampilan/fileinput.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
    $(function() {
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });

    function showData() {
        var kreditur = $("#kreditur").val();
        var caridata = $("#caridata").val();

        $.ajax({
            type: 'GET',
            url: '/admin/kreditur/showKreditur',
            data: {
                kreditur: kreditur,
                caridata: caridata,
            },
            success: function(response) {

                $("#tabelDisini").html(response.html);
            },
            error: function(response) {
                alert('gagal \n' + response.responseText);
            }
        });
    }

    $('#insertform').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            method: 'post',
            url: '/admin/kreditur/insertKreditur',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                Swal.fire({
                    type: 'success',
                    title: 'berhasil mendaftar',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });
    });

    $('#editform').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            method: 'post',
            url: '/admin/kreditur/editKreditur',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#modalEditKreditur').modal('toggle');
                Swal.fire({
                    type: 'success',
                    title: 'Kreditur berhasil di ubah',
                    showConfirmButton: false,
                    timer: 1500
                })
                showData();
            }
        });
    });


    function showModalEdit(id) {

        $.ajax({
            type: 'GET',
            url: '/admin/kreditur/showEditKreditur',
            data: {
                id: id,
            },
            success: function(response) {

                $("#dataModalEdit").html(response.html);
            },
            error: function(response) {
                alert('gagal \n' + response.responseText);
            }
        });
    }

    function showModalDetail(idKreditur) {

        $.ajax({
            type: 'GET',
            url: '/admin/kreditur/showDetailKreditur',
            data: {
                id: idKreditur,
            },
            success: function(response) {

                $("#dataModalEdit").html(response.html);
            },
            error: function(response) {
                alert('gagal \n' + response.responseText);
            }
        });
    }


    function deleteData(id) {
        Swal.fire({
            title: 'Anda yakin?',
            text: "data ini akan di hapus!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus saja!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'DELETE',
                    url: '/admin/kreditur/deleteData',
                    data: {
                        id: id,
                    },
                    success: function(response) {

                        Swal.fire(
                            'Deleted!',
                            'Data berhasil di hapus',
                            'success'
                        )
                        showData();
                    },
                    error: function(response) {
                        alert('gagal \n' + response.responseText);
                    }
                });
            }
        })

    }

    $(window).on("load", function() {
        showData();
    });
</script>
@endsection
