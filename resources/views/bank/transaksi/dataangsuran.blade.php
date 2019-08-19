@extends('bank.master')

@section('judul')
Data Angsuran
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
<div class="modal fade" id="modalDataAngsuran">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Ubah Status Angsuran</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="dataModalAngsuran">
            </div>
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
            url: '/bank/angsuran/showKredit',
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


    function showDataAngsuran(noKontrak) {

        $.ajax({
            type: 'GET',
            url: '/bank/angsuran/showAngsuran',
            data: {
                noKontrak: noKontrak,
            },
            success: function(response) {

                $("#dataModalAngsuran").html(response.html);
            },
            error: function(response) {
                alert('gagal \n' + response.responseText);
            }
        });
    }


    function showModalEdit(idAngsuran) {

        $.ajax({
            type: 'GET',
            url: '/bank/angsuran/showAngsuran',
            data: {
                id: idAngsuran,
            },
            success: function(response) {

                $("#dataModalEdit").html(response.html);
            },
            error: function(response) {
                alert('gagal \n' + response.responseText);
            }
        });
    }


    function bayarAngsuran(idAngsuran) {
        Swal.fire({
            title: 'Anda yakin?',
            text: "data "+idAngsuran+" akan di bayar!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Bayar!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: '/bank/angsuran/bayarAngsuran',
                    data: {
                        idAngsuran: idAngsuran,
                    },
                    success: function(response) {

                        Swal.fire(
                            'Berhasil!',
                            'Data berhasil di bayar',
                            'success'
                        )
                        $('#modalDataAngsuran').modal('toggle');
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
