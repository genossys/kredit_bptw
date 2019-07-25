@extends('umum.master')
@section('content')
<section class="baju" style="padding-top: 130px">
    <div class="container ">
        <div class="row mb-1" style="min-height: 70px">

            <div class="col-sm-3 offset-8" style="font-size: 12Px">
                <div class="form-group">
                    <label> Urutkan</label>
                    <select class="form-control">
                        <option value="termurah">Termurah</option>
                        <option value="termahal">Termahal</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-1" style="font-size: 12Px">
                <div class="form-group">
                    <label> <br></label>
                    <button class="form-control btn btn-info"><span><i class="fa fa-search" aria-hidden="true"></i></span></button>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container" id="showcaseRumah">

</section>




<!-- Modal Detail Produk -->
<section>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Detail Perumahan</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form method="post" id="editform">
                    <div class="modal-body" id="modalDetailRumah">

                    </div>
                </form>
            </div>
        </div>
</section>
</section>
@endsection


@section('footer')
<section>
    <footer>
        <div class="footer">
            &copy; Copyright 2019
        </div>
    </footer>
</section>
@endsection


@section('script')

<script>
    function showData() {
        var rumah = $("#rumah").val();
        var caridata = $("#caridata").val();

        $.ajax({
            type: 'GET',
            url: '/produk/showcaseRumah',
            data: {
                rumah: rumah,
                caridata: caridata,
            },
            success: function(response) {

                $("#showcaseRumah").html(response.html);
            },
            error: function(response) {
                alert('gagal \n' + response.responseText);
            }
        });
    }


    function showModalDetail(idRumah) {

        $.ajax({
            type: 'GET',
            url: '/produk/showDetailRumah',
            data: {
                idRumah: idRumah,
            },
            success: function(response) {

                $("#modalDetailRumah").html(response.html);
            },
            error: function(response) {
                alert('gagal \n' + response.responseText);
            }
        });
    }

    $(window).on("load", function() {
        showData();
    });
</script>
@endsection
