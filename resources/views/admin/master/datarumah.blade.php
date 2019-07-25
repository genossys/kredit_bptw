@extends('admin.master')

@section('judul')
Data Rumah
@endsection

@section('content')



<!-- Button to Open the Modal -->
<section class="mb-5">
    <div class="pt-3">
        <button id="btnTambah" type="button" class="btn btn-primary btn box-tools pull-left" data-toggle="modal" data-target="#modalTambahRumah">
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
<div class="modal fade" id="modalTambahRumah">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Data Rumah</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form method="post" id="insertform" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="alert alert-success" style="display:none"></div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kode Rumah</label>
                                <input type="text" class="form-control" placeholder="Nama Rumah" id="idRumah" name="idRumah">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Rumah</label>
                                <input type="text" class="form-control" placeholder="Nama Rumah" id="namaRumah" name="namaRumah">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Harga Jual</label>
                        <input type="number" class="form-control" placeholder="Harga Jual" id="hargaJual" name="hargaJual">
                    </div>

                    <div class="form-group">
                        <label>Alamat / Lokasi</label>
                        <input type="text" class="form-control" placeholder="Alamat" id="lokasi" name="lokasi">
                    </div>

                    <div class="form-group">
                        <label>Deskripsi </label>
                        <textarea class="form-control" rows="3" id="deskripsi" name="deskripsi"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Gambar Rumah </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file" name="file">
                            <label class="custom-file-label" for="customFile">Pilih file</label>
                        </div>

                    </div>

                    <!-- <input id="btnSimpan" class="btn btn-primary" type="submit">Simpan <i id="iconbtn" class="fa fa-floppy-o" aria-hidden="true"></i></inp> -->
                    <button name="btnSimpan" id="btnSimpan" class="btn btn-primary">Simpan</button>
                </div>
        </div>
        </form>
    </div>
</div>
<!-- EndModal -->

<!--Srart Modal -->
<div class="modal fade" id="modalEditRumah">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Data Rumah</h6>
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
@endsection


@section('script')
<script src="{{ asset('/js/tampilan/fileinput.js') }}"></script>
<script src="{{ asset('js/handlebars.js') }}"></script>

<script>
    function showData() {
        var rumah = $("#rumah").val();
        var caridata = $("#caridata").val();

        $.ajax({
            type: 'GET',
            url: '/admin/rumah/showRumah',
            data: {
                rumah: rumah,
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
            url: '/admin/rumah/insertRumah',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#modalTambahRumah').modal('toggle');
                Swal.fire({
                    type: 'success',
                    title: 'Rumah berhasil di buat',
                    showConfirmButton: false,
                    timer: 1500
                })
                showData();
            }
        });
    });

    $('#editform').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            method: 'post',
            url: '/admin/rumah/editRumah',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#modalEditRumah').modal('toggle');
                Swal.fire({
                    type: 'success',
                    title: 'Rumah berhasil di buat',
                    showConfirmButton: false,
                    timer: 1500
                })
                showData();
            }
        });
    });


    function showModalEdit(idRumah) {

        $.ajax({
            type: 'GET',
            url: '/admin/rumah/showEditRumah',
            data: {
                idRumah: idRumah,
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
                    url: '/admin/rumah/deleteData',
                    data: {
                        idRumah: id,
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
