@extends('admin.master')

@section('judul')
Data Kredit
@endsection

@section('content')



<!-- Button to Open the Modal -->
<section class="mb-5">
    <div class="pt-3">
        <div class="pull-right">
            <input id="caridata" type="text" class="form-control" name='caridata' onkeyup="showData()" />
        </div>
        <label class="pull-right mt-2"> Cari &nbsp;</label>
    </div>

</section>

<div id="tabelDisini"></div>

</div>



<!--Srart Modal -->
<div class="modal fade" id="modalEditKredit">
    <div class="modal-dialog modal-sm">

        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Ubah Status Kredit</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form method="post" id="editform">
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
        var caridata = $("#caridata").val();

        $.ajax({
            type: 'GET',
            url: '/admin/kredit/showKredit',
            data: {
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

    $('#editform').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            method: 'post',
            url: '/admin/kredit/editKredit',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#modalEditKredit').modal('toggle');
                Swal.fire({
                    type: 'success',
                    title: 'Kredit berhasil di buat',
                    showConfirmButton: false,
                    timer: 1500
                })
                showData();
            }
        });
    });


    function showModalEdit(idKredit) {

        $.ajax({
            type: 'GET',
            url: '/admin/kredit/showEditKredit',
            data: {
                id: idKredit,
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
                    url: '/admin/kredit/deleteData',
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
