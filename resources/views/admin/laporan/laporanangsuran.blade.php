@extends('admin.master')

@section('judul')
Data Angsuran
@endsection

@section('content')



<!-- Button to Open the Modal -->
@php $skrng = date('Y-m-d') @endphp
<section>
    <div class="pt-3">
        <form action="{{route('adminCetakAngsuran')}}" method="get" target="_blank">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Dari Tanggal</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control float-right datepicker" name="daritanggal" id="daritanggal" onchange="showData()" value="{{$skrng}}" />
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Sampai Tanggal</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control float-right datepicker" name="ketanggal" id="ketanggal" onchange="showData()" value="{{$skrng}}" />
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <label><br></label>
                        <div class="input-group">
                            <button class="btn btn-warning"> <i class="fa fa-print" aria-hidden="true"></i> &nbsp; Cetak </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</section>

<div id="tabelDisini">

</div>





@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('/css/bootstrap-datepicker.min.css')}}">
@endsection


@section('script')
<script src="{{ asset('/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
    $(function() {
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });
</script>

<script>
    function showData() {
        var daritanggal = $("#daritanggal").val();
        var ketanggal = $("#ketanggal").val();

        $.ajax({
            type: 'GET',
            url: '/admin/angsuran/showAdminLaporanAngsuran',
            data: {
                daritanggal: daritanggal,
                ketanggal: ketanggal,
            },
            success: function(response) {

                $("#tabelDisini").html(response.html);
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
